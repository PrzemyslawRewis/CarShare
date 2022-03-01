<?php
session_start();
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
			or die ("Nie mozna polaczyc sie z serwerem\n"); 
echo "Udalo sie polaczyc z serwerem";
$ID = $_SESSION['ID_PRACOWNIK'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$email = $_POST['email'];
$password = $_POST['haslo'];

$result = pg_prepare($con,"my_query",'UPDATE projekt.Pracownik SET imie = $1, nazwisko= $2,mail=$3, hasło = $4 WHERE projekt.Pracownik.ID_PRACOWNIK = $5');
$result = pg_execute($con,"my_query",array($imie,$nazwisko,$email,$password,$ID)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());


header("location: PracownikSerwis.php");

?>