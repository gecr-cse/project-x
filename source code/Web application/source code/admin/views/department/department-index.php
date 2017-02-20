<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is displays the list of department added
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
if(!ISSET($_SESSION['USER_ID']) || !ISSET($_SESSION['USER_ROLE']))
	{
		header("Location:".ADMIN_BASE_URL."views/login/login-index.php");
	}
include_once "../../system/library/class.messages.php";
include_once "../../system/manager/department-manager.php";
include_once "../includes/sidebar.php";
include_once "../includes/header.php";
$msg=new Messages();
$department=new departmentManager();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Departments</title>
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
	<div id="main-content">
	 <!-- BEGIN PAGE CONTAINER-->
	 <div class="container-fluid">
		<!-- BEGIN PAGE CONTENT-->
		<div class="row-fluid">
			 <div class="span12">
			 <!-- BEGIN THEME CUSTOMIZER
			   <div id="theme-change" class="hidden-phone">
				   <i class="icon-cogs"></i>
					<span class="settings">
						<span class="text">Theme Color:</span>
						<span class="colors">
							<span class="color-default" data-style="default"></span>
							<span class="color-green" data-style="green"></span>
							<span class="color-gray" data-style="gray"></span>
							<span class="color-purple" data-style="purple"></span>
							<span class="color-red" data-style="red"></span>
						</span>
					</span>
			   </div>
			   <!-- END THEME CUSTOMIZER-->
			  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
			    <h3 class="page-title">
					Departments
			    </h3>
			    <ul class="breadcrumb">
				    <li>
					   <a href="#">Home</a>
					   <span class="divider">/</span>
				    </li>
				    <li>
					   <a href="#">Departments</a>
					   <span class="divider">/</span>
				    </li>
				    <li class="active">
					   Departments List
				    </li>
				    <li class="active">
						<h4><i class="icon-add"></i> -----<a href="department-add.php">Add Department</a> </h4>
					</li>
					<li class="pull-right">
						<?php echo $msg->display(); ?>
					</li>
			   </ul>
			    
			   <!-- END PAGE TITLE & BREADCRUMB-->
				 <!-- BEGIN BLANK PAGE PORTLET-->
				 <div class="widget red">
				 
					 <div class="widget-title">
						<h4><i class="icon-edit"></i> List of Departments </h4>
						<span class="tools">
						   <a href="javascript:;" class="icon-chevron-down"></a>
						   <a href="javascript:;" class="icon-remove"></a>
					   </span>
					 </div>
					 <div class="widget-body">
						 <table class="table table-striped table-bordered" id="sample_1">
							<thead>
								<tr>
									<th>Sl No.</th>
									<th>Dept Name</th>
									<th>Dept image</th>
									<th>Dept Hod details</th>
									<th>Dept Strength</th>
									<th>Dept Staff</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$dept_list=$department->getAllDept();
								$i=0;
								foreach($dept_list as $list){
									$i++;
									?>
									 <tr class="odd gradeX">
										<td><?php echo $i;?></td>
										<td><?php echo $list['dept_name'];?></td>
										<td><a href="<?php echo ADMIN_BASE_URL;?>img/uploads/<?php echo $list['dept_image'];?>" target="_blank"><img src="<?php echo ADMIN_BASE_URL;?>img/uploads/<?php echo $list['dept_image'];?>" style="width:50px;height:50px;"/></td>
										<td>Name:<?php echo $list['dept_hod_name'];?>
										<br>Number:<?php echo $list['dept_hod_no'];?>
										<br>Email:<?php echo $list['dept_hod_email'];?></td>
										<td><?php echo $list['dept_strength'];?></td>
										<td><?php echo $list['dept_staff'];?></td>
										<td><a href="<?php echo ADMIN_BASE_URL;?>views/department/department-edit.php?id=<?php echo $list['dept_id'];?>">Edit</a><br>
										<a href="<?php echo ADMIN_BASE_URL;?>system/controller/department-controller.php?action=deleteDepartment&id=<?php echo $list['dept_id']?>">Delete</a></td>
									</tr>
						<?php }?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- END BLANK PAGE PORTLET-->
			</div>
		</div>
        <!-- END PAGE CONTENT-->
	</div>
     <!-- END PAGE -->  
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



