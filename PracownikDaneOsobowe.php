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
<p>
<button onclick="window.location.href='PracownikSerwis.php'">Powrót</button>
</p>

<?php
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
or die ("Nie mozna polaczyc sie z serwerem\n"); 
$ID = $_SESSION['ID_PRACOWNIK'];
$result = pg_prepare($con,"my_query",'SELECT ID_PRACOWNIK,imie,nazwisko,mail FROM projekt.Pracownik p WHERE p.ID_PRACOWNIK = $1');
$result = pg_execute($con,"my_query",array($ID)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());

echo "<table>\n";
echo "<tr><td>ID PRACOWNIKA</td><td>Imie</td><td>Nazwisko</td><td>e-mail</td></tr>";
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