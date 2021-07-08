<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM `executives` WHERE `Username` = '$id'";
		if($con->query($sql)){
			$_SESSION['success'] = 'Executive deleted successfully';
			error_log('['.date("F j, Y, g:i a").'] '.$sql."\n", 3, "../SUPER ADMIN/admin.log");
		}
		else{
			$_SESSION['error'] = $con->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select executive to delete first';
	}

	header('location: positions.php');
	
?>