-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.1.30-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para pruebabrm
CREATE DATABASE IF NOT EXISTS `pruebabrm` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pruebabrm`;


-- Volcando estructura para tabla pruebabrm.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pruebabrm.producto: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id_producto`, `nombre`, `estado`) VALUES
	(1, 'Postobon', '0'),
	(2, 'Papas', '1'),
	(3, 'Agua en botella', '1'),
	(4, 'Carnes rojas', '0'),
	(5, 'Azucar', '0'),
	(6, 'Aceite', '0'),
	(7, 'Jabon', '0');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- Volcando estructura para tabla pruebabrm.inventario
CREATE TABLE IF NOT EXISTS `inventario` (
  `lote` int(11) NOT NULL,
  `precio` double DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`lote`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pruebabrm.inventario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` (`lote`, `precio`, `fecha_vencimiento`, `cantidad`, `producto_id`) VALUES
	(1235, 2500, '2019-10-17', 8, 3),
	(12345, 5000, '2020-04-16', 2, 2);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;

