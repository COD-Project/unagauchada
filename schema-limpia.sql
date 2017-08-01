-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-07-2017 a las 22:06:20
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categories`
--

CREATE TABLE `Categories` (
  `idCategory` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `validate` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comments`
--

CREATE TABLE `Comments` (
  `idComment` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `lastModify` date DEFAULT NULL,
  `idQuestion` int(11) DEFAULT NULL,
  `idGauchada` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Creditos`
--

CREATE TABLE `Creditos` (
  `idCredito` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Gauchadas`
--

CREATE TABLE `Gauchadas` (
  `idGauchada` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(1024) NOT NULL,
  `location` varchar(255) NOT NULL,
  `limitDate` date NOT NULL,
  `createdAt` date NOT NULL,
  `lastModified` date DEFAULT NULL,
  `evaluation` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `validate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GauchadasImages`
--

CREATE TABLE `GauchadasImages` (
  `idGauchadaImage` int(11) NOT NULL,
  `idGauchada` int(11) NOT NULL,
  `idImage` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Images`
--

CREATE TABLE `Images` (
  `idImage` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Localidades`
--

CREATE TABLE `Localidades` (
  `id` int(11) NOT NULL,
  `idProvincia` int(11) NOT NULL,
  `localidad` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Postulants`
--

CREATE TABLE `Postulants` (
  `idPostulante` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idGauchada` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `selected` int(11) NOT NULL DEFAULT '0',
  `validate` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Provincias`
--

CREATE TABLE `Provincias` (
  `id` int(10) NOT NULL,
  `provincia` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ratings`
--

CREATE TABLE `Ratings` (
  `idRating` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `body` varchar(1024) NOT NULL,
  `idGauchada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reputations`
--

CREATE TABLE `Reputations` (
  `idReputation` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `bound` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE `Users` (
  `idUser` int(11) NOT NULL,
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
  `idImage` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indices de la tabla `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `Comments_ibfk_2` (`idQuestion`),
  ADD KEY `Comments_ibfk_1` (`idUser`),
  ADD KEY `Comments_ibfk_3` (`idGauchada`);

--
-- Indices de la tabla `Creditos`
--
ALTER TABLE `Creditos`
  ADD PRIMARY KEY (`idCredito`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `Gauchadas`
--
ALTER TABLE `Gauchadas`
  ADD PRIMARY KEY (`idGauchada`),
  ADD KEY `Gauchadas_ibfk_1` (`idUser`),
  ADD KEY `Gauchadas_ibfk_2` (`idCategory`);

--
-- Indices de la tabla `GauchadasImages`
--
ALTER TABLE `GauchadasImages`
  ADD PRIMARY KEY (`idGauchadaImage`),
  ADD KEY `idGauchada` (`idGauchada`,`idImage`),
  ADD KEY `idImage` (`idImage`);

--
-- Indices de la tabla `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`idImage`);

--
-- Indices de la tabla `Localidades`
--
ALTER TABLE `Localidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Postulants`
--
ALTER TABLE `Postulants`
  ADD PRIMARY KEY (`idPostulante`),
  ADD KEY `idUser` (`idUser`,`idGauchada`);

--
-- Indices de la tabla `Provincias`
--
ALTER TABLE `Provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Ratings`
--
ALTER TABLE `Ratings`
  ADD PRIMARY KEY (`idRating`),
  ADD KEY `idGauchada` (`idGauchada`);

--
-- Indices de la tabla `Reputations`
--
ALTER TABLE `Reputations`
  ADD PRIMARY KEY (`idReputation`);

--
-- Indices de la tabla `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categories`
--
ALTER TABLE `Categories`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Comments`
--
ALTER TABLE `Comments`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Creditos`
--
ALTER TABLE `Creditos`
  MODIFY `idCredito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Gauchadas`
--
ALTER TABLE `Gauchadas`
  MODIFY `idGauchada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `GauchadasImages`
--
ALTER TABLE `GauchadasImages`
  MODIFY `idGauchadaImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `Images`
--
ALTER TABLE `Images`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `Localidades`
--
ALTER TABLE `Localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2383;
--
-- AUTO_INCREMENT de la tabla `Postulants`
--
ALTER TABLE `Postulants`
  MODIFY `idPostulante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Provincias`
--
ALTER TABLE `Provincias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `Ratings`
--
ALTER TABLE `Ratings`
  MODIFY `idRating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Reputations`
--
ALTER TABLE `Reputations`
  MODIFY `idReputation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Users`
--
ALTER TABLE `Users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

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
