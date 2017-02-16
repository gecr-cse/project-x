<?php
include_once "../../system/library/application.php";
//echo ADMIN_BASE_URL;
?>

<ul>
    <li><a href="<?php echo ADMIN_BASE_URL;?>views/dashboard/dashboard-index.php">DASH BOARD</a></li>
    <li><a href="<?php echo ADMIN_BASE_URL;?>views/student/student-index.php">Students</a></li>
    <li><a href="<?php echo ADMIN_BASE_URL;?>views/department/department-index.php">Department</a></li>
    <li><a href="<?php echo ADMIN_BASE_URL;?>views/news/news-index.php">News</a></li>
    <li><a href="<?php echo ADMIN_BASE_URL;?>views/issues/issues-index.php">Issues</a></li>
    <li><a href="<?php echo ADMIN_BASE_URL;?>views/feedback/feedback-index.php">Feedback</a></li>
    <li><a href="../../system/controller/login-controller.php?action=logout">logout</a></li>

</ul>
