<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is to reset the password
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
include_once "admin/system/library/class.messages.php";
include_once "admin/system/manager/department-manager.php";
include_once "includes/header.php";
$user_id=$_REQUEST['user_id'];
$msg=new Messages();
$msg->display('all');
?>
    <form action="<?php echo ADMIN_BASE_URL;?>system/controller/login-controller.php?action=resetPassword" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
        Enter password: <input type="password" name="password1"/><br>
        Conform password: <input type="password" name="password2"/><br>
        <input type="submit"/>
    </form>

<?php
include_once "includes/footer.php";
?>