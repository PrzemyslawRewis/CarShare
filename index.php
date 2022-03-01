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
<h1>Wybierz swoją rolę</h1>
<button onclick="window.location.href='KlientLogin.php'">Klient</button>
	<button onclick="window.location.href='PracownikLogin.php'">Pracownik</button>
</header>

    <footer>
            &copy; Przemysław Rewiś 2022
    </footer> 
</body>

</html>