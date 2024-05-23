-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2015 at 01:22 PM
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
-- Table structure for table `marca2`
--

CREATE TABLE IF NOT EXISTS `CRUD_Equipo`( 
    idequipo INT, 
    equipo VARCHAR(60), 
    creacion YEAR, 
    PRIMARY kEY (idequipo);
);


--
-- Dumping data for table `marca2`
--

INSERT INTO `CRUD_Equipo` (`idequipo`, `equipo`, `creacion`) VALUES
(1, 'Águilas', 2013),
(2, 'Tiburones', 2014),
(3, 'Ardillas', 2015);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
