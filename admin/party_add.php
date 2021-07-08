<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$Party_ID = $_POST['ID'];
		$Name = $_POST['Name'];
		$Filename = $_FILES['photo']['name'];
		
		if (($Party_ID.".jpg") == $Filename) 
		{
			if(!empty($Filename)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../party/'.$Filename);	
			}
			//generate voters id
			$sql = "INSERT INTO party (Party_ID, Name, Symbol) VALUES ('$Party_ID', '$Name', '$Filename')";
			$result=mysqli_query($con,$sql);
			if($result)
			{
				$_SESSION['success'] = 'Party added successfully';
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