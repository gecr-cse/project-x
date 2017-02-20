<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the header
 * Created on : <Date of creation>
 * NOTICE:  All information contained herein is, and remains
 * the property of GEC Raipur CS Department. The intellectual and technical concepts contained
 * herein are originated as part Industry Orientation program.
 * Dissemination of this information or reproduction of this material
 * is restricted unless prior written permission is obtained
 * from GEC Raipur CS Department.
 */
-->
<?php

$department=new departmentManager();
$dept_list=$department->getAllDept();
?>
  <html lang="en">
  <html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/materialize.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/colorbox.css" type="text/css">
    <link href="assets/css/owl.theme.css" type="text/css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>GEC Xpress</title>
</head>
  <section class="sec-mycollect">
    <div class="container">
      <div class="row mbt0">
        <div class="col s2">
         <a href="index.php"> <span class="left"><img src="assets/images/web-logo.png" ></span></a>
        </div>
        <div class="col s7">
          <a href="index.php"><center> <h5 class="mc-heading">GEC Xpress</h5></center></a>
        </div>
        <div class="col s3 mc-login">
         <!-- Dropdown Trigger -->
		 <?php
			if(isset($_SESSION['USER_ID'])){
				?><p class="mc-heading"><a  href="<?php echo ADMIN_BASE_URL;?>system/controller/login-controller.php?action=logout">Logout!</a></p><?php 
			}else{
				?><p class="mc-heading"><a  href='login.php' >Login!</a></p><?php 
			}
		 ?>
              <!-- Dropdown Structure -->
           <!--  <ul id='dropdown1' class='dropdown-content'>
              <li><a href="#!">one</a></li>
              <li><a href="#!">two</a></li>
              <li class="divider"></li>
              <li><a href="#!">three</a></li>
            </ul> -->
        </div>
      </div>
    </div>
  </section>
  <?php
	if(isset($_SESSION['USER_ID'])){
  ?>
<nav>
    <div class="nav-wrapper">
      <ul class="left hide-on-med-and-down">
        <li><a href="<?php echo BASE_URL;?>dept_news.php?dept_id=all">All Department</a></li>
    <?php
        foreach($dept_list as $list){
        ?>
            <li><a href="<?php echo BASE_URL;?>dept_news.php?dept_id=<?php echo $list['dept_id'];?>"> <?php echo $list['dept_name'];?></a></li>
        <?php
        }
    ?>
        <li><a href="issues.php">Issues</a></li>
        <li><a href="feedback.php">Feedback</a></li>
      </ul>
    </div>
  </nav>
	<?php }?>