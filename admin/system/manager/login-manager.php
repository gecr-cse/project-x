<?php
class loginManager extends Application{

/*
function fun(){
  echo "this is working";
}*/
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

function run_select_Query($query)
{
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

  return $response;
}

}
?>
