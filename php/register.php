<?php
    function sendInformation($data) {
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
    } // end sendInformation

    // check if the information already exists. 
    if ($_POST['register_paper'] == "yes") {    
        sendInformation($_POST);
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

        // redirect to new page
        //goToPayment();
        //header("Location: https://www.google.com");
        //die();
    } elseif ($_POST['register_paper'] == "no") {
        // sending information to database
        sendInformation($_POST);
    } else {
        $message = "Something is wrong with the form, please fill the form again. \n We apologize for the inconvenience.";
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
    <div class="page-wrapper bg-orange p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">THANK YOU FOR REGISTERING FOR KR-2021</h2>
                </div>
                <div class="card-body">
                    <!--STARTING THE RESULT-->
                    You will receive a confirmation email in your mailbox at:
                    <?php
                        echo "<b>".$_POST['email_address']."</b>";
                        echo "<br><br>";
                        echo $message;
                    ?>
                    <!---->
                </div>

            </div>

            <div class="card card-5 m-t-50">
                <div class="card-heading">
                    <h2 class="title">CONFIRMATION INFORMATION</h2>
                </div>
                <div class="card-body">
                    Name: <?php echo $_POST['name'] ?>
                    <br>
                    Affiliation: <?php echo $_POST['affiliation'] ?>
                    <br>
                    Email: <?php echo $_POST['email_address'] ?>
                    <br>
                    Phone Number: <?php echo $_POST['phone_number'] ?>
                    <br>
                    Is Student: <?php echo $_POST['is_student'] ?>
                    <br>
                    Register Paper: <?php echo $_POST['register_paper'] ?>
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