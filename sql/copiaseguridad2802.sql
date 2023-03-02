-- --------------------------------------------------------
-- Host:                         2daw.esvirgua.com
-- Versión del servidor:         5.7.41 - MySQL Community Server (GPL)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para user2daw_BD1-06
CREATE DATABASE IF NOT EXISTS `user2daw_BD1-06` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `user2daw_BD1-06`;

-- Volcando estructura para tabla user2daw_BD1-06.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombreCategoria` (`nombre`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla user2daw_BD1-06.categorias: ~3 rows (aproximadamente)
INSERT INTO `categorias` (`id`, `nombre`) VALUES
	(15, 'Dibujo'),
	(14, 'Medio Ambiente'),
	(12, 'Programación');

-- Volcando estructura para tabla user2daw_BD1-06.clases
CREATE TABLE IF NOT EXISTS `clases` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` char(6) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla user2daw_BD1-06.clases: ~0 rows (aproximadamente)

-- Volcando estructura para tabla user2daw_BD1-06.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `idRetos` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `numGrupo` tinyint(3) unsigned NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `puntuacion` tinyint(3) unsigned NOT NULL,
  `idClase` tinyint(3) unsigned NOT NULL,
  `idProfesor` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`idRetos`,`numGrupo`),
  KEY `FK_Clase` (`idClase`),
  KEY `FK_Profesor_Grupos` (`idProfesor`),
  CONSTRAINT `FK_Clase` FOREIGN KEY (`idClase`) REFERENCES `clases` (`id`),
  CONSTRAINT `FK_Profesor_Grupos` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`id`),
  CONSTRAINT `FK_Reto` FOREIGN KEY (`idRetos`) REFERENCES `retos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla user2daw_BD1-06.grupos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla user2daw_BD1-06.profesores
CREATE TABLE IF NOT EXISTS `profesores` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla user2daw_BD1-06.profesores: ~4 rows (aproximadamente)
INSERT INTO `profesores` (`id`, `nombre`, `correo`, `pass`) VALUES
	(1, 'Miguel Jaque', 'mjaque@fundacionloyola.net', '1234'),
	(2, 'Isabel Muñoz', 'imunoz@fundacionloyola.net', '2345'),
	(3, 'Ernesto Gonzalez', 'egonzalez@fundacionloyola.net', '3456');

-- Volcando estructura para tabla user2daw_BD1-06.retos
CREATE TABLE IF NOT EXISTS `retos` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dirigido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaInicioInscripcion` date NOT NULL,
  `fechaFinInscripcion` date NOT NULL,
  `fechaInicioReto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechaFinReto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechaPublicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `publicado` bit(1) NOT NULL DEFAULT b'0',
  `idProfesor` smallint(5) unsigned NOT NULL,
  `idCategoria` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Profesor` (`idProfesor`),
  KEY `FK_Categoria` (`idCategoria`),
  CONSTRAINT `FK_Categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `FK_Profesor` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla user2daw_BD1-06.retos: ~11 rows (aproximadamente)
INSERT INTO `retos` (`id`, `nombre`, `dirigido`, `descripcion`, `fechaInicioInscripcion`, `fechaFinInscripcion`, `fechaInicioReto`, `fechaFinReto`, `fechaPublicacion`, `publicado`, `idProfesor`, `idCategoria`) VALUES
	(4, 'Reto 2', 'CFGM', 'Descripción Reto 2', '2023-02-01', '2023-02-01', '2023-02-08 08:32:53', '2023-02-08 08:32:53', '2023-02-08 08:32:53', b'0', 2, 15),
	(16, 'Reto 3', 'CFGS', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'0', 2, 12),
	(17, 'Reto 4', 'CFGM', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:05', b'1', 1, 14),
	(18, 'Reto 5', 'CFGS', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-22 07:47:15', '2023-02-22 07:47:15', '2023-02-22 07:47:15', b'1', 3, 15),
	(19, 'Reto 6', 'CFGM', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-22 07:47:11', '2023-02-22 07:47:11', '2023-02-22 07:47:11', b'0', 3, 14),
	(20, 'Reto 7', 'CFGS', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'1', 2, 14),
	(21, 'Reto 8', 'CFGM', 'No descripcionsdafsdf', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:05', b'0', 1, 15),
	(22, 'Reto 9', 'CFGS', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-22 07:47:38', '2023-02-22 07:47:38', '2023-02-22 07:47:38', b'1', 2, 12),
	(23, 'Reto 10', 'CFGM', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-22 07:47:41', '2023-02-22 07:47:41', '2023-02-22 07:47:41', b'1', 3, 12),
	(24, 'Reto 11', 'CFGS', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-22 07:47:17', '2023-02-22 07:47:17', '2023-02-22 07:47:17', b'0', 3, 15),
	(25, 'Reto 12', 'CFGM', 'No descripcion', '2023-02-14', '2023-02-14', '2023-02-14 09:31:05', '2023-02-14 09:31:06', '2023-02-14 09:31:06', b'1', 1, 12);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
