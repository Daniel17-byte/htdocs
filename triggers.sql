SET SQL_SAFE_UPDATES = 0; 

#Să se scrie un trigger care realizeaza 
#decrementarea stocului atunci cand un 
#produs a fost vandut. 

DELIMITER //
CREATE TRIGGER DECREMENTARE_STOC After Insert ON Comanda
FOR EACH ROW
BEGIN
    IF (@DISABLE_STERGERE = 0) THEN
        UPDATE Produse
        SET stoc = stoc - 1 AND vandute = vandute + 1;
        WHERE id_produs = old.id_produs;
    END IF;
END //
DELIMITER ;