<?php

    $link = new \PDO(   'mysql:host=localhost;dbname=voting_system;charset=utf8mb4','root','', //'',
                                array(
                                    \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                    \PDO::ATTR_PERSISTENT => false
                                )
                            );
    $handle1 = $link->prepare("SELECT `title` FROM `election_info` "); 
    $handle1->execute(); 
    $result = $handle1->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title><?php echo $result->title." REPORT"; ?></title>
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
      table {
        border-collapse: collapse;
      }
      td {
        border:1px solid black; vertical-align: top;
      }
      
  	</style>
    
    <script type="text/javascript">

      function mergeCells() {
        let db = document.getElementById("databody");
        let dbRows = db.rows;
        let lastValue = "";
        let lastCounter = 1;
        let lastRow = 0;
        for (let i = 0; i < dbRows.length; i++) {
          let thisValue = dbRows[i].cells[0].innerHTML;
          if (thisValue == lastValue) {
            lastCounter++;
            dbRows[lastRow].cells[0].rowSpan = lastCounter;
            dbRows[i].cells[0].style.display = "none";
          } else {
            dbRows[i].cells[0].style.display = "table-cell";
            lastValue = thisValue;
            lastCounter = 1;
            lastRow = i;
          }
        }
      }
      function printData() {
            var tab = document.getElementById('example1');
            var style = "<html><head><title><?php echo $result->title.' SUSPICIOUS VERIFCATIONS REPORT'; ?></title></head><body><style>";
            style = style + "table {width: 100%; font: 17px Calibri;}";
            style = style + "table, th, td {border: solid 2px; border-collapse: collapse;";
            style = style + "padding: 2px 3px; text-align: center;}";
            style = style + "</style></body></html>";
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(style);
            win.document.write(tab.outerHTML+"<footer class='main-footer'><div class='pull-right hidden-xs'><b>Online Voting System</b></div><strong> &copy; 2020 Brought To You By <a href='https://eci.gov.in/'>Election Commission of India</a></strong></footer>");
            win.document.close();
            win.print();
        }

    </script>
    
</head>