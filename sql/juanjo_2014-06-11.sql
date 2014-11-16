# ************************************************************
# Sequel Pro SQL dump
# Versi�n 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.1.49)
# Base de datos: juanjo
# Tiempo de Generaci�n: 2014-06-11 12:10:57 +0000
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
	(4,'Hoy todo huele maravilloso'),
	(5,'Es como hablar con un pez'),
	(6,'Todo esto es de farmácia, rico rico rico'),
	(7,'¿Donde mejor que aquí?');

/*!40000 ALTER TABLE `frases` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idplato` int(11) NOT NULL COMMENT 'ID del plato',
  `fecha` date NOT NULL COMMENT 'Fecha del menu',
  `posicion` int(11) NOT NULL COMMENT 'Primero, Segundo, Tercero...',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;

INSERT INTO `menu` (`id`, `idplato`, `fecha`, `posicion`)
VALUES
	(1,1,'2014-06-11',1),
	(2,2,'2014-06-11',1),
	(3,3,'2014-06-11',2),
	(4,4,'2014-06-11',2),
	(5,5,'2014-06-11',3);

/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla platos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `platos`;

CREATE TABLE `platos` (
  `idplato` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del plato',
  `plato` text COMMENT 'Nombre del plato',
  `vegetariano` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Es vegetariano (0 no)',
  `de_regimen` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Es de regimen (0 no)',
  `calorias` int(11) DEFAULT NULL COMMENT 'Calorias',
  `hidratos` int(11) DEFAULT NULL COMMENT 'Hidratos de carbono',
  PRIMARY KEY (`idplato`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `platos` WRITE;
/*!40000 ALTER TABLE `platos` DISABLE KEYS */;

INSERT INTO `platos` (`idplato`, `plato`, `vegetariano`, `de_regimen`, `calorias`, `hidratos`)
VALUES
	(1,'Crema de verduras',0,1,70,0),
	(2,'Sopa de cocido',0,0,90,1),
	(3,'Pescado con patatas fritas',0,0,150,2),
	(4,'Albondigas con tomate campestre',0,0,280,2),
	(5,'Tarta de nata',0,0,180,2);

/*!40000 ALTER TABLE `platos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idu` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` int(11) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
