<?php
class issueManager extends Application{

    function getAllIssue(){

      echo "<br>yet to work";
      $query = "SELECT issue_id,dept_name,issue_title,issue_desc,issue_status,issues.added_on FROM issues,department WHERE issues.dept_id=department.dept_id or issues.dept_id=0";
      //echo "<br>".$query;
      $res =  $this->executeQuery($query);
        //print_r($res);
      return $res;
    }

}
?>
