<?php
    require_once '../vendor/autoload.php';
    //require_once '../vendor/swiftmailer/swiftmailer/lib/swift_required.php';

    $service_url = 'https://shopcart.nmsu.edu/service';
    $store_key = '01c035f6b7da73a6236d34ae3bf2df5d';
    $store_id = 97;
    $product_id = 2097;
    
    function validEmail($email) {
        // check for email address rfc format
        try {
            $message = (new Swift_Message('Wonderful Subject'))
            ->setTo(["$email"]);
            ;
        } catch(Swift_RfcComplianceException $e) {
            return false;
        } // end catch

        // check for dns availability

        return true;
    } // end function

    function uniqueEmail($email, $account) {
        $conn = createConn($account);
        $stmt = $conn->prepare("SELECT * FROM Participants WHERE email=?");
        $stmt->bind_param("s", $email);

        try {
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->num_rows == 0;
        } catch(mysqli_sql_exception $ex) {
            die("Something is wrong when checking the email with the database");
        } finally {
            $stmt->close();
            $conn->close();
        } // end finally
    } // end uniqueEmail

    function createConn($account) {
        $servername = $account->serverName;
        $username = $account->userName;
        $password = $account->passWord;
        $dbname = $account->dbName;
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } // end if

        return $conn;
    } // end createConn

    function saveToDatabase($data, $account) { 
        // Create connection
        $conn = createConn($account);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        // set parameters and execute
        // trim the values
        foreach ($data as $key => $value) {
            $data[$key] = trim($value);
        } // end foreach

        $name = $data['name'];
        $affiliation = $data['affiliation'];

        //address
        $address_line = $data['address_line'];
        $city_address = $data['city_address'];
        $state_address = $data['state_address'];
        $country_address = $data['country_address'];
        $zip_address = $data['zip_address'];

        $address = $address_line . ", " 
                    .($city_address == "" || $city_address == null ? "" : "City: " . $city_address . ', ') 
                    .($state_address == "" || $state_address == null ? "" : "State: " . $state_address . ', ')
                    .$country_address
                    .($zip_address == "" || $zip_address == null ? "" : ", " . "Zip code: ". $zip_address) ;

        // other
        $email = $data['email_address'];
        // remove all spaces in phone number
        $phone = str_replace(" ", "", $data['phone_number']);

        // change them to uppercase
        $isStudent = strtoupper($data['is_student']);
        $registerPaper = strtoupper($data['register_paper']);
        // paper number
        if ($registerPaper != null && $registerPaper == "YES") {
            $paperNumber = $data['paper_number'];
            $numberPaper = $data['number_paper'];
        } else {
            $paperNumber = null;
            $numberPaper = null;
        } // end else
        
        // workshops
        $workshops = [];
        for ($i = 0; $i < 6; ++$i) {
            $workshops[$i] = $data["workshop".($i+1)];
        } // end for i
        $workshops = json_encode($workshops);

        // tutorials
        $tutorials = [];
        for ($i = 0; $i < 8; ++$i) {
            $tutorials[$i] = $data["tutorial".($i+1)];
        } // end for i
        $tutorials = json_encode($tutorials);

        // others
        $goNMR = strtoupper($data['participate_nmr']);
        $gender = strtoupper($data['gender']);
        // consent
        $videoConsent = strtoupper($data['video_consent']);
        $videosNotToPublish = $data['videos_not_to_publish'];

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO Participants (Name, Affiliation, Address, Email, Phone, IsStudent, RegisterPaper, NumberPaper, PaperNumber, Workshops, Tutorials, GoNMR, Gender, VideoConsent, VideosNotToPub) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssisssssss", $name, $affiliation, $address, $email, $phone, $isStudent, $registerPaper, $numberPaper, $paperNumber, $workshops, $tutorials, $goNMR, $gender, $videoConsent, $videosNotToPublish);

        // execute
        try {
            $stmt->execute();
        } catch (mysqli_sql_exception $exception) {
            $state = $conn->sqlstate;
            if ($state == "23000") {
                die("Someone has already registered with this email address: " . $_POST['email_address']. ". Please register with a different email address");
            } else {
                // for debug
                die("$exception");

                // for production
                die("Something is wrong, please try again");
            } // end else
        } finally {
            // closing connection
            $stmt->close();
            $conn->close();
        } // end finally
    } // end saveToDatabase

    function sendEmail($email, $header, $body) {
        // create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, "ssl"))
        ->setUsername("kr2021reg@gmail.com")
        -> setPassword("hoinghikr#2021");

        // create a mailer
        $mailer = new Swift_Mailer($transport);

        try {
            $message = (new Swift_Message($header))
            ->setFrom(['kr2021reg@gmail.com' => "KR-2021"])
            ->setTo(["$email"])
            ->setBody($body)
            ;
        } catch(Swift_RfcComplianceException $e) {
            throw $e;
        } // end catch
        
        
        $result = $mailer->send($message);
        //$result = 0;

        return $result;
    } // end sendEmail

    function getEmail($data) {
        return trim($data['email_address']);
    } // end getEmail

    function getEmailGenericBody() {
        return file_get_contents('../mail_content/mail_content.txt');
    } // end getEmailGenericBody

    function createOrder($service_url, $store_key, $store_id) {
        $url = $service_url . '/' . $store_id . '/orders/create' . '?key=' . $store_key;
        $result = file_get_contents($url);
        $result = new SimpleXMLElement( $result );

        $order_id = (string) ($result->xpath('/result/order/id')[0]);
        //echo "Created " . $order_id . "<br>";

        return $order_id;
    } // end createOrder

    function deleteOrder($service_url, $store_key, $store_id, $order_id) {
        // /service/[shopid]/orders/[orderid]/abandon
        $url = $service_url . '/' . $store_id . '/orders/' . $order_id . '/abandon' . '?key=' . $store_key;
        $result = file_get_contents($url);
        print_r("delete: " . $result);
    } // end deleteOrder

    function updateOrder($service_url, $store_key, $store_id, $order_id, $product_id, $data) {
        // add items
        // /service/[shopid]/orders/[orderid]/add/[productid]
        $url = $service_url . '/' . $store_id . '/orders/' . $order_id . '/add/' . $product_id . '?key=' . $store_key;
        $number_paper = $data['number_paper'];
        if ($number_paper == '0') {
            die("Error: Paper Registration with 0 paper amount registered");
        } // end if
        
        $number_paper = intval($number_paper);
        if ($number_paper == 0) {
            die("Error: The number format is not integer");
        } // end if

        // add amount in the url
        $url = $url . '&amount=' . $number_paper;
        $result = file_get_contents($url);
        if ($result == false) {
            echo ("Error: Cannot add product to cart <br>");
            return;
        } // end if
        print_r("Add products" . $result . "<br>");

        // update personal information
        // /service/[shopid]/orders/[orderid]/update_personal
        $url = $service_url . '/' . $store_id . '/orders/' . $order_id . '/upddate_personal' . '?key=' . $store_key;
        
        // last name
        $url = $url . "&lastname=";

        // first name
        $url = $url . "&firstname=";

        // email
        $url = $url . "&email=";

        // address

        // city

        // state

        // zip

        
        // get the personal information
        $result = file_get_contents($url);
        if ($result == false) {
            echo ("Error: Cannot update personal information for the order<br>");
            return;
        } // end if

    } // end updateOrder

    function showOrders($service_url, $store_key, $store_id) {
        // /service/[shopid]/orders
        $url = $service_url . '/' . $store_id . '/orders' . '?key=' . $store_key . '&verbose=1';
        $result = file_get_contents($url);
        print_r($result);
    } // end showOrders

// START
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    // get account
    $account = json_decode(file_get_contents('../odjfka/1929/vvv/db_account.json'));
    if ($account == null)
        die("DB account file not found");
    // variables
    $message = "";
    $email_result = "";
    // check if the information already exists. 
    $success = true;
    $email_failure_message = "Something is wrong, we werent' able to send you a confirmation email";
    $email_success_message = "You should be <b>receiving a confirmation email</b> in your mailbox at: "
    . "<b>" . $_POST['email_address']."</b>"
    . "<br><br>";

    try {
        if ($_POST['register_paper'] == "yes" || $_POST['register_paper'] == "no") {    
            // get the email
            $email = getEmail($_POST);
            
            // check email
            if (!validEmail($email)) {
                die("Your email is invalid, please go back and update your email address");
            } // end if
    
            // check unique email
            if (uniqueEmail($email, $account)) {
                // send email
                try {
                    $email_body = getEmailGenericBody();
                    // add name
                    $email_body = str_replace("{user}", ucwords($_POST['name']), $email_body);
                    // add confirmation
                    $confirmation = "CONFIRMATION:".
                    "\n\t+ Name: " . $_POST['name'] .
                    "\n\t+ Affiliation: " . $_POST['affiliation'] .
                    "\n\t+ Email: " . $_POST['email_address'] .
                    "\n\t+ Is a Student?: " . $_POST['is_student'] .
                    "\n\t+ Will Register a Paper?: " . $_POST['register_paper']
                        ;
                    
                    $paper_message = "";
                    if ($_POST['register_paper'] == "yes") {
                        //  // create order
                        //  $order_id = createOrder($service_url, $store_key, $store_id);
                        //  // add information

                         // message for displaying
                        $message = "<b class=\"important\">The payment for the Paper Registration is separate</b> and has to be done by following these steps:
                            <br>
                        1) Go to <a href=https://shopcart.nmsu.edu/shop/kr2021 target=\"_blank\">Paper Registration Store</a>.
                        <br>
                        2) Click on \"Paper Registration\" under Featured Products.
                        <br>
                        3) Click \"Add to cart\".
                        <br>
                        4) Make sure the quantity is correct, you can adjust and update it with Update Quantities. 
                        <br>
                        5) Proceed to checkout.
                        <br>
                        6) Fill in all of the fields (If any field in Address doesn't apply to you, enter randomly as you can remove it later).
                        <br>
                        7) Proceed to checkout.
                        <br>
                        8) Fill in all of the fields (After you have filled Country, some fields in Address may no longer be required). 
                        <br>
                        9) Continue Checkout.
                        <br>
                        10) Review your order and payment information, then click \"Submit Payment\".
                        ";
                        
                        // add paper number
                        $confirmation = $confirmation . "\n        +Paper Number: " . $_POST['paper_number'];
                        // add paper registration
                        $paper_message = "\nPlease note that you have to pay for the Paper Registration separately by: "
                                        . "\n\t1) Go to https://shopcart.nmsu.edu/shop/kr2021."
                                        . "\n\t2) Click on \"Paper Registration\" under Featured Prodcuts."
                                        . "\n\t3) Click \"Add to cart\"."
                                        . "\n\t4) Make sure the quantity is correct, you can adjust and update it with Update Quantities."
                                        . "\n\t5) Proceed to checkout"
                                        . "\n\t6) Fill in all of the fields (If any field in Address doesn't apply to you, enter randomly as you can remove it later)."
                                        . "\n\t7) Proceed to checkout."
                                        . "\n\t8) Fill in all of the fields (After you have filled Country, some fields in Address may no longer be required)."
                                        . "\n\t9) Continue Checkout."
                                        . "\n\t10) Review your order and payment information, then click \"Submit Payment\"."
                        ; // end paper_message

                       
                    } // end if
    
                    // put the confirmation into the email body
                    $email_body = str_replace(["{confirmation}\n", "{confirmation}\r\n"], $confirmation, $email_body);
                    // put the paper message into the email body
                    $email_body = str_replace("{paper_registration}", $paper_message, $email_body);
    
                    // send the email
                    $result = sendEmail($email, "KR-2021 REGISTRATION CONFIRMATION", $email_body);
    
                    // get email result message
                    $email_result = $result == 0 ? $email_failure_message : $email_success_message;

                    // save to database
                    saveToDatabase($_POST, $account);
                } catch(Swift_RfcComplianceException $e) {
                    $email_result = "Your email is invalid, please register with an another email address";
                } // end catch
            } // end if
            else {
                // create order
                $order_id = createOrder($service_url, $store_key, $store_id);
                // add information
                updateOrder($service_url, $store_key, $store_id, $order_id, $product_id, $_POST);
                //showOrders($service_url, $store_key, $store_id);
                deleteOrder($service_url, $store_key, $store_id, $order_id);
                $message = "The email you entered has already been used. Please register with a unique email address";
                $success = false;
            } // end else
        } else {
            $message = "The value of register paper is other than yes and no, please fill the form again.";
            $success = false;
        } // end else
    } catch(Exception $e) {
        die($e);
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Jquery JS-->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Title Page-->
    <title>REGISTRATION STATUS</title>

    <!-- Icons font CSS-->
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-kr-gray p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading bg-blue">
                    <h2 class="title">
                        <?php
                            if ($success)
                                echo "YOUR REGISTRATION HAS BEEN SAVED";
                            else
                                echo "ERROR";
                        ?>
                    </h2>
                </div>
                <div class="card-body">
                    <!--STARTING THE RESULT-->
                    <?php
                        if ($success) {
                            echo "<b>THANK YOU FOR REGISTERING FOR KR-2021!</b>";
                            echo " ";
                        } // END IF
                             
                        echo $email_result;
                        echo $message;
                    ?>
                    <!---->
                </div>

            </div>

            <div <?php if (!$success) echo "hidden";?> class="card card-5 m-t-50">
                <div class="card-heading bg-red">
                    <h2 class="title">CONFIRMATION INFORMATION</h2>
                </div>
                <div class="card-body">
                    Name: <?php echo $_POST['name'] ?>
                    <br>
                    Affiliation: <?php echo $_POST['affiliation'] ?>
                    <br>
                    Email: <?php echo $_POST['email_address'] ?>
                    <br>
                    Is a Student?: <?php echo $_POST['is_student'] ?>
                    <br>
                    Will Register a Paper?: <?php echo $_POST['register_paper'] ?>
                    <br>
                    <?php 
                        if($_POST['register_paper'] == "yes") echo "Paper Number: ".$_POST['paper_number']
                    ?>
                    <br>
                    <!---->
                </div>
            </div>
        </div>
    </div>
     
    <!--Vendor JS-->
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../vendor/datepicker/moment.min.js"></script>
    <script src="../vendor/datepicker/daterangepicker.js"></script>
   
    <!-- Main JS-->
    <script src="../js/global.js"></script>
</body><!-- This was made based on a template of Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->