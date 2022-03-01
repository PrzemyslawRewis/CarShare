<?php
session_start();
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
			or die ("Nie mozna polaczyc sie z serwerem\n"); 
echo "Udalo sie polaczyc z serwerem";
$IDE= $_POST['IDE'];
$IDK =$_POST['IDK'];
$data = $_POST['data_rezerwacji']; 
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
    
    $result3 = pg_prepare($con,"my_query2",'SELECT data_rezerwacji FROM projekt.Rezerwacja r WHERE r.ID_EGZEMPLARZ = $1 and r.ID_KLIENT=$2');
    $result3 = pg_execute($con,"my_query2",array($IDE,$IDK)) or die('Nie udalo sie odczytac polecenia 3' . pg_last_error());
    $row3=pg_fetch_all_columns($result3,0);
    foreach($row3 as $IEEA )
    {
        if($IEEA == $data)
        {
           $controllernomultirecord = false;
           break;

        }
    }
    if($controllernomultirecord)
    {

        $result4 = pg_prepare($con,"my_query3",'SELECT projekt.dodaj_rezerwacje($1,$2,$3)');
        $result4 = pg_execute($con,"my_query3",array($IDE,$IDK,$data)) or die('Nie udalo sie odczytac polecenia 4' . pg_last_error());
        header("location: PracownikSerwis.php");

    }
    else
    {   
        header("location: DodawanieRezerwacji.php");
    }
   


}
else
{   
    header("location: DodawanieRezerwacji.php");
}
?>