DROP TABLE IF EXISTS LivreOr;
DROP TABLE IF EXISTS administrateur;

CREATE TABLE LivreOr (
	idComm	int AUTO_INCREMENT,
	commentaire	varchar(250),
	mail varchar(50),
	valide	int,
	CONSTRAINT pk_livreOr PRIMARY KEY (idComm)
)ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE administrateur (
	idAdmin	int AUTO_INCREMENT,
	identifiant	varchar(30),
	mdp	varchar(250),
	CONSTRAINT pk_admin PRIMARY KEY (idAdmin)
)ENGINE=InnoDB CHARSET=UTF8;
