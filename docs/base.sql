DROP TABLE IF EXISTS LivreOr;


CREATE TABLE LivreOr (
	idComm	int AUTO_INCREMENT,
	commentaire	varchar(250),
	valide	boolean,
	CONSTRAINT pk_type PRIMARY KEY (idType)
)ENGINE=InnoDB CHARSET=UTF8;

