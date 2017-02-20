<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the SQL aspect of adding ,deleting, editing and viewing feedback
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
class feedbackManager extends Application
{
    function addFeedback($student_id,$dept_id,$feedback_title,$feedback_description)
	{
        //echo
        $sql="INSERT INTO `feedback` (`dept_id`, `student_id`, `feedback_title`, `feedback_desc`, `is_active`, `added_on`) VALUES ('$dept_id', '$student_id', '$feedback_title', '$feedback_description', 'yes', CURRENT_TIMESTAMP)";
        return $this->updateQuery($sql);
    }
	function getFeedbackByStudent($student_id)
	{
        $sql="SELECT * FROM `feedback` WHERE `feedback`.`student_id`='$student_id'";
        return $this->executeQuery($sql);	
    }
	function getAllFeedback()
	{
        $sql="SELECT * FROM `feedback` ";
        return $this->executeQuery($sql);	
    }
}
?>