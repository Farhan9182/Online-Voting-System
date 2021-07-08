<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($executive['Image'])) ? '../executives/'.$executive['Image'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $executive['Name']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Details</li>
      <li class="header"><span style="color: white">Name: <?php echo $executive['Name']; ?></span></li>
      <li class="header"><span style="color: white">Contact No: <?php echo $executive['Contact_No']; ?></span></li>
      <li class="header"><span style="color: white">Address: <?php echo $executive['Address']; ?></span></li>
      <li class="header"><span style="color: white">Part_No: <?php echo $executive['Part_No']; ?></span></li>
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<?php include 'config_modal.php'; ?>
