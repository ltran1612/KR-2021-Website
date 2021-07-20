<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>

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
                    <form action="php/register.php" method="POST">
                        <!--CONTACT INFORMATION-->
                        <!--FULL NAME-->
                        <div class="form-row m-b-55">
                            <div class="name">Full Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="name" required>
                                    <label class="label--desc">(first middle last)</label>
                                </div>
                            </div>
                        </div>

                        <!--AFFILIATION-->
                        <div class="form-row">
                            <div class="name">Affiliation</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="affiliation" required>
                                </div>
                            </div>
                        </div>

                        <!--ADDRESS-->
                        <div class="form-row">
                            <div class="name">Address</div>
                            <div class="value">
                                <div class="col-1">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="street_address" required>
                                        <label class="label--desc">Street Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--CITY, STATE/PROVINCE-->
                        <div class="form-row" >
                            <div class="name"></div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="city_address" required>
                                            <label class="label--desc">City</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="state_address" required>
                                            <label class="label--desc">State/Province</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--POSTAL, COUNTRY-->
                        <div class="form-row m-b-55" >
                            <div class="name"></div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="zip_address" required>
                                            <label class="label--desc">Zip Code</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="country_address" required>
                                            <label class="label--desc">Country</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--EMAIL-->
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email_address" required>
                                </div>
                            </div>
                        </div>

                        <!--PHONE-->
                        <!--PHONE NUMBER-->
                        <div class="form-row m-b-55">
                            <div class="name">Phone Number</div>
                            <div class="value">
                                <div class="col-1">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="tel" placeholder="(1) 575111 " pattern="\([0-9]+\)[ ][0-9]+" name="phone_number" required>
                                        <label class="label--desc">(country code) phone number</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--STUDENT?-->
                        <div class="form-row p-t-20">
                            <label class="label label--block">Are you a student?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" name="is_student" value="yes" required>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="is_student" value="no">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <h3>Paper Submission?</h3>
                        <!--PAPER REGISTRATION-->
                        <div class="form-row p-t-20">
                            <label class="label label--block">Did you submit a paper?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" name="has_paper" value="yes" required>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="has_paper" value="no">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <h4>If you chose yes, please fill out these information:</h4><br>
                        <!--PAPER NUMBER-->
                        <div class="form-row">
                            <div class="name">Paper Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="paper_number">
                                </div>
                            </div>
                        </div>

                        <!--PARTICIPATION-->
                        <h3>Participation</h3>
                        <div class="form-row">
                            <div class="name">Which workshops would you like to participate in?</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="workshops">
                                    <label class="label--desc">Please enter the name of workshops separated by a comma</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Which tutorials would you like to participate in?</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="tutorials">
                                    <label class="label--desc">Please enter the name of tutorials separated by a comma</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row p-t-20">
                            <label class="label label--block">Will you participate in NMR 2021: 19th International Workshop on Non-Monotonic Reasoning?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" name="participate_nmr" value="yes">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="participate_nmr" value="no">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        
                        <h3>Other Information</h3>
                        <!--GENDER-->
                        <div class="form-row p-t-20">
                            <label class="label label--block">What is your gender?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Male
                                    <input type="radio" name="gender" value="male" required>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container m-r-55">Female
                                    <input type="radio" name="gender" value="female">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container m-r-55">Other
                                    <input type="radio" name="gender" value="other">
                                    <span class="checkmark"></span>
                                </label>

                                <label class="radio-container">Prefer Not To Answer
                                    <input type="radio" name="gender" value="prefer_not_to_answer">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

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
   
    <!-- Main JS-->
    <script src="js/global.js"></script>
</body><!-- This was made based on a template of Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->