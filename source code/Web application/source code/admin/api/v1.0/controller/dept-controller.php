<?php
include_once('../library/allow_origin.php');
include_once('../library/json.php');
include_once('../library/application.php');
include_once('../library/manager.php');

/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the API of the department
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

$dept_controller=new deptController();

switch($action)
{
    case 'deptList': $dept_controller->deptList($requestBody); break;

}

class deptController{

    function __construct()
    {
        $this->manager=new manager();
        $this->jsonObj=new Json();
    }



    function deptList($requestBody){
        $json_response='';
        $json = $this->jsonObj->getJSONObject($requestBody);
        $requestData=$json->requestData;
        $list='';
        foreach($requestData as $data)
        {
            $list=$data->list;
        }
        $dept_list=$this->manager->getAllDetp();
        if(1==1){
            $json_response='
            {
              "requestMessage": "deptList",
              "requestId": "003",
              "response": "success",
              "responseCode": "200",
              "resultData": [
                {
                  "message": [';
            foreach($dept_list as $d_list){
                $json_response.='{
                        "dept_id":"2",
                        "dept_name":"'.$d_list['dept_name'].'",
                        "dept_image":"'.IMAGE_URL.$d_list['dept_image'].'"
                    },';
            }
            $json_response=rtrim($json_response,",");
            $json_response.='
                ]
                }
              ]
            }
            ';
        }else{
            $json_response='
                {
                  "requestMessage": "deptList",
                  "requestId": "003",
                  "response": "failure",
                  "responseCode": "200",
                  "resultData": [
                    {
                      "message": "No Department found"
                    }
                  ]
                }
            ';
        }
        echo $json_response;
    }


}
?>