<?php
include_once "../../system/library/application.php";
include_once "../../system/plugins/messages/class.messages.php";
include_once "../../system/plugins/mails/mail.php";
include_once "../../system/manager/login-manager.php";
include_once "../../system/manager/student-manager.php";


//$goto = "../../views/dashboard/dashboard-index.php";

//$appliaction_object = new Application();

$login_controller=new loginController();
echo "this is after constructor";

$action='';
if(isset($_REQUEST['action'])){
  $action=$_REQUEST['action'];
}
//$login_controller=new loginController();
switch($action)
{
    case 'login':{
      $login_controller->loginProcess();
      //loginProcess();
      break;
    }

    //case 'resetPassword':$login->resetPassword();break;
    case 'logout':{
      $login_controller->logoutProcess();
      //logoutProcess();
      break;
    }

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

//login process starts here
function loginProcess(){

  if(isset($_REQUEST["uid"]) && isset($_REQUEST["upass"])){
    echo "this is running";
    $id = $_REQUEST["uid"];
    $pass = $_REQUEST["upass"];
    if (!empty($id) && !empty($pass)) {
      echo "user name: ". $id. "<br> password :" .$pass ."<br>" ;

      $this->validate($id,$pass);
    }
    else {
      $_SESSION["error"] = "User name or pass field empty";
      header("Location:../../views/login/login-index.php");
    }
  }
  else {
  }
}
//validation function to validate admin login
function validate($id,$pass) {
  //validdating the user name and password
    $sql = "SELECT user_name,user_pass FROM user_login";
    //running th query to get list of all the users
    $result = $this->login->run_select_Query($sql);
    //echo "showing<br>";
    //print_r($result);
    $flag = 0;

    foreach ($result as $key) {
      //echo $key['user_name'];
        //echo "<br>".$pass." ".$key['user_pass'] ;
      if($id==$key['user_name']){
        if($pass==$key['user_pass']){
          //echo "inside<br>".$id . " " .$key['user_name'];
          $_SESSION["user_id"] = $id;
          $_SESSION["user_pass"] = $pass;
          $flag=1;
          header("Location:../../views/dashboard/dashboard-index.php");
        }
        
      }
    }
    if ($flag!=1) {
      $_SESSION["error"] = "User id and passwor don/'t match";
      header("Location:../../views/login/login-index.php");
    }
}

//logout function starts here
function logoutProcess(){
  $_SESSION["user_id"] = NULL;
  $_SESSION["user_pass"] = NULL;
  header("Location:../../views/login/login-index.php");
}
}
?>
