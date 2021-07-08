<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$ID = $_POST['edit_ID'];
		$Name = $_POST['edit_Name'];
		$Party_ID = $_POST['edit_Party_ID'];
		$Part_No = $_POST['edit_Part_No'];

		$sql = "UPDATE `candidates` SET `Name` = '$Name', `Party_ID` = '$Party_ID', `Part_No` = '$Part_No' WHERE `ID` = '$ID'";
		
		if($con->query($sql)){
			$_SESSION['success'] = 'Candidate details updated successfully';
			error_log('['.date("F j, Y, g:i a").'] '.$sql."\n", 3, "../SUPER ADMIN/admin.log");
		}
		else{
			$_SESSION['error'] = $con->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: candidates.php');

?>