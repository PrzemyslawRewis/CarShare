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
<h1>Dodaj pracownika</h1>
<div class="form-center">

    <form action="dodaj_pracownika.php" method="post">
        <input type="text" name="imie" placeholder="imie" required/><br/><br/>
        <input type="text" name="nazwisko" placeholder="nazwisko" required/><br/><br/>
        <input type="email" name="email" placeholder="e_mail" required/><br/><br/>
        <input type="password" name="haslo" placeholder="hasło" required/><br/><br/>
	    <button type="submit">Dodaj</button>
  </form>
  <button onclick="window.location.href='PracownikSerwis.php'">Powrót</button>
</div>  
<footer>
            &copy; Przemysław Rewiś 2022
    </footer> 

</body>
</html>