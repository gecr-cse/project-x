<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines Logic part to all aspects of adding, editing and deleting the login of students and admin
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
include_once "../plugins/messages/class.messages.php";
include_once "../plugins/mails/mail.php";
include_once "../manager/login-manager.php";
include_once "../manager/student-manager.php";



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

    function loginProcess(){
        $username=$_REQUEST['username'];
        $password=md5($_REQUEST['password']);
        $type=$_REQUEST['type'];
        $check_existence=$this->login->checkExistence($username);
        if(count($check_existence)>0){
            $_SESSION['USER_ID']=$check_existence[0]['user_id'];
            $_SESSION['USER_ROLE']=$check_existence[0]['user_type'];
            if($type=="admin"){
                if($password==$check_existence[0]['user_pass']){
                    $this->msg->add("s","Login Successful");
                    header("Location:".ADMIN_BASE_URL."views/dashboard/dashboard-index.php");
                }else{
                    $this->msg->add("s","username and password does not match");
                    header("Location:".ADMIN_BASE_URL."views/login/login-index.php");
                }
            }elseif($type=="student"){
                $student_det=$this->student->getDetpIdByStudentId($check_existence[0]['student_id']);
                $_SESSION['DEPT_ID']=$student_det[0]['dept_id'];
                $_SESSION['STUDENT_ID']=$check_existence[0]['student_id'];
                if($password==$check_existence[0]['user_pass']){
                    $this->msg->add("s","Login successful...");
                    header("Location:".BASE_URL."dept_news.php");
                }elseif($check_existence[0]['user_pass']==null){
                    $this->msg->add("s","It appears you are loging in for the first time ... Please Set your password");
                    header("Location:".BASE_URL."reset-password.php?user_id=".$check_existence[0]['user_id']);
                }else{
                    $this->msg->add("s","username and password does not match");
                    header("Location:".BASE_URL."login.php");
                }

            }else{
                header("Location:".ADMIN_BASE_URL."views/news/news-index.php");
            }

        }else{
            if($type=="admin"){
                $this->msg->add("s","username and password does not match");
                header("Location:".ADMIN_BASE_URL."views/login/login-index.php");
            }elseif($type=="student"){

                header("Location:".BASE_URL."login.php");
            }
			else
			{	 $this->msg->add("s","username and password does not match");
                 header("Location:".ADMIN_BASE_URL."views/login/login-index.php");
            }

        }

    }

    function resetPassword(){
        $user_id=$_REQUEST['user_id'];
        $pass1=md5($_REQUEST['password1']);
        $pass2=md5($_REQUEST['password2']);
        if($pass1==$pass2){
            $this->login->updatePassword($user_id,$pass1);
            $this->msg->add('e',"Password updated Successfully");
            header('Location: '.BASE_URL.'dept_news.php');
        }else{
            $this->msg->add('e',"Both password should match");
            header('Location: '.BASE_URL.'reset-password.php?user_id='.$user_id);
        }
    }

    function logoutProcess(){
        $this->msg->add('s',"You have logged Out successfully");
        if($_SESSION['USER_ROLE']=="admin"){
            unset($_SESSION['USER_ID']);
            unset($_SESSION['USER_ROLE']);
            header('Location: '.ADMIN_BASE_URL.'index.php');
        }else{
            unset($_SESSION['USER_ID']);
            unset($_SESSION['USER_ROLE']);
            header('Location: '.BASE_URL.'index.php');
        }
    }
}