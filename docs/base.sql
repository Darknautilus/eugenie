DROP TABLE IF EXISTS Own;

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

CREATE TABLE (
	grpid	int AUTO_INCREMENT,
	grpname	varchar(30),
	visibility	int,
	description	text,
	nbmemb	int,
	nbcat	int,
	CONSTRAINT pk_grp PRIMARY KEY (grpid),
	CONSTRAINT fk_grp_visib FOREIGN KEY (visibility) REFERENCES Visibilities(visibid)
)ENGINE=InnoDB CHARSET=UTF8;