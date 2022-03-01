INSERT INTO projekt.Klient(imie,nazwisko,mail,hasło,data_urodzenia) VALUES 
('Jan','Nowak','jannowak@gmail.com','jannowak','1997-05-20'),
('Grzegorz','Nowak','grzegorznowak@gmail.com','password','1996-03-21'),
('Ania','Kowalska','annakowalska@gmail.com','haslo','1997-05-17');

INSERT INTO projekt.Adres(ID_KLIENT,miejscowość,ulica,numer_domu,kod_pocztowy) VALUES
(1,'Kraków','Czarnowiejska','96','32-600'),
(2,'Jasło','Piotra Skargi','106','38-200'),
(3,'Krosno','Rynek','27','38-400');

INSERT INTO projekt.Pracownik(imie,nazwisko,mail,hasło) VALUES
('Jan','Kowalski','jankowalski@gmail.com','jankowalski'),
('Grzegorz','Kowalski','grzegorzkowalski@gmail.com','password'),
('Ania','Nowak','annanowak@gmail.com','haslo');

INSERT INTO projekt.Producent(nazwa) VALUES
('Fiat'),
('Volkswagen'),
('Ferrari');

INSERT INTO projekt.Model_samochodu(ID_PRODUCENT,liczba_miejsc,pojemność_bagażnika,moc_silnika) VALUES
(1,5,200,70),
(1,5,400,95),
(2,5,400,220),
(2,5,550,103),
(2,5,300,86),
(3,3,200,470),
(3,3,200,470);


INSERT INTO projekt.Egzemplarz_Samochodu(ID_SAMOCHÓD,rok_produkcji,VIN) VALUES
    (3,2014,'ZFF68NHTXE0197363'),
    (3,2012,'ZFF65LHA1C0182730'),
    (1,2015,'3C3AFFAR9FT534410'),
    (1,2014,'ZFBCFADH4EZ017858'),
    (2,2010,'WVWEV7AJ7AW151133'),
    (2,1999,'WVWNA63BXXE050629'),
    (2,2012,'WVWDM7AJ6CW284273'),
    (2,2015,'3VW5S7AJ1FM303971');

INSERT INTO projekt.Rezerwacja(ID_EGZEMPLARZ,ID_KLIENT,data_rezerwacji) VALUES
(1,1,'2022-05-20');    

INSERT INTO projekt.Ocena(ID_EGZEMPLARZ,Ocena) VALUES
(1,9),
(1,5),
(2,7),
(3,9),
(6,7);


INSERT INTO projekt.Wyposażenie(ID_EGZEMPLARZ,Wyposażenie) VALUES
(6,'Klimatyzacja'),
(2,'Klimatyzacja'),
(3,'Klimatyzacja'),
(3,'Skórzane fotele'),
(3,'Podgrzweane fotele'),
(4,'Poduszki powietrzne'),
(4,'Klimatyzacja'),
(4,'Skórzane fotele'),
(4,'Podgrzewane fotele'),
(5,'Klimatyzacja'),
(1,'Lampy LED'),
(1,'Poduszki powietrzne'),
(1,'Klimatyzacja'),
(1,'Skórzane fotele'),
(1,'Podgrzewane fotele'),
(7,'Lampy LED'),
(7,'Poduszki powietrzne'),
(7,'Klimatyzacja'),
(7,'Skórzane fotele'),
(7,'Podgrzewane fotele'),
(7,'Isofix'),
(8,'Lampy LED'),
(8,'Poduszki powietrzne'),
(8,'Klimatyzacja'),
(8,'Skórzane fotele'),
(8,'Podgrzewane fotele'),
(8,'Isofix'),
(8,'Komputer pokładowy');

INSERT INTO projekt.Wypożyczenie (ID_EGZEMPLARZ,ID_KLIENT,ID_PRACOWNIK,data_wypożyczenia,ustalona_data_zwrotu,data_zwrotu,kwota_do_zapłaty,dopłata) VALUES
(1, 1, 1, '2022-01-01', '2022-01-07', '2022-01-07',1000, 0),
(1, 1, 1, '2022-01-08', '2022-02-01', null,1000, 0),
(2, 2, 2, '2022-01-10', '2022-02-10', null,1000 ,0),
(3, 3, 3, '2022-01-05', '2022-02-05', null,500,0),
(6, 3, 1, '2022-01-03', '2022-02-03', null,300,0);

--modyfikacja danych po modyfikacji tabeli
UPDATE projekt.Egzemplarz_Samochodu SET dostępny = false WHERE projekt.Egzemplarz_Samochodu.ID_EGZEMPLARZ = 1;
UPDATE projekt.Egzemplarz_Samochodu SET dostępny = false WHERE projekt.Egzemplarz_Samochodu.ID_EGZEMPLARZ = 2;
UPDATE projekt.Egzemplarz_Samochodu SET dostępny = false WHERE projekt.Egzemplarz_Samochodu.ID_EGZEMPLARZ = 3;
UPDATE projekt.Egzemplarz_Samochodu SET dostępny = false WHERE projekt.Egzemplarz_Samochodu.ID_EGZEMPLARZ = 6;
UPDATE projekt.Model_Samochodu SET nazwa = '500' WHERE projekt.Model_Samochodu.ID_SAMOCHÓD = 1;
UPDATE projekt.Model_Samochodu SET nazwa = 'Tipo' WHERE projekt.Model_Samochodu.ID_SAMOCHÓD = 2;
UPDATE projekt.Model_Samochodu SET nazwa = 'Passat' WHERE projekt.Model_Samochodu.ID_SAMOCHÓD = 3;
UPDATE projekt.Model_Samochodu SET nazwa = 'Golf' WHERE projekt.Model_Samochodu.ID_SAMOCHÓD = 4;
UPDATE projekt.Model_Samochodu SET nazwa = 'Polo' WHERE projekt.Model_Samochodu.ID_SAMOCHÓD = 5;
UPDATE projekt.Model_Samochodu SET nazwa = 'f40' WHERE projekt.Model_Samochodu.ID_SAMOCHÓD = 6;
UPDATE projekt.Model_Samochodu SET nazwa = '458' WHERE projekt.Model_Samochodu.ID_SAMOCHÓD = 7;






