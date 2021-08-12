<?php
    require_once '../vendor/autoload.php';
    require_once './misc_funcs.php';
    require_once './DatabaseAdapter.php';
    require_once './PostDataWrapper.php';
    require_once './DatabaseDataWrapper.php';
    require_once './email_funcs.php';
    //require_once '../vendor/swiftmailer/swiftmailer/lib/swift_required.php';

// START
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    // database
    $account = getDBAccount();
    if ($account == null)
        dieBig("Cannot connect to database: account file not found");
    $dbAdapter = new DatabaseAdapter($account);

    // process data
    $postWrapper = new PostDataWrapper($_POST);

    $email = $postWrapper->getEmail();
    if (!validEmail($email)) {
        dieBig("The email is not valid!");
    } // end if

    // update database
    $success = $dbAdapter->updateDatabase($email, $postWrapper);

    // default messages;
    $message = "";
    $email_result_message = "";

    if ($success) {
        $data = $dbAdapter->getDataFromDatabase($email);
        if ($data == null) {
            dieBig("Cannot get data from the database to send email");
        } // end if
        $data = new DatabaseDataWrapper($data);

        // get message constant;
        $email_failure_message = "Failed to send an email confirmation to " . "<b>" . safeString($data->getEmail()) . "</b>";
        $email_success_message = "You should receive an edit confirmation email at: " . "<b>" . safeString($data->getEmail()) . "</b>";

        // make tutorials
        $tutorialsArray = json_decode($data->getTutorials());
        $tutorial = "";
        $tutorialHTML = "";
        for ($i = 0; $i < count($tutorialsArray); ++$i) {
            if ($tutorialsArray[$i] === null)
                continue;
            $tutorial .= "\t\t\t+" . $tutorialsArray[$i] . "\n";
            $tutorialHTML .= "&emsp;+" . safeString($tutorialsArray[$i]) . "<br>";
        } // end for i

        // make workshops
        $workshopsArray = json_decode($data->getWorkshops());
        $workshop = "";
        $workshopHTML = "";
        for ($i = 0; $i < count($workshopsArray); ++$i) {
            if ($workshopsArray[$i] === null)
                continue;
            $workshop .= "\t\t\t+" . $workshopsArray[$i] . "\n";
            $workshopHTML .= "&emsp;+" . safeString($workshopsArray[$i]) . "<br>";
        } // end for i

        // nmr
        $willGoNMR = $data->getWillGoNMR();

        // opt-out events
        $optOutEvents = $data->getVideosNotToPublishPublicly();
        $optOutEvents = str_replace(";", ", ", $optOutEvents);

        // get email body
        $email_body = "Dear ".ucwords($data->getFullName())
                    . "\n\tYour edits have been saved successfully!"
                    . "\n"
                    . "\n\tCONFIRMATION:"
                    . "\n\t\t*You are interested in attending the following tutorials:\n" . $tutorial
                    . "\n\t\t*You are interested in attending the following workshops:\n" . $workshop
                    . "\n\t\t*You are interested in attending NMR 2021: 19th International Workshop on Non-Monotonic Reasoning?: " . $willGoNMR
                    . "\n\t\t*You want to opt out from public posting for these events: " . $optOutEvents
                    . "\n\nBest Regards,\nKR 2021";
        
        // send email
        $email_result = sendEmail($email, "KR 2021 EDIT CONFIRMATION", $email_body);
        $email_result_message = $email_result == 0 ? $email_failure_message : $email_success_message;
    } //end if
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
                <div class="card-heading <?php echo $success ? "bg-orange" : "bg-red"?>">
                    <h2 class="title">
                        <?php
                            if ($success)
                                echo "YOUR EDITS HAVE BEEN SAVED SUCCESSFULLY";
                            else
                                echo "ERROR";
                        ?>
                    </h2>
                </div>
                <div class="card-body">
                    <!--STARTING THE RESULT-->
                    <?php
                        if ($success) {
                            echo "<b>Your edits have been saved!</b>" . " " . $email_result_message;
                            echo "<br><br>";
                            echo "<a href='https://kr2021.kbsg.rwth-aachen.de/'>Back to the conference website</a>";

                            echo "<br><br>CONFIRMATION:";
                            echo "<br>&ensp;*You are interested in attending the following tutorials:<br>" . $tutorialHTML;
                            echo "<br>&ensp;*You are interested in attending the following workshops:<br>" . $workshopHTML;
                            echo "<br>&ensp;*You are interested in attending NMR 2021: 19th International Workshop on Non-Monotonic Reasoning?: " . safeString($willGoNMR);
                            echo "<br>&ensp;*You want to opt out from public posting for these events: " . safeString($optOutEvents);
                        } // END IF
                        else {
                            echo "Your edit has not been saved. Please try again.<br><i>Note: Please note that updates with no changes will also result in this</i>.";
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