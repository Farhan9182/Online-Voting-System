<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM admin WHERE Username = '$username'";
		$query = $con->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username';

		}
		else{
			$row = $query->fetch_assoc();
			if(($password == $row['Pass'])){
				$_SESSION['admin'] = $row['Username'];
				error_log('['.date("F j, Y, g:i a").'] '.$_POST['username']." Login Successful. \n", 3, "../SUPER ADMIN/admin.log");
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
				error_log('['.date("F j, Y, g:i a").'] '.$_POST['username']." Login Failed: ".$_SESSION['error']." \n", 3, "logs.log");
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: index.php');

?>