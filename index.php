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
                    <form id="registration_form" action="php/register.php" method="POST">
                        <!--CONTACT INFORMATION-->
                        <!--FULL NAME-->
                        <div class="form-row">
                            <div class="name">Full Name<span class="required-field"></span></div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" placeholder="First Middle Last" type="text" name="name" required>
                                </div>
                            </div>
                        </div>

                        <!--AFFILIATION-->
                        <div class="form-row">
                            <div class="name">Affiliation<span class="required-field"></div>
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
                                        <label class="label--desc">Street Address<span class="required-field"></label>
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
                                            <input class="input--style-5" type="text" name="city_address">
                                            <label class="label--desc">City</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="state_address">
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
                                            <input class="input--style-5" type="text" name="zip_address">
                                            <label class="label--desc">Zip Code</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="country_address" required>
                                            <label class="label--desc">Country</label>
                                        </div>
                                    </div> -->
                                    <div class="col-2">
                                        <div class="input-group">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="country_address" form="registration_form" required>
                                                    <option disabled="disabled" value="" selected="selected">Choose option</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Åland Islands">Åland Islands</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antarctica">Antarctica</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia">Bolivia</option>
                                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                        <option value="Croatia">Croatia</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Territories">French Southern Territories</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guernsey">Guernsey</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Isle of Man">Isle of Man</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jersey">Jersey</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macao">Macao</option>
                                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montenegro">Montenegro</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Namibia">Namibia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherlands">Netherlands</option>
                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Pitcairn">Pitcairn</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russian Federation">Russian Federation</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Saint Helena">Saint Helena</option>
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Serbia">Serbia</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Slovakia">Slovakia</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                        <option value="Taiwan">Taiwan</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Timor-leste">Timor-leste</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States">United States</option>
                                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Viet Nam">Viet Nam</option>
                                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                        <option value="Western Sahara">Western Sahara</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                                <div class="select-dropdown"></div> <!--Important for this to work-->
                                                <label class="label--desc">Country<span class="required-field"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--EMAIL-->
                        <div class="form-row">
                            <div class="name">Email<span class="required-field"></div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email_address" required>
                                </div>
                            </div>
                        </div>

                        <!--PHONE-->
                        <!--PHONE NUMBER-->
                        <div class="form-row m-b-55">
                            <div class="name">Phone Number<span class="required-field"></div>
                            <div class="value">
                                <div class="col-1">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="tel" placeholder="Ex: (1) 575111 " pattern="\([0-9]+\)[0-9 ]+[0-9]" name="phone_number" required>
                                        <label class="label--desc">(country code) phone number</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--STUDENT?-->
                        <div class="form-row p-t-20">
                            <label class="label label--block">Are you a student?<span class="required-field"></label>
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

                        <h3>Paper Registration?</h3>
                        <!--PAPER REGISTRATION-->
                        <div class="form-row p-t-20">
                            <label class="label label--block">Did you register a paper?<span class="required-field"></label>
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
                            <label class="label label--block">Would you like to participate in NMR 2021: 19th International Workshop on Non-Monotonic Reasoning?</label>
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
                            <label class="label label--block">Gender<span class="required-field"></span></label>
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

    <style>
        .required-field::before {
        content: "*";
        color: red;
        }
    </style>
    
    <!--Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
   
    <!-- Main JS-->
    <script src="js/global.js"></script>
</body><!-- This was made based on a template of Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->