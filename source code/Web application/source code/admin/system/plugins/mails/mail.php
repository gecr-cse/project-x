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
         $this->mail->Host = 'mail.creatise.in';
        $this->mail->SMTPAuth = true;
        //$this->mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
        $this->mail->Port = 587;
        $this->mail->IsHTML(true);
        $this->mail->Username = 'no-reply@creatise.in';
        $this->mail->Password = 'creatise*123';
        $this->mail->setFrom('no-reply@creatise.in', 'ACCE Email Notification');
        $this->mail->addReplyTo('no-reply@creatise.in', 'No-Reply');
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