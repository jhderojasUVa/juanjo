# ************************************************************
# Sequel Pro SQL dump
# Versi�n 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.19)
# Base de datos: juanjo
# Tiempo de Generaci�n: 2014-09-30 18:07:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla frases
# ------------------------------------------------------------

DROP TABLE IF EXISTS `frases`;

CREATE TABLE `frases` (
  `idfrase` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la frase',
  `frase` text NOT NULL COMMENT 'Frase celebre',
  PRIMARY KEY (`idfrase`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `frases` WRITE;
/*!40000 ALTER TABLE `frases` DISABLE KEYS */;

INSERT INTO `frases` (`idfrase`, `frase`)
VALUES
	(1,'Tengo el culo como una almaciga'),
	(2,'¿Desde cuando hay que venir con pantalones?'),
	(3,'Cafe magma'),
	(4,'Hoy todo huele maravilloso y tal'),
	(9,'¿Habeís gozado este fin de semana?'),
	(6,'Todo esto es de farmácia, rico rico rico'),
	(7,'¿Donde mejor que aquí?');

/*!40000 ALTER TABLE `frases` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `idplato` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `plato` text NOT NULL,
  `descripcion_plato` text,
  `orden` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hidratos` int(11) DEFAULT NULL,
  `vegetariano` tinyint(1) DEFAULT NULL,
  `calorias` int(11) DEFAULT NULL,
  PRIMARY KEY (`idplato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Volcado de tabla precio
# ------------------------------------------------------------

DROP TABLE IF EXISTS `precio`;

CREATE TABLE `precio` (
  `precio` char(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`precio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `precio` WRITE;
/*!40000 ALTER TABLE `precio` DISABLE KEYS */;

INSERT INTO `precio` (`precio`)
VALUES
	('5,30');

/*!40000 ALTER TABLE `precio` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idu` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`idu`, `login`, `password`)
VALUES
	(1,'test','test');

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
