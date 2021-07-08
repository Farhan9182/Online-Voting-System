<?php
	
    session_start();

    


    //checking Voter has logged in or not
    if(isset($_SESSION['Voter']))
    {

        include("includes/connection.php");

        $sql = "select * from voters where VoterID='".$_SESSION['Voter']."'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
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
        //checking if the Voter's age and location has been verified or not
        elseif ($verification == 0) 
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Please verify age and location before accessing this page.");'; 
            echo 'window.location.href = "verification.php";';
            echo '</script>';
        }
        //checking if the Voter has already been facially verified
        elseif ($faceVerification == 0) 
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Please submit image for Facial Verification before accessing this page..");'; 
            echo 'window.location.href = "welcome.php";';
            echo '</script>';
        }
        //checking if the Voter has already submiited image or not
        elseif ($faceVerification == 2) 
        {   
            //echo '<script type="text/javascript">'; 
            //echo 'alert("Please wait... \\nYou will be redirected to Voting page automatically after successful verification.");'; 
            //echo 'window.location.href = "waiting.php";';
            //echo '</script>';?>
            <!DOCTYPE html>

                <html>

                <head>

                    <title>Facial Verification</title>
                    <style type="text/css">
                        body {
                                text-align: center;
                              min-height: 90vh;
                              background-image: url('assets/img/waitingBG.gif');
                              background-repeat: no-repeat;
                              background-attachment: fixed;
                              background-size: cover;
                          }

                    h3 { 
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
                <br>
                <br>
                <br>
                <h3>Please do not press back or refresh button...<br>You will be redirected once your image is verified.</h3>
            </body>
            </html>
            
        <?php    header("refresh: 10;");
        }
        elseif ($faceVerification == 1) 
        {
                echo '<script type="text/javascript">'; 
                echo 'alert("Facial verification successful. \\nPlease proceed to cast your vote.");'; 
                echo 'window.location.href = "Voting.php";';
                echo '</script>';
        }
    
        elseif ($faceVerification == 3) 
        {
                
                
               
                  echo '<script type="text/javascript">'; 
                  echo 'alert("Facial verification unsuccessful...!!! \\nPlease retry submitting your image.");'; 
                  echo '</script>';

                  $unverified = 0;
                  $query = "update voters set Facial_Verification ='".$unverified."' where VoterID ='".$_SESSION['Voter']."'";
                  mysqli_query($con,$query);

                  echo '<script type="text/javascript">';
                  echo 'window.location.href = "welcome.php";';
                  echo '</script>';
                
                
        }
        
    }
    
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Please Login before accessing this page.");'; 
        echo 'window.location.href = "index.html";';
        echo '</script>';
    }


	
?>