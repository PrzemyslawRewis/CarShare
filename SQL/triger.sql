CREATE OR REPLACE FUNCTION projekt.walidacja_mail()
RETURNS TRIGGER AS 
$$
BEGIN
IF  NEW.mail NOT LIKE '%_@__%.__%'
THEN RAISE EXCEPTION 'ERROR: Niepoprawny adres e-mail.';
END IF;
RETURN NEW;
END
$$
LANGUAGE plpgsql;

CREATE TRIGGER walidator_email
BEFORE INSERT OR UPDATE ON projekt.Klient
FOR EACH ROW EXECUTE PROCEDURE projekt.walidacja_mail();

 
CREATE OR REPLACE FUNCTION projekt.walidacja_wypożyczenie()
RETURNS TRIGGER AS 
$$
BEGIN
IF NEW.data_wypożyczenia > NOW()
THEN RAISE EXCEPTION 'ERROR: Nie można wypożyczyć w przyszłość.';
ELSIF NEW.ustalona_data_zwrotu < NEW.data_wypożyczenia
THEN RAISE EXCEPTION 'ERROR: Nie można oddać przed wypożyczeniem.';
ELSIF NEW.data_zwrotu < NEW.data_wypożyczenia
THEN RAISE EXCEPTION 'ERROR: Nie można oddać przed wypożyczeniem.';
ELSIF NEW.dopłata < 0
THEN RAISE EXCEPTION 'ERROR: Dopłata nie może być mniejsza od 0.';
ELSIF NEW.kwota_do_zapłaty < 0
THEN RAISE EXCEPTION 'ERROR: Opłata nie może być mniejsza od 0.';

END IF;
RETURN NEW;
END
$$
LANGUAGE plpgsql;


CREATE TRIGGER walidator_wypozyczenia
BEFORE INSERT OR UPDATE ON projekt.wypożyczenie
FOR EACH ROW EXECUTE PROCEDURE projekt.walidacja_wypożyczenie(); 

CREATE OR REPLACE FUNCTION projekt.walidacja_oceny()
RETURNS TRIGGER AS
$$
BEGIN
IF NEW.ocena < 0
THEN RAISE EXCEPTION 'ERROR: Ocena nie może być ujemna!';
END IF;
RETURN NEW;
END
$$
LANGUAGE plpgsql;

CREATE TRIGGER walidator_oceny
BEFORE INSERT OR UPDATE ON projekt.Ocena
FOR EACH ROW EXECUTE PROCEDURE projekt.walidacja_oceny(); 

CREATE OR REPLACE FUNCTION projekt.walidacja_Klient()
RETURNS TRIGGER AS 
$$
BEGIN
IF length(NEW.imie) < 2
THEN RAISE EXCEPTION 'ERROR: Zbyt krótkie imię.';
ELSIF length(NEW.nazwisko) < 1
THEN RAISE EXCEPTION 'ERROR: Zbyt krótkie nazwisko';
ELSIF length(NEW.hasło) < 3
THEN RAISE EXCEPTION 'ERROR: Zbyt krótkie hasło';
ELSIF NEW.data_urodzenia >= NOW()
THEN RAISE EXCEPTION 'ERROR: Niepoprawna data urodzenia';
END IF;
RETURN NEW;
END
$$
LANGUAGE plpgsql;

CREATE TRIGGER walidator_Klienta
BEFORE INSERT OR UPDATE ON projekt.Klient
FOR EACH ROW EXECUTE PROCEDURE projekt.walidacja_Klient();

CREATE OR REPLACE FUNCTION projekt.walidacja_Pracownik()
RETURNS TRIGGER AS 
$$
BEGIN
IF length(NEW.imie) < 2
THEN RAISE EXCEPTION 'ERROR: Zbyt krótkie imię.';
ELSIF length(NEW.nazwisko) < 1
THEN RAISE EXCEPTION 'ERROR: Zbyt krótkie nazwisko';
ELSIF length(NEW.hasło) < 3
THEN RAISE EXCEPTION 'ERROR: Zbyt krótkie hasło';
END IF;
RETURN NEW;
END
$$
LANGUAGE plpgsql;

CREATE TRIGGER walidator_Pracownika
BEFORE INSERT OR UPDATE ON projekt.Pracownik
FOR EACH ROW EXECUTE PROCEDURE projekt.walidacja_Pracownik();

CREATE OR REPLACE FUNCTION projekt.walidacja_samochodu()
RETURNS TRIGGER AS 
$$
BEGIN
IF NEW.liczba_miejsc < 1
THEN RAISE EXCEPTION 'ERROR: Liczba miejsc nie może być mniejsza od 0';
ELSIF NEW.pojemność_bagażnika < 1
THEN RAISE EXCEPTION 'ERROR: Pojemność bagażnika nie może być mniejsza od 0';
ELSIF NEW.moc_silnika < 1
THEN RAISE EXCEPTION 'ERROR: Moc silnika nie może być mniejsza od 0';
END IF;
RETURN NEW;
END
$$
LANGUAGE plpgsql;

CREATE TRIGGER walidator_Samochodu
BEFORE INSERT OR UPDATE ON projekt.Model_samochodu
FOR EACH ROW EXECUTE PROCEDURE projekt.walidacja_samochodu();

CREATE OR REPLACE FUNCTION projekt.walidacja_egzemplarz()
RETURNS TRIGGER AS 
$$
BEGIN
IF NEW.rok_produkcji < 1900
THEN RAISE EXCEPTION 'ERROR: Błąd rok produkcji';
ELSIF length(NEW.VIN) != 17
THEN RAISE EXCEPTION 'ERROR: Błędny numer VIN';
END IF;
RETURN NEW;
END
$$
LANGUAGE plpgsql;

CREATE TRIGGER walidator_egzemplarza
BEFORE INSERT OR UPDATE ON projekt.Egzemplarz_samochodu
FOR EACH ROW EXECUTE PROCEDURE projekt.walidacja_egzemplarz();

CREATE OR REPLACE FUNCTION projekt.walidacja_Producent()
RETURNS TRIGGER AS 
$$
BEGIN
IF length(NEW.nazwa) < 2
THEN RAISE EXCEPTION 'ERROR: Zbyt krótka nazwa';
END IF;
RETURN NEW;
END
$$
LANGUAGE plpgsql;

CREATE TRIGGER walidator_Producenta
BEFORE INSERT OR UPDATE ON projekt.Producent
FOR EACH ROW EXECUTE PROCEDURE projekt.walidacja_Producent();

CREATE OR REPLACE FUNCTION projekt.walidacja_rezerwacja()
RETURNS TRIGGER AS 
$$
BEGIN
IF NEW.data_rezerwacji < NOW()
THEN RAISE EXCEPTION 'ERROR: Nie można rezerwować w przeszłości.';
END IF;
RETURN NEW;
END
$$
LANGUAGE plpgsql;


CREATE TRIGGER walidator_rezerwacji
BEFORE INSERT OR UPDATE ON projekt.rezerwacja
FOR EACH ROW EXECUTE PROCEDURE projekt.walidacja_rezerwacja(); 