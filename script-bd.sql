CREATE DATABASE IF NOT EXISTS db_dawm_asnieres;



CREATE TABLE fonction
(Id_fonction int(5) AUTO_INCREMENT PRIMARY KEY NOT NULL,
libelle_poste VARCHAR(30) not null 
)ENGINE=InnoDB;

Insert into fonction VALUES
('0','PDG'),
('0','DG'),
('0','RH'),
('0','DSI');

CREATE TABLE employe(
    ID_employe INT(5) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nom_employe VARCHAR(30) not null unique,
    prenom_employe VARCHAR(30) not null unique,
    date_de_naissance date ,
    Id_fonction int(5),
	email VARCHAR (20) not null,
    salaire INT(5) not null,
    
    FOREIGN KEY (Id_fonction) REFERENCES fonction(Id_fonction)
)ENGINE=InnoDB;

Insert into employe VALUES
('0','Durant','Marc','1991-12-10 ','2','durant@gmail.com','6000');
