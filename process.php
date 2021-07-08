<?php 
include('includes/connection.php');
session_start();
    if(isset($_POST['Login']))
    {
       if(empty($_POST['UName']) || empty($_POST['Password']))
       {
            header("location:login.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select * from `voters` where VoterID='".$_POST['UName']."' and Pass='".$_POST['Password']."'";
            $result=mysqli_query($con,$query);

            if($row = mysqli_fetch_array($result))
            {   
                $Malicious = $row['Malicious'];
                if($Malicious == 1)
                {
                  echo '<script type="text/javascript">'; 
                  echo 'alert("Due to maliciuous activites you have exhausted your number of trials.\\nPlease contact system administrator at: khaan_iz_here@gmail.com");'; 
                  echo 'window.location.href = "logout.php";';
                  echo '</script>';
                }
                $_SESSION['Voter']=$_POST['UName'];
                $_SESSION['trial'] = 3 ;
                $verification=$row['Verification'];
                $faceVerification=$row['Facial_Verification'];
                $voting=$row['Voting'];
                
                if ($voting == 1) 
                {
                  echo '<script type="text/javascript">'; 
                  echo 'alert("Login Successful. \\nYour vote has been submitted already. \\n Thank You.");'; 
                  echo 'window.location.href = "logout.php";';
                  echo '</script>';
                
                }

                elseif ($faceVerification == 1) 
                {
                  echo '<script type="text/javascript">'; 
                  echo 'alert("Login Successful. \\nResuming from where you left out. \\n Please proceed for voting.");'; 
                  echo 'window.location.href = "Voting.php";';
                  echo '</script>';
                
                }

                elseif ($faceVerification == 2)
                {
                  echo '<script type="text/javascript">'; 
                  echo 'alert("Login Successful. \\nResuming from where you left out. \\nPlease wait while facial verification is being done.");'; 
                  echo 'window.location.href = "waiting.php";';
                  echo '</script>';
                }

                elseif ($faceVerification == 3)
                {
                  echo '<script type="text/javascript">'; 
                  echo 'alert("Login Successful. \\nResuming from where you left out.");'; 
                  echo 'window.location.href = "waiting.php";';
                  echo '</script>';
                }

                elseif ($verification == 1) 
                {

                  echo '<script type="text/javascript">'; 
                  echo 'alert("Login Successful. \\nResuming from where you left out. \\n Please proceed for facial verification.");'; 
                  echo 'window.location.href = "welcome.php";';
                  echo '</script>';
                
                }

                elseif ($verification == 0)
                {
                  echo '<script type="text/javascript">'; 
                  echo 'alert("Login Successful. \\n Now, Your age and location will be verified.");'; 
                  echo 'window.location.href = "verification.php";';
                  echo '</script>';
                }
            }
            else
            {
                header("location:login.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    }
    else
    {
        header("location:login.php?Invalid= Please LOGIN First. ");
    }

?>