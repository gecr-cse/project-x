<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines Logic part to all aspects of adding, editing and deleting the Student
 * Created on : <Date of creation>
 * NOTICE:  All information contained herein is, and remains
 * the property of GEC Raipur CS Department. The intellectual and technical concepts contained
 * herein are originated as part Industry Orientation program.
 * Dissemination of this information or reproduction of this material
 * is restricted unless prior written permission is obtained
 * from GEC Raipur CS Department.
 */
-->
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

    function addStudent(){
        $dept_id =$_REQUEST['dept_id'];
        $name =$_REQUEST['name'];
        $role_no =$_REQUEST['role_no'];
        $mobile =$_REQUEST['mobile'];
        $email =$_REQUEST['email'];
        $result=$this->student->addStudent($name,$dept_id,$role_no,$mobile,$email);
        $this->student->addStudentLogin($result,$role_no);
        if($result){
            $this->msg->add("s","Student added successfully");
        }else{
            $this->msg->add("s","Student adding failed");
        }
       header("Location:".ADMIN_BASE_URL."views/student/student-index.php");
    }

    function editStudent(){
        $student_id =$_REQUEST['student_id'];
        $dept_id =$_REQUEST['dept_id'];
        $name =$_REQUEST['name'];
        $role_no =$_REQUEST['role_no'];
        $mobile =$_REQUEST['mobile'];
        $email =$_REQUEST['email'];
        $result=$this->student->editStudent($student_id,$name,$dept_id,$role_no,$mobile,$email);
        if($result){
            $this->msg->add("s","Student edited successfully");
        }else{
            $this->msg->add("s","Student editing failed");
        }
        header("Location:".ADMIN_BASE_URL."views/student/student-index.php");
    }

    function deleteStudent(){
        $student_id=$_REQUEST['student_id'];
        $result=$this->student->deleteStudentById($student_id);
        if($result){
            $this->msg->add("s","Student deleted successfully");
        }else{
            $this->msg->add("s","Student deletion failed");
        }
        header("Location:".ADMIN_BASE_URL."views/student/student-index.php");
    }

}