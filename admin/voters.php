<?php include 'includes/session.php'; ?>
<?php include 'includes/header5.php'; ?>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="hidden"></th>
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
                    $sql = "SELECT * FROM voters";
                    $query = $con->query($sql);
                    while($row = $query->fetch_assoc()){
                      $sql2 = "SELECT `Name` FROM `part` WHERE `Part_No` = '".$row["Part_No"]."' " ;
                      $query2 = $con->query($sql2);
                      $row2 = $query2->fetch_assoc();
                      $time = filemtime("../original/".$row['Image']);
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".$row['VoterID']."</td>
                          <td>".$row['Name']."</td>
                          <td>
                            <img src='../original/".$row['Image']."?".$time."' alt='".$row['Image']."' role='button' width='30px' height='30px' onclick='window.open(this.src)'/>
                          </td>
                          <td>".$row['Father_Name']."</td>
                          <td>".$row['Sex']."</td>
                          <td>".$row['DOB']."</td>
                          <td>".$row['Address']."</td>
                          <td>".$row2['Name']."</td>
                          <td>".$row['City']."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['VoterID']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['VoterID']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
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
  <?php include 'includes/voters_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  /*$(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });*/

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'voters_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.VoterID);
      $('#edit_VoterID').val(response.VoterID);
      $('#edit_Name').val(response.Name);
      $('#edit_password').val(response.Pass);
      $('#edit_Father_Name').val(response.Father_Name);
      $('#edit_Sex').val(response.Sex);
      $('#edit_DOB').val(response.DOB);
      $('#edit_Address').val(response.Address);
      $('#edit_Part_No').val(response.Part_No);
      $('#edit_City').val(response.City);
    }
  });
}
</script>
</body>
</html>
