<?php
include_once "../../system/library/application.php";
include_once "../../system/manager/department-manager.php";
include_once "../../system/manager/student-manager.php";
include_once "../includes/sidebar.php";
$department=new departmentManager();
$student=new studentManager();
//echo "students id is : ".$_REQUEST['student_id'];
$student_id=$_REQUEST['student_id'];
$student_det=$student->getStudentById($student_id);
?>
----------------------------student/add new student-------------------------------------

<form action="../../system/controller/student-controller.php?action=editStudent" method="post">
    <input type="hidden" name="student_id" value="<?php echo $student_det[0]['student_id'];?>"/>
    <br>Select Departement
    <?php
    // getting distinct names of all the departments
    //$dept_list=$department->getAllDept();?>
    <select name="dept_id">
        <?php
        $dept_list=$department->getAllDept();
        foreach($dept_list as $list){
            ?><option
            value="<?php echo $list['dept_id'];?>"
            <?php
            //to automaticaly set current students department
              if($list['dept_name']==$student_det[0]['dept_name'])
              {
                echo htmlentities("selected = 'selected'");
              }
            ?>>
            <?php echo $list['dept_name'];?>
          </option><?php
        }
        ?>
    </select>
    <br>Student Name<input type="text" value="<?php echo $student_det[0]['name'];?>" name="name"/>
    <br>Student Role Number<input type="text" value="<?php echo $student_det[0]['roll_no'];?>" name="role_no"/>
    <br>Student Mobile Number<input type="text" value="<?php echo $student_det[0]['mobile'];?>" name="mobile"/>
    <br>Student Email<input type="text" value="<?php echo $student_det[0]['email'];?>" name="email"/>
    <br><input type="submit"/>

</form>
