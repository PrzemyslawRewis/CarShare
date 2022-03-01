<?php
    session_start();
?>
<!DOCTYPE HTML>
<html lang="pl-PL">

<head>
   	<title>CarShare</title>
	<meta http-equiv="content-type: text/html; charset=utf-8">
   	<link rel="StyleSheet" href="style.css" type="text/css">
	<title>Projekt Bazy Danych</title>
	
</head>
<body>
<header>
    <h3>Panel sterowania</h3>
    <button onclick="window.location.href='PracownikDaneOsobowe.php'">Twoje dane osobowe</button>
    <button onclick="window.location.href='PracownikEdytujDaneOsobowe.php'">Edytuj swoje dane </button>
    <button onclick="window.location.href='KlienciDane.php'">Wyświetl dane osobowe klientów </button>
	<button onclick="window.location.href='PracownikEdytujDaneOsoboweKlienta.php'">Edytuj dane osobowe klienta</button>
    <button onclick="window.location.href='Katalog2.php'">Katalog samochodów</button>
	<button onclick="window.location.href='NowyPracownik.php'">Dodaj pracownika</button>
    <button onclick="window.location.href='PracownikWypozyczeniaKlientow.php'">Wypożyczenia</button>
	<button onclick="window.location.href='SamochodyStatystyki.php'">Statystyki samochodów</button>
    <button onclick="window.location.href='DodawanieProducenta.php'">Dodaj nowego producenta</button>
    <button onclick="window.location.href='DodawanieModeluAuta.php'">Dodaj nowy model</button>
    <button onclick="window.location.href='DodawanieSamochodu.php'">Dodaj nowy samochód</button>
    <button onclick="window.location.href='DodawanieWyposazenia.php'">Dodaj wyposażenie</button>
	<button onclick="window.location.href='DodawanieWypozyczenia.php'">Wypożycz samochód</button>
    <button onclick="window.location.href='PrzyjmijZwrot.php'">Przyjmij zwrot</button>
    <button onclick="window.location.href='DodawanieRezerwacji.php'">Dodaj rezerwacje</button>
    <button onclick="window.location.href='PrzegladRezerwacji.php'">Przeglądaj rezerwacje</button>
    <button onclick="window.location.href='PracownikWyloguj.php'">Wylogowanie</button>
</header>

    <footer>
            &copy; Przemysław Rewiś 2022
    </footer> 
</body>

</html>