<?php
  include('../includes/connection.php');
  session_start();

  if(isset($_POST['login']))
  {
    $query="SELECT * FROM `executives` WHERE `Username`='".$_POST['Username']."' and Pass='".$_POST['Password']."'";
    $result=mysqli_query($con,$query);
    if($row = mysqli_fetch_array($result))
    {
        $_SESSION['Executive'] = $_POST['Username'];
        error_log('['.date("F j, Y, g:i a").'] '.$_POST['Username']." Login Successful. \n", 3, "../SUPER ADMIN/executive.log");
        echo '<script type="text/javascript">';  
        echo 'window.location.href = "display.php";';
        echo '</script>';
    }
    else
    {
        error_log('['.date("F j, Y, g:i a").'] '.$_POST['Username']." Login Failed. \n", 3, "../SUPER ADMIN/executive.log");
        header("location:login.php?Invalid= Please Enter Correct User Name and Password ");
    }
    
    
  }
  else{
    header("location:login.php?Invalid= Please LOGIN First. ");
  }

?>

