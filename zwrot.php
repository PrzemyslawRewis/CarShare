<?php
session_start();
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
			or die ("Nie mozna polaczyc sie z serwerem\n"); 
echo "Udalo sie polaczyc z serwerem";
$IDW = $_POST['ID'];
$doplata = $_POST['doplata'];
$controller = false;
$oddany = false;
$date = date('Y-m-d');

$query = "SELECT ID_WYPOŻYCZENIE FROM projekt.Wypożyczenie";
$result = pg_query($query) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
$row=pg_fetch_all_columns($result,0); 
foreach($row as $IE )
{
    if($IE == $IDW)
    {
        $controller = true;

    }
}
if($controller)
{

    $result2 = pg_prepare($con,"my_query2",'SELECT * FROM projekt.Wypożyczenie w WHERE w.ID_WYPOŻYCZENIE=$1');
    $result2 = pg_execute($con,"my_query2",array($IDW)) or die('Nie udalo sie odczytac polecenia 2' . pg_last_error());
    $row2=pg_fetch_row($result2);
    $datazwrotu=$row2[6];
    if($datazwrotu == null)
    {
        $query3 = "UPDATE projekt.Egzemplarz_Samochodu SET dostępny = true WHERE projekt.Egzemplarz_Samochodu.ID_EGZEMPLARZ = $row2[1]";
        $result3 = pg_query($query3) or die('Nie udalo sie odczytac polecenia 3' . pg_last_error());  
        $result5 = pg_prepare($con,"my_query4",'UPDATE projekt.Wypożyczenie w  SET data_zwrotu = $1 WHERE w.ID_WYPOŻYCZENIE=$2');
        $result5 = pg_execute($con,"my_query4",array($date,$IDW)) or die('Nie udalo sie odczytac polecenia 5' . pg_last_error());
        $result4 = pg_prepare($con,"my_query3",'UPDATE projekt.Wypożyczenie w  SET dopłata = $1 WHERE w.ID_WYPOŻYCZENIE=$2');
        $result4 = pg_execute($con,"my_query3",array($doplata,$IDW)) or die('Nie udalo sie odczytac polecenia 4' . pg_last_error());     
        header("location: PracownikSerwis.php");

    }
    else
    {
        header("location: PrzyjmijZwrot.php");  
    }

}
else
{   
    header("location: PrzyjmijZwrot.php");
}
?>