<?php
    session_start();

    //checking Voter has logged in or not
    if(isset($_SESSION['Voter']))
    {
        include("includes/connection.php");

        $sql = "SELECT * FROM `voters` WHERE `VoterID`='".$_SESSION['Voter']."'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
        $verification = $row['Verification'];
        $faceVerification=$row['Facial_Verification'];
        $voting=$row['Voting'];
        $part = $row['Part_No'];

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
            echo '<script type="text/javascript">'; 
            echo 'alert("Please wait... \\nYour facial verification is being processed.");'; 
            echo 'window.location.href = "waiting.php";';
            echo '</script>';

        }
        elseif ($faceVerification == 1) 
        {
              ?>
              <?php include 'includes/session.php'; ?>
              <?php include 'includes/header.php'; ?>
              <body class="hold-transition skin-blue sidebar-mini">
              <div class="wrapper">

                <?php include 'includes/navbar.php'; ?>
                <?php include 'includes/menubar.php'; ?>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                    <h1>
                      Candidates List
                    </h1>
                    <ol class="breadcrumb">
                      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                      <li class="active">Candidates List</li>
                    </ol>
                  </section>
                  <!-- Main content -->
                  <section class="content">
                    
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="box">
                          <div class="box-body">
                            <table id="example1" class="table table-bordered">
                              <thead>
                                <tr>
                                  <th class="hidden"></th>
                                  <th>Name</th>
                                  <th>Party</th>
                                  <th>Symbol</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

                                  $i=0;

                                  $sql1 = "SELECT * FROM `candidates` WHERE `Part_No`='".$voter['Part_No']."'";
                                  $result1 = mysqli_query($con,$sql1);

                                  while($row1 = mysqli_fetch_array($result1)){
                                    $party = $row1['Party_ID'];
                                    $sql = "SELECT * FROM `party` WHERE `Party_ID`='".$party."'";
                                    $result = mysqli_query($con,$sql);
                                    $row = mysqli_fetch_array($result);
                                    $time = filemtime("party/".$row['Symbol']);
                                    
                                    echo "
                                      <tr>
                                        <td class='hidden'></td>
                                        <td>".$row1['Name']."</td>
                                        <td>".$row['Name']."</td>
                                        <td>
                                          <img src='party/".$row['Symbol']."?".$time."' alt='".$row['Symbol']."' role='button' width='100px' height='100px' onclick='window.open(this.src)'/>
                                        </td>
                        
                                        <form method='POST'>
                                        <td>
                                          <button class='btn btn-success js-scroll-trigger' name='Vote' value=".$row1['ID'].">Press to Vote</button>
                                        </td>
                                        </form>
                                      </tr>
                                    ";
                                    $i++;
                                  }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>   
                </div>
                  
                <?php include 'includes/footer.php'; ?>
                
              </div>
              <?php include 'includes/scripts.php'; ?>
              </body>
              </html>

              <?php

                  if(isset($_POST['Vote']))
                  { 
                    @$a=$_POST['Vote'];
                    $sql1 = "SELECT * FROM `Candidates` WHERE `ID`='".$a."'";
                    $result = mysqli_query($con,$sql1);
                    $row = mysqli_fetch_array($result);
                    $total = $row['Total_Votes'];
                    $total= $total + 1;

                    //inserting total votes
                    $sql2 = "UPDATE `Candidates` SET `Total_Votes`='".$total."' WHERE `ID`='".$a."'";
                    $result = mysqli_query($con,$sql2);

                    //Setting Vote flag
                    $verified = 1;
                    $query = "update voters set Voting ='".$verified."' where VoterID = '".$_SESSION['Voter']."'";
                    mysqli_query($con,$query);

                    echo '<script type="text/javascript">'; 
                    echo 'alert("Thank You, your vote has been submitted successfully");'; 
                    echo 'window.location.href = "logout.php";';
                    echo '</script>';
                  }
              
         
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

