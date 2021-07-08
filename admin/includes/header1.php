<?php

    $link = new \PDO(   'mysql:host=localhost;dbname=voting_system;charset=utf8mb4','root','', //'',
                                array(
                                    \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                    \PDO::ATTR_PERSISTENT => false
                                )
                            );
    $handle1 = $link->prepare("SELECT `Part_No` FROM `part` "); 
    $handle1->execute(); 
    $result1 = $handle1->fetchAll(\PDO::FETCH_OBJ);

    $i = 0;
    
    //Best practice is to create a separate file for handling connection to database
         
        //foreach($row1 as $row2){
        //$Part_No = $row1['Part_No'];

    
        //Best practice is to create a separate file for handling connection to database
    foreach ($result1 as $row1) {
      $z = $i;
      ${"dataPoints".$z} = array();
        try{
             // Creating a new connection.
            // Replace your-hostname, your-db, your-username, your-password according to your database
            
            $value = $row1->Part_No;
            
            $handle = $link->prepare("SELECT `Name`,`Total_Votes` FROM `candidates` WHERE `Part_No`=:Part_No "); 
            $handle->execute(['Part_No' => $value]); 
            $result = $handle->fetchAll(\PDO::FETCH_OBJ);
            
            foreach($result as $row){
                array_push(${"dataPoints".$z}, array("y"=> $row->Total_Votes, "label"=> $row->Name));
            }
          //$link = null;
        }
        catch(\PDOException $ex){
            print($ex->getMessage());
        }
          
        $i++;
     }
   $i--;
    $handle1 = $link->prepare("SELECT `title` FROM `election_info` "); 
    $handle1->execute(); 
    $result = $handle1->fetch(PDO::FETCH_OBJ);
    
     
?>
<!DOCTYPE html>

<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title><?php echo $result->title; ?></title>
  	<!-- Tell the browser to be responsive to screen width -->
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/iCheck/all.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->

  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  	<style type="text/css">
      .bold{
        font-weight:bold;
      }
      
      #candidate_list{
        margin-top:20px;
      }

      #candidate_list ul{
        list-style-type:none;
      }

      #candidate_list ul li{ 
        margin:0 30px 30px 0; 
        vertical-align:top
      }

      .clist{
        margin-left: 20px;
      }

      .cname{
        font-size: 25px;
      }
      @media print {
        a[href]:after {
          content: none !important;
        }
      }
      
  	</style>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script>
      window.onload = function () {
      var i = <?php echo json_encode($i); ?>;
      <?php  
        $handle = $link->prepare("SELECT `Name` FROM `part` ORDER BY `Part_No` DESC"); 
        $handle->execute(); 
        $result = $handle->fetchAll(\PDO::FETCH_OBJ);
          
        foreach ($result as $row) {
          $title = $row->Name;
      ?>
      
      var chart = new CanvasJS.Chart("chartContainer"+i, {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1", // "light1", "light2", "dark1", "dark2"
        title:{
          text: <?php echo json_encode($title); ?>
        },
        axisY:{
          includeZero: true
        },
        data: [{
          type: "column", //change type to bar, line, area, pie, etc
          //indexLabel: "{y}", //Shows y value on all Data Points
          indexLabelFontColor: "#5A5757",
          indexLabelPlacement: "outside",   
          dataPoints: <?php echo json_encode(${"dataPoints".$i}, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
      i--;
    <?php
    $i--;
    }
     ?>  
      }
      
    </script>
    
</head>