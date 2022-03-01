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
<h1>Dodaj wypożyczenie</h1>
<div class="form-center">

    <form action="dodaj_wypozyczenie.php" method="post">
       
        <input type="text" name="IDK" placeholder="ID KLIENTA" required/><br/><br/>
        <input type="text" name="IDE" placeholder="ID EGZEMPLARZA" required/><br/><br/>
        <label>Data wypożyczenia: </label>
        <input type="date" name="data_wypozyczenia" placeholder="Data wypożyczenia" required/> <br/><br/>
        <label>Ustalona data zwrotu: </label>
        <input type="date" name="ustalona_data_zwrotu" placeholder="Ustalona data zwrotu" required/> <br/><br/>
        <input type="number" name="cena" min=0 step=0.01 placeholder="Kwota do zapłaty" required/><br/><br/>
	    <button type="submit">Dodaj</button>
  </form>
  <button onclick="window.location.href='PracownikSerwis.php'">Powrót</button>
</div>  
<footer>
            &copy; Przemysław Rewiś 2022
    </footer> 

</body>
</html>