<?php
require 'vendor/autoload.php';
class SendEmail
{
    public static function SendMail($to, $subject, $content)
    {
        $key = "Enter your sendgrid API key here";
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("Enter email address here", "email username");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $content);
        //$email->addContent("text/html", $content);
        $sendgrid = new \SendGrid($key);
        try {
            $response = $sendgrid->send($email);
            return $response;
        } catch (Exception $e) {
            echo 'Email exception caught : ' . $e->getMessage() . "\n";
            return false;
        }
    }
}
?>