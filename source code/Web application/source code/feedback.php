<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is to display the list of issue given by student
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
include_once "admin/system/manager/feedback-manager.php";
include_once "admin/system/manager/news-manager.php";
include_once "admin/system/manager/student-manager.php";
include_once "includes/header.php";
include_once "admin/system/library/class.messages.php";
$msg=new Messages();
$msg->display('all');
if(!isset($_SESSION['USER_ID'])){
    $msg->add("s","Please login to access the Website...");
    header("Location: ".BASE_URL."login.php");
}
$feedback=new feedbackManager();
$student=new studentManager();
$feedback_list=$feedback->getFeedbackByStudent($_SESSION['STUDENT_ID']);

?><section class="sec-dept">
    <div class="container">
      	<div class="row mbt0">
	        <div class="col s12">
	        <!-- **************BOX ONE**************************** -->
	        		 
			       		 <div class="row">
				       		   <div class="col s12">
				       		   	<a href="add-feedback.php" class="waves-effect waves-light btn bntcolor"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Give your feedback</a>
				       		   </div>
			       		   </div>
					    <?php
						foreach($feedback_list as $list){
						?>
		         	<div class="md-box">
		       		  <div class="row">
			       		  <div class="col l12 s12 m12">
			         		<h5><?php echo $list['feedback_title'];?></h5>
			         	</div>
			       		  <div class="col s12">
			       		  	<p><?php echo $list['feedback_desc'];?></p>
			       		  	<p><?php echo date('d-M-Y',strtotime($list['added_on']));?></p>
			       		  </div>
			         </div>	 
		         </div>
						<?php }?>
	        </div>
        </div>
      </div>
  </section>

  <?php include_once "includes/footer.php" ?>