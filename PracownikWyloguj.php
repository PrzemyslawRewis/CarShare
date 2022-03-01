<?php
    session_start();
    $_SESSION['controller_pracownik']=0;
    session_destroy(); 
    header("location: index.php");
    
?>