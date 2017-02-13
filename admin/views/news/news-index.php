<?php
include_once "../../system/library/application.php";
include_once "../../system/library/class.messages.php";
include_once "../../system/manager/department-manager.php";
include_once "../../system/manager/news-manager.php";
include_once "../includes/sidebar.php";
$msg=new Messages();
$department=new departmentManager();
$news=new newsManager();
?>
--------------------------------News----------------------------------<br>
<?php
$msg->display('all');
?>
<br><a href="news-add.php">Add News</a>

<br>
List of News
<table border="1">
    <thead>
    <tr>
        <th>Sl No.</th>
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
