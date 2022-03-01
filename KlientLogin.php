<?php
session_start();
	if($_SESSION['controller_klient']==1)
	{
		header("location: KlientSerwis.php");
	}
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
<h1>Klient</h1>
<button onclick="window.location.href='KlientRejestruj.php'">Rejestracja</button>
	<button onclick="window.location.href='KlientLoguj.php'">Logowanie do serwisu</button>
    <button onclick="window.location.href='index.php'">Powrót do strony głównej</button>
</header>

    <footer>
            &copy; Przemysław Rewiś 2022
    </footer> 
</body>

</html>