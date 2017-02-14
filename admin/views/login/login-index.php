<?php
    include_once "../../system/controller/login-controller.php";

    if(isset($_REQUEST["uid"]) && isset($_REQUEST["upass"])){

      $id = $_REQUEST["uid"];
      $pass = $_REQUEST["upass"];
      if (!empty($id) && !empty($pass)) {
        echo "user name: ". $id. "<br> password :" .$pass ."<br>" ;
        vlaidate($id,$pass);
      }
      else {
        echo "User name and password field empty<br>";
      }
    }
    else {

    }

    function vlaidate($id,$pass) {


      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "mycollege";
      //connecting to database
      $conn = new mysqli($servername, $username, $password,$dbname);
      //checking for error
      if ($conn->connect_error) {
        echo "Failed to connect to server<br>";
      }
      //validdating the user name and password

      else{
        echo "Connection succesfull<br>";
        $sql = "SELECT user_name,user_pass FROM user_login";
        if($result = $conn->query($sql))
        {
          echo "query runned;<br>";
        }

        if ($result->num_rows > 0) {

          while ($row = $result->fetch_assoc()) {

           if($id == $row["user_name"]){

             if($pass == $row["user_pass"]){
               echo "Login successfull<br>";
               break;
             }
             else {
               echo "user name and password dosen\'t match<br>";
             }
           }

          }

        }
        else {
          echo "no admin crated yet\n";
        }
      }
    }

?>

<form method="post" action="" >
  User id
  <input  type="text" name="uid"/>
  Password
  <input type="password" name="upass"/>
  <br>
  <input type="submit" value="Submit">
</form>
