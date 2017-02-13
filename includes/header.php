<?php

$department=new departmentManager();
$dept_list=$department->getAllDept();
?>
<ul>
    <?php
    if(!isset($_SESSION['USER_ID'])) {
        ?>
        <li><a href="<?php echo BASE_URL; ?>login.php">Login </a></li>
    <?php
    }
    if(isset($_SESSION['USER_ID'])){
    ?>
    <li><a href="<?php echo ADMIN_BASE_URL;?>system/controller/login-controller.php?action=logout">Logout </a></li>
    <li><a href="<?php echo BASE_URL;?>dept_news.php?dept_id=all">All Dept. News</a></li>
    <?php
        foreach($dept_list as $list){
        ?>
            <li><a href="<?php echo BASE_URL;?>dept_news.php?dept_id=<?php echo $list['dept_id'];?>"> <?php echo $list['dept_name'];?></a></li>
        <?php
        }
    ?>
    <li><a href="<?php echo BASE_URL;?>issues.php">Issues</a></li>
    <li><a href="<?php echo BASE_URL;?>feedback.php">Feedback</a></li>
    <?php }
    ?>
</ul>