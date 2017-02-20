<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is to display detail of the news
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
$news=new newsManager();
 $news_id=$_REQUEST['news_id'];
 $news_details=$news->getNewsDetailById($news_id)
?>
 <section class="sec-dept">
    <div class="container">
      	<div class="row mbt0">
	        <div class="col s12">
	        <!-- **************BOX ONE**************************** -->
			
		         <div class="md-box">
					<div class="row mc-mbt0">
						<div class="col s12 l12 m12">
							<div class="col l12 s12 m12 mcmtop">
								<h5><?php echo $news_details[0]['news_title']?></h5>
							</div>
							<div class="col l12 s12 m12">
								<p><?php echo $news_details[0]['news_desc']?></p>
							</div>
							<div class="col l6 s6 m6"><?php echo "Dept: ".$news_details[0]['dept_name'];?></div>
							<div class="col l6 s6 m6 mc-datetxt"><?php echo "Dt: ".date('d-M-Y',strtotime($news_details[0]['added_on']));?></div>
							<div class="col l12 m12 s12 mcmtop">
                                <?php
                                $source_id=$news_details[0]['news_id'];
                                $type="news";
                                $image_list=$news->getImageById($source_id,$type);
                                foreach($image_list as $i_list){
                                    ?>

                                    <div class="col l2 m2 s2" style="max-height:200px;">
                                        <p><a class="group1" href="<?php echo ADMIN_BASE_URL;?>img/uploads/<?php echo $i_list['image_path'];?>" title="img0"><img style="max-height:200px;" src="<?php echo ADMIN_BASE_URL;?>img/uploads/<?php echo $i_list['image_path'];?>" class="responsive-img" ></a></p>
                                    </div>
                                <?php
                                }
                                ?>


							</div>
							<div class="col l12 m12 s12 mcmtop">
                            <?php
                            $video_link=$news_details[0]['video'];
                            $str=explode("=",$video_link);
                            $youtube_id=$str[1];

                            ?>
							<p><b>Youtube Link:-</b><br>
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_id;?>" frameborder="0" allowfullscreen></iframe>
                            </p>
						 </div>
						 </div>
			         </div>	 
		         </div>
	
		          <!-- **************BOX TWO**************************** -->
		         
	        </div>
        </div>
      </div>
  </section>

  <?php include_once "includes/footer.php" ?>