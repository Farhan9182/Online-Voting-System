<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($voter['Image'])) ? 'original/'.$voter['Image'] : 'images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $voter['Name']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Details</li>
      <li class="header"><span style="color: white">Voter ID: <?php echo $voter['VoterID']; ?></span></li>
      <li class="header"><span style="color: white">Name: <?php echo $voter['Name']; ?></span></li>
      <li class="header"><span style="color: white">Father's Name: <?php echo $voter['Father_Name']; ?></span></li>
      <li class="header"><span style="color: white">Gender: <?php echo $voter['Sex']; ?></span></li>
      <li class="header"><span style="color: white">Date of birth: <?php echo $voter['DOB']; ?></span></li>
      <li class="header"><span style="color: white">Address: <?php echo $voter['Address']; ?></span></li>
      <li class="header"><span style="color: white">Part No: <?php echo $voter['Part_No']; ?></span></li>
      <li class="header"><span style="color: white">City: <?php echo $voter['City']; ?></span></li>
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

