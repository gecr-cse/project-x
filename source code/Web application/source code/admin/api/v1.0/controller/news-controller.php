<?php
include_once('../library/allow_origin.php');
include_once('../library/json.php');
include_once('../library/application.php');
include_once('../library/manager.php');
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the API of the news
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

$news_controller=new newsController();

switch($action)
{
    case 'newsList': $news_controller->newsList($requestBody); break;
    case 'newsDetail': $news_controller->newsDetail($requestBody); break;
}

class newsController{

    function __construct()
    {
        $this->manager=new manager();
        $this->jsonObj=new Json();
    }



    function newsList($requestBody){
        $json_response='';
        $json = $this->jsonObj->getJSONObject($requestBody);
        $requestData=$json->requestData;
        $dept_id=$limit_from=$limit_to='';
        foreach($requestData as $data)
        {
            $dept_id= $data->dept_id;
            $limit_from= $data->limit_from;
            $limit_to= $data->limit_to;
        }
        if($dept_id=="all"){
            $news_list=$this->manager->getAllNews();
        }else{
            $news_list=$this->manager->getNewsListByDeptId($dept_id);
        }
        if(count($news_list)>0){
            $json_response='
            {
                  "requestMessage": "newsList",
                  "requestId": "004",
                  "response": "success",
                  "responseCode": "200",
                  "resultData": [
                    {
                      "dept_id": "'.$dept_id.'",
                      "message": [';
            foreach($news_list as $n_list){
                $json_response.='{
                          "news_id": "'.$n_list['news_id'].'",
                          "news_title": "'.$n_list['news_title'].'",
                          "news_description": "'.$n_list['news_desc'].'",
                          "news_added_on": "'.$n_list['added_on'].'",';
                $source_id=$n_list['news_id'];
                $type="news";
                $image_name='';
                $image=$this->manager->getImageById($source_id,$type);
                if(count($image)>0){
                    $image_name=$image[0]['image_path'];
                }else
                    $image_name="default-news.jpg";
                $json_response.='
                          "news_image": "'.IMAGE_URL.$image_name.'"
                        },';
            }
            $json_response=rtrim($json_response,",");
            $json_response.=']
                    }
                  ]
                }
            ';
        }else{
            $json_response='
             {
              "requestMessage": "newsList",
              "requestId": "004",
              "response": "failure",
              "responseCode": "200",
              "resultData": [
                {
                  "message": "No News available in this Sector"
                }
              ]
            }';
        }
        echo $json_response;
    }

    function newsDetail($requestBody){
        $json_response='';
        $json = $this->jsonObj->getJSONObject($requestBody);
        $requestData=$json->requestData;
        $news_id='';
        foreach($requestData as $data)
        {
            $news_id= $data->news_id;
        }
        $news_details=$this->manager->getNewsDetailById($news_id);
        if(count($news_details)>0){
            $json_response='
            {
              "requestMessage": "newsDetail",
              "requestId": "005",
              "response": "success",
              "responseCode": "200",
              "resultData": [
                {
                  "dept_id": "'.$news_details[0]['dept_id'].'",
                  "dept_name": "'.$news_details[0]['dept_name'].'",
                  "naws_id": "'.$news_details[0]['news_id'].'",
                  "news_title": "'.$news_details[0]['news_title'].'",
                  "news_description": "'.$news_details[0]['news_desc'].'",
                  "added_on": "'.$news_details[0]['added_on'].'",
                  "content_manager": "'.$news_details[0]['user_name'].'",
                  "images": [
                  ';
            $image_name='';
            $source_id=$news_details[0]['news_id'];
            $type="news";
            $image_list=$this->manager->getImageById($source_id,$type);
            if(count($image_list)>0){
                $image_name=$image_list[0]['image_path'];
            }else
                $image_name="default-news.jpg";
            foreach($image_list as $i_list){
                $json_response.='{
                      "image_url": "'.IMAGE_URL.$i_list['image_path'].'"
                    },';
            }
            $json_response=rtrim($json_response,",");
    $json_response.=']
                }
              ]
            }
        ';
        }else{
            $json_response='
             {
              "requestMessage": "newsDetail",
              "requestId": "005",
              "response": "failure",
              "responseCode": "200",
              "resultData": [
                {
                  "message": "Details not available for this News"
                }
              ]
            }';
        }
        echo $json_response;
    }
}
?>