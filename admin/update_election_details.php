<?php

	include('../includes/conn.php');
	error_reporting(0);
	if(isset($_POST['submit']))
	{

	//step-1 data-------------------------------------------------------------------------

	$election_title= $_POST['election-title'];
	$election_date= $_POST['election-date'];
	$election_start_time= $_POST['election-start-time'];
  $election_end_time= $_POST['election-end-time'];

	$save= "UPDATE `election_info` SET `title`='$election_title' ,`date`='$election_date' ,`start`='$election_start_time' ,`end`='$election_end_time' ";

    $query = mysqli_query($con, $save);

    if(!$query)
    {
      echo '<script type="text/javascript">'; 
      echo 'alert(mysqli_error($con));'; 
      echo 'window.location.href = "ballot.php";';
      echo '</script>';
    }
    
    $unverified = 0;
    $query1 = "UPDATE `voters` SET `Verification` ='".$unverified."', `Facial_Verification` ='".$unverified."', `Voting` ='".$unverified."', `Malicious` ='".$unverified."'";
    $result = mysqli_query($con,$query1);

    if(!$result)
    {
      echo '<script type="text/javascript">'; 
      echo 'alert(mysqli_error($con));'; 
      echo 'window.location.href = "ballot.php";';
      echo '</script>';
    }

    $unverified = 0;
    $query2 = "UPDATE `candidates` SET `Total_Votes` ='".$unverified."' ";
    $result = mysqli_query($con,$query2);

    if(!$result)
    {
      echo '<script type="text/javascript">'; 
      echo 'alert(mysqli_error($con));'; 
      echo 'window.location.href = "ballot.php";';
      echo '</script>';
    }

    $query3 = "TRUNCATE TABLE `verification`";
    $result = mysqli_query($con,$query3);

    if(!$result)
    {
      echo '<script type="text/javascript">'; 
      echo 'alert(mysqli_error($con));'; 
      echo 'window.location.href = "ballot.php";';
      echo '</script>';
    }
    else
    {
      error_log('['.date("F j, Y, g:i a").'] '.$save."\n", 3, "../SUPER ADMIN/admin.log");
      error_log('['.date("F j, Y, g:i a").'] '.$query1."\n", 3, "../SUPER ADMIN/admin.log");
      error_log('['.date("F j, Y, g:i a").'] '.$query2."\n", 3, "../SUPER ADMIN/admin.log");
      error_log('['.date("F j, Y, g:i a").'] '.$query3."\n", 3, "../SUPER ADMIN/admin.log");
      
      echo '<script type="text/javascript">';  
      echo 'alert("Election details updated successfully.");';
      echo 'window.location.href = "ballot.php";';
      echo '</script>';
    }

  }

?>