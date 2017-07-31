-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-06-2017 a las 18:54:44
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unagauchadaDB`
--
CREATE DATABASE IF NOT EXISTS `unagauchadaDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `unagauchadaDB`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Purchases`
--

DROP TABLE IF EXISTS `Purchases`;
CREATE TABLE IF NOT EXISTS `Purchases` (
  `idPurchase` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `mount` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`idPurchase`),
  KEY `Purchases_ibfk_1` (`idUser`),
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categories`
--

DROP TABLE IF EXISTS `Categories`;
CREATE TABLE IF NOT EXISTS `Categories` (
  `idCategory` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `validate` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCategory`),
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comments`
--

DROP TABLE IF EXISTS `Comments`;
CREATE TABLE IF NOT EXISTS `Comments` (
  `idComment` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(255) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `lastModify` date DEFAULT NULL,
  `idQuestion` int(11) DEFAULT NULL,
  `idGauchada` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idComment`),
  KEY `Comments_ibfk_2` (`idQuestion`),
  KEY `Comments_ibfk_1` (`idUser`),
  KEY `Comments_ibfk_3` (`idGauchada`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Creditos`
--

DROP TABLE IF EXISTS `Creditos`;
CREATE TABLE IF NOT EXISTS `Creditos` (
  `idCredito` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idCredito`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Gauchadas`
--

DROP TABLE IF EXISTS `Gauchadas`;
CREATE TABLE IF NOT EXISTS `Gauchadas` (
  `idGauchada` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `body` varchar(1024) NOT NULL,
  `location` varchar(255) NOT NULL,
  `limitDate` date NOT NULL,
  `createdAt` date NOT NULL,
  `evaluation` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `validate` int(11) DEFAULT NULL,
  PRIMARY KEY (`idGauchada`),
  KEY `Gauchadas_ibfk_1` (`idUser`),
  KEY `Gauchadas_ibfk_2` (`idCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GauchadasImages`
--

DROP TABLE IF EXISTS `GauchadasImages`;
CREATE TABLE IF NOT EXISTS `GauchadasImages` (
  `idGauchadaImage` int(11) NOT NULL AUTO_INCREMENT,
  `idGauchada` int(11) NOT NULL,
  `idImage` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idGauchadaImage`),
  KEY `idGauchada` (`idGauchada`,`idImage`),
  KEY `idImage` (`idImage`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Images`
--

DROP TABLE IF EXISTS `Images`;
CREATE TABLE IF NOT EXISTS `Images` (
  `idImage` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`idImage`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Localidades`
--

DROP TABLE IF EXISTS `Localidades`;
CREATE TABLE IF NOT EXISTS `Localidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProvincia` int(11) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2383 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Postulants`
--

DROP TABLE IF EXISTS `Postulants`;
CREATE TABLE IF NOT EXISTS `Postulants` (
  `idPostulante` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idGauchada` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `selected` int(11) NOT NULL DEFAULT '0',
  `validate` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPostulante`),
  KEY `idUser` (`idUser`,`idGauchada`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Provincias`
--

DROP TABLE IF EXISTS `Provincias`;
CREATE TABLE IF NOT EXISTS `Provincias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `provincia` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ratings`
--

DROP TABLE IF EXISTS `Ratings`;
CREATE TABLE IF NOT EXISTS `Ratings` (
  `idRating` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) NOT NULL,
  `body` varchar(1024) NOT NULL,
  `idGauchada` int(11) NOT NULL,
  PRIMARY KEY (`idRating`),
  KEY `idGauchada` (`idGauchada`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(55) NOT NULL,
  `credits` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  `session` int(11) NOT NULL DEFAULT '0',
  `registrationDate` date NOT NULL,
  `keyreg` varchar(25) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `idImage` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Purchases`
--
ALTER TABLE `Purchases`
  ADD CONSTRAINT `Purchases_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,

--
-- Filtros para la tabla `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`idQuestion`) REFERENCES `Comments` (`idComment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Comments_ibfk_3` FOREIGN KEY (`idGauchada`) REFERENCES `Gauchadas` (`idGauchada`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Creditos`
--
ALTER TABLE `Creditos`
  ADD CONSTRAINT `Creditos_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Gauchadas`
--
ALTER TABLE `Gauchadas`
  ADD CONSTRAINT `Gauchadas_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Gauchadas_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `Categories` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `GauchadasImages`
--
ALTER TABLE `GauchadasImages`
  ADD CONSTRAINT `GauchadasImages_ibfk_1` FOREIGN KEY (`idGauchada`) REFERENCES `Gauchadas` (`idGauchada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `GauchadasImages_ibfk_2` FOREIGN KEY (`idImage`) REFERENCES `Images` (`idImage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Ratings`
--
ALTER TABLE `Ratings`
  ADD CONSTRAINT `Ratings_ibfk_1` FOREIGN KEY (`idGauchada`) REFERENCES `Gauchadas` (`idGauchada`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
