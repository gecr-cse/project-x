<?php
include_once "../../system/library/application.php";
<<<<<<< HEAD
=======
include_once "dboard-css-files.php";
>>>>>>> dd5b1b66cd60425df60c557a3e45d687acd82935
//echo ADMIN_BASE_URL;
?>
<link rel="stylesheet" type="text/css" href="../../assets/css/dboard-style.css">

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 dboard-header"></div>
<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 dboard-sidebar">
	<ul>
	    <li><a href="<?php echo ADMIN_BASE_URL;?>views/dashboard/dashboard-index.php">DASH BOARD</a></li>
	    <li><a href="<?php echo ADMIN_BASE_URL;?>views/student/student-index.php">Students</a></li>
	    <li><a href="<?php echo ADMIN_BASE_URL;?>views/department/department-index.php">Department</a></li>
	    <li><a href="<?php echo ADMIN_BASE_URL;?>views/news/news-index.php">News</a></li>
	    <li><a href="<?php echo ADMIN_BASE_URL;?>views/issues/issues-index.php">Issues</a></li>
	    <li><a href="<?php echo ADMIN_BASE_URL;?>views/feedback/feedback-index.php">Feedback</a></li>
	    <li><a href="../../system/controller/login-controller.php?action=logout">logout</a></li>
	</ul>	
</div>


