<?php
  session_start();
  if (isset($_SESSION["user_id"]) && isset($_SESSION["user_pass"]))
  {
    if($_SESSION["user_id"]!=NULL && $_SESSION["user_pass"]!=NULL){
		
      $goto = "../../views/dashboard/dashboard-index.php";
      header("Location:".$goto);
    }
  }

  if(isset($_SESSION["error"]) && $_SESSION["error"]!=NULL){
    echo $_SESSION["error"];
    $_SESSION["error"]=NULL;
  }

?>



<table style="width: 100%; height: 100vh; position:absolute;top:0px;">
		<tr>
			<td valign="middle" align="center">
				<form action="../../system/controller/login-controller.php?action=login" method="post">

					<table class="login_table">
						<tr class="login_field">
							<td><label>User Name</label></td>
							<td><input type="text" name="uid" size="20"><br></td>
						</tr>
						<tr class="login_field">
							<td><label>Password</label></td>
							<td><input type="password" name="upass" size="20"></td>
						</tr>
						<tr class="login_field">
							<td colspan="2" height="10vh"></td>
						</tr>
						<tr class="login_field">
							<td><a href="#">forgot passwod ?</a></td>
							<td><input type="submit" value="Submit" size="20"></td>
						</tr>
				</table>
			</form>
		</td>
	</tr>
</table>
