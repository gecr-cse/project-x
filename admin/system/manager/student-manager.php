<?php
class studentManager extends Application{

//implementing my conde
//function to connect to database
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

//function to return all the student records
function getAllStudent(){
  $query = "SELECT student_id,name,roll_no,dept_name,email,mobile FROM student,department where student.dept_id=department.dept_id";
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
  print_r($response) ;
  return $response;

  }

  function getStudentById($stud_id){
    //echo "now working";
    $query = "SELECT student_id,name,dept_name,roll_no,email,mobile,student.dept_id FROM student,department where student.dept_id=department.dept_id AND student.student_id=".$stud_id."";
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
    //print_r($response) ;
    return $response;
  }



}
?>
