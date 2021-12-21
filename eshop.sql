CREATE DATABASE IF NOT EXISTS eshop;
use eshop;

CREATE TABLE IF NOT EXISTS Persoana(
	idPersoana int auto_increment,
	NumarCard int unique CHECK(NumarCard >= 10000000 AND NumarCard <= 99999999),
    Nume varchar(30),
    Prenume varchar(30),
    DataNasterii datetime,
    PRIMARY KEY(idPersoana)
);

CREATE TABLE IF NOT EXISTS Produs(
	idProdus int PRIMARY KEY auto_increment,
    NumeProdus varchar(30) unique,
    Descriere varchar(80),
    Stoc int CHECK(Stoc >= 0 AND Stoc <= 200),
    ValoareUnitara int NOT NULL,
    Garantie int CHECK(Garantie >= 0 AND Garantie <=5)
);


CREATE TABLE IF NOT EXISTS Comanda(
	idComanda int auto_increment,
    Produs varchar(30) unique,
	FOREIGN KEY (idComanda) REFERENCES Persoana(idPersoana),
	FOREIGN KEY (Produs) REFERENCES Produs(NumeProdus)
);

INSERT INTO Persoana(idPersoana, NumarCard, Nume, Prenume, DataNasterii)
VALUES ( 1, 11111111, "Popescu" , "Ion", '1985-01-01');

INSERT INTO Persoana(idPersoana, NumarCard, Nume, Prenume, DataNasterii)
VALUES ( 2, 22222222, "Georgescu" , "Andreea", '1983-08-23');

INSERT INTO Persoana(idPersoana, NumarCard, Nume, Prenume, DataNasterii)
VALUES ( 3, 33333333, "Ionescu" , "Robert", '1982-03-08');

INSERT INTO Produs (idProdus, NumeProdus,Descriere, Stoc, ValoareUnitara,Garantie)
VALUES (1, "Fujitsu Siemens Amilo Pro" , "", 10, 2000, 1);

INSERT INTO Produs (idProdus, NumeProdus,Descriere, Stoc, ValoareUnitara,Garantie)
VALUES (2, "Indesit WLI1000"           , "",  5,  900, 3);

INSERT INTO Produs (idProdus, NumeProdus,Descriere, Stoc, ValoareUnitara,Garantie)
VALUES (3, "Gorenje RC400"             , "",  4, 1500, 3);

INSERT INTO Comanda (idComanda,Produs)
VALUES (1,"Gorenje RC400");
