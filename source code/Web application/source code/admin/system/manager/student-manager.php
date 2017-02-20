<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the SQL aspect of adding ,deleting, editing and viewing students
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
class studentManager extends Application{

    function addStudent($name,$dept_id,$role_no,$mobile,$email){
        //echo
        $sql="INSERT INTO `student` (`name`, `roll_no`, `mobile`, `email`, `dept_id`, `is_active`, `added_on`) VALUES ('$name', '$role_no', '$mobile', '$email', '$dept_id', 'yes', CURRENT_TIMESTAMP);";
        return $this->updateQuery($sql,true);
    }

    function addStudentLogin($student_id,$student_roll_no){
        //echo "<br>".
        $sql="INSERT INTO `user_login` ( `student_id`, `user_name`, `user_pass`, `user_type`, `is_active`, `added_on`) VALUES ('$student_id', '$student_roll_no', '', 'student', 'yes', CURRENT_TIMESTAMP);";
        return $this->updateQuery($sql,true);
    }
    function getAllStudent(){
        //echo
        $sql="SELECT `student`.*,`department`.* FROM `student`,`department` WHERE `student`.`is_active`='yes' AND `student`.`dept_id`=`department`.`dept_id`";
        return $this->executeQuery($sql);
    }

    function getStudentById($student_id){
        $sql="SELECT * FROM `student` WHERE `student_id`='$student_id'";
        return $this->executeQuery($sql);
    }

    function editStudent($student_id,$name,$dept_id,$role_no,$mobile,$email){
        echo
        $sql="UPDATE `student` SET `name` = '$name', `roll_no` = '$role_no', `mobile` = '$mobile', `email` = '$email', `dept_id` = '$dept_id' WHERE `student`.`student_id` = $student_id";
        return $this->updateQuery($sql);
    }

    function deleteStudentById($student_id){
        $sql="UPDATE `student` SET `is_active` = 'no' WHERE `student`.`student_id` = $student_id";
        return $this->updateQuery($sql);
    }

    function getDetpIdByStudentId($student_id){
        $sql="SELECT * FROM `student` WHERE `student`.`student_id`='$student_id'";
        return $this->executeQuery($sql);
    }



}
?>