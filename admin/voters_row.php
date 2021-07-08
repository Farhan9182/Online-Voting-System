<?php 
	include 'includes/session.php';

		$id = $_POST['id'];
		$sql = "SELECT * FROM voters WHERE VoterID = '$id'";
		$query = $con->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
?>