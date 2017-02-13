<?php
// Related class file included here.
include_once "../../library/application.php";
include_once "mail1.php";
$objEventsSvr = new EmailTester();
$objEventsSvr->testing123();
class EmailTester{
	function __construct() {
	$this->mail = new Mail();	
		
		
	}
	function testing123(){
		$subject="This is the subject";
		$body="This is the body";
		$to['email']="cnsubbuk143@gmail.com";
		$to['name']="Subramanya C N";
		echo "The result is ".$this->mail->sendMail($to,$subject,$body);
	}
}

?>