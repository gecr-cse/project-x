<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This file connects the display the college details
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
include_once "admin/system/manager/department-manager.php";
include_once "includes/header.php";
include_once "admin/system/manager/student-manager.php";
include_once "admin/system/library/class.messages.php";
$msg=new Messages();
$msg->display('all');
?>
<html> 
	<body style="background-color: #ebebeb">

  <?php //include_once "includes/header.php" ?>
  <!--*********SLIDER SECTION STRAT*************-->
  <section>
          <div class="row rw-btm">
      <div class="slider">
          <ul class="slides">
          <!--******** ITEM ONE************-->
                <li>
                    <img src="assets/images/slider/slider3.jpg">
              
                </li> 
           <!--******** ITEM TWO************-->      
                  <li>
                    <img src="assets/images/slider/slider4.jpg">
                </li> 
                
          </ul>
          </div>
      </div>
</section>
<section class="sec-about">
    <div class="container">
      <div class="row mbt0">
          <div class="col l12 m12 s12">
            <div class="md-box">
              <h5>About College</h5>
            <div class="row">
              <div class="col l8 m8 s8 mc-txtalgn" >
              <p>Government Engineering College, Raipur is one of the most renowned technical institutes having good potential to provide the quality education and infrastructure facilities. The highly eminent teachers and the congenial academic atmosphere of the institute make it different from all other institutes.</p>
              <p> 
Various industries in Raipur and surroundings have always been availing research and development facilities and required academic support to new budding graduates for their needs from the institute. These industries are also giving the institute a unique advantage of industry – institute interaction in various disciplines of engineering.
</p>
<p>
A large number of students have been selected in various campus interviews conducted by multi-national companies like Satyam Computers and Sintel. The students are also devoted to extra curricular activities. The students will surely be well placed in Government Organization, Public & Private sectors, multi-national companies, research organizations in India and Abroad.</p>
               
              </div>
              <div class="col l4 m4 s4">
                <img src="assets/images/about.jpg" class="responsive-img" style="height:200px;">
              </div>
            </div>
            </div>
          </div>
      </div>
    </div>
  </section>
 <?php include_once "includes/footer.php" ?>

  </body>

</html>
