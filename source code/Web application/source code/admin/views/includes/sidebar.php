<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is displays the side bar the admin panle
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
include_once "../../system/library/application.php";
?>

<!--<ul>
    <li><a href="<?php echo ADMIN_BASE_URL;?>views/dashboard/dashboard-index.php">DASH BOARD</a></li>
    <li><a href="<?php echo ADMIN_BASE_URL;?>views/student/student-index.php">Students</a></li>
    <li><a href="<?php echo ADMIN_BASE_URL;?>views/department/department-index.php">Department</a></li>
    <li><a href="<?php echo ADMIN_BASE_URL;?>views/news/news-index.php">News</a></li>
    <li><a href="<?php echo ADMIN_BASE_URL;?>views/issues/issues-index.php">Issues</a></li>
    <li><a href="<?php echo ADMIN_BASE_URL;?>views/">Feedback</a></li>
</ul>-->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
	<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8" />
		<title>ADMIN - My College</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="../../assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
		<link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href="../../css/style.css" rel="stylesheet" />
		<link href="../../css/style-responsive.css" rel="stylesheet" />
		<link href="../../css/style-default.css" rel="stylesheet" id="style_color" />
		
	</head>
	<!-- END HEAD -->
	<!-- BEGIN BODY -->
	<body class="fixed-top">
	
		<!-- BEGIN CONTAINER -->
		<div id="container" class="row-fluid">
			<!-- BEGIN SIDEBAR -->
			<div class="sidebar-scroll">
				<div id="sidebar" class="nav-collapse collapse">
					
					<!-- BEGIN SIDEBAR MENU -->
					<ul class="sidebar-menu">
						<li class="sub-menu">
							<a class="" href="<?php echo ADMIN_BASE_URL;?>views/dashboard/dashboard-index.php">
								<i class="icon-dashboard"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="sub-menu"><a href="<?php echo ADMIN_BASE_URL;?>views/student/student-index.php">Students</a></li>
						<li class="sub-menu"><a href="<?php echo ADMIN_BASE_URL;?>views/department/department-index.php">Department</a></li>
						<li class="sub-menu"><a href="<?php echo ADMIN_BASE_URL;?>views/news/news-index.php">News</a></li>
						<li class="sub-menu"><a href="<?php echo ADMIN_BASE_URL;?>views/issues/issues-index.php">Issues</a></li>
						<li class="sub-menu"><a href="<?php echo ADMIN_BASE_URL;?>views/feedback/feedback-index.php">Feedback</a></li>
					</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<!-- END SIDEBAR -->
		
	
	<!-- BEGIN FOOTER -->
	<div id="footer">
		2017; PA.
	</div>
	<!-- END FOOTER -->
	
	<!-- BEGIN JAVASCRIPTS -->
	<!-- Load javascripts at bottom, this will reduce page load time -->
	<script src="../../js/jquery-1.8.3.min.js"></script>
	<script src="../../js/jquery.nicescroll.js" type="text/javascript"></script>
	<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- ie8 fixes -->
	<!--[if lt IE 9]>
		<script src="js/excanvas.js"></script>
		<script src="js/respond.js"></script>
	<![endif]-->
	
	<!--common script for all pages-->
	<script src="../../js/common-scripts.js"></script>
	
	<!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>