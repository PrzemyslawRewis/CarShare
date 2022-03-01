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
<h1>Dodawanie samochodu</h1>
<div class="form-center">

    <form action="dodaj_samochod.php" method="post">
       
        <input type="text" name="nazwam" placeholder="nazwa modelu" required/><br/><br/>
        <input type="number" min=1900 max=2022 name="rokprodukcji" placeholder="Rok produkcji" required/><br/><br/>
        <input type="text" name="VIN" placeholder="VIN" minlength=17 required/><br/><br/>
	    <button type="submit">Dodaj</button>
  </form>
  <button onclick="window.location.href='PracownikSerwis.php'">Powrót</button>
</div>  
<footer>
            &copy; Przemysław Rewiś 2022
    </footer> 

</body>
</html>