<?php
	session_start();
	if($_SESSION['controller_pracownik']==1)
	{
		header("location: PracownikSerwis.php");
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
<h1>Pracownik</h1>
	<button onclick="window.location.href='PracownikLoguj.php'">Logowanie do serwisu</button>
    <button onclick="window.location.href='index.php'">Powrót do strony głównej</button>
</header>

    <footer>
            &copy; Przemysław Rewiś 2022
    </footer> 
</body>

</html>