<?php
    require_once "./misc_funcs.php";
    require_once "./DatabaseAdapter.php";
    require_once './PostDataWrapper.php';
    require_once './DatabaseDataWrapper.php';

    // database
    $account = getDBAccount();
    if ($account == null)
        dieBig("Cannot connect to database: account file not found");
    $dbAdapter = new DatabaseAdapter($account);

    // prepare data
    $postWrapper = new PostDataWrapper($_POST);
    // get email
    $email = $postWrapper->getEmail();

    // check if the email is unique
    if ($dbAdapter->isUniqueEmail($email)) {
        dieBig("There is no account associated with this email address: ".$email);
    } // end if

    // get data from the database
    $data = $dbAdapter->getDataFromDatabase($email);
    if ($data === null) {
        dieBig("Cannot get data from the database");
    } // end if

    /**
     * get the data into variables
     */
    $data = new DatabaseDataWrapper($data);
    
    $workshops = json_decode($data->getWorkshops());
    $tutorials = json_decode($data->getTutorials());
    $goNMR = $data->getWillGoNMR();
    $videosNotToPublish = $data->getVideosNotToPublishPublicly();

    // counters
    $workshopCounter = 0;
    $tutorialCounter = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Jquery JS-->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Title Page-->
    <title>EDIT PAGE</title>

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
            <div class="card card-5 m-t-30-pc">
                <div class="card-heading bg-kr-color">
                    <div class="kr-icon">
                        <a href="https://kr2021.kbsg.rwth-aachen.de/" class="kr-icon"><img src="../images/krlogo-small.png"/></a> 
                    </div>
                    <h2 class="title">
                        EDIT PAGE
                    </h2>
                </div>
                <div class="card-body">
                        <!--STARTING THE FORM-->
                        <form action="./edit_submission.php" method="POST">

                        <!--EMAIL HIDDEN-->
                        <div class="form-row hide">
                            <div class="name">Email<span class="required-field"></span></div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email_address" value="<?php safeEcho($email)?>">
                                </div>
                            </div>
                        </div>
                        
                        <!--PARTICIPATION-->
                        <h3 class="p-t-20">Participation</h3>

                        <!--WORKSHOPS-->
                        <div class="form-row p-t-20">
                            <label class="label label--block">Please select all workshops that you would be interested in attending:</label>
                            <div class="p-t-15">
                                <!--WORKSHOP 1-->
                                <label class="checkbox-container">
                                    <a href="http://semantics-powered.org/" target="_blank">The 6th International Workshop on Semantics-Powered Health Data Analytics (SEPDA 2021)</a>
                                    <input type="checkbox" name="workshop1" value="The 6th International Workshop on Semantics-Powered Health Data Analytics (SEPDA 2021)" <?php echo ($workshops[$workshopCounter++] != null ? "checked" : "")?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Zhe He, Jiang Bian, Rui Zhang and Cui Tao</label>

                                <!--WORKSHOP 2-->
                                <label class="checkbox-container">
                                    <a href="https://xlokr21.ai.vub.ac.be/" target="_blank">Explainable Logic-Based Knowledge Representation (XLoKR 2021)</a>
                                    <input type="checkbox" name="workshop2" value="Explainable Logic-Based Knowledge Representation (XLoKR 2021)" <?php echo ($workshops[$workshopCounter++] != null ? "checked" : "")?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Bart Bogaerts</label>

                                <!--WORKSHOP 3-->
                                <label class="checkbox-container">
                                    <a href="https://sites.google.com/view/onucai-kr2021/home" target="_blank">Ontology Uses and Contribution to Artificial Intelligence</a>
                                    <input type="checkbox" name="workshop3" value="Ontology Uses and Contribution to Artificial Intelligence" <?php echo ($workshops[$workshopCounter++] != null ? "checked" : "")?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Sarra Ben Abbes, Lynda Temal, Nada Mimouni, Philippe Calvez and Ahmed Mabrouk</label>

                                <!--WORKSHOP 4-->
                                <label class="checkbox-container">
                                    <a href="https://krhcai.github.io/" target="_blank">Knowledge Representation for Hybrid and Compositional AI (KRHCAI)</a>
                                    <input type="checkbox" name="workshop4" value="Knowledge Representation for Hybrid and Compositional AI (KRHCAI)" <?php echo ($workshops[$workshopCounter++] != null ? "checked" : "")?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Kwabena Nuamah, Jeff Z. Pan, Pavan Kapanipathi and Efi Tsamoura</label>

                                <!--WORKSHOP 5-->
                                <label class="checkbox-container">
                                    <a href="http://2021.soqe.org/" target="_blank">The 2nd International Workshop on Second-Order Quantifier Elimination and Related Topics</a>
                                    <input type="checkbox" name="workshop5" value="The 2nd International Workshop on Second-Order Quantifier Elimination and Related Topics" <?php echo ($workshops[$workshopCounter++] != null ? "checked" : "")?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Renate A. Schmidt, Christoph Wernhard and Yizheng Zhao</label>

                                <!--WORKSHOP 6-->
                                <label class="checkbox-container">
                                    <a href="http://www.cse.unsw.edu.au/~cme2021/" target="_blank">CME: the 1st International Workshop on Computational Machine Ethics</a>
                                    <input type="checkbox" name="workshop6" value="CME: the 1st International Workshop on Computational Machine Ethics" <?php echo ($workshops[$workshopCounter++] != null ? "checked" : "")?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container">Maurice Pagnucco and Yang Song</label>
                            </div>
                        </div>

                        <!--TUTORIALS-->
                        <div class="form-row">
                            <label class="label label--block">Please select all tutorials that you would be interested in attending:</label>
                            <div class="p-t-15">
                                <!--TUTORIAL 1-->
                                <label class="checkbox-container">
                                    <a href="https://homepage.ruhr-uni-bochum.de/defeasible-reasoning/KR-2021/KR-Logical-Argumentation.html" target="_blank"> Proof-Theoretic Approaches to Logical Argumentation</a>
                                    <input type="checkbox" name="tutorial1" value="Proof-Theoretic Approaches to Logical Argumentation" <?php echo ($tutorials[$tutorialCounter++] != null ? "checked" : "")?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Ofer Arieli and Christian Strasser</label>

                                <!--TUTORIAL 2-->
                                <label class="checkbox-container">
                                    <a href="https://www.mpi-inf.mpg.de/kr-2021-tutorial" target="_blank">Completeness, Recall, and Negation in Open-World Knowledge Bases</a>
                                    <input type="checkbox" name="tutorial2" value="Completeness, Recall, and Negation in Open-World Knowledge Bases" <?php echo $tutorials[$tutorialCounter++] != null ? "checked" : ""?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Simon Razniewski, Hiba Arnaout, Shrestha Ghosh and Fabian M. Suchanek</label>

                                <!--TUTORIAL 3-->
                                <label class="checkbox-container">
                                    <a href="http://cer.iit.demokritos.gr/events/cerf21/" target="_blank">Complex Event Recognition and Forecasting</a>
                                    <input type="checkbox" name="tutorial3" value="Complex Event Recognition and Forecasting" <?php echo $tutorials[$tutorialCounter++] != null ? "checked" : ""?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Elias Alevizos and Alexander Artikis</label>

                                <!--TUTORIAL 4-->
                                <label class="checkbox-container">
                                    Planning with multi-agent, flexible, temporal, epistemic and contingent (MAFTEC) aspects
                                    <input type="checkbox" name="tutorial4" value="Planning with multi-agent, flexible, temporal, epistemic and contingent (MAFTEC) aspects" <?php echo $tutorials[$tutorialCounter++] != null ? "checked" : ""?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Aurélie Beynier, Frédéric Maris and Francois Schwarzentruber</label>

                                <!--TUTORIAL 5-->
                                <label class="checkbox-container">
                                    Solving equations in modal and description logics
                                    <input type="checkbox" name="tutorial5" value="Solving equations in modal and description logics" <?php echo $tutorials[$tutorialCounter++] != null ? "checked" : ""?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Philippe Balbiani</label>

                                <!--TUTORIAL 6-->
                                <label class="checkbox-container">
                                    <a href="https://sites.google.com/sju.edu/kr2021-krr-and-cps/" target="_blank">KR&R Meets Cyber-Physical Systems: Formalization, Behavior, Trustworthiness</a>
                                    <input type="checkbox" name="tutorial6" value="KR&R Meets Cyber-Physical Systems: Formalization, Behavior, Trustworthiness" <?php echo $tutorials[$tutorialCounter++] != null ? "checked" : ""?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Marcello Balduccini, Edward Griffor and Tran Cao Son</label>
                                
                                <!--TUTORIAL 7-->
                                <label class="checkbox-container">
                                    <a href="https://sites.google.com/view/kr2021brjao/home" target="_blank">Belief Revision and Judgment Aggregation in Ontologies</a> 
                                    <input type="checkbox" name="tutorial7" value="Belief Revision and Judgment Aggregation in Ontologies" <?php echo $tutorials[$tutorialCounter++] != null ? "checked" : ""?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container m-b-10">Jake Chandler and Richard Booth</label>
                                
                                <!--TUTORIAL 8-->
                                <label class="checkbox-container">
                                    Answer Set Programming: From Theory to Practice
                                    <input type="checkbox" name="tutorial8" value="Answer Set Programming: From Theory to Practice" <?php echo $tutorials[$tutorialCounter++] != null ? "checked" : ""?>>
                                    <span class="checkbox"></span>
                                </label>
                                <label class="checkbox-caption-container">Roland Kaminski, Javier Romero, Torsten Schaub and Philipp Wanko</label>
                            </div>
                        </div>

                        <div class="form-row">
                            <label class="label label--block">Would you plan to participate in NMR 2021: 19th International Workshop on Non-Monotonic Reasoning?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" name="participate_nmr" value="yes" <?php echo $goNMR == "YES" ? "checked" : ""?>>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="participate_nmr" value="no" <?php echo $goNMR == "NO" ? "checked" : ""?>>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        
                        <!--VIDEOS NOT TO PUBLISH-->
                        <h3>Consent</h3>
                        <div class="form-row">
                            <div class="">
                                <!--CONSENT#2-->
                                <div class="p-t-20">
                                    <label class="label label--block"><i>Opt out</i></label><br>
                                    <div class="">You may <b>opt out of public posting</b> of content <b>by indicating in the following textbox</b> the titles of those talks/tutorials for which you *do not* want the recording made publicly available.
                                    <b>Alternatively, send an email to the PC chairs by November 12 at the latest.</b></div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" placeholder="Ex: representation1;representation2" type="text" name="videos_not_to_publish_publicly" value="<?php safeEcho($videosNotToPublish);?>">
                                            <label class="label--desc">Names separated by semi-colon(;)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        
                        <div>
                            <button class="btn btn--radius-2 btn--kr" type="submit">Update</button>
                        </div>
                    </form>
                    <!---->
                </div>
            </div>
        </div>
    </div>

    <!--Custom Stylesheet-->
    <link href="../css/my.css" rel="stylesheet" media="all">
    
    <!--Vendor JS-->
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../vendor/datepicker/moment.min.js"></script>
    <script src="../vendor/datepicker/daterangepicker.js"></script>
   
    <!-- Main JS-->
    <script src="../js/global.js"></script>
</body><!-- This was made based on a template of Colorlib (https://colorlib.com) -->
<footer><?php include "./contact_info.php" ?></footer>
</html>
<!-- end document-->