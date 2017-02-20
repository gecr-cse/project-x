<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the SQL aspect of adding ,deleting, editing and viewing news
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
class newsManager extends Application{

    function addNews($dept_id,$content_manager_id,$news_title,$news_description,$video_url){
        //echo
        $sql="INSERT INTO `news` (`dept_id`, `news_title`, `news_desc`, `video`, `creater_id`, `is_active`, `added_on`) VALUES ('$dept_id', '$news_title', '$news_description', '$video_url', '$content_manager_id', 'yes',CURRENT_TIMESTAMP)";
        return $this->updateQuery($sql,true);
    }

    function getAllNews(){
        //echo
        $sql="SELECT `news`.*,`department`.*,`user_login`.* FROM `news`,`department`,`user_login` WHERE `news`.`is_active`='yes' AND `news`.`dept_id`=`department`.`dept_id` AND `news`.`creater_id`=`user_login`.`user_id`";
        return $this->executeQuery($sql);
    }

    function getNewsDetailById($news_id){
        $sql="SELECT `news`.*,`department`.*,`user_login`.* FROM `news`,`department`,`user_login` WHERE `news`.`news_id`=$news_id AND `news`.`dept_id`=`department`.`dept_id` AND `news`.`creater_id`=`user_login`.`user_id`";
        return $this->executeQuery($sql);
    }

    function editNews($news_id,$dept_id,$content_manager_id,$news_title,$news_description,$video_url){
        echo
        $sql="UPDATE `news` SET `dept_id` = '$dept_id', `news_title` = '$news_title', `news_desc` = '$news_description', `video` = '$video_url', `creater_id` = '$content_manager_id' WHERE `news`.`news_id` = $news_id";
        return $this->updateQuery($sql);
    }

    function deleteNewsById($news_id){
        $sql="UPDATE `news` SET `is_active` = 'no' WHERE `news`.`news_id` = $news_id";
        return $this->updateQuery($sql);
    }

    function getNewsListByDeptId($dept_id){
        //echo
        $sql="SELECT `news`.*,`department`.*,`user_login`.* FROM `news`,`department`,`user_login` WHERE `news`.`is_active`='yes' AND `news`.`dept_id`=$dept_id AND `news`.`dept_id`=`department`.`dept_id` AND `news`.`creater_id`=`user_login`.`user_id`";
        return $this->executeQuery($sql);
    }

    function addImage($image_array,$source_id,$source_type){
        $str_str='';
        foreach($image_array as $i_img){
            $str_str=$str_str."('$source_id', '$source_type', '$i_img', 'yes', CURRENT_TIMESTAMP),";
        }
        $str_str=rtrim($str_str,',');
        //echo
        $sql="INSERT INTO `image` ( `source_id`, `source_type`, `image_path`, `is_active`, `added_on`) VALUES ".$str_str;
        return $this->executeQuery($sql,true);
    }

    function getImageById($source_id,$type){
        $sql="SELECT * FROM `image` WHERE `source_id`='$source_id' AND `source_type`='$type' AND `is_active`='yes'";
        return $this->executeQuery($sql,true);
    }

    function deleteImage($id,$image_id,$type){
        $sql="DELETE FROM `image` WHERE `image`.`source_id` = $id AND `image_path`='$image_id' AND `source_type`='$type'";
        return $this->updateQuery($sql);
    }

}
?>