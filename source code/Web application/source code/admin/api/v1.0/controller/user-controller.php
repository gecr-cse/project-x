<?php
include_once('../library/allow_origin.php');
include_once('../library/json.php');
include_once('../library/application.php');
include_once('../library/manager.php');
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the API of the user
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

$user_controller=new userController();

switch($action)
{
    case 'userRegister': $user_controller->userRegister($requestBody); break;
    case 'userOTP': $user_controller->userOTP($requestBody); break;

}

class userController{

    function __construct()
    {
        $this->manager=new manager();
        $this->jsonObj=new Json();
    }

    function userRegister($requestBody){
        $json_response='';
        $json = $this->jsonObj->getJSONObject($requestBody);
        $requestData=$json->requestData;
        $mobile_no='';
        foreach($requestData as $data)
        {
            $mobile_no= $data->mobile_no;
        }
        $result=$this->manager->checkMobileExistance($mobile_no);
        if(count($result)>0){
            $json_response='
                {
                  "requestMessage": "userRegister",
                  "requestId": "001",
                  "response":"success",
                  "responseCode": "200",
                  "resultData": [
                    {
                      "message": "An OTP is sent to your mobile... Please enter OTP sent to your mobile no.",
                      "mobile_no":"'.$mobile_no.'",
                      "otp":"1234"
                    }
                  ]
                }
            ';
        }else{
            $json_response='{
              "requestMessage": "userRegister",
              "requestId": "001",
              "response": "failure",
              "responseCode": "200",
              "resultData": [
                {
                  "message": "Mobile no not found in database. Please conctact admin"
                }
              ]
            }';
        }
        echo $json_response;

    }

    function userOTP($requestBody){
        $json_response='';
        $json = $this->jsonObj->getJSONObject($requestBody);
        $requestData=$json->requestData;
        $mobile_no=$otp='';
        foreach($requestData as $data)
        {
            $mobile_no= $data->mobile_no;
            $otp= $data->otp;
        }
        $student_detail=$this->manager->checkMobileExistance($mobile_no);
        if($otp=="1234"){
            $json_response='
            {
              "requestMessage": "userOTP",
              "requestId": "002",
              "response": "success",
              "responseCode": "200",
              "resultData": [
                {
                  "mobile_no":"'.$mobile_no.'",
                  "message": "OTP Verified",
                  "student_id":"'.$student_detail[0]['student_id'].'",
                  "dept_id":"'.$student_detail[0]['dept_id'].'"
                }
              ]
            }
            ';
        }else{
            $json_response='
            {
              "requestMessage": "userOTP",
              "requestId": "002",
              "response": "failure",
              "responseCode": "200",
              "resultData": [
                {
                  "message": "Invalid OTP"
                }
              ]
            }
            ';
        }
        echo $json_response;
    }


}
?>