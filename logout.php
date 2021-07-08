<?php 
    
    	session_start();
        session_destroy();
        echo '<script type="text/javascript">'; 
    	echo 'alert("You are being redirected to homepage.");'; 
    	echo 'window.location.href = "index.html";';
    	echo '</script>';
    

?>