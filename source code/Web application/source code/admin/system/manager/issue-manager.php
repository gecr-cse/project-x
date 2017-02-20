<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the SQL aspect of adding ,deleting, editing and viewing issue
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
class issueManager extends Application{

    function getAllIssue(){
        $sql="SELECT `issues`.*,`department`.*,`student`.* FROM `issues`,`department`,`student` WHERE `issues`.`is_active`='yes' AND `issues`.`dept_id`=`department`.`dept_id` AND `issues`.`student_id`=`student`.`student_id`";
        return $this->executeQuery($sql);
    }

    function getAllIussueByUserId($user_id){
        $sql="SELECT `issues`.*,`department`.*,`student`.* FROM `issues`,`department`,`student` WHERE `issues`.`is_active`='yes' AND `student`.`student_id`='$user_id' AND `issues`.`dept_id`=`department`.`dept_id` AND `issues`.`student_id`=`student`.`student_id`";
        return $this->executeQuery($sql);
    }

    function addIssue($student_id,$dept_id,$issue_title,$issue_description){
        //echo
        $sql="INSERT INTO `issues` (`student_id`, `dept_id`, `issue_title`, `issue_desc`, `issue_status`, `is_active`, `added_on`) VALUES ('$student_id', '$dept_id', '$issue_title', '$issue_description', 'in_progress', 'yes', CURRENT_TIMESTAMP)";
        return $this->updateQuery($sql,true);
    }
    function getIssueByStudent($student_id){
        //echo
        $sql="SELECT * FROM `issues` WHERE `issues`.`student_id`='$student_id' AND `issues`.`is_active`='yes' ORDER BY `issues`.`issue_id` DESC";
        return $this->executeQuery($sql);
    }

    function getIssueDetailByIssueId($issue_id){
        $sql="SELECT * FROM `issues` WHERE `issue_id`=$issue_id";
        return $this->executeQuery($sql);
    }

}
?>