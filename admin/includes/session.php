<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: login.php');
	}

	$sql = "SELECT * FROM admin WHERE Username = '".$_SESSION['admin']."'";
	$result=mysqli_query($con,$sql);
	$user = mysqli_fetch_array($result);
	
	
?>