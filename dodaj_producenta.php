<?php
session_start();
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
			or die ("Nie mozna polaczyc sie z serwerem\n"); 
echo "Udalo sie polaczyc z serwerem";
$nazwa = $_POST['nazwa'];
$controller = false;

$query = "SELECT nazwa FROM projekt.Producent";
$result = pg_query($query) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
 
$row=pg_fetch_all_columns($result,0);
foreach($row as $IE )
{
    if($IE == $nazwa)
    {
        $controller = true;

    }
}
if(!$controller)
{
    $result2 = pg_prepare($con,"my_query2",'SELECT projekt.dodaj_producenta($1)');
    $result2 = pg_execute($con,"my_query2",array($nazwa)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
    header("location: PracownikSerwis.php");

}
else
{   
    header("location: DodawanieProducenta.php");
}
?>