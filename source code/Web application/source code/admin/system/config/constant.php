<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines constants used in admin panel
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
	define('BASE_URL','http://'.$_SERVER["SERVER_NAME"].'/projectx/');
	define('ADMIN_BASE_URL',BASE_URL.'admin/');
	define('IMAGE_URL','http://'.$_SERVER["SERVER_NAME"].'/projectx/admin/assets/img/');
	define('UPLOAD_IMAGE_URL','http://'.$_SERVER["SERVER_NAME"].'/projectx/admin/uploads/img/');
	define('FILE_URL','http://'.$_SERVER["SERVER_NAME"].'/projectx/admin/assets/file/');
	define('SMARTY_TABLE','sm_');
	
	define('CURRENT_URL',"http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
	
	define('EMAIL_HOST','mail.creatise.in');
	define('FROM_NAME','REDECON 2014');
	define('FROM_EMAIL','info@redecon.in');
	define('EMAIL_PASSWORD','something');
	define('EMAIL_PORT','2525');
	define('LIMIT','10');
	define('LOGIN_ATTEMPTS','5');
	define('LOGIN_PATH',ADMIN_BASE_URL.'index.php');
?>