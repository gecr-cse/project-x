<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is used to add the department
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
include_once "../includes/sidebar.php";
include_once "../includes/header.php";
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
			    <h3 class="page-title">
					Department
			    </h3>
			    <ul class="breadcrumb">
				    <li>
					   <a href="#">Home</a>
					   <span class="divider">/</span>
				    </li>
				    <li>
					   <a href="#">Department</a>
					   <span class="divider">/</span>
				    </li>
				    <li class="active">
					   Department ADD
				    </li>
				     <!-- <li class="active">
						<h4><i class="icon-add"></i> -----<a href="student-add.php">Add new Student</a> </h4>
					</li>-->
			   </ul>
			    
			   <!-- END PAGE TITLE & BREADCRUMB-->
				<!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-edit"></i> Department Info ADD. </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
							<form action="<?php echo ADMIN_BASE_URL;?>system/controller/department-controller.php?action=addDepartment" name="dept_add" class="form-horizontal" method="post" enctype="multipart/form-data">
								
								<div class="control-group">
									<label class="control-label">Department Name</label>
									<div class="controls">
										<input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Students Name." required value="" name="dept_name"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Upload Dept image</label>
									<div class="controls">
            <input type="file" name="image" class="span6  tooltips" data-trigger="hover" data-original-title="Upload Dept image." required/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Department HOD Name</label>
									<div class="controls">
										<input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Department HOD Name."  required value="" name="dept_hod_name"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Department HOD Number</label>
									<div class="controls">
										<input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Department HOD Number."  required value="" name="dept_hod_no"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Department HOD email</label>
									<div class="controls">
										<input type="text" class="span6  tooltips" data-trigger="hover"  required data-original-title="Department HOD email." value="" name="dept_hod_email"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Department Strength</label>
									<div class="controls">
										<input type="text" class="span6  tooltips" data-trigger="hover"  required data-original-title="Department Strength." value="" name="dept_hod_strength"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Department Staff</label>
									<div class="controls">
										<input type="text" class="span6  tooltips" data-trigger="hover"  required data-original-title="Department Staff." value="" name="dept_hod_staff"/>
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
   <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="../../js/jquery.validate.min.js" type="text/javascript"></script>
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
            $("form[name='dept_add']").validate({
                // Specify validation rules
                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                    dept_name:{
                        required: true,
                        lettersonly: true
                    },
                    image:"required",
                    dept_hod_name:{
                        required: true,
                        lettersonly: true
                    },
                    dept_hod_no:{
                        required: true,
                        numbersonly: true,
                        minlength:10,
                        maxlength:10
                    },
                    dept_hod_email: {
                        required: true,
                        email: true
                    },
                    dept_hod_strength: {
                        numbersonly: true
                    },
                    dept_hod_staff: {
                        numbersonly: true
                    }

                },
                // Specify validation error messages
                messages: {
                    dept_name:{
                        required: "*Please provide Name of the student",
                        lettersonly: "*Only Alphabets are accepted"
                    },
                    image:"Department is a mandatory filed",
                    dept_hod_name:{
                        required: "*Please provide Name of the student",
                        lettersonly: "*Only Alphabets are accepted"
                    },
                    dept_hod_no:{
                        required: "*Please provide the mobile number of the student",
                        numbersonly: "*Only Numbers are accepted",
                        minlength:"*Mobile number should be 10 digit",
                        maxlength:"*Mobile number should be 10 digit"
                    },
                    dept_hod_email:{
                        required:"HOD email is a mandatory fild",
                        email:"please enter a valid email id"
                    },
                    dept_hod_strength:{
                        required: "*Please provide the Department Student Strength",
                        numbersonly: "*Only Numbers are accepted"
                    },
                    dept_hod_staff:{
                        required: "*Please provide the Department staff name saperated by ,"
                    }

                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
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


