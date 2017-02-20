<?php
include_once "../../system/library/application.php";
include_once "../../system/library/class.messages.php";
include_once "../../system/manager/department-manager.php";
include_once "../../system/manager/news-manager.php";

$msg=new Messages();
$department=new departmentManager();
$news=new newsManager();
?>
--------------------------------News----------------------------------<br>
<?php
$msg->display('all');
?>
<br>


<?php include_once "../includes/navbar.php"; ?>
<div class="row dboard-body">
  <?php include_once "../includes/sidebar.php"; ?>
  <div class="col-lg-10 col-md-9 col-lg-offset-2 col-md-offset-3">
  <h3>  List of News</h3>
  <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Dept Name</th>
                <th>Content Manager</th>
                <th>News title</th>
                <th>news Image</th>
                <th>News Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $news_list=$news->getAllNews();
          $i=0;
          foreach($news_list as $list){
              $i++;
              ?>
              <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $list['dept_name'];?></td>
                  <td><?php echo $list['user_name'];?></td>
                  <td><?php echo $list['news_title'];?></td>
                  <td><?php echo $list['news_desc'];?></td>
                  <td><?php echo "list of images will come here";?></td>
                  <td><a href="<?php echo ADMIN_BASE_URL;?>views/news/news-edit.php?news_id=<?php echo $list['news_id'];?>">Edit</a><br>
                      <a href="<?php echo ADMIN_BASE_URL;?>system/controller/news-controller.php?action=deleteNews&news_id=<?php echo $list['news_id']?>">Delete</a></td>
              </tr>
          <?php
          }
          ?>
        </tbody>
    </table>
  </div>

</div>
<br><a href="news-add.php">Add News</a>
