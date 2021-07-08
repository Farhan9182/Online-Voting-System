<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$Username = $_POST['Username'];
		$Password = $_POST['Password'];
		$Name = $_POST['Name'];
		$Contact_No = $_POST['Contact_No'];
		$Address = $_POST['Address'];
		$Part_No = $_POST['Part_No'];
		$Filename = $_FILES['photo']['name'];
		
		if (($Username.".jpg") == $Filename) 
		{
			if(!empty($Filename)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../executives/'.$Filename);	
			}
			//generate voters id
			$sql = "INSERT INTO executives (Username, Pass, Name, Contact_No, Address, Part_No, Image) VALUES ('$Username', '$Password', '$Name', '$Contact_No', '$Address', '$Part_No', '$Filename')";
			$result=mysqli_query($con,$sql);
			if($result)
			{
				$_SESSION['success'] = 'Executive added successfully';
				error_log('['.date("F j, Y, g:i a").'] '.$sql."\n", 3, "../SUPER ADMIN/admin.log");
			}
			else
			{
				$_SESSION['error'] = $con->error;
			}
		}
		else
		{
			$_SESSION['error'] ='Please select image corresponding to selected Executive Username';
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: positions.php');
?>