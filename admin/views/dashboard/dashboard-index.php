<?php
include_once "../../system/library/application.php";
include_once "../includes/sidebar.php";

  //session_start();
  if (!isset($_SESSION["user_id"]) && !isset($_SESSION["user_pass"])){
    $_SESSION["error"] = "please login first";
    header("Location: ../login/login-index.php");
  }
  if($_SESSION["user_id"]==NULL && $_SESSION["user_pass"]==NULL){
    $_SESSION["error"] = "please login first";
    header("Location: ../login/login-index.php");
  }
?>
