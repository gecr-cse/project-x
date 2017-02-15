<?php

include_once "../../system/library/application.php";
include_once "../../system/plugins/messages/class.messages.php";
include_once "../../system/plugins/mails/mail.php";
include_once "../../system/manager/login-manager.php";
include_once "../../system/manager/student-manager.php";


//$goto = "../../views/dashboard/dashboard-index.php";


//$login=new loginController();
$action='';
if(isset($_REQUEST['action'])){
  $action=$_REQUEST['action'];
}
switch($action)
{
    case 'login':{
      loginProcess();
      break;
    }
    //case 'resetPassword':$login->resetPassword();break;
    case 'logout':{
      logoutProcess();
      break;
    }
}
/*
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

}*/


//login process starts here
function loginProcess(){

  if(isset($_SESSION["user_id"]) && isset($_SESSION["user_pass"]))
  {
    //redirect($goto);
    $goto = "../../views/dashboard/dashboard-index.php";
    header("Location:".$goto);
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
        $flag = 0;
        while ($row = $result->fetch_assoc()) {

         if($id == $row["user_name"]){

           if($pass == $row["user_pass"]){
             $flag = 1;
             //creating the session for the user id and password
             $_SESSION["user_id"] = $id;
             $_SESSION["user_pass"] = $pass;
             //jumping to the dashboard page
             $goto = "../../views/dashboard/dashboard-index.php";
             header("Location:".$goto);

             echo "Login successfull<br>";
             echo "session created for current user with <b>\"user name\"</b> as \"<b>".$_SESSION["user_id"] ."</b>\"and <b>\"password\"</b> as \"<b>" .$_SESSION["user_pass"] . "</b>\"";
             break;
           }
         }

         if (flag!=1) {
           $_SESSION["error"] = "User id and passwor don/'t match";
           header("Location:../../views/login/login-index.php");
         }

        }

      }
      else {
        echo "no admin crated yet\n";
      }
    }
  }

  if(isset($_REQUEST["uid"]) && isset($_REQUEST["upass"])){

    $id = $_REQUEST["uid"];
    $pass = $_REQUEST["upass"];
    if (!empty($id) && !empty($pass)) {
      echo "user name: ". $id. "<br> password :" .$pass ."<br>" ;
      validate($id,$pass);
    }
    else {
      $_SESSION["error"] = "User name or pass field empty";
      header("Location:../../views/login/login-index.php");
    }
  }
  else {

  }

}

//logout function starts here
function logoutProcess(){
  $_SESSION["user_id"] = NULL;
  $_SESSION["user_pass"] = NULL;
  header("Location:../../views/login/login-index.php");
}

?>
