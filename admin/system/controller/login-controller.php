<?php

include_once "../../system/library/application.php";
include_once "../../system/plugins/messages/class.messages.php";
include_once "../../system/plugins/mails/mail.php";
include_once "../../system/manager/login-manager.php";
include_once "../../system/manager/student-manager.php";



$login=new loginController();
switch($_REQUEST['action'])
{
    case 'login':$login->loginProcess();break;
    case 'resetPassword':$login->resetPassword();break;
    case 'logout':$login->logoutProcess();break;
}

class loginController
{
    function __construct()
    {
        $this->msg = new Messages();
        $this->login = new loginManager();
        $this->mail = new Mail();
        $this->common = new Common();
        $this->student= new studentManager();
    }
    function loginProcess()
    {
        
    }
}