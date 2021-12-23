SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE DATABASE IF NOT EXISTS eshop;
USE eshop;

CREATE TABLE IF NOT EXISTS Clienti(
  id INT UNIQUE NOT NULL AUTO_INCREMENT,
  nume VARCHAR(30) NOT NULL,
  prenume VARCHAR(30) NOT NULL,
  email VARCHAR(45) NOT NULL,
  parola VARCHAR(45) NOT NULL,
  numar_card INT(8) UNIQUE NOT NULL,
  data_nasterii datetime NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Comenzi(
  id_comanda INT UNIQUE NOT NULL AUTO_INCREMENT,
  id_client INT NOT NULL,
  data_comenzii DATETIME NOT NULL,
  PRIMARY KEY (id_comanda),
FOREIGN KEY (id_client) REFERENCES Clienti(id)
);

CREATE TABLE IF NOT EXISTS Produse (
  id_produs INT UNIQUE NOT NULL AUTO_INCREMENT,
  nume VARCHAR(45) NOT NULL,
  valoare_unitara INT NOT NULL,
  stoc INT CHECK( stoc>=0 AND stoc<=200),
  vandute INT NULL DEFAULT NULL,
  garantie INT CHECK( garantie >=0 AND garantie <=5),
  descriere VARCHAR(80),
  data_expirării datetime NOT NULL,
  PRIMARY KEY (id_produs)
);

CREATE TABLE IF NOT EXISTS Cos_comanda (
  id_cos INT UNIQUE NOT NULL AUTO_INCREMENT,
  cantitate INT NOT NULL,
  id_produs INT NOT NULL,
  id_comanda INT NOT NULL,
  PRIMARY KEY (id_cos),
    FOREIGN KEY (id_comanda) REFERENCES Comenzi (id_comanda),
    FOREIGN KEY (id_produs) REFERENCES Produse(id_produs)
);

INSERT INTO Clienti (id , nume , prenume , email , parola , numar_card, data_nasterii) VALUES
(1, 'Popescu', 'Ion', 'ion@yahoo.com', 'ion123', 11111111 , '1985-01-01'),
(2, 'Georgescu', 'Andreea', 'andreea@yahoo.com', 'andreea123', 22222222 , '1983-08-23'),
(3, 'Ionescu', 'Robert', 'robert@yahoo.com', 'robert123', 33333333 , '1982-03-08');

INSERT INTO Produse (id_produs, nume, valoare_unitara , stoc , vandute ,garantie, descriere,data_expirării) VALUES
(1, 'Fujitsu Siemens Amilo Pro', 2000, 10, 0, 1, '','2025-10-10'),
(2, 'Indesit WLI1000', 900, 5, 0, 3, '','2025-10-10'),
(3, 'Gorenje RC400', 1500, 4, 0, 3, '','2025-10-10');

INSERT INTO Comenzi (id_comanda , id_client , data_comenzii) VALUES
( 1, 1, '2015-01-07 19:58:27'),
( 2, 2, '2015-01-07 21:37:54'),
( 3, 3, '2015-01-08 15:46:49');

INSERT INTO Cos_comanda (id_cos, cantitate, id_produs , id_comanda) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 1, 3, 3);

#triggere

#proceduri
EXEC VanzareProd(4,1,'2024-10-10',5,1);

#interogari

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
