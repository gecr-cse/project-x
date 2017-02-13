<?php
include_once "../../system/library/application.php";
?>
<form action="<?php echo ADMIN_BASE_URL;?>system/controller/login-controller.php?action=login" method="post">
    email id<input type="text" name="username"/><br>
    Password<input type="password" name="password"/><br>
    <input type="submit">
</form>