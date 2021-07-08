<?php
    /*session_start();
    if(isset($_SESSION['admin'])){
        header('location: admin/home.php');
    }

    if(isset($_SESSION['voter'])){
      header('location: home.php');
    }*/
?>
<?php include 'includes/header.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Executives' Login Portal</b>
    </div>
  
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="process.php" method="POST">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="Username" placeholder="Username" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="Password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
                </div>
            </div>
        </form>
    </div>
    <?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>                                
                    <?php
                        }
                    ?>


                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
                    <?php
                        }
    ?>
</div>
    
<?php include 'includes/scripts.php' ?>
</body>

<footer>
<p><center><a href="#">Forgot your password?</a></p></center></p></footer>
</html>