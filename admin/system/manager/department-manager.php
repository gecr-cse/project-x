<?php
class departmentManager extends Application{


//function to return all the name of departments
  function getAllDept(){
    echo
    $query = "SELECT dept_name,dept_id FROM department";
    $result = $this->executeQuery($query);    
   return $result;
  }
}
?>
