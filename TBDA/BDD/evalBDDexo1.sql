/*Exercice 1 La base HOTEL*/
/*
DROP DATABASE Hotel;
CREATE DATABASE Hotel;
USE Hotel;

CREATE TABLE Clienta (
cli_num INT,
cli_nom VARCHAR(50),
cli_adresse VARCHAR(50),
cli_tel VARCHAR(50),
CONSTRAINT cli_num_PK PRIMARY KEY (cli_num)
);

CREATE TABLE Commande(
com_num INT,
cli_num INT,
com_date DATETIME,
com_obs VARCHAR (50),
CONSTRAINT com_num_PK PRIMARY KEY (com_num),
CONSTRAINT cli_num_FK FOREIGN KEY (cli_num) REFERENCES Clienta (cli_num)
);

CREATE TABLE Produit(
pro_num INT,
pro_libelle VARCHAR(50),
pro_description VARCHAR(50),
CONSTRAINT pro_num_PK PRIMARY KEY (pro_num)
);

CREATE TABLE est_compose(
com_num INT,
pro_num INT,
est_qte INT,
CONSTRAINT est_compose_PK PRIMARY KEY (com_num,pro_num),
CONSTRAINT est_compose_com_FK FOREIGN KEY (com_num) REFERENCES Commande(com_num),
CONSTRAINT est_compose_pro_FK FOREIGN KEY (pro_num) REFERENCES Produit(pro_num)
);
CREATE INDEX index_client ON Clienta(cli_nom);
SHOW INDEX from Clienta
*/
