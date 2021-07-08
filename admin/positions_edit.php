<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$Username = $_POST['edit_Username'];
		$Password = $_POST['edit_Password'];
		$Name = $_POST['edit_Name'];
		$Contact_No = $_POST['edit_Contact_No'];
		$Address = $_POST['edit_Address'];
		$Part_No = $_POST['edit_Part_No'];

		$sql = "UPDATE executives SET Pass = '$Password', Name = '$Name', Contact_No = '$Contact_No', Address = '$Address', Part_No = '$Part_No' WHERE Username = '$Username'";
		if($con->query($sql)){
			$_SESSION['success'] = 'Executive details updated successfully';
			error_log('['.date("F j, Y, g:i a").'] '.$sql."\n", 3, "../SUPER ADMIN/admin.log");
		}
		else{
			$_SESSION['error'] = $con->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: positions.php');

?>