<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines Logic part to all aspects of adding, editing and deleting the News
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
include_once "../manager/student-manager.php";
include_once "../manager/news-manager.php";
include_once "../plugins/messages/class.messages.php";
include_once "../plugins/mails/mail.php";
include_once "../plugins/imageCopy/doctupload_svr.php";

$login=new loginController();
switch($_REQUEST['action'])
{
    case 'addNews':$login->addNews();break;
    case 'editNews':$login->editNews();break;
    case 'deleteNews':$login->deleteNews();break;
    case 'deleteImage':$login->deleteImage();break;
}

class loginController
{
    function __construct()
    {
        $this->msg = new Messages();
        $this->mail = new Mail();
        $this->common = new Common();
        $this->department=new departmentManager();
        $this->student=new studentManager();
        $this->news=new newsManager();
        $this->doct=new Doctupload_SVR();

    }

    function addNews(){
        $dept_id =$_REQUEST['dept_id'];
        //$content_manager_id =$_REQUEST['content_manager_id'];
        $news_title =$_REQUEST['news_title'];
        $news_description=$_REQUEST['news_description'];
        $video_url =$_REQUEST['video_url'];
		//print_r($_FILES);exit;
        $images =$_FILES['images'];
        $image="adsf";
        $content_manager_id='1';
        $result=$this->news->addNews($dept_id,$content_manager_id,$news_title,$news_description,$video_url);
        $destination="../../img/uploads/";
        $fileformname="images";
        $res=$this->doct->startupload_many($_FILES,$destination,$fileformname);
        $source_type="news";
        $this->news->addImage($res,$result,$source_type);
        if($result){
            $this->msg->add("s","News added successfully");
        }else{
            $this->msg->add("s","News adding failed");
        }
        header("Location:".ADMIN_BASE_URL."views/news/news-index.php");
    }

    function editNews(){
        //echo "fdsa";exit;
        $news_id =$_REQUEST['news_id'];
        $dept_id =$_REQUEST['dept_id'];
        $content_manager_id =$_REQUEST['content_manager_id'];
        $news_title =$_REQUEST['news_title'];
        $news_description =$_REQUEST['news_description'];
        $video_url =$_REQUEST['video_url'];
        $result=$this->news->editNews($news_id,$dept_id,$content_manager_id,$news_title,$news_description,$video_url);
		//print_r($result);exit;
        if($result){
            $this->msg->add("s","News edited successfully");
        }else{
            $this->msg->add("s","News editing failed");
        }
        header("Location:".ADMIN_BASE_URL."views/news/news-index.php");
    }

    function deleteNews(){
        $news_id=$_REQUEST['news_id'];
        $result=$this->news->deleteNewsById($news_id);
        if($result){
            $this->msg->add("s","News deleted successfully");
        }else{
            $this->msg->add("s","News deletion failed");
        }
        header("Location:".ADMIN_BASE_URL."views/news/news-index.php");
    }

    function deleteImage(){
        $news_id=$_REQUEST['news_id'];
        $image_id=$_REQUEST['image_id'];
        $type="news";
        $this->news->deleteImage($news_id,$image_id,$type);
        header("Location:".ADMIN_BASE_URL."views/news/news-edit.php?news_id=".$news_id);
    }

}