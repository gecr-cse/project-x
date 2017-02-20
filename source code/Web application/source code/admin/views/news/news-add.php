<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is add the news according to the department
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
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>News</title>
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
					News
			    </h3>
			    <ul class="breadcrumb">
				    <li>
					   <a href="#">Home</a>
					   <span class="divider">/</span>
				    </li>
				    <li>
					   <a href="#">News</a>
					   <span class="divider">/</span>
				    </li>
				    <li class="active">
					   News Add
				    </li>
				     <!-- <li class="active">
						<h4><i class="icon-add"></i> -----<a href="student-add.php">Add new Student</a> </h4>
					</li>-->
			   </ul>
			    
			   <!-- END PAGE TITLE & BREADCRUMB-->
				<!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-edit"></i> News Info Edit. </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
							<form action="<?php echo ADMIN_BASE_URL; ?>system/controller/news-controller.php?action=addNews" class="form-horizontal" name="news_add" method="post" enctype="multipart/form-data">
								<input type="hidden" name="news_id" value="<?php echo $news_details[0]['news_id'];?>"/>
								<div class="control-group">
									<label class="control-label">Departement</label>
									<div class="controls">
										<select name="dept_id" data-placeholder="Select Departement" class="chzn-select-deselect span6" tabindex="-1" id="selCSI">
											<?php
											$dept_list=$department->getAllDept();
											foreach($dept_list as $list){
												?><option value="<?php echo $list['dept_id'];?>" > <?php echo $list['dept_name'];?></option><?php
											}
											?>
										</select>
									</div>
								</div>
								<input type="hidden" name="content_manager_id" value="2"/>
								<div class="control-group">
									<label class="control-label">News Title</label>
									<div class="controls">
										<input type="text" class="span6  tooltips" data-trigger="hover"  required data-original-title="News Title." value="" name="news_title"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">News Description</label>
									<div class="controls">
										<textarea class="span6 "value=""  required name="news_description" rows="3"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Video Url</label>
									<div class="controls">
										<input type="text" class="span6  tooltips" data-trigger="hover"  required data-original-title="Video Url." value="" name="video_url"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">upload image</label>
									<div class="controls">
										<input type="file" id="image"   name="images[]" max-uploads=2 multiple  accept="image/jpg, image/jpeg"  required/>
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
            $("form[name='news_add']").validate({
                // Specify validation rules
                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                    dept_id:{
                        required: true
                    },
                    news_title:{
                        required: true
                    },
                    news_description:{
                        required: true
                    },
                    image:"required"

                },
                // Specify validation error messages
                messages: {
                    dept_id:{
                        required: "*Please Select the Department first"
                    },
                    news_title:{
                        required: "*Please Enter News title"
                    },
                    news_description:{
                        required: "*Please Enter News Description"
                    },
                    image:"Image is a mandatory filed"
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
    <script>
        $("#image").on("change", function() {
            if($("#image")[0].files.length > 2); {
                alert("You can select only 2 images");
            } else {
                $("#imageUploadForm").submit();
            }
        });
    </script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>


