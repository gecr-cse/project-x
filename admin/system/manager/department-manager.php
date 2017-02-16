<?php
class departmentManager extends Application{

  function __construct(){

    $this->servername = "localhost";
     $this->username = "root";
     $this->password = "";
     $this->dbname = "mycollege";
     //connecting to database
     $this->conn = new mysqli(  $this->servername, $this->username, $this->password,$this->dbname);
     //checking for error
     if ($this->conn->connect_error) {
       echo "Failed to connect to server<br>";
     }
  }
//function to return all the name of departments
  function getAllDept(){
    echo
    $query = "SELECT dept_name,dept_id FROM department";
    $response = array();
    $result = mysqli_query($this->conn,$query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($response, $row);
        }
    }else{
        $response=0;
    }
    //echo mysqli_error($this->dbConnect);
  //  print_r($response) ;
   return $response;
  }
}
?>
