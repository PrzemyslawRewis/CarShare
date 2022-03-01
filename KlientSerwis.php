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
<header>
    <h3>Panel sterowania</h3>
    <button onclick="window.location.href='KlientDaneOsobowe.php'">Dane osobowe</button>
    <button onclick="window.location.href='KlientEdytujDaneOsobowe.php'">Edytuj dane</button>
    <button onclick="window.location.href='KlientWypozyczenia.php'">Historia wypożyczeń </button>
    <button onclick="window.location.href='KlientOcena.php'">Dodaj ocene</button>
    <button onclick="window.location.href='Katalog.php'">Katalog samochodów</button>
	<button onclick="window.location.href='KlientWyloguj.php'">Wylogowanie</button>
</header>

    <footer>
            &copy; Przemysław Rewiś 2022
    </footer> 
</body>

</html>