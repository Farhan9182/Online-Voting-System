<?php

	include("includes/connection.php");
    session_start();
    
    if(isset($_SESSION['Voter']))
    {
        $name = $_SESSION['Voter'];
        $sql = "SELECT * FROM `voters` WHERE `VoterID`='".$name."'";
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

        $dateOfBirth = $row['DOB'];
        $actualCity = $row['City'];
      //Calculating age
          $today = date("Y-m-d");
          $diff = date_diff(date_create($dateOfBirth), date_create($today));
          $age=$diff->format('%y');

      //Fetching user's current location
          $query = @unserialize (file_get_contents('http://ip-api.com/php/'));
          if ($query && $query['status'] == 'success') 
          {
            $city = $query['city'] ;  

          //Verifying age and location of Voter
              if ($age >= '50' || strtoupper($city) != strtoupper($actualCity)) 
              {
                  
                  //Setting verification flag
                    $verified = 1;
                    $query = "update voters set Verification ='".$verified."' where VoterID = '".$_SESSION['Voter']."'";
                    mysqli_query($con,$query);

                    $str = "Your age is: ".$age."\\nYour actual city is: ".$actualCity."\\nYour current city is: ".$city."\\nYou are eligible for Online Voting Services";
                    echo '<script type="text/javascript">'; 
                    echo "alert('$str');";
                    echo 'alert("Please proceed for facial verification.");'; 
                    echo 'window.location.href = "welcome.php";';
                    echo '</script>';
              } 
              else 
              {

                  $str = "Your age is: ".$age."\\nYour actual city is: ".$actualCity."\\nYour current city is: ".$city."\\nYou are not eligible for Online Voting Services";
                    echo '<script type="text/javascript">'; 
                    echo "alert('$str');";
                     
                    echo 'window.location.href = "logout.php";';
                    echo '</script>';
              }
          }
          else
          {
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
              echo 'alert("Failed to fetch location !!! \\nIf connected to any VPN service, kindly disconnect.\\nTrial remaining: '.$_SESSION['trial'].'");'; 
              echo 'window.location.href = "verification.php";';
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
