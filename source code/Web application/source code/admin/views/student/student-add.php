<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is to add student to the list
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
include_once "../../system/manager/department-manager.php";
include_once "../includes/sidebar.php";
include_once "../includes/header.php";
$department=new departmentManager();
?>
<!---------------------------------student---------------------------------
<br>
<a href="student-add.php">Add new Student</a>-->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Students</title>
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
					Students
			    </h3>
			    <ul class="breadcrumb">
				    <li>
					   <a href="#">Home</a>
					   <span class="divider">/</span>
				    </li>
				    <li>
					   <a href="#">Students</a>
					   <span class="divider">/</span>
				    </li>
				    <li class="active">
					   Student ADD
				    </li>
				     <!-- <li class="active">
						<h4><i class="icon-add"></i> -----<a href="student-add.php">Add new Student</a> </h4>
					</li>-->
			   </ul>
			    
			   <!-- END PAGE TITLE & BREADCRUMB-->
				<!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-plus"></i> Student Info ADD. </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
							<form action="<?php echo ADMIN_BASE_URL; ?>system/controller/student-controller.php?action=addStudent" class="form-horizontal validator" method="post" name="student_add">
								<div class="control-group">
									<label class="control-label">Departement</label>
									<div class="controls">
										<select name="dept_id"  required data-placeholder="Select Departement" class="chzn-select-deselect span6" tabindex="-1" id="selCSI">
											<option value=""></option>
											<?php
											$dept_list=$department->getAllDept();
											foreach($dept_list as $list){
												?><option value="<?php echo $list['dept_id'];?>" > <?php echo $list['dept_name'];?></option><?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Student Name</label>
									<div class="controls">
										<input type="text" class="span6  tooltips"  required data-trigger="hover" data-original-title="Students Name." value="" name="name"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Student Role Number</label>
									<div class="controls">
										<input type="text" class="span6  tooltips"  required data-trigger="hover" data-original-title="Student Role Number." value="" name="role_no"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Student Mobile Number</label>
									<div class="controls">
										<input type="text" class="span6  tooltips"  required data-trigger="hover" data-original-title="Student Mobile Number." value="" name="mobile"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Student Email</label>
									<div class="controls">
										<input type="email" class="span6  tooltips"  required data-trigger="hover" data-original-title="Student Email." value="" name="email"/>
									</div>
								</div>
								
								

								<!--<div class="control-group">
									<label class="control-label">Textarea</label>
									<div class="controls">
										<textarea class="span6 " rows="3"></textarea>
									</div>
								</div>-->
								<div class="form-actions">
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
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
   <script src="../../js/jquery.validate.min.js" type="text/javascript"></script>
   <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
    <script type="text/javascript">
        $(function() {
            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
            }, "Letters only please");

            jQuery.validator.addMethod("numbersonly", function(value, element) {
                return this.optional(element) || /^[0-9]/i.test(value);
            }, "Letters only please");
            // Initialize form validation on the registration form.
            // It has the name attribute "registration"
            $("form[name='student_add']").validate({
                // Specify validation rules
                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                    dept_id:"required",
                    name:{
                        required: true,
                        lettersonly: true
                    },
                    role_no:"required",
                    mobile:{
                        required: true,
                        numbersonly: true,
                        minlength:10,
                        maxlength:10
                    },
                    email: {
                        required: true,
                        // Specify that email should be validated
                        // by the built-in "email" rule
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    }
                },
                // Specify validation error messages
                messages: {
                    dept_id:"*Please select the Department first",
                    name: {
                        required: "*Please provide Name of the student",
                        lettersonly: "*Only Alphabets are accepted"
                    },
                    role_no:"*Role number is a required filed",
                    mobile: {
                        required: "*Please provide the mobile number of the student",
                        numbersonly: "*Only Numbers are accepted",
                        minlength:"*Mobile number should be 10 digit",
                        maxlength:"*Mobile number should be 10 digit"
                    },
                    email: "*Please enter a valid email address"
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
   <!--common script for all pages-->
   <script src="../../js/common-scripts.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>


