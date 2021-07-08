<?php
	$con = new mysqli('localhost', 'root', '', 'voting_system');

	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	}
	error_reporting(0);
	date_default_timezone_set("Asia/Kolkata");
?>