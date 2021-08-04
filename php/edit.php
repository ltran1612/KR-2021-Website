<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Jquery JS-->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Title Page-->
    <title>EDIT MAIN PAGE</title>

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
                        EDIT MAIN PAGE
                    </h2>
                </div>
                <div class="card-body">
                    <form action="./edit_submission.php" method="POST">
                        <h4>Please enter the email that you used in the registration you want to update:</h4>
                        <!--EMAIL-->
                        <div class="form-row">
                            <div class="name">Email<span class="required-field"></span></div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email_address" required>
                                    <label class="label--desc">Note: Each registration is uniquely identified by This email address</label>
                                </div>
                            </div>
                        </div>

                        <!--BUTTON-->
                        <div>
                            <button class="btn btn--radius-2 btn--kr" type="submit">Register</button>
                        </div>
                    </form>
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