<?php
session_start();
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
			or die ("Nie mozna polaczyc sie z serwerem\n"); 
echo "Udalo sie polaczyc z serwerem";
$ID = $_SESSION['ID_KLIENT'];
$ID_E = $_POST['ID'];
$ocena = $_POST['Ocena'];
$controller = false;

$result1 = pg_prepare($con,"my_query1",'SELECT ID_EGZEMPLARZ FROM projekt.Wypożyczenia where id_Klient = $1');
$result1 = pg_execute($con,"my_query1",array($ID)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());

$row=pg_fetch_all_columns($result1,0);
foreach($row as $IE )
{
    if($IE == $ID_E)
    {
        $controller = true;

    }
}
if($controller)
{
    $result2 = pg_prepare($con,"my_query2",'SELECT projekt.dodaj_ocene($1,$2)');
    $result2 = pg_execute($con,"my_query2",array($ID_E,$ocena)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
    header("location: KlientSerwis.php");

}
else
{   
    header("location: KlientOcena.php");
}
?>