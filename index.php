<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="KR-2021 Registration Based On Colorlib Template">
    <meta name="author" content="">
    <meta name="keywords" content="KR-2021 Registration">

    <!-- Title Page-->
    <title>KR-2021 Registration</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-orange p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">KR-2021 REGISTRATION FORM</h2>
                </div>
                <div class="card-body">
                    <!--STARTING THE FORM-->
                    <form method="POST">
                        <!--CONTACT INFORMATION-->
                        <div id="contact_info"></div>
                       
                        <!--OTHER INFORMATION-->
                        <div id="other_info"></div>

                        <div id="dummy"></div>

                        <script>
                            $(document).ready(function() {                
                                const promise = new Promise();                
                                $("#contact_info").load("html/contact_info.html");
                                $("#other_info").load("html/other_info.html");
                                $.getScript("js/global.js");
                            });
                        </script>

                        <div>
                            <button class="btn btn--radius-2 btn--orange" type="submit">Register</button>
                        </div>
                    </form>
                    <!---->
                </div>
            </div>
        </div>
    </div>

    <!--Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
   
</body><!-- This was made based on a template of Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->