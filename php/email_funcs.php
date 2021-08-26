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

function sendEmail($email, $header, $body) {
    // create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, "ssl"))
    ->setUsername("kr2021reg@gmail.com")
    -> setPassword("hoinghikr#2021");

    // create a mailer
    $mailer = new Swift_Mailer($transport);

    try {
        $message = (new Swift_Message($header))
        ->setFrom(['kr2021reg@gmail.com' => "KR-2021-noreply"])
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