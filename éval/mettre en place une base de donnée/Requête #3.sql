DROP DATABASE IF EXISTS EVAL;

CREATE DATABASE EVAL;

USE EVAL;

CREATE TABLE Clients (
	cli_num INT NOT NULL,
	cli_nom VARCHAR(50) NOT NULL,
	cli_adresse VARCHAR(50) NOT NULL,
	cli_tel VARCHAR(30) NOT NULL,
	PRIMARY KEY (cli_num)
	);
	
CREATE TABLE Commande (
	com_num INT NOT NULL,
	cli_num INT NOT NULL,
	com_date DATETIME NOT NULL,
	com_obs VARCHAR(50),
	FOREIGN KEY (cli_num) REFERENCES Clients(cli_num),
	PRIMARY KEY (com_num)
	);
	
CREATE TABLE Produit (
	pro_num INT NOT NULL,
	pro_libelle VARCHAR(50) NOT NULL,
	pro_description VARCHAR(50) NOT NULL,
	PRIMARY KEY (pro_num)
	);
	
CREATE TABLE est_compose (
	com_num INT NOT NULL,
	pro_num INT NOT NULL,
	est_qte INT NOT NULL,
	FOREIGN KEY (com_num) REFERENCES Commande(com_num),
	FOREIGN KEY (pro_num) REFERENCES Produit(pro_num),
	PRIMARY KEY (com_num,pro_num)
	);
	
CREATE INDEX index_cli_nom
ON clients (cli_nom)
	