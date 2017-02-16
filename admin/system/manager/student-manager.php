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
  echo $query = "SELECT student_id,name,roll_no,dept_name,email,mobile FROM student,department where student.dept_id=department.dept_id";
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

  function update_student($data)
  {
    print_r($data);
    $query = sprintf("UPDATE student SET name = '%s',roll_no = '%s',mobile = '%s',email = '%s',dept_id = '%s' WHERE student_id='%s'",
      $data['name'],$data['roll'],$data['mobile'],$data['email'],$data['dept'],$data['id']);
      echo "<br>".$query;
      if($result = mysqli_query($this->conn,$query))
      {
        //echo "database updated";
        //$_SESSION["error"] ="sussecful";
        header("Location: ../../views/student/student-index.php");

      }
      else
      {
        //echo "failed";
        $_SESSION["error"] = "failed to uodate the student";
        header("Location: ../../views/student/student-index.php");
      }
  }

  function add_student($data){
    print_r($data);
    $query = sprintf("INSERT INTO student (name,roll_no,mobile,email,dept_id) values('%s','%s','%s','%s','%s')",
      $data['name'],$data['roll'],$data['mobile'],$data['email'],$data['dept']);
      //echo "<br>".$query;

      if($result = mysqli_query($this->conn,$query))
      {
        //echo "database updated";
        //$_SESSION["error"] ="sussecful";
        header("Location: ../../views/student/student-index.php");

      }
      else
      {
        //echo "failed";
        $_SESSION["error"] = "failed to add the student";
        header("Location: ../../views/student/student-index.php");
      }
  }

  function delete_student($del_id)
  {
    $query = sprintf("DELETE FROM student where student_id=%s",$del_id);
    echo $query;
    if($result = mysqli_query($this->conn,$query))
    {
      //echo "database updated";
      //$_SESSION["error"] ="sussecful";
      header("Location: ../../views/student/student-index.php");

    }
    else
    {
      //echo "failed";
      echo "<br>".$_SESSION["error"] = "failed to add the student";
      //header("Location: ../../views/student/student-index.php");
    }
  }

}
?>
