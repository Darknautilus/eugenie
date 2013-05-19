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

INSERT INTO `administrateur`(`identifiant`, `mdp`) VALUES ('salonEugenie','416b724d615048595a6d4d255674483230613f44316c6e6e385271384875262abc26e3c1ecac246487fc548f5141d910b93b1a002b87e707c5024dae0b6a2d97');