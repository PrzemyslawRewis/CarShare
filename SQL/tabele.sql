CREATE SCHEMA projekt;

SET SEARCH_PATH to projekt;


CREATE SEQUENCE projekt.Klient_seq;

CREATE TABLE projekt.Klient(
    ID_KLIENT INTEGER NOT NULL DEFAULT nextval('projekt.Klient_seq'),
    imie VARCHAR NOT NULL,
    nazwisko VARCHAR NOT NULL,
    mail VARCHAR NOT NULL,
    hasło VARCHAR NOT NULL,
    data_urodzenia DATE NOT NULL,
    CONSTRAINT Klient_pk PRIMARY KEY (ID_KLIENT)


);
ALTER SEQUENCE projekt.Klient_seq OWNED BY projekt.Klient.ID_KLIENT;

CREATE SEQUENCE projekt.Adres_seq;

CREATE TABLE projekt.Adres(
    ID_ADRES INTEGER NOT NULL DEFAULT nextval('projekt.Adres_seq'),
    ID_KLIENT INTEGER NOT NULL,
    miejscowość VARCHAR,
    ulica VARCHAR,
    numer_domu VARCHAR,
    kod_pocztowy VARCHAR,
    CONSTRAINT Adres_pk PRIMARY KEY (ID_ADRES)

);

ALTER SEQUENCE projekt.Adres_seq OWNED BY projekt.Adres.ID_ADRES;

CREATE SEQUENCE projekt.Pracownik_seq;

CREATE TABLE projekt.Pracownik(
    ID_PRACOWNIK INTEGER NOT NULL DEFAULT nextval('projekt.Pracownik_seq'),
    imie VARCHAR NOT NULL,
    nazwisko VARCHAR NOT NULL,
    mail VARCHAR NOT NULL,
    hasło VARCHAR NOT NULL,
    CONSTRAINT Pracownik_pk PRIMARY KEY (ID_PRACOWNIK)

);
ALTER SEQUENCE projekt.Pracownik_seq OWNED BY projekt.Pracownik.ID_PRACOWNIK;

CREATE SEQUENCE projekt.Producent_seq;
CREATE TABLE projekt.Producent(
    ID_PRODUCENT INTEGER NOT NULL DEFAULT nextval('projekt.Producent_seq'),
    nazwa VARCHAR NOT NULL,
    CONSTRAINT Producent_pk PRIMARY KEY (ID_PRODUCENT)

);
ALTER SEQUENCE projekt.Producent_seq OWNED BY projekt.Producent.ID_PRODUCENT;

CREATE SEQUENCE projekt.Model_Samochodu_seq;
CREATE TABLE projekt.Model_Samochodu(
    ID_SAMOCHÓD INTEGER NOT NULL DEFAULT nextval('projekt.Model_Samochodu_seq'),
    ID_PRODUCENT INTEGER NOT NULL,
    liczba_miejsc INTEGER NOT NULL,
    pojemność_bagażnika INTEGER NOT NULL,
    moc_silnika INTEGER NOT NULL,
    CONSTRAINT Model_Samochodu_pk PRIMARY KEY (ID_SAMOCHÓD)

);
ALTER SEQUENCE projekt.Model_Samochodu_seq OWNED BY projekt.Model_Samochodu.ID_SAMOCHÓD;


CREATE SEQUENCE projekt.Egzemplarz_seq;
CREATE TABLE projekt.Egzemplarz_Samochodu(
    ID_EGZEMPLARZ INTEGER NOT NULL DEFAULT nextval ('projekt.Egzemplarz_seq'),
    ID_SAMOCHÓD INTEGER NOT NULL,
    rok_produkcji INTEGER NOT NULL,
    VIN VARCHAR NOT NULL,
    CONSTRAINT Egzemplarz_samochodu_pk PRIMARY KEY (ID_EGZEMPLARZ)
);
ALTER SEQUENCE projekt.Egzemplarz_seq OWNED BY projekt.Egzemplarz_Samochodu.ID_EGZEMPLARZ;

CREATE SEQUENCE projekt.Ocena_seq;
CREATE TABLE projekt.Ocena(
    ID_OCENA INTEGER NOT NULL DEFAULT nextval ('projekt.Ocena_seq'),
    ID_EGZEMPLARZ INTEGER NOT NULL,
    OCENA INTEGER NOT NULL,
    CONSTRAINT Ocena_pk PRIMARY KEY (ID_OCENA)

);
ALTER SEQUENCE projekt.Ocena_seq OWNED BY projekt.Ocena.ID_OCENA;

CREATE SEQUENCE projekt.Wyposażenie_seq;
CREATE TABLE projekt.Wyposażenie(
    ID_WYPOSAŻENIE INTEGER NOT NULL DEFAULT  nextval('projekt.Wyposażenie_seq'),
    ID_EGZEMPLARZ INTEGER NOT NULL,
    Wyposażenie VARCHAR NOT NULL,
    CONSTRAINT Wyposażenie_pk PRIMARY KEY (ID_WYPOSAŻENIE)
);
ALTER SEQUENCE projekt.Wyposażenie_seq OWNED BY projekt.Wyposażenie.ID_WYPOSAŻENIE;

CREATE SEQUENCE projekt.Rezerwacja_seq;
CREATE TABLE projekt.Rezerwacja(
    ID_REZERWACJA INTEGER NOT NULL DEFAULT nextval('projekt.Rezerwacja_seq'),
    ID_EGZEMPLARZ INTEGER NOT NULL,
    ID_KLIENT INTEGER NOT NULL,
    data_rezerwacji DATE NOT NULL,
    CONSTRAINT Rezerwacja_pk PRIMARY KEY (ID_REZERWACJA)

);
ALTER SEQUENCE projekt.Rezerwacja_seq OWNED BY projekt.Rezerwacja.ID_REZERWACJA;

CREATE SEQUENCE projekt.Wypożyczenie_seq;
CREATE TABLE projekt.Wypożyczenie(
    ID_WYPOŻYCZENIE INTEGER NOT NULL DEFAULT nextval('projekt.Wypożyczenie_seq'),
    ID_EGZEMPLARZ INTEGER NOT NULL,
    ID_KLIENT INTEGER NOT NULL,
    ID_PRACOWNIK INTEGER NOT NULL,
    data_wypożyczenia DATE NOT NULL,
    ustalona_data_zwrotu DATE NOT NULL,
    data_zwrotu DATE,
    kwota_do_zapłaty DECIMAL NOT NULL,
    dopłata DECIMAL NOT NULL,
    CONSTRAINT Wypożyczenie_pk PRIMARY KEY (ID_WYPOŻYCZENIE)
);
ALTER SEQUENCE projekt.Wypożyczenie_seq OWNED BY projekt.Wypożyczenie.ID_WYPOŻYCZENIE;

ALTER TABLE projekt.Adres ADD CONSTRAINT klient_adres_fk
FOREIGN KEY (ID_KLIENT) 
REFERENCES projekt.Klient(ID_KLIENT)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Model_Samochodu ADD CONSTRAINT producent_model_samochodu_fk
FOREIGN KEY (ID_PRODUCENT)
REFERENCES projekt.Producent(ID_PRODUCENT)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Rezerwacja ADD CONSTRAINT klient_rezerwacja_fk
FOREIGN KEY (ID_KLIENT)
REFERENCES projekt.Klient(ID_KLIENT)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Rezerwacja ADD CONSTRAINT Egzemplarz_Samochodu_rezerwacja_fk
FOREIGN KEY (ID_EGZEMPLARZ)
REFERENCES projekt.Egzemplarz_Samochodu(ID_EGZEMPLARZ)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Egzemplarz_Samochodu ADD CONSTRAINT Model_Samochodu_Egzemplarz_Samochodu_fk
FOREIGN KEY (ID_SAMOCHÓD)
REFERENCES projekt.Model_Samochodu(ID_SAMOCHÓD)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Ocena ADD CONSTRAINT Egzemplarz_Samochodu_Ocena_fk
FOREIGN KEY (ID_EGZEMPLARZ)
REFERENCES projekt.Egzemplarz_Samochodu(ID_EGZEMPLARZ)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Wyposażenie ADD CONSTRAINT Egzemplarz_Samochodu_Wyposa_fk
FOREIGN KEY (ID_EGZEMPLARZ)
REFERENCES projekt.Egzemplarz_Samochodu(ID_EGZEMPLARZ)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Wypożyczenie ADD CONSTRAINT Egzemplarz_Samochodu_wypozycznie_fk 
FOREIGN KEY (ID_EGZEMPLARZ)
REFERENCES projekt.Egzemplarz_Samochodu(ID_EGZEMPLARZ)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Wypożyczenie ADD CONSTRAINT KLient_Wypozyczenie_fk
FOREIGN KEY (ID_KLIENT)
REFERENCES projekt.Klient(ID_KLIENT)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.Wypożyczenie ADD CONSTRAINT Pracownik_Wypozyczenie_fk
FOREIGN KEY (ID_PRACOWNIK)
REFERENCES projekt.Pracownik(ID_PRACOWNIK)
ON DELETE NO ACTION
ON UPDATE NO ACTION 
NOT DEFERRABLE;


--modyfikacja tabeli  
ALTER TABLE projekt.Egzemplarz_Samochodu 
ADD COLUMN dostępny boolean not null default true;
ALTER TABLE projekt.Model_Samochodu 
ADD COLUMN nazwa VARCHAR DEFAULT '' not null;