<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$VoterID = $_POST['VoterID'];
		$Name = $_POST['Name'];
		$Password = $_POST['password'];
		$Father_Name = $_POST['Father_Name'];
		$Sex = $_POST['Sex'];
		$DOB = $_POST['DOB'];
		$Address = $_POST['Address'];
		$Part_No = $_POST['Part_No'];
		$City = $_POST['City'];
		$filename = $_FILES['photo']['name'];

		if (ctype_alpha(str_replace(' ', '', $Name))) 
		{
			if (ctype_alpha(str_replace(' ', '', $Father_Name))) 
			{	
				if (ctype_alpha(str_replace(' ', '', $City))) 
				{
		
					if (($VoterID.".jpg") == $filename) 
					{
						if(!empty($filename)){
							move_uploaded_file($_FILES['photo']['tmp_name'], '../original/'.$filename);	
						}
						//generate voters id
						$sql = "INSERT INTO voters (VoterID, Pass, Name, Father_Name, Sex, DOB, Address, Part_No, City, Image) VALUES ('$VoterID', '$Password', '$Name', '$Father_Name', '$Sex', '$DOB', '$Address', '$Part_No', '$City', '$filename')";
						$result=mysqli_query($con,$sql);
						if($result)
						{
							$_SESSION['success'] = 'Voter added successfully';
							error_log('['.date("F j, Y, g:i a").'] '.$sql."\n", 3, "../SUPER ADMIN/admin.log");
						}
						else
						{
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
				$_SESSION['error'] = "Only alphabets allowed for Father's Name field";
			}
		}
		else
		{
			$_SESSION['error'] = 'Only alphabets allowed for Name field';
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>