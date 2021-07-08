<?php include 'includes/session.php'; ?>
<?php include 'includes/header2.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Votes
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Votes</li>
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
              <a href="#reset" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Print</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  
                  <th>Area</th>
                  <th>Name</th>
                  <th>Party</th>
                  <th>Symbol</th>
                  <th>Total Number of Votes</th>
                </thead>
                <tbody id="databody">
                  <?php
                    $query="SELECT * FROM `candidates` ";
                    $result=mysqli_query($con,$query);
                    
                    while($row = mysqli_fetch_array($result)){
                      $sql1 = "SELECT `Name`,`Symbol` FROM `party` WHERE `Party_ID` = '".$row["Party_ID"]."' " ;
                      $query1 = $con->query($sql1);
                      $row1 = $query1->fetch_assoc();
                      $sql2 = "SELECT `Name` FROM `part` WHERE `Part_No` = '".$row["Part_No"]."' " ;
                      $query2 = $con->query($sql2);
                      $row2 = $query2->fetch_assoc();
                      $time1 = filemtime("../party/".$row['Symbol']);
                      echo "
                        <tr>
                          
                          <td>".$row2['Name']."</td>
                          <td>".$row['Name']."</td>
                          <td>".$row1['Name']."</td>
                          <td><img src='../party/".$row1['Symbol']."?".$time1."' alt='".$row1['Symbol']."' role='button' width='30px' height='30px' onclick='window.open(this.src)'></td>
                          <td>".$row['Total_Votes']."</td>
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
  <?php include 'includes/votes_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

</body>
<script type="text/javascript">
      mergeCells();
</script>
</html>

