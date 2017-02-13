<?php
include_once "../../system/library/application.php";
include_once "../../system/manager/department-manager.php";
include_once "../includes/sidebar.php";
$department=new departmentManager();

?>
--------------------------------Department/Add----------------------------------
<form action="<?php echo ADMIN_BASE_URL;?>system/controller/news-controller.php?action=addNews" method="post" enctype="multipart/form-data">
    <input type="hidden" name="content_manager_id" value="11"/>
    Department Name<br>Select Departement
    <select name="dept_id">
        <?php
        $dept_list=$department->getAllDept();
        foreach($dept_list as $list){
            ?><option value="<?php echo $list['dept_id'];?>" > <?php echo $list['dept_name'];?></option><?php
        }
        ?>
    </select><br>
    News Title<input type="text" name="news_title"/><br>
    News Description<textarea type="text" name="news_description"/></textarea><br>
    Video Url<input type="text" name="video_url"/><br>
    upload image<input type="files" name="images"/><br>
    <br><input type="submit">


</form>