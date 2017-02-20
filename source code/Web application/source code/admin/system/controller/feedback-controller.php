<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines Logic part to all aspects of viewing the feedback
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
include_once "../manager/feedback-manager.php";


$feedback=new feedbackController();
switch($_REQUEST['action'])
{
    case 'addFeedback':$feedback->addFeedback();break;


}

class feedbackController
{
    function __construct()
    {
        $this->msg = new Messages();
        $this->mail = new Mail();
        $this->common = new Common();
        $this->feedback=new feedbackManager();
    }

    function addFeedback(){
        $student_id=$_REQUEST['student_id'];
        $dept_id=$_REQUEST['dept_id'];
        $feedback_title=$_REQUEST['feedback_title'];
        $feedback_description=$_REQUEST['feedback_description'];
        //$iamges=$_REQUEST['issue_image'];
        $iamges="images";
        $result=$this->feedback->addFeedback($student_id,$dept_id,$feedback_title,$feedback_description);
        if($result)
            $this->msg->add("s","Issue Submitted Successfully");
        else
            $this->msg->add("s","Issue submit failed...Please try again later");
        header("Location:".BASE_URL."feedback.php");
    }


}