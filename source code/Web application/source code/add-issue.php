<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is for students to add the feedback of the student
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
include_once "admin/system/library/application.php";
include_once "admin/system/manager/department-manager.php";
include_once "admin/system/manager/issue-manager.php";
include_once "admin/system/manager/student-manager.php";
include_once "includes/header.php";
include_once "admin/system/library/class.messages.php";
$msg=new Messages();
$msg->display('all');
if(!isset($_SESSION['USER_ID'])){
    $msg->add("s","Please login to access the Website...");
    header("Location: ".BASE_URL."login.php");
}
$issue=new issueManager();
$student=new studentManager();
?>
 <section class="sec-dept">
    <div class="container">
      	<div class="row mbt0">
	        <div class="col s12">
	        <!-- **************BOX ONE**************************** -->
		         <div class="md-box">
		       		  <div class="row">
		       		  	<div class="col s12">
			       				<center><h5>Raise your Issues</h5></center>
			       			</div>
						<form action="<?php echo ADMIN_BASE_URL?>system/controller/issue-controller.php?action=addIssue" name="issue_add" method="post" enctype="multipart/form-data">
			       		<div class="col l12 m6 s12 ">

						<input type="hidden" name="student_id" value="<?php echo $_SESSION['STUDENT_ID'];?>"/>
						
						<input type="hidden" name="dept_id" value="<?php echo $_SESSION['DEPT_ID'];?>"/>
						
						<div class="input-field col s12">
					          <input  id="dept" type="text" name="issue_title" class="validate">
					          <label for="dept" class="error">Issue title</label>
					        </div>
					        <div class="input-field col s12">
					          <textarea id="description" name="issue_description" class="materialize-textarea"></textarea>
					          <label for="description" class="error">Issue Description</label>
					        </div>
							<input type="file" name="issue_image[]" multiple>
							
							      <div class="col l12 m12 s12 mt15">
					        		<center><button class="waves-effect waves-light btn bntcolor " type="submit" value="Submit"/>Submit</button></center>
					        	</div>
			       		
						</form>
						</div>
			         </div>	 
		         </div>
	        </div>
        </div>
      </div>
  </section>

  <?php include_once "includes/footer.php" ?>
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
        $("form[name='issue_add']").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                issue_title:{
                    required: true
                },
                issue_description:{
                    required: true
                }

            },
            // Specify validation error messages
            messages: {
                issue_title:{
                    required: "*Please give the title for your issue"
                },
                issue_description:{
                    required: "*Please provide of Description for the issue"
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