<?php
include_once('../library/allow_origin.php');
include_once('../library/json.php');
include_once('../library/application.php');
include_once('../library/manager.php');


$action=$_REQUEST['action'];
$requestBody = file_get_contents("php://input");

$user_controller=new userController();

switch($action)
{
    case 'userRegister': $user_controller->userRegister($requestBody);
        break;

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
                      "message": "An OTP is sent to your mobile... Please enter OTP sent to your mobile no."
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
    function category_list($requestBody)
    {

        $json = $this->jsonObj->getJSONObject($requestBody);
        $requestData=$json->requestData;

        foreach($requestData as $data)
        {
            $search_for= $data->searchFor;
        }

        $detail = $this->new_group->category_list($search_for);

        if ($detail != NULL && $search_for=='causeCategories')
        {
            $json_response=
                '{
	         "requestMessage":"causeCategories",
	         "requestId":"11",
	         "resultCode":"success",
  	         "resultData":[{
			 "searchList":[';
            foreach($detail as $ne)
            {
                $json_response.=
                    '{
			   "categoryName":"'.$ne['category_name'].'",
			   "categoryUrl":"'.$ne['category_url'].'",
			   "categoryIcon":"'.ADMIN_BASE_URL.'uploads/img/'.$ne['category_icon'].'"
			 },';
            }
            $json_response=rtrim($json_response,',');
            $json_response.=']}]}';




        }

        else
        {
            $json_response=
                '{
	     "requestMessage":"causeCategories",
         "requestId":"11",
         "resultCode":"Unsuccess",
         "resultMessageCode":"110",
         "resultData":"No result found"
        }';
        }
        echo $json_response;

    }

}
?>