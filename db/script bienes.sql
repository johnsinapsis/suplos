-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.2.6-MariaDB-log - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para intelcost_bienes
CREATE DATABASE IF NOT EXISTS `intelcost_bienes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `intelcost_bienes`;

-- Volcando estructura para tabla intelcost_bienes.bienes_seleccionados
CREATE TABLE IF NOT EXISTS `bienes_seleccionados` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intelcost_bienes.bienes_seleccionados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `bienes_seleccionados` DISABLE KEYS */;
/*!40000 ALTER TABLE `bienes_seleccionados` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
