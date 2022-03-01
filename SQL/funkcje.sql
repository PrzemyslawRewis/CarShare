CREATE OR REPLACE FUNCTION projekt.dodaj_uzytkownika(imie_u TEXT, nazwisko_u TEXT, email_u TEXT,haslo_u TEXT,  data_ur DATE, miejscowosc_u TEXT, ulica_u TEXT, nr_domu_u INTEGER, kod_u TEXT)
RETURNS BOOLEAN AS
$$
DECLARE
    nowyKlient INTEGER;
BEGIN
    INSERT INTO projekt.Klient (imie, nazwisko, mail, hasło, data_urodzenia) 
    VALUES (imie_u, nazwisko_u, email_u, haslo_u, data_ur) RETURNING ID_KLIENT INTO nowyKlient ;

    INSERT INTO projekt.Adres(ID_KLIENT, miejscowość, ulica, numer_domu, kod_pocztowy) 
    VALUES (nowyKlient, miejscowosc_u, ulica_u, nr_domu_u, kod_u);
    RETURN true;
END;
$$
LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION projekt.dodaj_ocene(ID_E INTEGER, Oce INTEGER)
RETURNS BOOLEAN AS
$$
DECLARE
    nowaOcena INTEGER;
BEGIN
    INSERT INTO projekt.Ocena (ID_EGZEMPLARZ, Ocena) 
    VALUES (ID_E, Oce) RETURNING ID_OCENA INTO nowaOcena ;
    RETURN true;
END;
$$
LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION projekt.dodaj_pracownika(imie_u TEXT, nazwisko_u TEXT, email_u TEXT,haslo_u TEXT) 
RETURNS BOOLEAN AS
$$
DECLARE
    nowyPracownik INTEGER;
BEGIN
    INSERT INTO projekt.Pracownik (imie, nazwisko, mail, hasło) 
    VALUES (imie_u, nazwisko_u, email_u, haslo_u) RETURNING ID_PRACOWNIK INTO nowyPracownik ;
    RETURN true;
END;
$$
LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION projekt.dodaj_producenta(nazwa_u TEXT) 
RETURNS BOOLEAN AS
$$
DECLARE
    nowyProducent INTEGER;
BEGIN
    INSERT INTO projekt.Producent (nazwa) 
    VALUES (nazwa_u) RETURNING ID_PRODUCENT INTO nowyProducent ;
    RETURN true;
END;
$$
LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION projekt.dodaj_model(ID_P INTEGER,miejsca INTEGER,bagaznik INTEGER,silnik INTEGER,nazwa_u TEXT) 
RETURNS BOOLEAN AS
$$
DECLARE
    nowyModel INTEGER;
BEGIN
    INSERT INTO projekt.Model_Samochodu (ID_PRODUCENT,liczba_miejsc,pojemność_bagażnika,moc_silnika, nazwa) 
    VALUES (ID_P,miejsca,bagaznik,silnik,nazwa_u) RETURNING ID_SAMOCHÓD INTO nowyModel ;
    RETURN true;
END;
$$
LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION projekt.dodaj_samochod(ID_P INTEGER,rok_u INTEGER,VIN_u TEXT) 
RETURNS BOOLEAN AS
$$
DECLARE
    nowySamochod INTEGER;
BEGIN 
    INSERT INTO projekt.Egzemplarz_Samochodu (ID_SAMOCHÓD,rok_produkcji,VIN) 
    VALUES (ID_P,rok_u,VIN_u) RETURNING ID_EGZEMPLARZ INTO nowySamochod ;
    INSERT INTO projekt.Wyposażenie(ID_EGZEMPLARZ,Wyposażenie) VALUES (nowySamochod,'Klimatyzacja');
    RETURN true;
END;
$$
LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION projekt.dodaj_wyposazenie(ID_P INTEGER,wyposazenie TEXT) 
RETURNS BOOLEAN AS
$$
DECLARE
    noweWyposazenie INTEGER;
BEGIN 
    INSERT INTO projekt.Wyposażenie (ID_EGZEMPLARZ,Wyposażenie) 
    VALUES (ID_P,wyposazenie) RETURNING ID_WYPOSAŻENIE INTO noweWyposazenie ;
    RETURN true;
END;
$$
LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION projekt.dodaj_rezerwacje(ID_E INTEGER,ID_K INTEGER,data_r DATE) 
RETURNS BOOLEAN AS
$$
DECLARE
    nowaRezerwacja INTEGER;
BEGIN 
    INSERT INTO projekt.Rezerwacja (ID_EGZEMPLARZ,ID_KLIENT,data_rezerwacji) 
    VALUES (ID_E,ID_K,data_r) RETURNING ID_REZERWACJA INTO nowaRezerwacja ;
    RETURN true;
END;
$$
LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION projekt.dodaj_wypozyczenie(ID_E INTEGER,ID_K INTEGER,ID_P INTEGER,data_w DATE,data_o DATE,cena DECIMAL) 
RETURNS BOOLEAN AS
$$
DECLARE
    noweWypozyczenie INTEGER;
BEGIN 
    INSERT INTO projekt.Wypożyczenie (ID_EGZEMPLARZ,ID_KLIENT,ID_PRACOWNIK,data_wypożyczenia, ustalona_data_zwrotu,kwota_do_zapłaty,dopłata) 
    VALUES (ID_E,ID_K,ID_P,data_w,data_o,cena,0) RETURNING ID_WYPOŻYCZENIE INTO noweWypozyczenie ;
    RETURN true;
END;
$$
LANGUAGE plpgsql;








