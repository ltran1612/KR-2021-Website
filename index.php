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
                    <form method="POST">
                        <!--CONTACT INFORMATION-->
                        <!--FULL NAME-->
                        <div class="form-row m-b-55">
                            <div class="name">Full Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="first_name" required>
                                            <label class="label--desc">first name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name" required>
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--AFFILIATION-->
                        <div class="form-row">
                            <div class="name">Affiliation</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="affiliation">
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
                        <!--COUNTRY CODE< AREA CODE-->
                        <div class="form-row">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="country_code">
                                            <label class="label--desc">Country Code</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="area_code">
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name"></div>
                            <div class="value">
                                <div class="col-1">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="phone_number" required>
                                        <label class="label--desc">Phone Number</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--OTHER INFORMATION-->
                        <div class="form-row">
                            <div class="name">Subject</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--STUDENT?-->
                        <div class="form-row p-t-20">
                            <label class="label label--block">Are you a student?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" name="is_student" required>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="is_student">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <!--PAPER REGISTRATION-->
                        <div class="form-row p-t-20">
                            <label class="label label--block">Did you submit a paper?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" name="has_paper" required>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="has_paper">
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
   
</body><!-- This was made based on a template of Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->