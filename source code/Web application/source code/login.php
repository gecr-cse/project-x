<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is used to login to the student
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
include_once "admin/system/library/class.messages.php";
$msg=new Messages();
$msg->display('all');

?>

<html> 
	<body style="background-color: #ebebeb;">

  

<section class="sec-login">
    <div class="container logincont">
      <div class="row mbt0">
          <div class="col l12 m12 s12">
            <div class="md-box">
              <center><h5>Login</h5></center>
			  <form action="<?php echo ADMIN_BASE_URL;?>system/controller/login-controller.php?action=login" method="post">
            <div class="row">
			 <input type="hidden" name="type" value="student">
              <div class="col l8 m8 s8 offset-l3 offset-m3 offset-s3">
              <div class="input-field col s8">
                <input id="rollnum" type="text" name="username" class="validate">
                <label for="password">Roll Number</label>
              </div>
               <div class="input-field col s8">
                <input id="password" type="password" name="password" class="validate">
                <label for="password">Password</label>
                <a herf=""><p class="mtbt">Forgot Password???</p></a>
              </div>
             <div class="col s8"> 
			  <center><button type="submit" class="waves-effect waves-light btn bntcolor mc-html"/>Submit</button></center>
			 </div>
            </div>
            </div>
			</form>
          </div>
      </div>
    </div>
  </section>
 <?php include_once "includes/footer.php" ?>

  </body>

</html>
