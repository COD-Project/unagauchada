-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-05-2017 a las 23:00:38
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Categories`
--

INSERT INTO `Categories` (`idCategory`, `name`) VALUES
(1, 'Viajes'),
(2, 'Comida Gratis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comments`
--

CREATE TABLE `Comments` (
  `idComment` int(11) NOT NULL,
  `body` varchar(255) CHARACTER SET utf8 NOT NULL,
  `createdAt` date DEFAULT NULL,
  `lastModify` date DEFAULT NULL,
  `idQuestion` int(11) DEFAULT NULL,
  `idGauchada` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Comments`
--

INSERT INTO `Comments` (`idComment`, `body`, `createdAt`, `lastModify`, `idQuestion`, `idGauchada`, `idUser`) VALUES
(1, 'nadie quiere ir a ese pais de gente fotocopiada', '2017-05-23', '2017-05-23', NULL, 1, 2),
(2, 'que tipo gatoo!', '2017-05-23', '2017-05-23', 1, 1, 1),
(3, 'que tan verde esta?', '2017-05-23', '2017-05-23', NULL, 2, 4),
(4, 'verde manzana roja', '2017-05-23', '2017-05-23', 3, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Gauchadas`
--

CREATE TABLE `Gauchadas` (
  `idGauchada` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `body` varchar(1024) CHARACTER SET utf8 NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 NOT NULL,
  `limitDate` date NOT NULL,
  `createdAt` date NOT NULL,
  `evaluation` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Gauchadas`
--

INSERT INTO `Gauchadas` (`idGauchada`, `title`, `body`, `location`, `limitDate`, `createdAt`, `evaluation`, `idUser`, `idCategory`) VALUES
(1, 'Viaje a china', 'alguien a a china esta semana?', '', '2017-05-23', '2017-05-23', NULL, 1, 1),
(2, 'Alguien disponible para comer un asado?', 'tengo carne que se esta por pudrir (o ya lo esta, no es importante ese detalle), y quisiera saber si alguien quiere compartir dicha carne conmigo.\r\npd: no tengo amigos :\'(', '', '2017-05-23', '2017-05-24', NULL, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Images`
--

CREATE TABLE `Images` (
  `idImages` int(11) NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE `Users` (
  `idUser` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `idImage` int(11) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `location` varchar(75) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(55) NOT NULL,
  `credits` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  `session` int(11) NOT NULL DEFAULT '0',
  `registrationDate` date NOT NULL,
  `keyreg` varchar(25) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Users`
--

INSERT INTO `Users` (`idUser`, `name`, `surname`, `birthdate`, `idImage`, `phone`, `location`, `email`, `password`, `credits`, `points`, `state`, `session`, `registrationDate`, `keyreg`, `role`) VALUES
(1, 'Juan Cruz', 'Ocampos', NULL, NULL, NULL, '', 'pepe@gmail.com', '1dd4ecb6f7f0091bc464fee9b9202d59', NULL, NULL, 0, 1495137069, '2017-05-18', '0463b4f6c6263825487df9a29', 2),
(2, 'Ulises', 'Conejo', NULL, NULL, NULL, '', 'conejo@gmail.com', '47b4d0c9445131dec646a489805f0f52', NULL, NULL, 0, 1495129961, '2017-05-18', '3af8df129416280e97c11710e', 2),
(3, 'Lucas', 'Saltamontes', NULL, NULL, NULL, '', 'saltalucassalta@gmail.com', '808a3fa3e3366945393dda70e59a61a2', NULL, NULL, 0, 1495132930, '2017-05-18', '90c2b0d54f9f90004f2fcd9d0', 2),
(4, 'Nuria', 'flkajdglkajs', NULL, NULL, NULL, NULL, 'nu@gmail.com', 'fe295ff0cd2bac35cfa387a3ad08d72a', NULL, NULL, 0, 1495135402, '2017-05-18', 'd6bfe454c4c3c053f1a480270', 2),
(5, 'mati', 'dd', NULL, NULL, NULL, NULL, 'maddti@gmail.com', '34386742333358bf5fbdcec9ef665bb4', NULL, NULL, 0, 1495135883, '2017-05-18', '7866da3bf22445a46610c0b87', 2);

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
  ADD UNIQUE KEY `daddy` (`idGauchada`,`idQuestion`),
  ADD KEY `Comments_ibfk_2` (`idQuestion`);

--
-- Indices de la tabla `Gauchadas`
--
ALTER TABLE `Gauchadas`
  ADD PRIMARY KEY (`idGauchada`);

--
-- Indices de la tabla `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`idImages`);

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
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Comments`
--
ALTER TABLE `Comments`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `Gauchadas`
--
ALTER TABLE `Gauchadas`
  MODIFY `idGauchada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Images`
--
ALTER TABLE `Images`
  MODIFY `idImages` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Users`
--
ALTER TABLE `Users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`idQuestion`) REFERENCES `Comments` (`idComment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Comments_ibfk_3` FOREIGN KEY (`idGauchada`) REFERENCES `Categories` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Gauchadas`
--
ALTER TABLE `Gauchadas`
  ADD CONSTRAINT `Gauchadas_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Gauchadas_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `Categories` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Images`
--
ALTER TABLE `Images`
  ADD CONSTRAINT `Images_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
