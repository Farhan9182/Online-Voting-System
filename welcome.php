<?php
    session_start();

    


    //checking Voter has logged in or not
    if(isset($_SESSION['Voter']))
    {   
        include("includes/connection.php");

        $sql = "select * from voters where VoterID='".$_SESSION['Voter']."'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
        $Malicious = $row['Malicious'];
        if($Malicious == 1)
        {
          echo '<script type="text/javascript">'; 
          echo 'alert("Due to maliciuous activites you have exhausted your number of trials.\\nPlease contact system administrator at: khaan_iz_here@gmail.com");'; 
          echo 'window.location.href = "logout.php";';
          echo '</script>';
        }
        $verification = $row['Verification'];
        $faceVerification=$row['Facial_Verification'];
        $voting=$row['Voting'];

        //checking if the Voter has already voted
        if ($voting == 1) 
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("You have already voted, please have rest.");'; 
            echo 'window.location.href = "logout.php";';
            echo '</script>';
        }
        //checking if the Voter has already been facially verified
        elseif ($faceVerification == 1) 
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("You have already been verified. \\nPlease proceed for Voting.");'; 
            echo 'window.location.href = "Voting.php";';
            echo '</script>';
        }
        //checking if the Voter has already submiited image or not
        elseif ($faceVerification == 2) 
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("You have already submitted your image, please wait... \\nYou will be redirected to Voting page automatically after successful verification.");'; 
            echo 'window.location.href = "waiting.php";';
            echo '</script>';
        }
        //checking if the Voter's age and location has been verified or not
        elseif ($verification == 0) 
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Please verify age and location before accessing this page.");'; 
            echo 'window.location.href = "verification.php";';
            echo '</script>';
        }
        elseif ($faceVerification == 0)
        {
            ?>

                <!DOCTYPE html>

                <html>

                <head>

                    <title>Facial Verification</title>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

                    <style type="text/css">
                        body {
                              min-height: 100vh;
                              background-image: url('assets/img/facialrecognitionBG.jpg');
                              background-repeat: no-repeat;
                              background-attachment: fixed;
                              background-size: cover;
                            }
                        #results { padding:20px; border-style: solid; border-width: 2px; background:#ccc; }
                        #result { padding:20px; border-style: solid; border-width: 2px; background:#ccc; }
                        #my_camera { margin-right: 1px;}

                        h1 {
                          -webkit-animation: neon2 1.5s ease-in-out infinite alternate;
                          -moz-animation: neon2 1.5s ease-in-out infinite alternate;
                          animation: neon2 1.5s ease-in-out infinite alternate;
                        }
                        @-webkit-keyframes neon2 {
                          from {
                            text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #228DFF, 0 0 70px #228DFF, 0 0 80px #228DFF, 0 0 100px #228DFF, 0 0 150px #228DFF;
                          }
                          to {
                            text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #228DFF, 0 0 35px #228DFF, 0 0 40px #228DFF, 0 0 50px #228DFF, 0 0 75px #228DFF;
                          }
                        }
                    </style>

                </head>

                <body>

                    <div style="position: relative;">
                        
                    <h6 style="color: white; float: right;"> Voter ID: <?php echo $_SESSION['Voter']; ?><br>Name: <?php echo $row['Name']; ?></h6><br><br>
                    <a href="logout.php" style="right: 0; position: absolute;" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Logout</a>
                    </div>
                    <br>
                    <div class="container">
                        <?php
                            $sql = "select `title` from `election_info` ";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                            $title = $row['title'];
                        ?>
                    <h1 class="text-center" style="font-weight: bold; font-family: "><?php echo $title; ?></h1>
                    
                    
                    <form method="POST" action="storeImage.php">

                        <div class="row">

                            <div class="col-md-6">

                                <div id="my_camera"></div>

                                <br/>

                                <input type=button class="btn btn-warning" name="Snapshot" value="Take Snapshot" onClick="take_snapshot()">

                                <input type="hidden" name="image" class="image-tag">

                            </div>

                            <div class="col-md-6">

                                <div id="results">Your image will appear here: </div>
                                <div id="result" style="display: none;">Click on SUBMIT button to proceed or RETRY taking snapshot...</div>

                            </div>
                            <h5 style="background-color: white; color: red">*Submitted image should not be blurred, or with eyes closed or with glasses.</h5>
                            <div class="col-md-12 text-center">

                                <button class="btn btn-success" id="submit" disabled="disabled">SUBMIT</button>

                            </div>

                        </div>

                    </form>
                    

                    </div>

  

                    <!-- Configure a few settings and attach camera -->

                    <script language="JavaScript">

                        Webcam.set({

                        width: 490,

                        height: 390,

                        image_format: 'jpeg',

                        jpeg_quality: 90

                        });

                        Webcam.attach( '#my_camera' );

                        function take_snapshot() 
                        {

                            document.getElementById('submit').removeAttribute('disabled');
                            document.getElementById('result').removeAttribute('style');

                            Webcam.snap( function(data_uri) 
                            {

                                $(".image-tag").val(data_uri);

                                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

                            } );

                        }

                    </script>

 

            </body>

            </html>

            <?php
            include('includes/footer.php');
        }
    }
    
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Please Login before accessing this page.");'; 
        echo 'window.location.href = "login.php";';
        echo '</script>';
    }

?>



