<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is displays the header of the admin panel
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
<!DOCTYPE html>
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title></title>
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
<!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               
               <!-- BEGIN LOGO -->
               <a class="brand" href="">
                   <img src="../../img/150x50.png" alt="Metro Lab" />
               </a>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
			  
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="../../img/avatar1_small.jpg" alt="">
                               <span class="username">ADMIN</span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="<?php echo ADMIN_BASE_URL; ?>system/controller/login-controller.php?action=logout"><i class="icon-key"></i> Log Out</a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
                </div>
			</div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>

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