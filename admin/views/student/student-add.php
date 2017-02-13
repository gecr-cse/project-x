<?php
include_once "../../system/library/application.php";
include_once "../../system/manager/department-manager.php";
include_once "../includes/sidebar.php";
$department=new departmentManager();
?>
----------------------------student/add new student-------------------------------------

<form action="<?php echo ADMIN_BASE_URL; ?>system/controller/student-controller.php?action=addStudent" method="post">
    <br>Select Departement
    <select name="dept_id">
    <?php
    $dept_list=$department->getAllDept();
    foreach($dept_list as $list){
        ?><option value="<?php echo $list['dept_id'];?>" > <?php echo $list['dept_name'];?></option><?php
    }
    ?>
    </select>
<br>Student Name<input type="text" name="name"/>
<br>Student Role Number<input type="text" name="role_no"/>
<br>Student Mobile Number<input type="text" name="mobile"/>
<br>Student Email<input type="text" name="email"/>
<br><input type="submit"/>

</form>