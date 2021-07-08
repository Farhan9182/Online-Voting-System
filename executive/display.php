<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Verification List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Verification List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="hidden"></th>
                    <th>Recent Image</th>
                    <th>Voter ID Image</th>
                    <th>Controls</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                    $i=0;

                    $sql1 = "SELECT * FROM `executives` WHERE `Username`='".$_SESSION['Executive']."'";
                    $result = mysqli_query($con,$sql1);
                    $row = mysqli_fetch_array($result);
                    $part = $row['Part_No'];

                    $sql = "SELECT * FROM `verification` WHERE `Part_No`='".$part."' AND `status`= '0'";
                    $result = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_array($result)){
                      $time1 = filemtime("../original/".$row['orImage']);
                      $time2 = filemtime("../upload/".$row['Image']);
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>
                            <img src='../upload/".$row['Image']."?".$time2."' alt='".$row['Image']."' role='button' width='100px' height='100px' onclick='window.open(this.src)'/>
                          </td>
                          <td>
                            <img src='../original/".$row['orImage']."?".$time1."' alt='".$row['orImage']."' role='button' width='100px' height='100px' onclick='window.open(this.src)'/>
                          </td>
          
                          <form method='POST'>
                          <td>
                            <button class='btn btn-success js-scroll-trigger' name='Allow' value=".$row['VoterID'].">Allow</button>

                            <button class='btn btn-danger js-scroll-trigger' name='Deny' value=".$row['VoterID'].">Deny</button>
                          </td>
                          </form>
                        </tr>
                      ";
                      $i++;
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>



<?php

    if(isset($_POST['Allow']))
    { 
    	@$a=$_POST['Allow'];
    	$value = 1;
    	$sql = "update voters SET Facial_Verification='".$value."' where VoterID='".$a."'";
  		$result = mysqli_query($con,$sql);
  		if($result)
  		{
			$sql1 = "UPDATE `verification` SET `status`= '1' WHERE VoterID='".$a."'";
  			$result = mysqli_query($con,$sql1);
        error_log('['.date("F j, Y, g:i a").'] '.$a.": Allowed to vote by ".$_SESSION['Executive'].". \n", 3, "../SUPER ADMIN/executive.log");
  		 echo '<script type="text/javascript">';
         echo 'window.location.href = "display.php";';
         echo '</script>';
        }		
        else
        {
        	echo "Try Again";
        }
    }

    elseif(isset($_POST['Deny']))
    { 
    	@$a=$_POST['Deny'];
    	$value = 3;
    	$sql = "UPDATE voters SET Facial_Verification='".$value."' where VoterID='".$a."'";
  		$result = mysqli_query($con,$sql);

		  if($result)
  		{
			   $sql1 = "UPDATE `verification` SET `status`= '0' WHERE VoterID='".$a."'";
  			$result = mysqli_query($con,$sql1);
        error_log('['.date("F j, Y, g:i a").'] '.$a.": Denied to vote by ".$_SESSION['Executive'].". \n", 3, "../SUPER ADMIN/executive.log");
  		 echo '<script type="text/javascript">';
         echo 'window.location.href = "display.php";';
         echo '</script>';
        }
        else
        {
        	echo "Try Again";
        }			
    }
  
 
?>