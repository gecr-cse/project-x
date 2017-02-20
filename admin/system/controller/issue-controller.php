<?php

include_once "../library/application.php";
include_once "../plugins/messages/class.messages.php";
include_once "../plugins/mails/mail.php";
include_once "../manager/issue-manager.php";


$issue_controler=new issueController();
switch($_REQUEST['action'])
{
    case 'deleteIssue':$issue_controler->deleteIssue($_REQUEST["del_issue_id"]);break;


}

class issueController
{
    function __construct()
    {
        $this->msg = new Messages();
        $this->mail = new Mail();
        $this->common = new Common();
        $this->issue=new issueManager();
    }


  function deleteIssue($del_issue){

    $res = $this->issue->delIssue($del_issue);
    if($res)
    {header("Location: ../../views/issues/issues-index.php");}
    else
    {echo "<br>".$_SESSION["error"] = "failed to delete the student";}
  }
}
