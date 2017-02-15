<?php

include_once "../library/application.php";
include_once "../manager/department-manager.php";
include_once "../manager/student-manager.php";
include_once "../plugins/messages/class.messages.php";
include_once "../plugins/mails/mail.php";


$login=new loginController();
switch($_REQUEST['action'])
{
    case 'addStudent':$login->addStudent();break;
    case 'editStudent':$login->editStudent();break;
    case 'deleteStudent':$login->deleteStudent();break;


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
    }

    function addStudent()
    {
      echo "will add student record in the database .....will wok next!";
    }

    function editStudent()
    {
      echo "will update the database .....currently woring!";
    }

    function deleteStudent()
    {
      echo "Will delete the sdudents record ......will work on this very soon";
    }

}
