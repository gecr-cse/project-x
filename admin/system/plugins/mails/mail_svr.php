<?php
include_once "../library/application.php";
include_once "../library/class.messages.php";
include_once "../library/mail.php";
include_once "../library/groups.php";


$objGroup = new groupsSvr();
$feature = $_REQUEST['feature'];
switch ($feature) {
    case 'sendGroup': $objGroup->sendGroup();   break;
}

class groupsSvr {

    function __construct() {
        $this->msg = new Messages();
        $this->mail = new Mail();
        $this->grp = new Groups();
    }
    
    function sendGroup(){
        $groupId=$_REQUEST['groups_id'];
        $subject=$_REQUEST['subject'];
        $body=  addslashes($_REQUEST['bodyMail']);
        if($groupId!="reg"){
            $groupMembers=$this->mail->getGroupMembers($groupId);
            foreach($groupMembers as $members){
                $to['name']=$members['name'];
                $to['email']=$members['email'];
                $body="<h2>Dear ".$members['name'].",</h2> <br/>".$body;
                $result=$this->mail->sendMail($to,$subject,stripcslashes($body));
                //echo  $to['email']=$members['email']."---".$result;
            }
            $this->msg->add('s', "Mail Sent.");
             header("Location:" . ADMIN_BASE_URL . "mail/index.php");
        }else{
            $this->sendRegGroup();
        }
        
    }
    
    function sendRegGroup(){
        echo "HI THIS IS FROM REG GRP";
        exit;
        $subject=$_REQUEST['subject'];
        $body=  addslashes($_REQUEST['bodyMail']);
        $regList=$this->grp->getRegisteredGroup();
         foreach($regList as $members){
                $to['name']=$members['name'];
                $to['email']=$members['email'];
                $body="<h2>Dear ".$members['name'].",</h2> <br/>".$body;
                $result=$this->mail->sendMail($to,$subject,stripcslashes($body));
            }
            $this->msg->add('s', "Mail Sent to registered members.");
             header("Location:" . ADMIN_BASE_URL . "mail/index.php");
    }
}
?>
