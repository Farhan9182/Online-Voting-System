<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM candidates WHERE ID = '$id'";
		if($con->query($sql)){
			$_SESSION['success'] = 'Candidate deleted successfully';
			error_log('['.date("F j, Y, g:i a").'] '.$sql."\n", 3, "../SUPER ADMIN/admin.log");
		}
		else{
			$_SESSION['error'] = $con->error;
		}
	}
	else{
		$_SESSION['error'] = 'First Select Candidate to be deleted ';
	}

	header('location: candidates.php');
	
?>