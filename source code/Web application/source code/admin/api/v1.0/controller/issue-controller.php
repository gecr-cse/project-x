<?php
include_once('../library/allow_origin.php');
include_once('../library/json.php');
include_once('../library/application.php');
include_once('../library/manager.php');
include_once('../../../system/plugins/base64toimage/base64toimage.php');

/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the API of the issues
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

$issue_controller=new issueController();

switch($action)
{
    case 'issueList': $issue_controller->issueList($requestBody); break;
    case 'issueDetail': $issue_controller->issueDetail($requestBody); break;
    case 'issueAdd': $issue_controller->issueAdd($requestBody); break;
}

class issueController{

    function __construct()
    {
        $this->manager=new manager();
        $this->jsonObj=new Json();
        $this->base64toImg=new base64ToImage();
    }



    function issueList($requestBody){
        $json_response='';
        $json = $this->jsonObj->getJSONObject($requestBody);
        $requestData=$json->requestData;
        $student_id='';
        foreach($requestData as $data)
        {
            $student_id=$data->student_id;
        }
        $issue_list=$this->manager->getAllIussueByUserId($student_id);
        if(count($issue_list)>0){
            $json_response='
            {
              "requestMessage": "issueList",
              "requestId": "006",
              "response": "success",
              "responseCode": "200",
              "resultData": [
                {
                  "student_id": "'.$student_id.'",
                  "message": [';
            foreach($issue_list as $i_list) {
                $source_id=$i_list['issue_id'];
                $type="issue";
                $image_list=$this->manager->getImageById($source_id,$type);
                if(count($image_list)>0)
                    $image=$image_list[0]['image_path'];
                else
                    $image="default-issue.jpg";
                $json_response .= '{
                      "issue_id": "'.$i_list['issue_id'].'",
                      "issue_title": "'.$i_list['issue_title'].'",
                      "issue_description": "'.$i_list['issue_desc'].'",
                      "issue_added_on": "'.$i_list['added_on'].'",
                      "issue_image": "'.IMAGE_URL.$image.'"
                    },';
            }
            $json_response=rtrim($json_response,",");
            $json_response.=']
                }
              ]
            }';
        }else{
            $json_response='
             {
              "requestMessage": "issueList",
              "requestId": "006",
              "response": "failure",
              "responseCode": "200",
              "resultData": [
                {
                  "message": "no Isses raised by You"
                }
              ]
            }
           ';
        }
        echo $json_response;
    }

    function issueDetail($requestBody){
        $json_response='';
        $json = $this->jsonObj->getJSONObject($requestBody);
        $requestData=$json->requestData;
        $issue_id=$student_id='';
        foreach($requestData as $data)
        {
            $issue_id= $data->issue_id;
            $student_id= $data->student_id;
        }
        $issue_details=$this->manager->getIssueByStudentId($issue_id);
        if(count($issue_details)>0){
            $json_response='
            {
              "requestMessage": "issueDetail",
              "requestId": "007",
              "response": "success",
              "responseCode": "200",
              "resultData": [
                {
                  "dept_id": "2",
                  "dept_name": "CSE",
                  "issue_id": "'.$issue_details[0]['issue_id'].'",
                  "issue_title": "'.$issue_details[0]['issue_title'].'",
                  "issue_description": "'.$issue_details[0]['issue_desc'].'",
                  "issue_status":"'.$issue_details[0]['issue_status'].'",
                  "added_on": "'.$issue_details[0]['added_on'].'",
                  "images": [';
                    $source_id=$issue_details[0]['issue_id'];
                    $type="issue";
                    $image_list=$this->manager->getImageById($source_id,$type);
                    if(count($image_list)>0){
                        $image_name=$image_list[0]['image_path'];
                    }else
                        $image_name="default-news.jpg";
                  foreach($image_list as $i_list) {
                    $json_response .= '  {
                      "image_url": "'.IMAGE_URL.$i_list['image_path'].'"
                    },';
                    }
            $json_response=rtrim($json_response,",");
$json_response .= '    ]
                }
              ]
            }';
        }else{
            $json_response='
             {
              "requestMessage": "issueDetail",
              "requestId": "007",
              "response": "failure",
              "responseCode": "200",
              "resultData": [
                {
                  "message": "Details not available for this issue"
                }
              ]
            }
           ';
        }
        echo $json_response;
    }

    function issueAdd($requestBody){
        $json_response='';
        $json = $this->jsonObj->getJSONObject($requestBody);
        $requestData=$json->requestData;
        $student_id=$dept_id=$issue_title =$issue_description =$image_count =$images ='';
        $images_list=array();
        foreach($requestData as $data)
        {
            $student_id= $data->student_id;
            $dept_id = $data->dept_id ;
            $issue_title = $data->issue_title ;
            $issue_description = $data->issue_description ;
            $image_count = $data->image_count ;
            $images_list = $data->images ;
        }
        $add_issue=$this->manager->addIssueByStudent($student_id,$dept_id,$issue_title,$issue_description);
        if($add_issue){
            $image_name=array();
            if(count($images_list)>0){
                foreach($images_list as $img){
                    $image=$img->image;
                    $path="../../../img/uploads/";
                    $im=$this->base64toImg->baseToimage($image,$path);
                    array_push($image_name,$im);
                }
            }
            $type="issue";
            $this->manager->addImagesById($add_issue,$type,$image_name);
            $json_response='
{
  "requestMessage": "issueAdd",
  "requestId": "008",
  "response": "success",
  "responseCode": "200",
  "resultData": [
    {
      "message": "Issue submitted successfully"
    }
  ]
}            ';
        }else{
            $json_response='
 {
  "requestMessage": "issueAdd",
  "requestId": "008",
  "response": "failure",
  "responseCode": "200",
  "resultData": [
    {
      "message": "Not able to submit the issue ...Please try again later"
    }
  ]
}
           ';
        }
        echo $json_response;
    }

}
?>