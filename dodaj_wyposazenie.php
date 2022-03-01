<?php
session_start();
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
			or die ("Nie mozna polaczyc sie z serwerem\n"); 
echo "Udalo sie polaczyc z serwerem";
$ID= $_POST['ID'];
$wyposazenie= $_POST['wyposazenie'];
$controllerIDOK = false;
$controllerwyposazenieOK = true;

$query = "SELECT ID_EGZEMPLARZ FROM projekt.Wyposażenie";
$result = pg_query($query) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
$row=pg_fetch_all_columns($result,0);
foreach($row as $IE )
{
    if($ID == $IE)
    {
        $controllerIDOK = true;
        break;
    }
}
if($controllerIDOK)
{
    
    $result2 = pg_prepare($con,"my_query2",'SELECT Wyposażenie FROM projekt.Wyposażenie w WHERE w.ID_EGZEMPLARZ = $1');
    $result2 = pg_execute($con,"my_query2",array($ID)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
    $row2=pg_fetch_all_columns($result2,0);
    foreach($row2 as $IEE )
    {
        if($IEE == $wyposazenie)
        {
           $controllerwyposazenieOK = false;

        }
    }
    if($controllerwyposazenieOK)
    {

        $result3 = pg_prepare($con,"my_query3",'SELECT projekt.dodaj_wyposazenie($1,$2)');
        $result3 = pg_execute($con,"my_query3",array($ID,$wyposazenie)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
        header("location: PracownikSerwis.php");

    }
    else
    {
        header("location: DodawanieWyposazenia.php");
    }


}
else
{   
    header("location: DodawanieWyposazenia.php");
}
?>