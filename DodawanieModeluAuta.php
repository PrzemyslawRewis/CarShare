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
<h1>Wprowadź dane nowego modelu</h1>
<div class="form-center">

    <form action="dodaj_model.php" method="post">
       
        <input type="text" name="nazwap" placeholder="nazwa producenta" required/><br/><br/>
        <input type="text" name="nazwam" placeholder="nazwa modelu" required/><br/><br/>
        <input type="number" min=0 name="liczbamiejsc" placeholder="liczba miejsc" required/><br/><br/>
        <input type="number" min =0 name="pojemnoscbagaznika" placeholder="pojemnosc bagaznika" required/><br/><br/>
        <input type="number" min= 0 name="moc" placeholder="moc slinika" required/><br/><br/>
	    <button type="submit">Dodaj</button>
        <button onclick="window.location.href='PracownikSerwis.php'">Powrót</button>
  </form>
</div>  
<footer>
            &copy; Przemysław Rewiś 2022
    </footer> 

</body>
</html>