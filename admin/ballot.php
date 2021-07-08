
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
        Details for new election session
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reset for new election</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
      <form class="form-horizontal form-label-left" id="candidate_details" method="post" action="update_election_details.php" onsubmit="return confirm('This will delete all voting data, all voters validations and verification data, are you sure?');" enctype="multipart/form-data">
      

      <div class="form-group row">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="Election-Title">Election Title: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="election-title" required="required" class="form-control  ">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">New Election Date: <span class="required">*</span>
        </label>
        <div class="col-md-3 col-sm-3 ">
          <input  class="date-picker form-control" name="election-date" required="required" type="date">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Voting Session Time: <span class="required">*</span>
        </label>
        <label class="col-form-label col-md-1 col-sm-1 label-align">Start:
        </label>
        <div class="col-md-2 col-sm-2 ">
          <input  class="timepicker form-control" name="election-start-time" required="required" type="time">
        </div>
        <label class="col-form-label col-md-1 col-sm-1 label-align">End:
        </label>
        <div class="col-md-2 col-sm-2 ">
          <input  class="timepicker form-control" name="election-end-time" required="required" type="time">
        </div>
      </div>
      <div class="row" style="margin-top:40px;">
        <div class="col-md-2 offset-md-10">
          <button type="submit" name="submit" value="submit" id="submit" class="btn btn-success btn-lg" style=" padding: 12px;
                width: 154px;border-radius: 10px;
                ">CONFIRM</button>
        </div>
        <div class="col-md-2 offset-md-10">
        <button type="reset" name="reset" value="reset" id="reset" class="btn btn-danger btn-lg" style=" padding: 12px;
                width: 154px;border-radius: 10px;
                ">RESET</button>
      </div>
    </div>
  </form>
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
