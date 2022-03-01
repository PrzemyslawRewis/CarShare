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
<h1>Dodaj ocene</h1>
<div class="form-center">

    <form action="dodaj_ocene.php" method="post">    
        <input type="text" name="ID" placeholder="ID_EGZEMPLARZA"/><br/><br/>
        <input type="number" min = 0 max = 10  name="Ocena" placeholder="Twoja ocena"/><br/><br/>      
	    <button type="submit">Dodaj ocene</button> 
    </form>
    <button onclick="window.location.href='KlientSerwis.php'">Powrót</button>
</div> 

    <footer>
            &copy; Przemysław Rewiś 2022
    </footer> 
</body>

</html>