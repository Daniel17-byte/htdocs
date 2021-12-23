#Să se scrie o procedură stocata care realizeaza 
#vanzarea a unui anumit numar de produse catre 
#acelasi client. 

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VanzareProd`(IN comanda int,IN client int,IN data_c datetime,IN numar_produse int,IN produs int)
begin
    insert into Comenzi (id_comanda,id_client,data_comenzii) values (comanda,client,data_c);
    select from Produse where numar_produse < Produse.stoc AND Produse.id_produs = produs;
        INSERT INTO Cos_comanda(cantitate, id_produs, id_comanda) VALUES (numar_produse,produs,comanda);
end$$

DELIMITER ;