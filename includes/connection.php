<?php

    $con=mysqli_connect('localhost','root','','voting_system');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
    date_default_timezone_set("Asia/Kolkata");
?>