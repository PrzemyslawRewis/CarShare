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
<h1>Wprowadź dane nowego producenta</h1>
<div class="form-center">

    <form action="dodaj_producenta.php" method="post">
       
        <input type="text" name="nazwa" placeholder="nazwa producenta" required/><br/><br/>
	    <button type="submit">Dodaj</button>
        <button onclick="window.location.href='PracownikSerwis.php'">Powrót</button>
  </form>
</div>  
<footer>
            &copy; Przemysław Rewiś 2022
    </footer> 

</body>
</html>