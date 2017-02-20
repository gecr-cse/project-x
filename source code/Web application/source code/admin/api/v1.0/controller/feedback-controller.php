<?php
include_once('../library/allow_origin.php');
include_once('../library/json.php');
include_once('../library/application.php');
include_once('../library/manager.php');
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the API of the feedback
 * Created on : <Date of creation>
 * NOTICE:  All information contained herein is, and remains
 * the property of GEC Raipur CS Department. The intellectual and technical concepts contained
 * herein are originated as part Industry Orientation program.
 * Dissemination of this information or reproduction of this material
 * is restricted unless prior written permission is obtained
 * from GEC Raipur CS Department.
 */

$action=$_REQUEST['action'];
$requestBody = file_get_contents("php://input");

$feedback_controller=new feedbackController();

switch($action)
{
    case 'feedbackList': $feedback_controller->feedbackList($requestBody); break;
    case 'feedbackDetail': $feedback_controller->feedbackDetail($requestBody); break;
    case 'feedbackAdd': $feedback_controller->feedbackAdd($requestBody); break;
}

class feedbackController{

    function __construct()
    {
        $this->manager=new manager();
        $this->jsonObj=new Json();
    }



    function feedbackList($requestBody){
        $json_response='';
        $json = $this->jsonObj->getJSONObject($requestBody);
        $requestData=$json->requestData;
        $student_id='';
        foreach($requestData as $data)
        {
            $student_id= $data->student_id;

        }
        $feedback_list=$this->manager->getAllFeedbackByStudentId($student_id);
        if(count($feedback_list)>0){
            $json_response='
            {
              "requestMessage": "feedbackList",
              "requestId": "009",
              "response": "success",
              "responseCode": "200",
              "resultData": [
                {
                  "student_id": "'.$student_id.'",
                  "message": [';
            foreach($feedback_list as $f_list){
            $json_response.='{
                      "feedback_id": "'.$f_list['feedback_id'].'",
                      "feedback_title": "'.$f_list['feedback_title'].'",
                      "feedback_description": "'.$f_list['feedback_desc'].'",
                      "feedback_added_on": "'.date('d-M-Y',strtotime($f_list['added_on'])).'"
                    },';
            }
            $json_response=rtrim($json_response,",");
            $json_response.=']
                }
              ]
            }            ';
        }else{
            $json_response='
 {
  "requestMessage": "feedbackList",
  "requestId": "009",
  "response": "failure",
  "responseCode": "200",
  "resultData": [
    {
      "message": "no feedback given by You"
    }
  ]
}
           ';
        }
        echo $json_response;
    }

    function feedbackDetail($requestBody){
        $json_response='';
        $json = $this->jsonObj->getJSONObject($requestBody);
        $requestData=$json->requestData;
        $feedback_id=$student_id='';
        foreach($requestData as $data)
        {
            $feedback_id= $data->feedback_id;
            $student_id= $data->student_id;
        }
        $feedback_detail=$this->manager->getFeedbackDetailByFeedbackId($feedback_id,$student_id);
        if(count($feedback_detail)>0){
            $json_response='
            {
              "requestMessage": "feedbackDetail",
              "requestId": "010",
              "response": "success",
              "responseCode": "200",
              "resultData": [
                {
                  "dept_id": "'.$feedback_detail[0]['dept_id'].'",
                  "dept_name": "CSE",
                  "feedback_id": "'.$feedback_id.'",
                  "feedback_title": "'.$feedback_detail[0]['feedback_title'].'",
                  "feedback_description": "'.$feedback_detail[0]['feedback_desc'].'",
                  "added_on": "'.date('d-M-Y',strtotime($feedback_detail[0]['added_on'])).'"
                }
                  ]
                }
             ';
        }else{
            $json_response='
 {
  "requestMessage": "feedbackDetail",
  "requestId": "010",
  "response": "failure",
  "responseCode": "200",
  "resultData": [
    {
      "message": "Details not available for this feedback"
    }
  ]
}
           ';
        }
        echo $json_response;
    }

    function feedbackAdd($requestBody){
        $json_response='';
        $json = $this->jsonObj->getJSONObject($requestBody);
        $requestData=$json->requestData;
        $student_id=$dept_id=$feedback_title=$feedback_description='';
        foreach($requestData as $data)
        {
            $student_id= $data->student_id;
            $dept_id= $data->dept_id;
            $feedback_title= $data->feedback_title;
            $feedback_description= $data->feedback_description;
        }
        $result=$this->manager->addStudentFeedback($student_id,$dept_id,$feedback_title,$feedback_description);
        if($result){
            $json_response='
                {
                  "requestMessage": "feedbackAdd",
                  "requestId": "011",
                  "response": "success",
                  "responseCode": "200",
                  "resultData": [
                    {
                      "message": "feedback given successfully"
                    }
                  ]
                }            ';
        }else{
            $json_response='
             {
              "requestMessage": "feedbackAdd",
              "requestId": "011",
              "response": "failure",
              "responseCode": "200",
              "resultData": [
                {
                  "message": "Not able to submit the feedback ...Please try again later"
                }
              ]
            }
           ';
        }
        echo $json_response;
    }

}
?>