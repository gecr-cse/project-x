<?php

include_once "../library/application.php";
include_once "../plugins/messages/class.messages.php";
include_once "../plugins/mails/mail.php";
include_once "../manager/feedback-manager.php";


$feedback=new feedbackController();
switch($_REQUEST['action'])
{
    case 'addFeedback':$feedback->addFeedback();break;


}

class feedbackController
{
    function __construct()
    {
        $this->msg = new Messages();
        $this->mail = new Mail();
        $this->common = new Common();
        $this->feedback=new feedbackManager();
    }

    


}