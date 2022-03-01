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
<h1>Dodaj rezerwacje</h1>
<div class="form-center">

    <form action="dodaj_rezerwacje.php" method="post">
       
        <input type="text" name="IDK" placeholder="ID KLIENTA" required/><br/><br/>
        <input type="text" name="IDE" placeholder="ID EGZEMPLARZA" required/><br/><br/>
        <label>Data rezerwacji: </label>
        <input type="date" name="data_rezerwacji" placeholder="Data rezerwacji" required/> <br/><br/>
	    <button type="submit">Dodaj</button>
  </form>
  <button onclick="window.location.href='PracownikSerwis.php'">Powrót</button>
</div>  
<footer>
            &copy; Przemysław Rewiś 2022
    </footer> 

</body>
</html>