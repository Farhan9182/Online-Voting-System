<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM `party` WHERE `Party_ID` = '$id' ";
		if($con->query($sql)){
			$_SESSION['success'] = 'Party deleted successfully';
			error_log('['.date("F j, Y, g:i a").'] '.$sql."\n", 3, "../SUPER ADMIN/admin.log");
		}
		else{
			$_SESSION['error'] = $con->error;
		}
	}
	else{
		$_SESSION['error'] = 'First Select Party to be deleted ';
	}

	header('location: party.php');
	
?>