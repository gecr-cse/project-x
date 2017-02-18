<?php
include_once "../../system/library/application.php";
include_once "../../system/manager/student-manager.php";
$student=new studentManager();
?>
<br>
<a href="student-add.php">Add new Student</a>

<?php include_once "../includes/navbar.php"; ?>
<div class="row dboard-body">
  <?php include_once "../includes/sidebar.php"; ?>
  <div class="col-lg-10 col-md-9 col-lg-offset-2 col-md-offset-3">
  <h3>List of Students</h3>
  <br>
    <table class="table table-striped">
        <thead>
            <tr>
              <th>S.No.</th>
              <th>Dept Name</th>
              <th>Student name</th>
              <th>role no</th>
              <th>Email/mobile</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          //getting name ,roll_no,department name,email and mobile no form database
          $dept_list=$student->getAllStudent();

          $i=0;
          foreach($dept_list as $list){
              $i++;
              ?>
              <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $list['dept_name'];?></td>
                  <td><?php echo $list['name'];?></td>
                  <td>Name:<?php echo $list['roll_no'];?></td>
                  <td><?php echo $list['email'].' / '.$list['mobile'];?></td>
                  <td>
                    <a href="<?php echo ADMIN_BASE_URL;?>views/student/student-edit.php?student_id=<?php echo $list['student_id'];?>">Edit
                    </a><br>
                    <a href="<?php echo ADMIN_BASE_URL;?>system/controller/student-controller.php?action=deleteStudent&student_id=<?php echo $list['student_id']?>">Delete
                    </a>
                  </td>
              </tr>
          <?php
          }
          ?>
        </tbody>
    </table>
  </div>
</div>
