<?php

include_once "../library/application.php";
include_once "../plugins/messages/class.messages.php";
include_once "../plugins/mails/mail.php";
include_once "../manager/issue-manager.php";


$issue=new issueController();
switch($_REQUEST['action'])
{
    case 'addIssue':$issue->addIssue();break;


}

class issueController
{
    function __construct()
    {
        $this->msg = new Messages();
        $this->mail = new Mail();
        $this->common = new Common();
        $this->issue=new issueManager();
    }

    


}