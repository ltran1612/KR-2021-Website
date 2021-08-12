<?php
    require_once '../vendor/autoload.php';
    require_once './misc_funcs.php';
    require_once './email_funcs.php';
    require_once './DatabaseAdapter.php';
    //require_once '../vendor/swiftmailer/swiftmailer/lib/swift_required.php';

    // use safeEcho when we output to screen.
    $service_url = 'https://shopcart.nmsu.edu/service';
    $store_key = '01c035f6b7da73a6236d34ae3bf2df5d';
    $store_id = 97;
    $product_id = 2097;

    function createOrder($service_url, $store_key, $store_id) {
        $url = $service_url . '/' . $store_id . '/orders/create' . '?key=' . $store_key;
        $result = file_get_contents($url);
        $result = new SimpleXMLElement( $result );

        $order_id = (string) ($result->xpath('/result/order/id')[0]);
        //echo "Created " . $order_id . "<br>";
        $error = (string) ($result->xpath('/result/error')[0]);
        if ($error != "0")
            return "";

        return $order_id;
    } // end createOrder

    function deleteOrder($service_url, $store_key, $store_id, $order_id) {
        // /service/[shopid]/orders/[orderid]/abandon
        $url = $service_url . '/' . $store_id . '/orders/' . $order_id . '/abandon' . '?key=' . $store_key;
        $result = file_get_contents($url);
        print_r("delete: " . $result);
    } // end deleteOrder

    function updateOrder($service_url, $store_key, $store_id, $order_id, $product_id, PostDataWrapper $data) {
        // add items
        // /service/[shopid]/orders/[orderid]/add/[productid]
        $url = $service_url . '/' . $store_id . '/orders/' . $order_id . '/add/' . $product_id . '?key=' . $store_key;
        $number_paper = $data->getNumberPaper();
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
        //print_r("Add products" . $result . "<br>");

        // update personal information
        // /service/[shopid]/orders/[orderid]/update_personal
        $url = $service_url . '/' . $store_id . '/orders/' . $order_id . '/update_personal' . '?key=' . $store_key;
        
        // last name
        $lastName = $data->getFirstName();

        // first name
        $firstName = $data->getLastName();

        // email
        $email = $data->getEmail();

        // address
        $address = $data->getAddressLine();

        // city
        $city = $data->getCity();
        $city = determineValue($city, "placeholder");
        

        // state
        $state = $data->getState();
        $state = determineValue($state, "placeholder");

        // zip
        $zip = $data->getZip();
        $zip = determineValue($zip, "placeholder");

        // create string
        $format = "&lastname=%s&firstname=%s&email=%s&address=%s&city=%s&state=%s&zip=%s";
        $url = $url . sprintf($format, safeUrlEncodeValue($lastName), safeUrlEncodeValue($firstName), safeUrlEncodeValue($email), safeUrlEncodeValue($address), safeUrlEncodeValue($city), safeUrlEncodeValue($state), safeUrlEncodeValue($zip));
        //echo $url;
        // get the personal information
        $result = file_get_contents($url);
        if ($result == false) {
            echo ("Error: Cannot update personal information for the order<br>");
            return;
        } // end if
    } // end updateOrder

    function checkoutOrder($service_url, $store_key, $store_id, $order_id) {
        // /service/[shopid]/orders/[orderid]/checkout
        $url = $service_url . '/' . $store_id . '/orders/' . $order_id . '/checkout' . '?key=' . $store_key;
        $result = file_get_contents($url);
        $result = new SimpleXMLElement($result);


        $error = (string) ($result->xpath('/result/error')[0]);
        if ($error != "0")
            return "";
        $result_url = (string) ($result->xpath('/result/url')[0]);
        return $result_url;
    } // end checkoutOrder

    function showOrders($service_url, $store_key, $store_id) {
        // /service/[shopid]/orders
        $url = $service_url . '/' . $store_id . '/orders' . '?key=' . $store_key . '&verbose=1';
        $result = file_get_contents($url);
        print_r($result);
    } // end showOrders
// START
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    // get db account
    $dbAccount = getDBAccount();
    if ($dbAccount == null)
        die("Cannot connect to database: account file not found");

    // process data
    $postWrapper = new PostDataWrapper($_POST);

    // default messages;
    $message = "";
    $email_result = "";
    $success = true;
    // messages
    $email_failure_message = "Something is wrong, we werent' able to send you a confirmation email";
    $email_success_message = "You should be <b>receiving a confirmation email</b> in your mailbox at: "
    . "<b>" . $postWrapper->getEmail()."</b>"
    . "<br><br>";

    // check if the information already exists. 
    try {
        define ("willRegisterPaper", $postWrapper->getWillRegisterPaper());
        if (willRegisterPaper == "yes" || willRegisterPaper == "no") {    
            // get the email
            $email = $postWrapper->getEmail();
            
            // check email
            if (!validEmail($email)) {
                die("Your email is invalid, please go back and update your email address");
            } // end if

            // database adapter
            $dbAdapter = new DatabaseAdapter($dbAccount);
    
            // check unique email
            if ($dbAdapter->isUniqueEmail($email)) {
                // send email
                try {
                    $email_body = getEmailGenericBody();
                    // add name
                    $email_body = str_replace("{user}", ucwords($postWrapper->getFullName()), $email_body);
                    // add confirmation
                    $confirmation = "CONFIRMATION:".
                    "\n\t+ Name: " . $postWrapper->getFullName().
                    "\n\t+ Affiliation: " . $postWrapper->getAffiliation().
                    "\n\t+ Email: " . $postWrapper->getEmail().
                    "\n\t+ Is a Student?: " . $postWrapper->getIsStudent().
                    "\n\t+ Will Register a Paper?: " . $postWrapper->getWillRegisterPaper()
                        ;
                    
                    $paper_message = "";
                    if (willRegisterPaper == "yes") {
                        $checkout_url = "";
                        // create order
                        $order_id = createOrder($service_url, $store_key, $store_id);
                        if ($order_id != "") {
                            // add information
                            updateOrder($service_url, $store_key, $store_id, $order_id, $product_id, $postWrapper);
                            // checkout order
                            $checkout_url = checkoutOrder($service_url, $store_key, $store_id, $order_id);
                        } // end if

                         // message for displaying
                        $message = "<b class=\"important\">The payment for the Paper Registration (100$/paper registration) is separate</b> and has to be done by following these steps:
                            <br>
                        1) Go to <a href=https://shopcart.nmsu.edu/shop/kr2021 target=\"_blank\">Paper Registration Store</a>" . ($checkout_url == "" ? "" : " or <a href=$checkout_url target=\"_blank\">Checkout Link</a> to skip to step 8") . "." .
                        "<br>
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
                        <i><b>Note: No spaces in card number</b></i>
                        <br>
                        9) Continue Checkout.
                        <br>
                        10) Review your order and payment information, then click \"Submit Payment\".
                        ";
                        
                        // add paper number
                        $confirmation = $confirmation . "\n        +Paper Number: " . $postWrapper->getPaperNumber();
                        // add paper registration
                        $paper_message = "\nPlease note that you have to pay for the Paper Registration (100$/paper registration) separately by: "
                                        . "\n\t1) Go to https://shopcart.nmsu.edu/shop/kr2021" . ($checkout_url == "" ? "" : " or $checkout_url to skip to step 8")
                                        . "\n\t2) Click on \"Paper Registration\" under Featured Prodcuts."
                                        . "\n\t3) Click \"Add to cart\"."
                                        . "\n\t4) Make sure the quantity is correct, you can adjust and update it with Update Quantities."
                                        . "\n\t5) Proceed to checkout"
                                        . "\n\t6) Fill in all of the fields (If any field in Address doesn't apply to you, enter randomly as you can remove it later)."
                                        . "\n\t7) Proceed to checkout."
                                        . "\n\t8) Fill in all of the fields (After you have filled Country, some fields in Address may no longer be required)."
                                        . "\n\tNote: No spaces in card number"
                                        . "\n\t9) Continue Checkout."
                                        . "\n\t10) Review your order and payment information, then click \"Submit Payment\"."
                        ; // end paper_message

                       
                    } // end if
    
                    // put the confirmation into the email body
                    $email_body = str_replace(["{confirmation}\n", "{confirmation}\r\n"], $confirmation, $email_body);
                    // put the paper message into the email body
                    $email_body = str_replace("{paper_registration}", $paper_message, $email_body);
    
                    // send the email
                    $result = sendEmail($email, "KR 2021 REGISTRATION CONFIRMATION", $email_body);
    
                    // get email result message
                    $email_result = $result == 0 ? $email_failure_message : $email_success_message;

                    // save to database
                    $success = $dbAdapter->saveToDatabase($postWrapper);
                    if (!$success)
                        $messsage = "Cannot save to database, please try again.";
                } catch(Swift_RfcComplianceException $e) {
                    $email_result = "Your email is invalid, please register with an another email address";
                } // end catch
            } // end if
            else {
                $message = "The email you entered has already been used. Please register with a unique email address.<br>";
                $success = false;
            } // end else
        } else {
            $message = "The value of register paper is other than yes and no, please fill the form again.";
            $success = false;
        } // end else
    } catch(Exception $e) {
        dieBig($e);
    } // end catch
    
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
                <div class="card-heading <?php echo $success ? "bg-orange" : "bg-red"?>">
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
                            echo "<b>THANK YOU FOR REGISTERING FOR KR 2021!</b>";
                            echo " You can edit your participation and opt out answer using the registered email address <a href=\"./edit_login.php\" target=\"_blank\">here</a>.<br>";
                        } // END IF
                             
                        echo $email_result;
                        echo $message;
                    ?>
                    <!---->
                </div>

            </div>

            <div <?php if (!$success) echo "hidden";?> class="card card-5 m-t-50">
                <div class="card-heading bg-blue">
                    <h2 class="title">CONFIRMATION INFORMATION</h2>
                </div>
                <div class="card-body">
                    Name: <?php safeEcho($postWrapper->getFullName())?>
                    <br>
                    Affiliation: <?php safeEcho($postWrapper->getAffiliation())?>
                    <br>
                    Email: <?php safeEcho($postWrapper->getEmail())?>
                    <br>
                    Is a Student?: <?php safeEcho($postWrapper->getIsStudent())?>
                    <br>
                    Will Register a Paper?: <?php safeEcho($postWrapper->getWillRegisterPaper())?>
                    <br>
                    <?php 
                        if(willRegisterPaper == "yes") safeEcho("Paper Number: ".$postWrapper->getPaperNumber())
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
<footer><?php include "./contact_info.php" ?></footer>
</html>
<!-- end document-->