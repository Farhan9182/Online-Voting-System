<?php
	date_default_timezone_set("Asia/Kolkata");
	session_start();
	error_log('['.date("F j, Y, g:i a").'] '.$_SESSION['admin']." Logout Successful. \n", 3, "../SUPER ADMIN/admin.log");
	session_destroy();

	header('location: index.php');
?>