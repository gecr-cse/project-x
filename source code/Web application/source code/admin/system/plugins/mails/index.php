<?php
include_once '../includes/header.php';
include_once '../library/groups.php';
$groups = New Groups;
$groupList = $groups->getGroups();
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
                        <form action="<?php echo ADMIN_BASE_URL; ?>mail/mail_svr.php?feature=sendGroup" method="post">
                            <div class="section">
                                <label> To: <small>Select Group to send mail</small></label>
                                <div>
                                     <select class="fullD" name="groups_id">
                                        <?php
                                        foreach ($groupList as $grpList) {
                                            ?>
                                            <option value="<?php echo $grpList['group_id']; ?>"><?php echo $grpList['name']." &nbsp;(".$grpList['total'].")"; ?></option>
                                            <?php
                                           
                                        }
                                        $regList = $groups->getRegisteredGroupCount();
                                        ?>
                                             <option value="reg"><?php echo "Approved Delegates - (".$regList[0]['total'].")"; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="section">
                                <label> Subject <small</small></label>
                                <div>
                                    <input type="text" name="subject" id="sitename"  class=" full"  value="" />
                                </div>
                            </div>
                            <div class="section">
                                   <label> Body  <small></small></label>   
                                  <div > <textarea name="bodyMail" id="maileditor"  cols="20" rows="30"></textarea></div>      
                               </div>
                            <div class="section last">
                                <div>
                                    <input type="submit" value="Send" class="uibutton loading"/>
                                    <input type="reset" value="Reset" class="uibutton special"/>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
  <div class="clear"></div>
        </div>
    </div>

 
<script type="text/javascript">
//<![CDATA[

	// Replace the <textarea id="editor"> with an CKEditor
	// instance, using default configurations.
	CKEDITOR.replace( 'maileditor',
		{
			toolbar :
			[
				[ 'Bold', 'Italic', 'Underline','-', 'NumberedList', 'BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight' ],
				['TextColor','FontSize'],['Table','HorizontalRule']
			]
		} );

//]]>
</script> 
<!-- // End onecolumn -->

<?php include_once '../includes/footer.php'; ?>