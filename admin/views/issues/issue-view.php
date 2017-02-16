<?php
include_once "../../system/library/application.php";
//include_once "../includes/sidebar.php";

$app = new Application();
$app->check_admin_login();

//echo "string";
$curr_issue= $_REQUEST["issue_id"];
echo $curr_issue;
?>
