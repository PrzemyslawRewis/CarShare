<?php
    session_start();
    $_SESSION['controller_klient']=0;
    session_destroy(); 
    header("location: index.php");
    
?>