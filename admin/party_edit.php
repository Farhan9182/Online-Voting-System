<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$Party_ID = $_POST['edit_ID'];
		$Name = $_POST['edit_Name'];
		$Filename = $_FILES['edit_photo']['name'];
		
		if (($Party_ID.".jpg") == $Filename) 
		{
			if(!empty($Filename)){
				move_uploaded_file($_FILES['edit_photo']['tmp_name'], '../party/'.$Filename);	
			}
			//generate voters id
			$sql = "UPDATE `party` SET `Name` = '$Name' WHERE `Party_ID` = '$Party_ID' ";
			$result=mysqli_query($con,$sql);
			if($result)
			{
				$_SESSION['success'] = 'Party details updated successfully';
				error_log('['.date("F j, Y, g:i a").'] '.$sql."\n", 3, "../SUPER ADMIN/admin.log");
			}
			else
			{
				$_SESSION['error'] = $con->error;
			}
		}
		else
		{
			$_SESSION['error'] ='Please select image corresponding to selected Party ID';
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: party.php');
?>