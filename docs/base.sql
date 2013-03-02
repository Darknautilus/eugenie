DROP TABLE IF EXISTS TypeThes;
DROP TABLE IF EXISTS TypeRepas;
DROP TABLE IF EXISTS TypeDesserts;
DROP TABLE IF EXISTS TypeBoissons;
DROP TABLE IF EXISTS Thes;
DROP TABLE IF EXISTS Boissons;
DROP TABLE IF EXISTS Repas;
DROP TABLE IF EXISTS Desserts;

CREATE TABLE TypeThes (
	idtype	int AUTO_INCREMENT,
	nomtype	varchar(50),
	descriptiontype	varchar(250),
	CONSTRAINT pk_type PRIMARY KEY (idType)
)ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE TypeRepas (
	idtype	int AUTO_INCREMENT,
	nomtype	varchar(50),
	descriptiontype	varchar(250),
	CONSTRAINT pk_type PRIMARY KEY (idType)
)ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE TypeDesserts (
	idtype	int AUTO_INCREMENT,
	nomtype	varchar(50),
	descriptiontype	varchar(250),
	CONSTRAINT pk_type PRIMARY KEY (idType)
)ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE TypeBoissons (
	idtype	int AUTO_INCREMENT,
	nomtype	varchar(50),
	descriptiontype	varchar(250),
	CONSTRAINT pk_type PRIMARY KEY (idType)
)ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE Thes(
	idthe	int AUTO_INCREMENT,
	libellethe varchar(50),
	descriptionthe varchar(250),
	idtypethe int,
	CONSTRAINT pk_the PRIMARY KEY (idthe),
	CONSTRAINT fk_the_type FOREIGN KEY (idtypethe) REFERENCES TypeThes(idtype)
)ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE Boissons(
	idboisson	int AUTO_INCREMENT,
	libelleboisson varchar(50),
	descriptionboisson varchar(250),
	idtypeboisson int,
	CONSTRAINT pk_boisson PRIMARY KEY (idboisson),
	CONSTRAINT fk_boisson_type FOREIGN KEY (idtypeboisson) REFERENCES TypeBoissons(idtype)
)ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE Desserts(
	iddessert	int AUTO_INCREMENT,
	libelledessert varchar(50),
	descriptiondessert varchar(250),
	idtypedessert int,
	CONSTRAINT pk_dessert PRIMARY KEY (iddessert),
	CONSTRAINT fk_dessert_type FOREIGN KEY (idtypedessert) REFERENCES TypeDesserts(idtype)
)ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE Repas(
	idrepas	int AUTO_INCREMENT,
	libellerepas varchar(50),
	descriptionrepas varchar(250),
	idtyperepas int,
	CONSTRAINT pk_repas PRIMARY KEY (idrepas),
	CONSTRAINT fk_repas_type FOREIGN KEY (idtyperepas) REFERENCES TypeRepas(idtype)
)ENGINE=InnoDB CHARSET=UTF8;