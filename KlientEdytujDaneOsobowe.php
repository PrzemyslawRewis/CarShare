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
<h1>Wprowadź aktualne dane</h1>
<div class="form-center">

    <form action="edytuj_uzytkownika.php" method="post">
       
        <input type="text" name="imie" placeholder="imie" required/><br/><br/>
        <input type="text" name="nazwisko" placeholder="nazwisko" required/><br/><br/>
        <input type="text" name="email" placeholder="e_mail"required/><br/><br/>
        <input type="password" name="haslo" placeholder="hasło"required/><br/><br/>
        <label>Data urodzenia: </label>
        <input type="date" name="data_urodzenia" placeholder="Data urodzenia"required/> <br/><br/>
        <input type="text" name="miejscowosc" placeholder="miejscowość"required/><br/><br/>
        <input type="text" name="ulica" placeholder="ulica"required/><br/><br/>
	    <label>Numer domu: </label>
        <input type="number" min="0" name="nr_domu" placeholder="Numer domu"required/><br/><br/>
	    <input type="text" name="kod" placeholder="kod pocztowy"required/><br/><br/>
	    <button type="submit">Zmień dane</button>
  </form>
  <button onclick="window.location.href='KlientSerwis.php'">Powrót</button>
</div>  
<footer>
            &copy; Przemysław Rewiś 2022
    </footer> 

</body>
</html>