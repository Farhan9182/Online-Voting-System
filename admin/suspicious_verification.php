<?php include 'includes/session.php'; ?>
<?php include 'includes/header3.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Verified List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Verified List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
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
                    
                    <th>Voter ID</th>
                    <th>Recent Image</th>
                    <th>Voter ID Image</th>
                    <th>Accepted/Rejected</th>
                    <th>Part No</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php

                    $i=0;

                    $sql = "SELECT * FROM `verification` WHERE `suspicious` = '1'";
                    $result = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_array($result)){
                      $time1 = filemtime("../original/".$row['orImage']);
                      $time2 = filemtime("../upload/".$row['Image']);
                      if ($row['status'] == '0') {
                        $outcome = "Rejected";
                      }
                      else
                      {
                        $outcome = "Accepted";
                      }
                      echo "
                        <tr>
                          
                          <td>".$row['VoterID']."</td>
                          <td>
                            <img src='../upload/".$row['Image']."?".$time2."' alt='".$row['Image']."' role='button' width='100px' height='100px' onclick='window.open(this.src)'/>
                          </td>
                          <td>
                            <img src='../original/".$row['orImage']."?".$time1."' alt='".$row['orImage']."' role='button' width='100px' height='100px' onclick='window.open(this.src)'/>
                          </td>
                          <td>".$outcome."</td>
                          <td>".$row['Part_No']."</td>
                          
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

