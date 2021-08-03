<?php
function validEmail($email) {
    // check for email address rfc format
    try {
        $message = (new Swift_Message('Wonderful Subject'))
        ->setTo(["$email"]);
        ;
    } catch(Swift_RfcComplianceException $e) {
        return false;
    } // end catch

    // check for dns availability

    return true;
} // end function

function uniqueEmail($email, $account) {
    $conn = createConn($account);
    $stmt = $conn->prepare("SELECT * FROM Participants WHERE email=?");
    $stmt->bind_param("s", $email);

    try {
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows == 0;
    } catch(mysqli_sql_exception $ex) {
        die("Something is wrong when checking the email with the database");
    } finally {
        $stmt->close();
        $conn->close();
    } // end finally
} // end uniqueEmail

function sendEmail($email, $header, $body) {
    // create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, "ssl"))
    ->setUsername("kr2021reg@gmail.com")
    -> setPassword("hoinghikr#2021");

    // create a mailer
    $mailer = new Swift_Mailer($transport);

    try {
        $message = (new Swift_Message($header))
        ->setFrom(['kr2021reg@gmail.com' => "KR-2021"])
        ->setTo(["$email"])
        ->setBody($body)
        ;
    } catch(Swift_RfcComplianceException $e) {
        throw $e;
    } // end catch
    
    
    $result = $mailer->send($message);
    //$result = 0;

    return $result;
} // end sendEmail

function getEmail($data) {
    return trim($data['email_address']);
} // end getEmail

function getEmailGenericBody() {
    return file_get_contents('../mail_content/mail_content.txt');
} // end getEmailGenericBody
?>