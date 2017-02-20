<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines Logic part to all aspects of adding, editing and deleting the department
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
include_once "../plugins/messages/class.messages.php";
include_once "../plugins/mails/mail.php";
include_once "../plugins/imageCopy/doctupload_svr.php";

$login=new loginController();
switch($_REQUEST['action'])
{
    case 'addDepartment':$login->addDepartment();break;
    case 'updateDepartment':$login->updateDepartment();break;
    case 'deleteDepartment':$login->deleteDepartment();break;

}

class loginController
{
    function __construct()
    {
        $this->msg = new Messages();
        $this->mail = new Mail();
        $this->common = new Common();
        $this->department=new departmentManager();
        $this->doct=new Doctupload_SVR();
    }

    function addDepartment(){
        $dept_name=$_REQUEST['dept_name'];
        //$image=$_REQUEST['image'];
        //$image="abc.jpg";
        $dept_hod_name=$_REQUEST['dept_hod_name'];
        $dept_hod_no=$_REQUEST['dept_hod_no'];
        $dept_hod_email=$_REQUEST['dept_hod_email'];
        $dept_hod_strength=$_REQUEST['dept_hod_strength'];
        $dept_hod_staff=$_REQUEST['dept_hod_staff'];
        $destination="../../img/uploads/";
        $fileformname="image";
        echo "<pre>";
        print_r($_FILES);
        $res=$this->doct->startupload_single($_FILES,$destination,$fileformname);
        echo "the image is ".$image=$res;
        $existance=$this->department->checkDeptExistance($dept_name);
        if($existance){
            $this->msg->add("s","Department name already exists...Try different name");
        }else{
            $dept_id=$this->department->addDepartment($dept_name,$image);
            $add_dept_info=$this->department->addDepartmentInfo($dept_id,$dept_hod_name,$dept_hod_no,$dept_hod_email,$dept_hod_strength,$dept_hod_staff);
            if($add_dept_info){
                $this->msg->add("s","Login Successful");
            }
        }
        header("Location:".ADMIN_BASE_URL."views/department/department-index.php");
    }

    function updateDepartment(){
        $dept_id=$_REQUEST['dept_id'];
        $dept_name=$_REQUEST['dept_name'];
        //$image=$_REQUEST['image'];
        $image="abc.jpg";
        $dept_hod_name=$_REQUEST['dept_hod_name'];
        $dept_hod_no=$_REQUEST['dept_hod_no'];
        $dept_hod_email=$_REQUEST['dept_hod_email'];
        $dept_hod_strength=$_REQUEST['dept_hod_strength'];
        $dept_hod_staff=$_REQUEST['dept_hod_staff'];
        $destination="../../img/uploads/";
        $fileformname="image";
        $res=$this->doct->startupload_single($_FILES,$destination,$fileformname);
        $image=$res;
            $this->msg->add("s","Department name already exists...Try different name");

            $dept_id=$this->department->updateDepartment($dept_id,$image,$dept_name);
            $add_dept_info=$this->department->updateDepartmentInfo($dept_id,$dept_hod_name,$dept_hod_no,$dept_hod_email,$dept_hod_strength,$dept_hod_staff);
            if($add_dept_info){
                $this->msg->add("s","Department edited successfully");
            }

        header("Location:".ADMIN_BASE_URL."views/department/department-index.php");

    }

    function deleteDepartment(){
        $dept_id=$_REQUEST['id'];
        $result=$this->department->delelteDept($dept_id);
        if($result)
            $this->msg->add("s","Department deleted Successfully");
        else
            $this->msg->add("s","Department deletion failed");
        header("Location:".ADMIN_BASE_URL."views/department/department-index.php");
    }



}