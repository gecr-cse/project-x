<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the SQL aspect of adding ,deleting, editing and viewing department
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
class departmentManager extends Application{

    function checkDeptExistance($dept_name){
        $sql="SELECT * FROM `department` WHERE `dept_name` LIKE '$dept_name' AND `is_active`='yes'";
        return $this->executeQuery($sql);
    }
    function addDepartment($dept_name,$image){
        echo $sql="INSERT INTO `department` (`dept_name`, `dept_image`, `is_active`, `added_on`) VALUES ('$dept_name', '$image', 'yes', CURRENT_TIMESTAMP)";
        return $this->updateQuery($sql,true);
    }

    function updateDepartment($dept_id,$image,$dept_name){
        $sql="UPDATE `department` SET `dept_name` = '$dept_name',dept_image='$image' WHERE `department`.`dept_id` = $dept_id";
        return $this->updateQuery($sql,true);
    }

    function addDepartmentInfo($dept_id,$dept_hod_name,$dept_hod_no,$dept_hod_email,$dept_hod_strength,$dept_hod_staff){
        echo $sql="INSERT INTO `dept_info` (`dept_id`, `dept_hod_name`, `dept_hod_no`, `dept_hod_email`, `dept_strength`, `dept_staff`, `is_active`, `added_on`) VALUES ('$dept_id', '$dept_hod_name', '$dept_hod_no', '$dept_hod_email', '$dept_hod_strength', '$dept_hod_staff', 'yes', 'CURRENT_TIMESTAMP')";
        return $this->updateQuery($sql);
    }

    function updateDepartmentInfo($dept_id,$dept_hod_name,$dept_hod_no,$dept_hod_email,$dept_hod_strength,$dept_hod_staff){
        $sql="UPDATE `dept_info` SET `dept_hod_name` = '$dept_hod_name', `dept_hod_no` = '$dept_hod_no', `dept_hod_email` = '$dept_hod_email', `dept_strength` = '$dept_hod_strength', `dept_staff` = '$dept_hod_staff' WHERE `dept_info`.`dept_id` = $dept_id";
        return $this->updateQuery($sql);
    }

    function getAllDept(){
        //echo
        $sql="SELECT `department`.*, `dept_info`.*, `dept_info`.* FROM `department`, `dept_info` WHERE `department`.`is_active`='yes' AND `department`.`dept_id`=`dept_info`.`dept_id` ORDER BY `department`.`added_on` DESC";
        return $this->executeQuery($sql);
    }

    function getDeptDetailsByDeptId($dept_id){
        //echo
        $sql="SELECT `department`.*, `dept_info`.*, `dept_info`.* FROM `department`, `dept_info` WHERE `department`.`is_active`='yes' AND `department`.`dept_id`='$dept_id' AND `department`.`dept_id`=`dept_info`.`dept_id` ORDER BY `department`.`added_on` DESC";
        return $this->executeQuery($sql);
    }

    function delelteDept($detp_id){
        $sql="UPDATE `department` SET `is_active` = 'no' WHERE `department`.`dept_id` = $detp_id";
        return $this->updateQuery($sql);
    }
}
?>