<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="KR-2021 Registration Based On Colorlib Template">
    <meta name="author" content="Long Tran">
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
    <div class="page-wrapper bg-kr p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5 m-t-30-pc">
                <div class="card-heading bg-kr-color">
                    <div class="kr-icon">
                        <a href="https://kr2021.kbsg.rwth-aachen.de/" class="kr-icon"><img src="images/krlogo-small.png"/></a> 
                    </div>
                    <h2 class="title">
                        KR-2021 REGISTRATION FORM
                    </h2>
                </div>
                <div class="card-body">
                        <div class="kr-edit m-b-10">
                            If you want to edit your old submission, please click <a href="php/edit_login.php" target="_blank">here</a>.
                        </div>
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
                            <div class="name">Affiliation<span class="required-field"></span></div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="affiliation" required>
                                </div>
                            </div>
                        </div>

                        <!--ADDRESS-->
                        <div class="form-row m-b-55">
                            <div class="name">Address</div>
                            <div class="value">
                                <div class="col-1">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="address_line" required>
                                        <label class="label--desc">Address Line<span class="required-field"></span> (Please enter full address (excluding country) here if there are not appropriate fields)</label>
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
                                    <div class="col-2">
                                        <div class="input-group">
                                            <div class="rs-select2 js-select-simple">
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
                                                <label class="label--desc">Country<span class="required-field"></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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

                        <!--PHONE-->
                        <!--PHONE NUMBER-->
                        <div class="form-row m-b-55">
                            <div class="name">Phone Number</div>
                            <div class="value">
                                <div class="col-1">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="tel" placeholder="Ex: (1) 575 111" pattern="\([0-9]+\)[0-9 ]+" name="phone_number">
                                        <label class="label--desc">(country code) phone number</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--STUDENT?-->
                        <div class="form-row p-t-20">
                            <label class="label label--block">Are you a student?<span class="required-field"></span></label>
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
                            <label class="label label--block">Will you register a paper?<span class="required-field"></span></label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" name="register_paper" value="yes" required>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="register_paper" value="no">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        
                        <!--PAPER NUMBER-->
                        <div id="paper_number_section" class="">
                            <!--NUMBER OF PAPER-->
                            <h4>If you chose yes, please fill out these information:</h4>
                            <div class="form-row">
                                <div class="name">How many papers will you register?<span class="required-field"></span></div>
                                <div class="value">
                                    <div class="input-group col-2">
                                        <input class="input--style-5 required-input" type="number" min="1" max="255" name="number_paper" required>
                                        <label class="label--desc">Number of paper</label>
                                    </div>
                                </div>
                                <div class="name">Paper Number<span class="required-field"></span></div>
                                <div class="value p-t-30">
                                    <div class="input-group col-1">
                                        <input class="input--style-5 required-input" type="text" name="paper_number" required>
                                        <label class="label--desc">Please enter the paper number of all papers separated by semi-colon(;)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--PARTICIPATION-->
                        <h3 class="p-t-20">Participation</h3>

                        <!--WORKSHOPS-->
                        <div class="form-row p-t-20">
                            <label class="label label--block">Which workshops would you plan to participate in?</label>
                            <div class="p-t-15">
                                <!--WORKSHOP 1-->
                                <label class="checkbox-container">
                                    <a href="http://semantics-powered.org/" target="_blank">The 6th International Workshop on Semantics-Powered Health Data Analytics (SEPDA 2021)</a>
                                    <input type="checkbox" name="workshop1" value="The 6th International Workshop on Semantics-Powered Health Data Analytics (SEPDA 2021)">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Zhe He, Jiang Bian, Rui Zhang and Cui Tao</label>

                                <!--WORKSHOP 2-->
                                <label class="checkbox-container">
                                    <a href="https://xlokr21.ai.vub.ac.be/" target="_blank">Explainable Logic-Based Knowledge Representation (XLoKR 2021)</a>
                                    <input type="checkbox" name="workshop2" value="Explainable Logic-Based Knowledge Representation (XLoKR 2021)">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Bart Bogaerts</label>

                                <!--WORKSHOP 3-->
                                <label class="checkbox-container">
                                    <a href="https://sites.google.com/view/onucai-kr2021/home" target="_blank">Ontology Uses and Contribution to Artificial Intelligence</a>
                                    <input type="checkbox" name="workshop3" value="Ontology Uses and Contribution to Artificial Intelligence">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Sarra Ben Abbes, Lynda Temal, Nada Mimouni, Philippe Calvez and Ahmed Mabrouk</label>

                                <!--WORKSHOP 4-->
                                <label class="checkbox-container">
                                    <a href="https://krhcai.github.io/" target="_blank">Knowledge Representation for Hybrid and Compositional AI (KRHCAI)</a>
                                    <input type="checkbox" name="workshop4" value="Knowledge Representation for Hybrid and Compositional AI (KRHCAI)">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Kwabena Nuamah, Jeff Z. Pan, Pavan Kapanipathi and Efi Tsamoura</label>

                                <!--WORKSHOP 5-->
                                <label class="checkbox-container">
                                    <a href="http://2021.soqe.org/" target="_blank">The 2nd International Workshop on Second-Order Quantifier Elimination and Related Topics</a>
                                    <input type="checkbox" name="workshop5" value="The 2nd International Workshop on Second-Order Quantifier Elimination and Related Topics">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Renate A. Schmidt, Christoph Wernhard and Yizheng Zhao</label>

                                <!--WORKSHOP 6-->
                                <label class="checkbox-container">
                                    <a href="http://www.cse.unsw.edu.au/~cme2021/" target="_blank">CME: the 1st International Workshop on Computational Machine Ethics</a>
                                    <input type="checkbox" name="workshop6" value="CME: the 1st International Workshop on Computational Machine Ethics">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container">Maurice Pagnucco and Yang Song</label>
                            </div>
                        </div>

                        <!--TUTORIALS-->
                        <div class="form-row">
                            <label class="label label--block">Which tutorials would you plan to participate in?</label>
                            <div class="p-t-15">
                                <!--TUTORIAL 1-->
                                <label class="checkbox-container">
                                    <a href="https://homepage.ruhr-uni-bochum.de/defeasible-reasoning/KR-2021/KR-Logical-Argumentation.html" target="_blank"> Proof-Theoretic Approaches to Logical Argumentation</a>
                                    <input type="checkbox" name="tutorial1" value="Proof-Theoretic Approaches to Logical Argumentation">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Ofer Arieli and Christian Strasser</label>

                                <!--TUTORIAL 2-->
                                <label class="checkbox-container">
                                    <a href="https://www.mpi-inf.mpg.de/kr-2021-tutorial" target="_blank">Completeness, Recall, and Negation in Open-World Knowledge Bases</a>
                                    <input type="checkbox" name="tutorial2" value="Completeness, Recall, and Negation in Open-World Knowledge Bases">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Simon Razniewski, Hiba Arnaout, Shrestha Ghosh and Fabian M. Suchanek</label>

                                <!--TUTORIAL 3-->
                                <label class="checkbox-container">
                                    <a href="http://cer.iit.demokritos.gr/events/cerf21/" target="_blank">Complex Event Recognition and Forecasting</a>
                                    <input type="checkbox" name="tutorial3" value="Complex Event Recognition and Forecasting">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Elias Alevizos and Alexander Artikis</label>

                                <!--TUTORIAL 4-->
                                <label class="checkbox-container">
                                    Planning with multi-agent, flexible, temporal, epistemic and contingent (MAFTEC) aspects
                                    <input type="checkbox" name="tutorial4" value="Planning with multi-agent, flexible, temporal, epistemic and contingent (MAFTEC) aspects">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Aurélie Beynier, Frédéric Maris and Francois Schwarzentruber</label>

                                <!--TUTORIAL 5-->
                                <label class="checkbox-container">
                                    Solving equations in modal and description logics
                                    <input type="checkbox" name="tutorial5" value="Solving equations in modal and description logics">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Philippe Balbiani</label>

                                <!--TUTORIAL 6-->
                                <label class="checkbox-container">
                                    <a href="https://sites.google.com/sju.edu/kr2021-krr-and-cps/" target="_blank">KR&R Meets Cyber-Physical Systems: Formalization, Behavior, Trustworthiness</a>
                                    <input type="checkbox" name="tutorial6" value="KR&R Meets Cyber-Physical Systems: Formalization, Behavior, Trustworthiness">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Marcello Balduccini, Edward Griffor and Tran Cao Son</label>
                                
                                <!--TUTORIAL 7-->
                                <label class="checkbox-container">
                                    <a href="https://sites.google.com/view/kr2021brjao/home" target="_blank">Belief Revision and Judgment Aggregation in Ontologies</a> 
                                    <input type="checkbox" name="tutorial7" value="Belief Revision and Judgment Aggregation in Ontologies">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Jake Chandler and Richard Booth</label>
                                
                                <!--TUTORIAL 8-->
                                <label class="checkbox-container">
                                    Answer Set Programming: From Theory to Practice
                                    <input type="checkbox" name="tutorial8" value="Answer Set Programming: From Theory to Practice">
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container">Roland Kaminski, Javier Romero, Torsten Schaub and Philipp Wanko</label>
                            </div>
                        </div>

                        <div class="form-row">
                            <label class="label label--block">Would you plan to participate in NMR 2021: 19th International Workshop on Non-Monotonic Reasoning?</label>
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

                        <!--VIDEO CONSENT-->
                        <h3>Consent</h3>
                        <div class="form-row">
                            <div class="p-t-15">
                                <!--CONSENT#1-->
                                <label class="checkbox-container">
                                    I agree to let KR 2021 publish recorded videos during the conference.<span class="required-field">
                                    <input type="checkbox" name="video_consent" value="yes" required>
                                    <span class="checkbox"></span>
                                </label>
                                <!--CONSENT#2-->
                                <div class="p-t-20">
                                    <label class="label label--block">If you have any presentation that you don't want to be published after the conference, please enter it here:</label>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" placeholder="Ex: representation1;representation2" type="text" name="videos_not_to_publish">
                                            <label class="label--desc">Names separated by semi-colon(;)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        
                        <div>
                            <button class="btn btn--radius-2 btn--kr" type="submit">Register</button>
                        </div>
                    </form>
                    <!---->
                </div>
            </div>
        </div>
    </div>

    <!--Custom Stylesheet-->
    <link href="css/my.css" rel="stylesheet" media="all">
    
    <!--Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
   
    <!-- Main JS-->
    <script src="js/global.js"></script>

    <!-- My JS -->
    <script src="js/condition.js"></script>
</body><!-- This was made based on a template of Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->