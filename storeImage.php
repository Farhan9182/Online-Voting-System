<?php

    session_start();
     //checking Voter has logged in or not
    if(isset($_SESSION['Voter']))
    {

        include("includes/connection.php");

        $sql = "SELECT * FROM `voters` WHERE `VoterID`='".$_SESSION['Voter']."'";
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
              $img = $_POST['image'];
              $folderPath = "upload/";
              $image_parts = explode(";base64,", $img);
              $image_type_aux = explode("image/", $image_parts[0]);
              $image_type = $image_type_aux[1];
              $image_base64 = base64_decode($image_parts[1]);
              $fileName = $_SESSION['Voter'] . '.jpg';

              $file = $folderPath . $fileName;

              file_put_contents($file, $image_base64);

              // $imageFileType = "jpg";

              // $image_base64 = base64_encode(file_get_contents($file, $_SESSION['User']) );
              // $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

              //fetching Voter's original image

              $sql = "select * from voters where VoterID='".$_SESSION['Voter']."'";
              $result = mysqli_query($con,$sql);
              $row = mysqli_fetch_array($result);
              $part = $row['Part_No'];
              $image_ori = $row['Image'];
    
              //inserting current image and original image in database
              $query = "insert into `verification` (`VoterID`,`Image`,`Part_No`,`orImage`) values ('".$_SESSION['Voter']."', '".$fileName."', '".$part."', '".$image_ori."')";
    
              //$query = "Update verification set Image='".$image."', Part_No='".$part."', orImage='".$image_ori."' where VoterID='".$name."'";
              mysqli_query($con,$query);

              $verified = 2;
              $query1 = "update voters set Facial_Verification ='".$verified."' where VoterID = '".$_SESSION['Voter']."'";
              mysqli_query($con,$query1);
              $_SESSION['trial']--;
              if($_SESSION['trial'] == 0)
              {
                $verified = 1;
                $sql = "update `voters` set `Malicious` ='".$verified."' where VoterID = '".$_SESSION['Voter']."'";
                $result = mysqli_query($con,$sql);
                echo '<script type="text/javascript">'; 
                echo 'alert("Due to maliciuous activites you have exhausted your number of trials.\\nPlease contact system administrator at: khaan_iz_here@gmail.com");'; 
                echo 'window.location.href = "index.html";';
                echo '</script>';
              }
              echo '<script type="text/javascript">'; 
              echo 'alert("Image submitted successfully.\\nTrial remaining: '.$_SESSION['trial'].'");'; 
              echo 'window.location.href = "waiting.php";';
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
