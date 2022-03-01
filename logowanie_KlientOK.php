<?php
session_start();
$_SESSION['controller_klient']=0;
$con=pg_connect("host=localhost dbname=u9rewis user=u9rewis password=9rewis")
			or die ("Nie mozna polaczyc sie z serwerem\n"); 
echo "Udalo sie polaczyc z serwerem";
$email = $_POST['email'];
$password = $_POST['haslo'];
$result = pg_prepare($con,"my_query",'SELECT ID_KLIENT FROM projekt.Klient k WHERE k.mail = $1 and k.hasło = $2');
$result = pg_execute($con,"my_query",array($email,$password)) or die('Nie udalo sie odczytac polecenia 1' . pg_last_error());
$rows = pg_num_rows($result);

if($rows == 1 || $_SESSION['controller_klient']==1)
{
    $_SESSION['controller_klient']=1;
    $row=pg_fetch_row($result);
    $_SESSION['ID_KLIENT']=$row[0];

    header("location: KlientSerwis.php");
}
else
{
    header("location: KlientLoguj.php");
}

?>