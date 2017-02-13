<?php
include_once '../includes/header.php';
include_once '../library/mail.php';
$mail=New Mail();
if($_GET['mail']){
    $indivisual=$mail->getMemberId($_GET['mail']);
}else{
    header("Location:".ADMIN_BASE_URL."dashboard/index.php");
}
?>
<div id="content">
    <div class="inner">
        <div class="topcolumn">
            <div class="logo"></div>
            <!-- <ul  id="shortcut">
                 <li> <a href="#" title="Back To home"> <img src="images/icon/shortcut/home.png" alt="home"/><strong>Home</strong> </a> </li>
                 <li> <a href="#" title="Website Graph"> <img src="images/icon/shortcut/graph.png" alt="graph"/><strong>Graph</strong> </a> </li>
                 <li> <a href="#" title="Setting" > <img src="images/icon/shortcut/setting.png" alt="setting" /><strong>Setting</strong></a> </li>
                 <li> <a href="#" title="Messages"> <img src="images/icon/shortcut/mail.png" alt="messages" /><strong>Message</strong></a><div class="notification" >10</div></li>
             </ul> -->
        </div>
        <div class="clear"></div>

        <?php echo $msg->display(); ?>
        <!-- // End onecolumn -->
        <div class="onecolumn" >

            <div class="header"> <span ><span class="ico gray mail"></span>Send  Mail</span> 
            <div id="buttom_top">
          <ul class="uibutton-group">
                <li><a class="uibutton icon answer " href="<?php echo ADMIN_BASE_URL?>groups/members.php">View Members</a></li>
          </ul>
      
            </div>
            </div>
            <div class="clear"></div>
            <div class="content" >
                    <div class="inner">
                        <form action="<?php echo ADMIN_BASE_URL; ?>mail/mail_svr.php?feature=sendMail" method="post">
                            <div class="section">
                                <label> To: <small></small></label>
                                <div>
                                    <?php
                                        if($_GET['action']=="sms"){
                                            $value=$indivisual[0]['phone'];
                                        }else{
                                            $value=$indivisual[0]['email'];
                                        }
                                        
                                    ?>
                                    <input type="text" name="" readonly="readonly" id="sitename"  class=" full"  value="<?php echo $indivisual[0]['name']." (".$value.")";?>"/>
                                    <input type="hidden" name="emailId"  value="<?php echo $indivisual[0]['id']; ?>" />
                                    <label> Designation: <?php echo $indivisual[0]['designation'];?></label>
                                </div>
                            </div>
                            <?php 
                                if($_GET['action']=='sms'){
                                    ?>
                             <div class="section">
                                   <label> Message <small></small></label>   
                                  <div > <textarea name="bodyMail"  cols="" rows=""></textarea></div>      
                               </div>
                                       <?php
                                }else{
                               
                            ?>
                            <div class="section">
                                <label> Subject <small</small></label>
                                <div>
                                    <input type="text" name="subject" id="sitename"  class=" full"  value="" />
                                </div>
                            </div>
                            <div class="section">
                                   <label> Body  <small></small></label>   
                                  <div > <textarea name="bodyMail" id="editor"  class="editor"  cols="" rows=""></textarea></div>      
                               </div>
                            <?php 
                                }
                            ?>
                            <div class="section last">
                                <div>
                                    <input type="submit" value="Send" class="uibutton loading"/>
                                    <input type="reset" value="Reset" class="uibutton special"/>
                                    <input type="hidden" value="<?php echo $_GET['action'];?>" name="action"/>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
  <div class="clear"></div>
        </div>
    </div>

<!-- // End onecolumn -->

<?php include_once '../includes/footer.php'; ?>