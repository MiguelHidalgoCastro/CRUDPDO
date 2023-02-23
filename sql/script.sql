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



INSERT INTO `user2daw_BD1-06`.`retos` 
(`nombre`, `dirigido`, `descripcion`, `fechaInicioInscripcion`, `fechaFinInscripcion`, `fechaInicioReto`, `fechaFinReto`, `fechaPublicacion`, `publicado`, `idProfesor`, `idCategoria`) 
VALUES 
('Reto 3', 'CFGS', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'0', 2, 12),
('Reto 4', 'CFGM', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'1', 1, 14),
('Reto 5', 'CFGS', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'1', 2, 15),
('Reto 6', 'CFGM', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'0', 1, 14),
('Reto 7', 'CFGS', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'1', 2, 14),
('Reto 8', 'CFGM', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'0', 1, 15),
('Reto 9', 'CFGS', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'1', 2, 14),
('Reto 10', 'CFGM', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'1', 1, 14),
('Reto 11', 'CFGS', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'0', 2, 15),
('Reto 12', 'CFGM', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'1', 1, 12)


;


ALTER TABLE retos ADD CONSTRAINT CHECK1 CHECK (fechaInicioInscripcion <= fechaFinInscripcion);
ALTER TABLE retos ADD CONSTRAINT CHECK2 CHECK (fechaInicioReto <= fechaFinReto);