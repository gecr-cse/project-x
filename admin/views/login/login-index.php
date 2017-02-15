<?php
    include_once "../../system/controller/login-controller.php";


?>

<table style="width: 100%; height: 100vh; position:absolute;top:0px;">
		<tr>
			<td valign="middle" align="center">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

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
