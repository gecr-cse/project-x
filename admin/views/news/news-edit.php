<?php
include_once "../../system/library/application.php";
include_once "../../system/manager/department-manager.php";
include_once "../../system/manager/news-manager.php";
include_once "../includes/sidebar.php";
$department=new departmentManager();
$news=new newsManager();
$news_id=$_REQUEST['news_id'];
$news_details=$news->getNewsDetailById($news_id);
?>
--------------------------------News/Edit----------------------------------
<form action="<?php echo ADMIN_BASE_URL;?>system/controller/news-controller.php?action=editNews" method="post" enctype="multipart/form-data">
    <input type="hidden" name="news_id" value="<?php echo $news_details[0]['news_id'];?>"/>
    Department Name<br>Select Departement
    <select name="dept_id">
        <?php
        $dept_list=$department->getAllDept();
        foreach($dept_list as $list){
            ?><option value="<?php echo $list['dept_id'];?>" > <?php echo $list['dept_name'];?></option><?php
        }
        ?>
    </select><br>
    Content_manager
    <select name="content_manager_id">
        <option value="1">subbu</option>
        <option value="2">vinu</option>
        <option value="3">sunil</option>
    </select><br>

    News Title<input type="text" value="<?php echo $news_details[0]['news_title'];?>" name="news_title"/><br>
    News Description<textarea type="text" name="news_description"/> <?php echo $news_details[0]['news_desc'];?> </textarea><br>
    Video Url<input type="text"  value="<?php echo $news_details[0]['video'];?>" name="video_url"/><br>
    upload image<input type="files" name="images"/><br>
    <br><input type="submit">
</form>