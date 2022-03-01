CREATE VIEW projekt.Klienci AS
SELECT projekt.Klient.ID_KLIENT, projekt.Klient.imie, projekt.Klient.nazwisko, projekt.Klient.mail, projekt.Klient.data_urodzenia, projekt.adres.miejscowość, projekt.adres.ulica, projekt.adres.numer_domu, projekt.adres.kod_pocztowy
FROM projekt.Klient
NATURAL JOIN projekt.Adres;

CREATE VIEW projekt.Rezerwacje AS
SELECT r.ID_REZERWACJA,k.ID_KLIENT, k.imie, k.nazwisko, p.nazwa as "Marka", m.nazwa as "Model", e.VIN, r.data_rezerwacji
FROM projekt.Rezerwacja r
JOIN projekt.Egzemplarz_Samochodu e USING (ID_EGZEMPLARZ)
JOIN projekt.Model_Samochodu m USING (ID_SAMOCHÓD) 
JOIN projekt.producent p USING (ID_PRODUCENT)
JOIN projekt.Klient k USING (ID_KLIENT);

CREATE VIEW projekt.Wypożyczenia AS
SELECT w.ID_WYPOŻYCZENIE,w.ID_EGZEMPLARZ, pr.nazwa as "Marka",m.nazwa as "Model", e.VIN,  w.ID_KLIENT, k.imie as "imie klienta",k.nazwisko as "nazwisko klienta",w.id_PRACOWNIK, p.imie as "imie pracownika", p.nazwisko as "nazwisko pracownika",w.data_wypożyczenia, w.ustalona_data_zwrotu, w.data_zwrotu, w.kwota_do_zapłaty, w.dopłata
FROM projekt.Wypożyczenie w
JOIN projekt.Klient k USING (ID_KLIENT)
JOIN projekt.Pracownik p USING (ID_PRACOWNIK)
JOIN projekt.Egzemplarz_Samochodu e USING (ID_EGZEMPLARZ)
JOIN projekt.Model_Samochodu m USING (ID_SAMOCHÓD)
JOIN projekt.Producent pr USING (ID_PRODUCENT);

CREATE VIEW projekt.Samochody_parametry AS
SELECT e.ID_EGZEMPLARZ,e.rok_produkcji,e.VIN,p.nazwa as "Marka",m.nazwa as "Model",m.moc_silnika,m.pojemność_bagażnika,m.liczba_miejsc,string_agg(w.Wyposażenie,', ') as Wyposażenie,
CASE WHEN e.dostępny = TRUE then 'TAK' else 'NIE' end as "Dostępny"
FROM projekt.Egzemplarz_Samochodu e
JOIN Wyposażenie w USING (ID_EGZEMPLARZ)
JOIN projekt.Model_Samochodu m USING (ID_SAMOCHÓD)
JOIN projekt.Producent p USING (ID_PRODUCENT)
group by 1,4,5,6,7,8 order by id_egzemplarz;


CREATE VIEW projekt.Samochody_statystyki AS
SELECT e.ID_EGZEMPLARZ, (SELECT COALESCE(round(AVG(ocena),2),0.00) FROM projekt.ocena where id_egzemplarz = e.id_egzemplarz) as "Średnia ocena", (SELECT COUNT(ID_WYPOŻYCZENIE) FROM projekt.Wypożyczenie WHERE projekt.Wypożyczenie.id_egzemplarz = e.id_egzemplarz HAVING COUNT(ID_WYPOŻYCZENIE)>=0 ) as "Ilość Wypożyczeń"
FROM projekt.Egzemplarz_Samochodu e
GROUP BY 1
ORDER BY 1;