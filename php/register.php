<?php
    require_once '../vendor/autoload.php';
    require_once '../vendor/swiftmailer/swiftmailer/lib/swift_required.php';
    // variables
    $message = "";
    $email_result = "";

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

    function saveToDatabase($data) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $servername = "localhost:3306";
        $username = "long";
        $password = "123456";
        $dbname = "KR_2021_PARTICIPANTS";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO Participants (Name, Affiliation, Address, Email, Phone, IsStudent, RegisterPaper, PaperNumber, Workshops, Tutorials, GoNMR, Gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $name, $affiliation, $address, $email, $phone, $isStudent, $registerPaper, $paperNumber, $workshops, $tutorials, $goNMR, $gender);
        
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
        $paperNumber = ($registerPaper != null && $registerPaper == "YES") ? $data['paper_number'] : null;

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
        } // end 
       
        
        //echo "New records created successfully";
        
        // closing connection
        $stmt->close();
        $conn->close();
    
        //print_r($data);
    } // end saveToDatabase

    function sendEmail($email, $registerPaper) {
        // create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, "ssl"))
        ->setUsername("kr2021reg@gmail.com")
        -> setPassword("hoinghikr#2021");

        // create a mailer
        $mailer = new Swift_Mailer($transport);

        try {
            $message = (new Swift_Message('Wonderful Subject'))
            ->setFrom(['kr2021reg@gmail.com' => "KR-2021"])
            ->setTo(["$email"])
            ->setBody($registerPaper ? "(yes)Hello, this is just a test message meant to send to invalid email message.\nSorry if it's sent to you" : "(no)Hello, this is just a test message meant to send to invalid email message.\nSorry if it's sent to you")
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

    // check if the information already exists. 
    $success = true;
    $email_failure_message = "Something is wrong, we werent' able to send you a confirmation email";
    $email_success_message = "You should be <b>receiving a confirmation email</b> in your mailbox at: "
    . "<b>" . $_POST['email_address']."</b>"
    . "<br><br>";

    if ($_POST['register_paper'] == "yes" ||$_POST['register_paper'] == "no") {    
        // get the email
        $email = getEmail($_POST);
        
        // check email
        if (!validEmail($email)) {
            die("Your email is invalid, please go back and update your email address");
        } // end if

        // save to database
        saveToDatabase($_POST);

        // send email
        try {
            $result = sendEmail($email, true);

            if ($result == 0) {
                $email_result = $email_failure_message;
            } else {
                $email_result = $email_success_message;
            } // end else

            if ($_POST['register_paper'] == "yes") {
                $message = "<b class=\"important\">The payment for the Paper Registration is separate</b> and has to be done by following these steps:
                    <br>
                1) Go to <a href=https://shopcart.nmsu.edu/shop/kr2021 target=\"_blank\">Paper Registration Store</a>
                <br>
                2) Click on...
                <br>
                3) Pay 
                <br>
                4) You are done!
                ";
            } // end if
        } catch(Swift_RfcComplianceException $e) {
            $email_result = "Your email is invalid, please register with an another email address";
        } // end catch
    } else {
        $message = "The value of register paper is other than yes and no, please fill the form again.";
        $success = false;
    } // end else
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Jquery JS-->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Title Page-->
    <title>CONFIRMATION</title>

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
    <div class="page-wrapper bg-kr p-t-45 p-b-50">
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