<?php

    include('includes/conn.php');
    error_reporting(0);
    date_default_timezone_set("Asia/Kolkata");
    $query="SELECT * FROM `election_info` ";
    $result=mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

    $election_title = $row['title'];
    $election_date = $row['date'];
    $election_start = $row['start'];
    $election_end = $row['end'];

    $date_today = date("Y-m-d");
    
    $diff = (strtotime($date_today) - strtotime($election_date));

    function phpAlert($msg) 
    {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    
    if( $diff == 0 ) 
    {
        if ( time() < strtotime($election_start)) 
        {
            echo '<script type="text/javascript">'; 
            echo 'window.location.href = "timer.php";';
            echo '</script>';
        }
        elseif ( time() > strtotime($election_end) ) 
        {
            phpAlert("The voting time for ".$election_title." was between ".$election_start." and ".$election_end." only, redirecting to homepage.");
            echo '<script type="text/javascript">';  
            echo 'window.location.href = "index.html";';
            echo '</script>';
        }
        
    }

    elseif ( $diff < 0 ) 
    {
        
        echo '<script type="text/javascript">'; 
        echo 'window.location.href = "timer.php";';
        echo '</script>';
    }
    elseif ( $diff > 0 ) 
    {
        phpAlert("The voting date for ".$election_title." was on: ".$election_date.". Redirecting to homepage."); 
        echo '<script type="text/javascript">';
        echo 'window.location.href = "index.html";';
        echo '</script>';
         
    }

?>
<html>
<head>
    <title>Voter's Login Page</title>
   <!--Made with love by Farhaan -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    
    
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="logincss/styles.css">
</head>
<body>
    
<div class="container">
    <br/>
    <br/>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="slider1.jpg" alt="First slide" id="first-image">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="slider2.jpg" alt="Second slide" id="second-image">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="slider3.jpg" alt="Third slide" id="third-image">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="slider4.jpg" alt="Fourth slide" id="fourth-image">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="slider5.jpg" alt="Fifth slide" id="fifth-image">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                
            </div>
            
            <div class="card-body">
                <form action="process.php" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="UName" placeholder=" Voter ID" required>
                        
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="Password" placeholder=" Password" required>
                    </div>
                    
                    <div class="form-group">
                        <button class="btn float-right login_btn" name="Login">Login</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Don't have an account? Or Forgot password? 
                </div>
                <div class="d-flex justify-content-center links">
                    Visit: <a href="https://eci.gov.in/">https://eci.gov.in/</a>
                </div>
                
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

    </div>
</div>

</body>
</html>