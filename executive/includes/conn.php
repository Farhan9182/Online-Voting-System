<?php
	$con = new mysqli('localhost', 'root', '', 'voting_system');

	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	}
	date_default_timezone_set("Asia/Kolkata");
?>