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
    case 'deleteStudent':$login->deleteStudent($_REQUEST["student_id"]);break;


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
      echo "will add student record in the database .....working!";
      $student_data = array(
      'name'=>$_REQUEST["name"],
      'roll'=>$_REQUEST["role_no"],
      'mobile'=>$_REQUEST["mobile"],
      'email'=>$_REQUEST["email"],
      'dept'=>$_REQUEST["stud_dept"]
      );

        $this->student->add_student($student_data);
    }

    function editStudent()
    {

      $student_data = array(
      'id'=>$_REQUEST["student_id"],
      'name'=>$_REQUEST["name"],
      'roll'=>$_REQUEST["role_no"],
      'mobile'=>$_REQUEST["mobile"],
      'email'=>$_REQUEST["email"],
      'dept'=>$_REQUEST["stud_dept"]
      );
      //print_r($student_data);
      //echo $student_id;
      $this->student->update_student($student_data);
    }

      function deleteStudent($std_id)
    {
      //echo "Will delete the sdudents record ......will work on this very soon";
      echo $std_id;
      $this->student->delete_student($std_id);
    }

}
