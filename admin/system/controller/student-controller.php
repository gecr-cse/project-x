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

        $res = $this->student->add_student($student_data);
        if($res){
          header("Location: ../../views/student/student-index.php");
        }
        else
        {
          $_SESSION["error"] = "failed to add the student";
          header("Location: ../../views/student/student-index.php");
        }
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
      $res = $this->student->update_student($student_data);
      if($res)
      {
        header("Location: ../../views/student/student-index.php");
      }
      else
      {
        $_SESSION["error"] = "failed to update the student";
        header("Location: ../../views/student/student-index.php");
      }
    }

      function deleteStudent($std_id)
    {
      echo $std_id;
      $res = $this->student->delete_student($std_id);
      if($res)
      {header("Location: ../../views/student/student-index.php");}
      else
      {echo "<br>".$_SESSION["error"] = "failed to add the student";}
    }

}
