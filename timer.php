<?php
  include('includes/conn.php');
    //error_reporting(0);

    $query="SELECT * FROM `election_info` ";
    $result=mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $election_title = $row['title'];
    $election_date = $row['date'];
    $election_start = $row['start'];
    $election_end = $row['end'];
    $combined_date = $election_date." ".$election_start;
    

?>
<html>
<head>
  <title>Please wait...</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" >
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
  <style type="text/css">
    .countdown {
      text-transform: uppercase;
      font-weight: bold;
    }

    .countdown span {
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
      font-size: 3rem;
      margin-left: 0.8rem;
    }

    .countdown span:first-of-type {
      margin-left: 0;
    }

    .countdown-circles {
      text-transform: uppercase;
      font-weight: bold;
    }

    .countdown-circles span {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .countdown-circles span:first-of-type {
      margin-left: 0;
    }


    /*
    *
    * ==================================================
    * FOR DEMO PURPOSES
    * ==================================================
    *
    */
    body {
      min-height: 100vh;
      background-image: url('assets/img/BGVoting.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    .bg-gradient-1 {
      background: #7f7fd5;
      background: -webkit-linear-gradient(to right, #7f7fd5, #86a8e7, #91eae4);
      background: linear-gradient(to right, #7f7fd5, #86a8e7, #91eae4);
    }

    .bg-gradient-2 {
      background: #654ea3;
      background: -webkit-linear-gradient(to right, #654ea3, #eaafc8);
      background: linear-gradient(to right, #654ea3, #eaafc8);
    }

    .bg-gradient-3 {
      background: #ff416c;
      background: -webkit-linear-gradient(to right, #ff416c, #ff4b2b);
      background: linear-gradient(to right, #ff416c, #ff4b2b);
    }

    .bg-gradient-4 {
      background: #007991;
      background: -webkit-linear-gradient(to right, #007991, #78ffd6);
      background: linear-gradient(to right, #007991, #78ffd6);
    }

    .rounded {
      border-radius: 1rem !important;
    }

    .btn-demo {
      padding: 0.5rem 2rem !important;
      border-radius: 30rem !important;
      background: rgba(255, 255, 255, 0.3);
      color: #fff;
      text-transform: uppercase;
      font-weight: bold !important;
    }

    .btn-demo:hover,
    .btn-demo:focus {
      color: #fff;
      background: rgba(255, 255, 255, 0.5);
    }

  </style>
  <script type="text/javascript">
    $(function() {

      /* =========================================
          COUNTDOWN 4
       ========================================= */
      function get15dayFromNow() {
        
        var data = <?php echo json_encode($combined_date, JSON_HEX_TAG); ?>;

        return new Date(new Date(data).valueOf());
        
      }

      $('#clock-c').countdown(get15dayFromNow(), function(event) {
        var $this = $(this).html(event.strftime('' +
          '<span class="h1 font-weight-bold">%D</span> Day%!d' +
          '<span class="h1 font-weight-bold">%H</span> Hr' +
          '<span class="h1 font-weight-bold">%M</span> Min' +
          '<span class="h1 font-weight-bold">%S</span> Sec'));
      });

      /* =========================================
          CALL TO ACTIONS FOR COUNTDOWN 4
       ========================================= */
      $('#btn-reset').click(function() {
        $('#clock-c').countdown(get15dayFromNow());
      });

    });
  </script>
</head>
<body>
  

<div class="container py-5">


  <div class="py-5">
    <div class="row">
      <div class="col-lg-8 mx-auto">


        <!-- Countdown 4-->
        <div class="rounded bg-gradient-4 text-white shadow p-5 text-center mb-5">
          <p class="mb-0 font-weight-bold text-uppercase">The Online Voting Portal will open in:</p>
          <div id="clock-c" class="countdown py-4"></div>

          <!-- Call to actions -->
          <ul class="list-inline">
            <li class="list-inline-item pt-2">
              <a href="http://localhost/MyProject/login.php" class="btn btn-demo"><i class="glyphicon glyphicon-repeat"></i>Retry</a>
            </li>
            <!-- <li class="list-inline-item pt-2">
              <button id="btn-pause" type="button" class="btn btn-demo"><i class="glyphicon glyphicon-repeat"></i>Pause</button>
            </li>
            <li class="list-inline-item pt-2">
              <button id="btn-resume" type="button" class="btn btn-demo"><i class="glyphicon glyphicon-repeat"></i>Resume</button>
            </li> -->
          </ul>

        </div>

      </div>
    </div>
  </div>
</div>
</body>
</html>
