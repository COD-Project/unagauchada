-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2017 at 05:12 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unagauchadaDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `idCategory` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
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

-- --------------------------------------------------------

--
-- Table structure for table `Gauchadas`
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

-- --------------------------------------------------------

--
-- Table structure for table `Images`
--

CREATE TABLE `Images` (
  `idImages` int(11) NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
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
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`idUser`, `name`, `surname`, `birthdate`, `idImage`, `phone`, `location`, `email`, `password`, `credits`, `points`, `state`, `session`, `registrationDate`, `keyreg`, `role`) VALUES
(1, 'Juan Cruz', 'Ocampos', NULL, NULL, NULL, '', 'pepe@gmail.com', '1dd4ecb6f7f0091bc464fee9b9202d59', NULL, NULL, 0, 1495137069, '2017-05-18', '0463b4f6c6263825487df9a29', 2),
(2, 'Ulises', 'Conejo', NULL, NULL, NULL, '', 'conejo@gmail.com', '47b4d0c9445131dec646a489805f0f52', NULL, NULL, 0, 1495129961, '2017-05-18', '3af8df129416280e97c11710e', 2),
(3, 'Lucas', 'Saltamontes', NULL, NULL, NULL, '', 'saltalucassalta@gmail.com', '808a3fa3e3366945393dda70e59a61a2', NULL, NULL, 0, 1495132930, '2017-05-18', '90c2b0d54f9f90004f2fcd9d0', 2),
(4, 'Nuria', 'flkajdglkajs', NULL, NULL, NULL, NULL, 'nu@gmail.com', 'fe295ff0cd2bac35cfa387a3ad08d72a', NULL, NULL, 0, 1495135402, '2017-05-18', 'd6bfe454c4c3c053f1a480270', 2),
(5, 'mati', 'dd', NULL, NULL, NULL, NULL, 'maddti@gmail.com', '34386742333358bf5fbdcec9ef665bb4', NULL, NULL, 0, 1495135883, '2017-05-18', '7866da3bf22445a46610c0b87', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`idComment`),
  ADD UNIQUE KEY `idUser` (`idUser`),
  ADD UNIQUE KEY `daddy` (`idQuestion`),
  ADD UNIQUE KEY `idGauchada` (`idGauchada`);

--
-- Indexes for table `Gauchadas`
--
ALTER TABLE `Gauchadas`
  ADD PRIMARY KEY (`idGauchada`),
  ADD UNIQUE KEY `idSolicitante` (`idUser`),
  ADD UNIQUE KEY `idCategoria` (`idCategory`);

--
-- Indexes for table `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`idImages`),
  ADD UNIQUE KEY `idUser` (`idUser`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `idImage` (`idImage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Gauchadas`
--
ALTER TABLE `Gauchadas`
  MODIFY `idGauchada` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Images`
--
ALTER TABLE `Images`
  MODIFY `idImages` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`idQuestion`) REFERENCES `Comments` (`idComment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Comments_ibfk_3` FOREIGN KEY (`idGauchada`) REFERENCES `Categories` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Gauchadas`
--
ALTER TABLE `Gauchadas`
  ADD CONSTRAINT `Gauchadas_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Gauchadas_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `Categories` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Images`
--
ALTER TABLE `Images`
  ADD CONSTRAINT `Images_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
