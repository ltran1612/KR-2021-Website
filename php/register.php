<?php
    function sendInformation($data) {
        echo $data;
    } // end sendInformation

    // check if the information already exists. 
    if ($_POST['has_paper'] == "yes") {    
        sendInformation($_POST);
        // redirect to new page
        //header("Location: https://www.google.com");
        //die();
    } elseif ($_POST['has_paper'] == "no") {
        // sending information to database
        sendInformation($_POST);
        $message = "Here is you registration code";
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
                    <?php

                        echo $message;
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