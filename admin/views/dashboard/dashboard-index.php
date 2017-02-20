<?php
include_once "../../system/library/application.php";
include_once "../includes/sidebar.php";

  //session_start();
  $app = new Application();
  $app->check_admin_login();

?>
