<?php
include_once "../../system/library/application.php";
include_once "../../system/library/class.messages.php";
include_once "../../system/manager/department-manager.php";
$msg=new Messages();
$department=new departmentManager();
?>

<?php
$msg->display('all');

?>
  <?php include_once "../includes/navbar.php"; ?>
  <div class="row dboard-body">
    <?php include_once "../includes/sidebar.php"; ?>
    <div class="col-lg-10 col-md-9 col-lg-offset-2 col-md-offset-3">
    <br><a href="department-add.php">Add Department</a><br>  
    <h3>List of Departement</h3>
    <br>
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>S.No.</th>
                  <th>Dept Name</th>
                  <th>Dept image</th>
                  <th>Dept Hod details</th>
                  <th>Dept Strength</th>
                  <th>Dept Staff</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
              $dept_list=$department->getAllDept();
              $i=0;
              foreach($dept_list as $list){
                  $i++;
                  ?>
                  <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $list['dept_name'];?></td>
                      <td><?php echo $list['dept_image'];?></td>
                      <td>Name:<?php echo $list['dept_hod_name'];?>
                      <br>Number:<?php echo $list['dept_hod_no'];?>
                      <br>Email:<?php echo $list['dept_hod_email'];?></td>
                      <td><?php echo $list['dept_strength'];?></td>
                      <td><?php echo $list['dept_staff'];?></td>
                      <td><a href="<?php echo ADMIN_BASE_URL;?>views/department/department-edit.php?id=<?php echo $list['dept_id'];?>">Edit</a><br>
                      <a href="<?php echo ADMIN_BASE_URL;?>system/controller/department-controller.php?action=deleteDepartment&id=<?php echo $list['dept_id']?>">Delete</a></td>


                  </tr>

              <?php
              }
          ?>

          </tbody>
      </table>
    </div>

  </div>
