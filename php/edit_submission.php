<?php
    require_once '../vendor/autoload.php';
    require_once './misc_funcs.php';
    require_once './DatabaseAdapter.php';
    //require_once '../vendor/swiftmailer/swiftmailer/lib/swift_required.php';

// START
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    // database
    $account = getDBAccount();
    if ($account == null)
        dieBig("Cannot connect to database: account file not found");
    $dbAdapter = new DatabaseAdapter($account);

    // process data
    prepareData($_POST);
    $email = $_POST['email_address'];

    // update database
    $success = $dbAdapter->updateDatabase($email, $_POST);

    // default messages;
    $message = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Jquery JS-->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Title Page-->
    <title>EDIT STATUS</title>

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
                                echo "YOUR EDIT HAS BEEN SAVED SUCCESSFULLY";
                            else
                                echo "ERROR";
                        ?>
                    </h2>
                </div>
                <div class="card-body">
                    <!--STARTING THE RESULT-->
                    <?php
                        if ($success) {
                            echo "Your edit has been saved!";
                        } // END IF
                        else {
                            echo "Your edit has not been saved. Please try again.";
                        } // end else
                    ?>
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