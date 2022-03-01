<?php
session_start();
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
			or die ("Nie mozna polaczyc sie z serwerem\n"); 
echo "Udalo sie polaczyc z serwerem";
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$data_urodzenia = $_POST['data_urodzenia'];
$email = $_POST['email'];
$password = $_POST['haslo'];
$miejscowosc = $_POST['miejscowosc'];
$ulica = $_POST['ulica'];
$nr_domu = $_POST['nr_domu'];
$kod = $_POST['kod'];

$result1 = pg_prepare($con,"my_query1",'SELECT projekt.dodaj_uzytkownika($1,$2,$3,$4, $5, $6, $7,$8, $9)');
$result1 = pg_execute($con,"my_query1",array($imie,$nazwisko,$email,$password,$data_urodzenia,$miejscowosc,$ulica,$nr_domu,$kod)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());

echo "\ndodano uzytkownika";

header("location: KlientLoguj.php");

?>