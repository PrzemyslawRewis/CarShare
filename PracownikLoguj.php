<?php
    session_start();
?>

<!DOCTYPE HTML>
<html lang="pl-PL">

<head>
   	<title>CarShare</title>
	<meta http-equiv="content-type: text/html; charset=utf-8">
   	<link rel="StyleSheet" href="style.css" type="text/css">
	<title>Projekt Bazy Danych</title>
	
</head>
<body>
<h1>Zaloguj się</h1>
<div class="form-center">

    <form action="logowanie_PracownikOK.php" method="post">    
        <input type="text" name="email" placeholder="e_mail"/><br/><br/>
        <input type="password" name="haslo" placeholder="hasło"/><br/><br/>      
	    <button type="submit">Zaloguj</button> 
    </form>
    <button onclick="window.location.href='index.php'">Powrót do strony głównej</button>
</div> 

    <footer>
            &copy; Przemysław Rewiś 2022
    </footer> 
</body>

</html>