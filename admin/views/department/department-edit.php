<?php
include_once "../../system/library/application.php";
include_once "../includes/sidebar.php";
include_once "../../system/manager/department-manager.php";
$dept_id=$_REQUEST['id'];
$department=new departmentManager();
$detp_details=$department->getDeptDetailsByDeptId($dept_id);
?>
--------------------------------Department/Add----------------------------------
<form action="<?php echo ADMIN_BASE_URL;?>system/controller/department-controller.php?action=updateDepartment" method="post" enctype="multipart/form-data">
    <input type="hidden" name="dept_id" value="<?php echo $detp_details[0]['dept_id'];?>"/>
    Department Name<input type="text"  name="dept_name" value="<?php echo $detp_details[0]['dept_name'];?>" /><br>
    Upload Dept image<input type="file" name="dept_name"/><br>
    Department HOD Name<input type="text" value="<?php echo $detp_details[0]['dept_hod_name'];?>"  name="dept_hod_name"/><br>
    Department HOD Number<input type="text" value="<?php echo $detp_details[0]['dept_hod_no'];?>"  name="dept_hod_no"/><br>
    Department HOD email<input type="text" value="<?php echo $detp_details[0]['dept_hod_email'];?>"  name="dept_hod_email"/><br>
    Department Strength<input type="text" value="<?php echo $detp_details[0]['dept_strength'];?>"  name="dept_hod_strength"/><br>
    Department Staff<input type="text" value="<?php echo $detp_details[0]['dept_staff'];?>"  name="dept_hod_staff"/><br>
    <br><input type="submit">
</form>