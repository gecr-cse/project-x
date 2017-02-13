<?php
include_once "../../system/library/application.php";
include_once "../includes/sidebar.php";

?>
--------------------------------Department/Add----------------------------------
<form action="<?php echo ADMIN_BASE_URL;?>system/controller/department-controller.php?action=addDepartment" method="post" enctype="multipart/form-data">
    Department Name<input type="text" name="dept_name"/><br>
    Upload Dept image<input type="file" name="dept_name"/><br>
    Department HOD Name<input type="text" name="dept_hod_name"/><br>
    Department HOD Number<input type="text" name="dept_hod_no"/><br>
    Department HOD email<input type="text" name="dept_hod_email"/><br>
    Department Strength<input type="text" name="dept_hod_strength"/><br>
    Department Staff<input type="text" name="dept_hod_staff"/><br>
    <br><input type="submit">


</form>