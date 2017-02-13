<?php
include_once("PHPMailerAutoload.php");
include_once "header.html";
include_once "footer.html";
class Mail extends Application{
    function __construct() {
        $this->mail = new PHPMailer();
    }

    function sendMail($to, $subject, $body) {

        $this->mail->isSMTP();
         $this->mail->Host = 'vps22053.inmotionhosting.com';
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
        $this->mail->Port = 465;
        $this->mail->IsHTML(true);
        $this->mail->Username = 'no-reply@getactiveindia.com';
        $this->mail->Password = 'k?-_(xe~4qV3';
        $this->mail->setFrom('no-reply@getactiveindia.com', 'gai email');
        $this->mail->addReplyTo('no-reply@getactiveindia.com', 'No-Reply');
        $header = "";//file_get_contents(ADMIN_BASE_URL.'config/mail/header.html');
        $footer = "";//file_get_contents(ADMIN_BASE_URL.'config/mail/footer.html');
        $bodyOfMail = $header.$body. $footer;
        $this->mail->Subject = $subject;
        $this->mail->msgHTML($bodyOfMail);
        echo $to['email'];
        if(count($to)>1)
        {
            $this->mail->addAddress($to['email'], $to['name']);
        }
        else
        {
            $this->mail->addAddress($to['email']);
        }
        if (!$this->mail->send()) {
            $result=0;
        } else {
            $result=1;
        }
        $this->mail->clearAddresses();

        return $result;
    }
}