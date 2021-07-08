<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$VoterID = $_POST['edit_VoterID'];
		$Name = $_POST['edit_Name'];
		$Password = $_POST['edit_password'];
		$Father_Name = $_POST['edit_Father_Name'];
		$Sex = $_POST['edit_Sex'];
		$DOB = $_POST['edit_DOB'];
		$Address = $_POST['edit_Address'];
		$Part_No = $_POST['edit_Part_No'];
		$City = $_POST['edit_City'];

		if (ctype_alpha(str_replace(' ', '', $Name))) 
		{
			if (ctype_alpha(str_replace(' ', '', $Father_Name))) 
			{	
				if (ctype_alpha(str_replace(' ', '', $City))) 
				{
					$sql = "UPDATE voters SET Pass = '$Password', Name = '$Name', Father_Name = '$Father_Name', Sex = '$Sex', DOB = '$DOB', Address = '$Address', Part_No = '$Part_No', City = '$City' WHERE VoterID = '$VoterID'";
					if($con->query($sql)){
						$_SESSION['success'] = 'Voter updated successfully';
						error_log('['.date("F j, Y, g:i a").'] '.$sql."\n", 3, "../SUPER ADMIN/admin.log");
					}
					else{
						$_SESSION['error'] = $con->error;
					}
				}
				else
				{
					$_SESSION['error'] = 'Please select image corresponding to selected VoterID';
				}
			}
			else
			{
				$_SESSION['error'] = "Only alphabets allowed for City field";
			}
		}
		else
		{
			$_SESSION['error'] = 'Only alphabets allowed for Name field';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: voters.php');

?>