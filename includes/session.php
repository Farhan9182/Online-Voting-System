<?php
	error_reporting(0);
	include 'includes/connection.php';
	session_start();

	if(isset($_SESSION['Voter'])){
		$sql = "SELECT * FROM `voters` WHERE `VoterID` = '".$_SESSION['Voter']."'";
		$result=mysqli_query($con,$sql);
		$voter = mysqli_fetch_array($result);
	}
	else{
		header('location: login.php');
		exit();
	}
	
?>