<?php
session_start();
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
			or die ("Nie mozna polaczyc sie z serwerem\n"); 
echo "Udalo sie polaczyc z serwerem";
$ID = $_SESSION['ID_KLIENT'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$data_urodzenia = $_POST['data_urodzenia'];
$email = $_POST['email'];
$password = $_POST['haslo'];
$miejscowosc = $_POST['miejscowosc'];
$ulica = $_POST['ulica'];
$nr_domu = $_POST['nr_domu'];
$kod = $_POST['kod'];
$result1 = pg_prepare($con,"my_query1",'UPDATE projekt.Klient SET imie = $1, nazwisko= $2,mail=$3, hasło = $4,data_urodzenia=$5 WHERE projekt.Klient.ID_KLIENT = $6');
$result1 = pg_execute($con,"my_query1",array($imie,$nazwisko,$email,$password,$data_urodzenia,$ID)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
$result2 = pg_prepare($con,"my_query2",'UPDATE projekt.Adres SET miejscowość = $1, ulica =$2,numer_domu = $3,kod_pocztowy=$4 WHERE projekt.Adres.ID_KLIENT = $5 ');
$result2 = pg_execute($con,"my_query2",array($miejscowosc,$ulica,$nr_domu,$kod,$ID)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());


header("location: KlientSerwis.php");

?>