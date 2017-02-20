<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is to display the list of all the issue given by student
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
$issue=new issueManager();
$news=new newsManager();
$student=new studentManager();
$issue_list=$issue->getIssueByStudent($_SESSION['STUDENT_ID']);

?>

 <section class="sec-dept">
    <div class="container">
      	<div class="row mbt0">
	        <div class="col s12">
	        <!-- **************BOX ONE**************************** -->
	        		 
					  <div class="row">
						   <div class="col s4">
							<a href="add-issue.php" class="waves-effect waves-light btn bntcolor"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Raise your Issues </a>
						   </div>
					   </div>

					   
					   <?php
						$i=0;
						foreach($issue_list as $list){
							$source_id=$list['issue_id'];
							$type="issue";
							$image_list=$news->getImageById($source_id,$type);
							if(count($image_list)>0)
							$image=$image_list[0]['image_path'];
							else
								$image="default_img.jpg";
							?>
		       		      <a href="<?php echo BASE_URL;?>issue-detail.php?issue_id=<?php echo $list['issue_id'];?>"> <div class="md-box">
							<div class="row mc-mbt0">
								 <div class="col s2">
									 <img src="<?php echo ADMIN_BASE_URL;?>img/uploads/<?php echo $image;?>" class="responsive-img" style="height:154px;">
								 </div>
								 
								 <div class="col s10 l10 m10">
									<div class="col l12 s12 m12 mcmtop">
										<h5><?php echo $list['issue_title'];?></h5>
									</div>
									<div class="col l12 s12 m12">
										<p><?php echo $list['issue_desc'];?></p>
									</div>
									<div class="col l12 s12 m12 mc-datetxt">
									<?php echo "Raise on: ".date('d-M-Y',strtotime($list['added_on']));?>
									</div>
								 </div>
						</div>	 
		         </div></a>
						<?php }?>
				
				
				
				
				
	        </div>
        </div>
      </div>
  </section>

  <?php include_once "includes/footer.php" ?>