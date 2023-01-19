CREATE DATABASE IF NOT EXISTS pruebas

CREATE TABLE IF NOT EXISTS cliente (
	id INT(11) NOT NULL AUTO_INCREMENT,
	dni INT(60) NOT NULL,
	Nombre VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'utf8_spanish_ci',
	Apellido VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'utf8_spanish_ci',
	Correo VARCHAR(50) NOT NULL COLLATE 'utf8_spanish_ci',
	Telefono VARCHAR(60) NOT NULL COLLATE 'utf8_spanish_ci',
	PRIMARY KEY (id) USING BTREE
)
COLLATE='utf8_spanish_ci'
ENGINE=InnoDB
;

INSERT INTO cliente (dni,Nombre,Apellido,Correo,Telefono) 
VALUES 
('123123123','Nombre1','Apellido1','Correo1','666555444'), 
('123123124','Nombre2','Apellido2','Correo2','666555442'),
('123123121','Nombre3','Apellido3','Correo3','666555443');