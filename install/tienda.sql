-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para tienda
CREATE DATABASE IF NOT EXISTS `tienda` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `tienda`;

-- Volcando estructura para tabla tienda.accesorios
CREATE TABLE IF NOT EXISTS `accesorios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `id_subcategoria` int(11) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_subcategoria` (`id_subcategoria`),
  CONSTRAINT `fk_id_subcategoria` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.comentarios
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `comentario` text NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `created_at` date DEFAULT curdate(),
  PRIMARY KEY (`id`),
  KEY `fk_id_productos` (`id_producto`),
  CONSTRAINT `fk_id_productos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para vista tienda.comentarios_productos
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `comentarios_productos` (
	`producto` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`marcar` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`modelo` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`especificaciones` TEXT NULL COLLATE 'utf8mb4_general_ci',
	`precio` DECIMAL(16,2) NULL,
	`titulo` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`comentario` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`calificacion` INT(11) NULL
) ENGINE=MyISAM;

-- Volcando estructura para tabla tienda.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `modelo` varchar(50) NOT NULL,
  `especificaciones` text NOT NULL,
  `precio` decimal(16,2) NOT NULL,
  `visitas` int(11) DEFAULT 0,
  `imagen` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT curdate(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_id_marcas` (`id_marca`),
  CONSTRAINT `fk_id_marcas` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.rel_productos_accesorios
CREATE TABLE IF NOT EXISTS `rel_productos_accesorios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `id_accesorio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_producto` (`id_producto`),
  KEY `fk_id_accesorio` (`id_accesorio`),
  CONSTRAINT `fk_id_accesorio` FOREIGN KEY (`id_accesorio`) REFERENCES `accesorios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.rel_productos_subcategorias
CREATE TABLE IF NOT EXISTS `rel_productos_subcategorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `id_subcategoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_prod` (`id_producto`),
  KEY `fk_id_sub` (`id_subcategoria`),
  CONSTRAINT `fk_id_prod` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_sub` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.subcategorias
CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_categoria` (`id_categoria`),
  CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para vista tienda.comentarios_productos
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `comentarios_productos`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `comentarios_productos` AS SELECT prod.nombre AS producto, mar.nombre AS marcar, prod.modelo, prod.especificaciones, prod.precio,
com.titulo, com.comentario, com.calificacion
FROM comentarios AS com
LEFT JOIN productos AS prod ON prod.id = com.id_producto
LEFT JOIN marcas AS mar ON mar.id = prod.id_marca
ORDER BY com.calificacion DESC ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
