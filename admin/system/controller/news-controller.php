<?php

include_once "../library/application.php";
include_once "../manager/department-manager.php";
include_once "../manager/student-manager.php";
include_once "../manager/news-manager.php";
include_once "../plugins/messages/class.messages.php";
include_once "../plugins/mails/mail.php";


$login=new loginController();
switch($_REQUEST['action'])
{
    case 'addNews':$login->addNews();break;
    case 'editNews':$login->editNews();break;
    case 'deleteNews':$login->deleteNews();break;


}

class loginController
{
    function __construct()
    {
        $this->msg = new Messages();
        $this->mail = new Mail();
        $this->common = new Common();
        $this->department=new departmentManager();
        $this->student=new studentManager();
        $this->news=new newsManager();
    }

    
}