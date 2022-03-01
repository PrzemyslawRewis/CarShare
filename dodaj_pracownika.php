<?php
session_start();
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
			or die ("Nie mozna polaczyc sie z serwerem\n"); 
echo "Udalo sie polaczyc z serwerem";
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$email = $_POST['email'];
$password = $_POST['haslo'];

$result1 = pg_prepare($con,"my_query1",'SELECT projekt.dodaj_pracownika($1,$2,$3,$4)');
$result1 = pg_execute($con,"my_query1",array($imie,$nazwisko,$email,$password)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());

echo "\ndodano pracownika";

header("location: PracownikSerwis.php");

?>