<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is to display the news of all departments and individual students
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
include_once "admin/system/manager/news-manager.php";
include_once "includes/header.php";
include_once "admin/system/library/class.messages.php";
$msg=new Messages();
$msg->display('all');
if(!isset($_SESSION['USER_ID'])){
    $msg->add("s","Please login to access the Website...");
    header("Location: ".BASE_URL."login.php");
}
$news=new newsManager();
$dept_id='';
if(isset($_REQUEST['dept_id'])){
    $dept_id=$_REQUEST['dept_id'];
}
if(!isset($_REQUEST['dept_id']) || $dept_id=="all"){
$news_list=$news->getAllNews();
}else{
$news_list=$news->getNewsListByDeptId($dept_id);
}
?>
 <section class="sec-dept">
    <div class="container">
      	<div class="row mbt0">
	        <div class="col s12">
	        <!-- **************BOX ONE**************************** -->
			<?php
				$i=0;
				foreach($news_list as $list){
				$i++;
				
                $source_id=$list['news_id'];
                $type="news";
                $image_list=$news->getImageById($source_id,$type);
				if(count($image_list)>0)
				$image=$image_list[0]['image_path'];
				else
					$image="default_img.jpg";
			?>
                 <a href="<?php echo BASE_URL;?>newsdetail.php?news_id=<?php echo $list['news_id'];?>">
		         <div class="md-box">
		         <div class="row mc-mbt0">
			         <div class="col s2">
			         	 <img src="<?php echo ADMIN_BASE_URL;?>img/uploads/<?php echo $image;?>" class="responsive-img" style="height:155px;">
			         </div>
			         <div class="col s10 l10 m10  ">
			         	<div class="col l12 s12 m12 mcmtop">
			         		<h5><?php echo $list['news_title'];?></h5>
			         	</div>
			         	<div class="col l12 s12 m12">
			         		<p><?php echo $list['news_desc'];?></p>
			         	</div>
						<div class="col l6 s6 m6"><?php echo "Dept: ".$list['dept_name'];?></div>
						<div class="col l6 s6 m6 mc-datetxt"><?php echo "Dt: ".date('d-M-Y',strtotime($list['added_on']));?></div>
			         </div>
			         </div>	 
		         </div></a>
	<?php }?>
		          <!-- **************BOX TWO**************************** -->
		         
	        </div>
        </div>
      </div>
  </section>

  <?php include_once "includes/footer.php" ?>