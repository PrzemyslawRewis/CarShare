<?php
session_start();
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
			or die ("Nie mozna polaczyc sie z serwerem\n"); 
echo "Udalo sie polaczyc z serwerem";
$IDE= $_POST['IDE'];
$IDK =$_POST['IDK'];
$IDP = $_SESSION['ID_PRACOWNIK'];
$dataw = $_POST['data_wypozyczenia'];
$datao = $_POST['ustalona_data_zwrotu'];
$cena = $_POST['cena'];  
$controllerIDEOK = false;
$controllerIDKOK = false;
$controllernomultirecord = true;


$query = "SELECT ID_EGZEMPLARZ FROM projekt.Egzemplarz_samochodu";
$result = pg_query($query) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
$row=pg_fetch_all_columns($result,0);
foreach($row as $IE )
{
    if($IDE == $IE)
    {
        $controllerIDEOK = true;
        break;
    }
}
$query2 = "SELECT ID_KLIENT FROM projekt.Klient";
$result2 = pg_query($query) or die('Nie udalo sie odczytac polecenia 2' . pg_last_error());
$row2=pg_fetch_all_columns($result2,0);
foreach($row2 as $IEE )
{
    if($IDK == $IEE)
    {
        $controllerIDKOK = true;
        break;
    }
}
if($controllerIDEOK && $controllerIDKOK)
{
    
    $result3 = pg_prepare($con,"my_query2",'SELECT data_wypożyczenia FROM projekt.wypożyczenie r WHERE r.ID_EGZEMPLARZ = $1 and r.ID_KLIENT=$2');
    $result3 = pg_execute($con,"my_query2",array($IDE,$IDK)) or die('Nie udalo sie odczytac polecenia 3' . pg_last_error());
    $row3=pg_fetch_all_columns($result3,0);
    $result5 = pg_prepare($con,"my_query4",'SELECT dostępny FROM projekt.Egzemplarz_samochodu r WHERE r.ID_EGZEMPLARZ = $1');
    $result5 = pg_execute($con,"my_query4",array($IDE)) or die('Nie udalo sie odczytac polecenia 4' . pg_last_error());
    $row4=pg_fetch_row($result5);
    foreach($row3 as $IEEA )
    {
        if($IEEA == $dataw)
        {
           $controllernomultirecord = false;
           break;

        }
    }
    if($controllernomultirecord && $row4[0])
    {

        $result4 = pg_prepare($con,"my_query3",'SELECT projekt.dodaj_wypozyczenie($1,$2,$3,$4,$5,$6)');
        $result4 = pg_execute($con,"my_query3",array($IDE,$IDK,$IDP,$dataw,$datao,$cena)) or die('Nie udalo sie odczytac polecenia 5' . pg_last_error());
        $result6 = pg_prepare($con,"my_query5",'UPDATE projekt.Egzemplarz_Samochodu SET dostępny = false WHERE projekt.Egzemplarz_Samochodu.ID_EGZEMPLARZ = $1');
        $result6 = pg_execute($con,"my_query5",array($IDE)) or die('Nie udalo sie odczytac polecenia 6' . pg_last_error());
        header("location: PracownikSerwis.php");

    }
    else
    {   
        header("location: DodawanieWypozyczenia.php");
    }
   


}
else
{   
    header("location: DodawanieWypozyczenia.php");
}
?>