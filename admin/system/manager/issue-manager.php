<?php
class issueManager extends Application{

    function getAllIssue(){

      echo "<br>yet to work";
      $query = "SELECT issue_id,dept_name,issue_title,issue_desc,issue_status,issues.added_on FROM issues,department WHERE issues.dept_id=department.dept_id";
      $res =  $this->executeQuery($query);
      //print_r($res);
      return $res;
    }

    function get_issue_by_id($id){
      $query = "SELECT issue_id,dept_name,issue_title,issue_desc,issue_status,issues.added_on FROM issues,department WHERE issues.dept_id=department.dept_id and issue_id=".$id;
      $result = $this->executeQuery($query);
      return $result;
    }

    function delIssue($delete_id){
      $query = sprintf("DELETE FROM issues where issue_id='%s'",$delete_id);
      if($result = mysqli_query($this->dbConnect,$query))
      {return 1;}
      return 0;
    }
}
?>
