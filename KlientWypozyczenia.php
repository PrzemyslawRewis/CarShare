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
<p class = "XD">
  <button onclick="window.location.href='KlientSerwis.php'">Powrót</button>
</p>



<?php
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
or die ("Nie mozna polaczyc sie z serwerem\n"); 
$ID = $_SESSION['ID_KLIENT'];
$result = pg_prepare($con,"my_query",'SELECT * FROM projekt.Wypożyczenia where id_Klient = $1');
$result = pg_execute($con,"my_query",array($ID)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());

echo "<table>\n";
echo "<tr><td>ID WYPOŻYCZENIA</td><td>ID EGZEMPLARZA</td><td>Marka</td><td>Model</td><td>VIN</td><td>ID_KLIENT</td><td>Imie Klienta</td><td>Nazwisko klienta </td><td> Id_pracownik</td><td>Imie pracownika </td><td>Nazwisko pracownika</td><td>Data wypożyczenia</td></td><td>Ustalona data zwrotu</td><td>Data zwrotu</td><td>Kwota do zapłaty</td><td>Dopłata</td></tr>";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
?>



</body>

</html>