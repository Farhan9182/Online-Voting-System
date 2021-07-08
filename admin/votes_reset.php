<?php
	include 'includes/session.php';
	$total = 0;
	$sql = "update `Candidates` SET Total_Votes='".$total."'";
    
	if($result = mysqli_query($con,$sql)){
		$_SESSION['success'] = "Votes reset successfully";
	}
	else{
		$_SESSION['error'] = "Something went wrong in reseting";
	}

	header('location: votes.php');

?>