<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$ID = $_POST['ID'];
		$Name = $_POST['Name'];
		$filename = $_FILES['photo']['name'];
		$Party_ID = $_POST['Party_ID'];
		$Part_No = $_POST['Part_No'];
		
		if (($ID.".jpg") == $filename) 
		{
			if(!empty($filename)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../candidates/'.$filename);	
			}

			$sql = "INSERT INTO candidates (ID, Name, Image, Party_ID, Part_No) VALUES ('$ID','$Name', '$filename', '$Party_ID', '$Part_No')";
			if($con->query($sql))
			{
				$_SESSION['success'] = 'Candidate added successfully';
				error_log('['.date("F j, Y, g:i a").'] '.$sql."\n", 3, "../SUPER ADMIN/admin.log");
			}
			else
			{
				$_SESSION['error'] = $con->error;
			}
		}
		else
		{
			$_SESSION['error'] ='Please select image corresponding to selected Candidate ID';
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: candidates.php');
?>