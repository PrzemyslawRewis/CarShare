<?php
session_start();
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
			or die ("Nie mozna polaczyc sie z serwerem\n"); 
echo "Udalo sie polaczyc z serwerem";
$nazwam = $_POST['nazwam'];
$rokprodukcji = $_POST['rokprodukcji'];
$VIN = $_POST['VIN'];
$controller = false;

$query = "SELECT nazwa FROM projekt.Model_samochodu";
$result = pg_query($query) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
 
$row=pg_fetch_all_columns($result,0);
foreach($row as $IE )
{
    if($IE == $nazwam)
    {
        $controller = true;

    }
}
if($controller)
{
    $result2 = pg_prepare($con,"my_query2",'SELECT ID_SAMOCHÓD FROM projekt.Model_samochodu p WHERE p.nazwa=$1');
    $result2 = pg_execute($con,"my_query2",array($nazwam)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
    $row2=pg_fetch_row($result2);
    $I=$row2[0];
    $result3 = pg_prepare($con,"my_query3",'SELECT projekt.dodaj_samochod($1,$2,$3)');
    $result3 = pg_execute($con,"my_query3",array($I,$rokprodukcji,$VIN)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
    header("location: PracownikSerwis.php");

}
else
{   
    header("location: DodawanieSamochodu.php");
}
?>