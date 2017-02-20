<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines Logic part to all aspects of viewing the issues
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
include_once "../manager/issue-manager.php";
include_once "../plugins/imageCopy/doctupload_svr.php";
include_once "../manager/news-manager.php";


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
        $this->doct=new Doctupload_SVR();
        $this->news=new newsManager();
    }

    function addIssue(){
        $student_id=$_REQUEST['student_id'];
        $dept_id=$_REQUEST['dept_id'];
        $issue_title=$_REQUEST['issue_title'];
        $issue_description=$_REQUEST['issue_description'];
        //$iamges=$_FILES['issue_image'];
        $iamges="images";
        $result=$this->issue->addIssue($student_id,$dept_id,$issue_title,$issue_description);
        $destination="../../img/uploads/";
        $fileformname="issue_image";

        $res=$this->doct->startupload_many($_FILES,$destination,$fileformname);
        $source_type="issue";
        $this->news->addImage($res,$result,$source_type);
        if($result)
            $this->msg->add("s","Issue Submitted Successfully");
        else
            $this->msg->add("s","Issue submit failed...Please try again later");
        header("Location:".BASE_URL."issues.php");
    }


}