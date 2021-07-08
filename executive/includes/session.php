<?php
	include 'includes/connection.php';
	session_start();

	if(isset($_SESSION['Executive'])){
		$sql = "SELECT * FROM `executives` WHERE `Username` = '".$_SESSION['Executive']."'";
		$result=mysqli_query($con,$sql);
		$executive = mysqli_fetch_array($result);
	}
	else{
		header('location: login.php');
		exit();
	}
	error_reporting(0);
?>