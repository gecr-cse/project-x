<?php
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines SQL statement of the API
 * Created on : <Date of creation>
 * NOTICE:  All information contained herein is, and remains
 * the property of GEC Raipur CS Department. The intellectual and technical concepts contained
 * herein are originated as part Industry Orientation program.
 * Dissemination of this information or reproduction of this material
 * is restricted unless prior written permission is obtained
 * from GEC Raipur CS Department.
 */
class manager extends Application{

    function checkMobileExistance($mobile_no){
        //echo
        $sql="SELECT * FROM `student` WHERE `mobile`='$mobile_no' AND `is_active`='yes'";
        return $this->executeQuery($sql);
    }

    function getAllDetp(){
        //echo
        $sql="SELECT * FROM `department` WHERE `is_active`='yes' ORDER BY `dept_name` DESC";
        return $this->executeQuery($sql);
    }
    function getAllNews(){
        //echo
        $sql="SELECT `news`.*,`department`.*,`user_login`.* FROM `news`,`department`,`user_login` WHERE `news`.`is_active`='yes' AND `news`.`dept_id`=`department`.`dept_id` AND `news`.`creater_id`=`user_login`.`user_id`";
        return $this->executeQuery($sql);
    }
    function getNewsListByDeptId($dept_id){
        //echo
        $sql="SELECT `news`.*,`department`.*,`user_login`.* FROM `news`,`department`,`user_login` WHERE `news`.`is_active`='yes' AND `news`.`dept_id`=$dept_id AND `news`.`dept_id`=`department`.`dept_id` AND `news`.`creater_id`=`user_login`.`user_id`";
        return $this->executeQuery($sql);
    }

    function addImagesById($source_id,$type,$image_name){
        $str="";
        foreach($image_name as $im){
            $str.="('$source_id', '$type', '$im', 'yes', CURRENT_TIMESTAMP),";
        }
        $str=rtrim($str,",");
        echo $sql="INSERT INTO `image` (`source_id`, `source_type`, `image_path`, `is_active`, `added_on`) VALUES ".$str;
    }
    function getImageById($source_id,$type){
        $sql="SELECT * FROM `image` WHERE `source_id`='$source_id' AND `source_type`='$type' AND `is_active`='yes'";
        return $this->executeQuery($sql,true);
    }
    function getNewsDetailById($news_id){
        //echo
        $sql="SELECT `news`.*,`department`.*,`user_login`.* FROM `news`,`department`,`user_login` WHERE `news`.`news_id`=$news_id AND `news`.`dept_id`=`department`.`dept_id` AND `news`.`creater_id`=`user_login`.`user_id`";
        return $this->executeQuery($sql);
    }

    function addIssueByStudent($student_id,$dept_id,$issue_title,$issue_description){
        $sql="INSERT INTO `issues` (`student_id`, `dept_id`, `issue_title`, `issue_desc`, `issue_status`, `is_active`, `added_on`) VALUES ('$student_id', '$dept_id', '$issue_title', '$issue_description', 'in_progress', 'yes', CURRENT_TIMESTAMP)";
        return $this->updateQuery($sql,true);
    }
    function getAllIussueByUserId($user_id){
        //echo
        $sql="SELECT `issues`.*,`department`.*,`student`.* FROM `issues`,`department`,`student` WHERE `issues`.`is_active`='yes' AND `student`.`student_id`='$user_id' AND `issues`.`dept_id`=`department`.`dept_id` AND `issues`.`student_id`=`student`.`student_id`";
        return $this->executeQuery($sql);
    }

    function getIssueByStudentId($issue_id){
        $sql="SELECT * FROM `issues` WHERE `issue_id`='$issue_id'";
        return $this->executeQuery($sql);
    }

    function addStudentFeedback($student_id,$dept_id,$feedback_title,$feedback_description){
        $sql="INSERT INTO `feedback` (`dept_id`, `student_id`, `feedback_title`, `feedback_desc`, `is_active`, `added_on`) VALUES ('$dept_id', '$student_id', '$feedback_title', '$feedback_description', 'yes', CURRENT_TIMESTAMP)";
        return $this->updateQuery($sql);
    }

    function getAllFeedbackByStudentId($student_id){
        $sql="SELECT * FROM   `feedback` WHERE `student_id`=$student_id AND `feedback`.`is_active`='yes'";
        return $this->executeQuery($sql);
    }

    function getFeedbackDetailByFeedbackId($feedback_id,$student_id){
        $sql="SELECT * FROM `feedback` WHERE `feedback_id`=$feedback_id AND `student_id`=$student_id";
        return $this->executeQuery($sql);
    }
}
?>