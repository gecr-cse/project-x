<?php
include_once "../../system/library/application.php";
include_once "../../system/manager/issue-manager.php";
//include_once "../includes/sidebar.php";

$app = new Application();
$app->check_admin_login();
if(isset($_REQUEST["issue_id"])&&!empty($_REQUEST["issue_id"])){
$curr_issue= $_REQUEST["issue_id"];
}
else {
  die("Index value not provided");
}
$issue = new issueManager();
$curr_issue = $issue->get_issue_by_id($curr_issue);

?>

<div style="position:absolute;top:20%;left:20%">
  Issue Title <input type="text" value=<?php echo $curr_issue["0"]["issue_title"];?>/><br>
  Issue Description <input type="text" value=<?php echo $curr_issue["0"]["issue_desc"];?>/><br>
  Status<input type="text" vlaue=<?php echo $curr_issue["0"]["issue_status"];?>/><Br>
  Added on<input type="text" value=<?php echo $curr_issue["0"]["added_on"];?>/><br>
  depratment<input type="text" value=<?php echo $curr_issue["0"]["dept_name"];?>/><br>
</div>
