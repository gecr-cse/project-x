<?php

include_once "../../system/library/application.php";
include_once "../../system/plugins/messages/class.messages.php";
include_once "../../system/plugins/mails/mail.php";
include_once "../../system/manager/login-manager.php";
include_once "../../system/manager/student-manager.php";
<<<<<<< HEAD
=======

>>>>>>> 78789920bd451b571f18c977fa8939343756a00b


/*
$login=new loginController();
switch($_REQUEST['action'])
{
    case 'login':$login->loginProcess();break;
    case 'resetPassword':$login->resetPassword();break;
    case 'logout':$login->logoutProcess();break;
}

class loginController
{
    function __construct()
    {
        $this->msg = new Messages();
        $this->login = new loginManager();
        $this->mail = new Mail();
        $this->common = new Common();
        $this->student= new studentManager();
    }
<<<<<<< HEAD


}*/

if(isset($_REQUEST["uid"]) && isset($_REQUEST["upass"])){

  $id = $_REQUEST["uid"];
  $pass = $_REQUEST["upass"];
  if (!empty($id) && !empty($pass)) {
    echo "user name: ". $id. "<br> password :" .$pass ."<br>" ;
    validate($id,$pass);
  }
  else {
    echo "User name and password field empty<br>";
  }
}
else {

}

function validate($id,$pass) {


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
           //creating the session for the user id and password
           $_SESSION["user_id"] = $id;
           $_SESSION["user_pass"] = $pass;
           echo "Login successfull<br>";
           echo "session created for current user with <b>\"user name\"</b> as \"<b>".$_SESSION["user_id"] ."</b>\"and <b>\"password\"</b> as \"<b>" .$_SESSION["user_pass"] . "</b>\"";
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
=======
    function loginProcess()
    {

    }
}
>>>>>>> 78789920bd451b571f18c977fa8939343756a00b
