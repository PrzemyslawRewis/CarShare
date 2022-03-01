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

    <form action="zwrot.php" method="post">
       
        <input type="text" name="ID" placeholder="ID WYPOŻYCZENIA" required/><br/><br/>
        <input type="number" name="doplata" min=0 step=0.01 placeholder="Kwota do dopłaty" required/><br/><br/>
	    <button type="submit">Dodaj</button>
        <button onclick="window.location.href='PracownikSerwis.php'">Powrót</button>
  </form>
</div>  
<footer>
            &copy; Przemysław Rewiś 2022
    </footer> 

</body>
</html>