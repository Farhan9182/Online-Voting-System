<?php include 'includes/session.php'; ?>
<?php include 'includes/header4.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Voters List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Voters</li>
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
            <div class="box-header with-border">
              <a href="#" onclick="printData()" class="btn btn-success btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Print</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    
                    <th>VoterID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Father's Name</th>
                    <th>Sex</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Part No</th>
                    <th>City</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `voters` WHERE `Malicious` = '1'";
                    $query = $con->query($sql);
                    while($row = $query->fetch_assoc()){
                      $time = filemtime("../original/".$row['Image']);
                      echo "
                        <tr>
                          
                          <td>".$row['VoterID']."</td>
                          <td>".$row['Name']."</td>
                          <td>
                            <img src='../original/".$row['Image']."?".$time."' alt='".$row['Image']."' role='button' width='30px' height='30px' onclick='window.open(this.src)'/>
                          </td>
                          <td>".$row['Father_Name']."</td>
                          <td>".$row['Sex']."</td>
                          <td>".$row['DOB']."</td>
                          <td>".$row['Address']."</td>
                          <td>".$row['Part_No']."</td>
                          <td>".$row['City']."</td>
                          
                            <form method='POST'>
                            <td>
                              <button class='btn btn-success js-scroll-trigger' name='Allow' value=".$row['VoterID'].">Allow</button>
                            </td>
                            </form>
                        </tr>
                      ";
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

                    //inserting total votes
                    $sql2 = "UPDATE `voters` SET `Malicious` = '0' WHERE `VoterID`='".$a."'";
                    $result = mysqli_query($con,$sql2);
                    error_log('['.date("F j, Y, g:i a").'] '.$sql2."\n", 3, "../SUPER ADMIN/admin.log");
                    //Setting Vote flag
                    // $verified = 1;
                    // $query = "update voters set Voting ='".$verified."' where VoterID = '".$_SESSION['Voter']."'";
                    // mysqli_query($con,$query);

                    echo '<script type="text/javascript">'; 
                    echo 'alert("Voter granted permission to vote.");'; 
                    echo 'window.location.href = "malicious_voters.php";';
                    echo '</script>';
                  }
?>