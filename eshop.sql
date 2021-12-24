SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

SET FOREIGN_KEY_CHECKS = 0;

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
  data_comenzii DATETIME DEFAULT NULL,
  PRIMARY KEY (id_comanda),
FOREIGN KEY (id_client) REFERENCES Clienti(id)
);

CREATE TABLE IF NOT EXISTS Produse (
  id_produs INT UNIQUE NOT NULL AUTO_INCREMENT,
  nume_produs VARCHAR(80) NOT NULL,
  valoare_unitara INT NOT NULL,
  stoc INT CHECK( stoc>=0 AND stoc<=200),
  vandute INT,
  garantie INT CHECK( garantie >=0 AND garantie <=5),
  PRIMARY KEY (id_produs)
);

CREATE TABLE IF NOT EXISTS Cos_comanda (
  id_cos INT UNIQUE NOT NULL AUTO_INCREMENT,
  cantitate INT,
  id_produs INT NOT NULL,
  id_comanda INT NOT NULL,
  data_comanda DATETIME,
  PRIMARY KEY (id_cos),
    FOREIGN KEY (id_comanda) REFERENCES Comenzi (id_comanda),
    FOREIGN KEY (id_produs) REFERENCES Produse(id_produs)
);

INSERT INTO Clienti (id , nume , prenume , email , parola , numar_card, data_nasterii) VALUES
(1, 'Popescu', 'Ion', 'ion@yahoo.com', 'ion123', 11111111 , '1985-01-01'),
(2, 'Georgescu', 'Andreea', 'andreea@yahoo.com', 'andreea123', 22222222 , '1983-08-23'),
(3, 'Ionescu', 'Robert', 'robert@yahoo.com', 'robert123', 33333333 , '1982-03-08');

INSERT INTO Produse (id_produs, nume_produs, valoare_unitara , stoc , vandute ,garantie) VALUES
(1, 'Fujitsu Siemens Amilo Pro', 2000, 10, 0, 1),
(2, 'Indesit WLI1000', 900, 5, 0, 3),
(3, 'Gorenje RC400', 1500, 4, 0, 3),
(4, 'Laptop Asus', 20000, 1, 0, 0);

INSERT INTO Comenzi (id_comanda , id_client , data_comenzii) VALUES
( 1, 1, '2015-01-07 19:58:27'),
( 2, 2, '2015-01-07 21:37:54'),
( 3, 3, '2015-01-08 15:46:49');

INSERT INTO Cos_comanda (id_cos, cantitate, id_produs , id_comanda, data_comanda) VALUES
(1, 0, 1, 1, '2015-01-07 19:58:27'),
(2, 0, 2, 2, '2020-04-14 12:32:21'),
(3, 0, 3, 3, '2010-12-12 11:43:12');

# d) Să se scrie un trigger care realizeaza decrementarea stocului atunci cand un produs a fost vandut.

DELIMITER $$
 CREATE TRIGGER Stock_Update 
 AFTER INSERT ON eshop.Cos_comanda 
 FOR EACH ROW 
  BEGIN 
    UPDATE Produse
      SET Produse.stoc = Produse.stoc - New.cantitate
    WHERE Produse.id_produs = New.id_produs;
    
    UPDATE Produse
      SET Produse.vandute = Produse.vandute + New.cantitate
    WHERE Produse.id_produs = New.id_produs;
    
  END$$
DELIMITER ;

INSERT INTO Cos_comanda (id_cos, cantitate, id_produs , id_comanda, data_comanda) VALUES
(4, 3, 2, 4, '2016-01-07 18:58:27');

INSERT INTO Cos_comanda (id_cos, cantitate, id_produs , id_comanda, data_comanda) VALUES
(5, 1, 2, 5, '2006-01-07 12:58:27');

INSERT INTO Cos_comanda (id_cos, cantitate, id_produs , id_comanda, data_comanda) VALUES
(6, 2, 1, 6, '2008-01-19 10:58:27');

INSERT INTO Cos_comanda (id_cos, cantitate, id_produs , id_comanda, data_comanda) VALUES
(7, 3, 1, 7, '2007-01-19 10:58:27');

INSERT INTO Cos_comanda (id_cos, cantitate, id_produs , id_comanda, data_comanda) VALUES
(8, 1, 4, 8, '2003-01-19 19:58:27');

#e) Să se scrie o procedură stocata care realizeaza vanzarea a unui anumit numar de produse catre acelasi client.
 
SET FOREIGN_KEY_CHECKS = 0
#procedura
DELIMITER //

CREATE PROCEDURE VanzareProd (IN id_comanda int, IN id_client int, IN data_comenzii datetime, IN cantitate int, IN id_produs int)
BEGIN
INSERT INTO Comenzi (id_comanda,id_client,data_comenzii) values (id_comanda,id_client,data_comenzii);
SELECT * FROM Produse WHERE stoc < Produse.stoc AND Produse.id_produs = id_produs;
INSERT INTO Cos_comanda(cantitate, id_produs, id_comanda, data_comanda) VALUES (cantitate,id_produs,id_comanda, data_comenzii);
END //
DELIMITER ;

CALL VanzareProd(14, 1, '2015-01-07 19:58:27', 1, 1);
CALL VanzareProd(15, 2, '2015-01-07 19:58:27', 3, 3);

# f) Să se genereze un raport care sa afiseze toate cumparaturile facute de o persoana. Raportul va afişa următoarele coloane: 
#Nume 
#Prenume 
#Produs 
#Cantitate 
#ValoareTotala 

SELECT  Clienti.nume AS Nume, Clienti.prenume AS Prenume, Produse.nume_produs AS Produs, Cos_comanda.cantitate AS Cantitate, 
Produse.valoare_unitara * Cos_comanda.cantitate AS ValoareTotala
FROM  Clienti, Produse, Cos_comanda, Comenzi
WHERE  Clienti.id = Comenzi.id_client AND Cos_comanda.cantitate != 0
AND  Produse.id_produs = Cos_comanda.id_produs 
AND Comenzi.id_comanda = Cos_comanda.id_comanda
ORDER BY  Clienti.id, Produse.id_produs, Produse.vandute, Produse.valoare_unitara, Cos_comanda.cantitate;

# g) Să se genereze un raport care să afişeze toate produsele vandute pentru care nu a expirat inca garantia. Raportul va contine urmatoarele coloane: 
#Produs 
#DataExpirării
SELECT Produse.nume_produs AS Produs, Produse.garantie AS DataExpirarii
FROM Produse
WHERE Produse.garantie > 0
AND Produse.vandute != 0
ORDER BY Produse.garantie, Produse.nume_produs;


# h) Sa se afiseze cel mai vandut produs;
SELECT id_produs, SUM(vandute) AS CantitateTotalaVanduta
FROM Produse
GROUP BY id_produs
ORDER BY SUM(vandute) DESC
LIMIT 1;

# i) Să se afişeze data în care au avut loc cele mai multe vanzări;
SELECT data_comanda, sum(cantitate) total_day_quantity
FROM Cos_comanda  
GROUP by data_comanda
ORDER BY total_day_quantity desc
LIMIT 1;


# j) Să se afişeze clientul (nume,prenume) care a cumpărat cele mai multe produse (şi valoarea totală a cumparaturilor). 
SELECT nume, prenume, SUM(p.valoare_unitara * ol.cantitate) as totalPurchases FROM Clienti c
LEFT JOIN Comenzi o ON o.id_client = c.id
LEFT JOIN Cos_comanda ol ON ol.id_comanda = o.id_comanda
LEFT JOIN Produse p ON p.id_produs = ol.id_produs
GROUP BY c.id
ORDER BY totalPurchases DESC
LIMIT 1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;