-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2015 at 01:21 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Tec`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto2`
--

CREATE TABLE IF NOT EXISTS `CRUD_Jugador`(
idjugador INT, 
nombres VARCHAR(40),
apellidos VARCHAR (40),
idequipo INT,
estado VARCHAR(50), 
numero INT,
PRIMARY KEY (idjugador),
FOREIGN KEY (idequipo) REFERENCES CRUD_Equipo (idequipo) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Dumping data for table `auto2`
--

INSERT INTO `CRUD_Jugador` (`idjugador`, `nombres`, `apellidos`, `idequipo`, `estado`, `numero`) VALUES
(1, 'Alvaro Alberto', 'Cruz Jiménez', 1, 'activo', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auto2`
--
ALTER TABLE `CRUD_Jugador`
  ADD CONSTRAINT `CRUD_Jugador_ibfk_1` FOREIGN KEY (`idequipo`) REFERENCES `CRUD_Equipo` (`idequipo`) ON DELETE CASCADE ON UPDATE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
