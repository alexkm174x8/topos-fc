-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 07:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topos`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservacion`
--

CREATE TABLE `reservacion` (
  `idReserva` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `horaRsv` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` varchar(100) DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservacion`
--

INSERT INTO `reservacion` (`idReserva`, `nombre`, `apellido`, `correo`, `motivo`, `horaRsv`, `estado`) VALUES
(6, 'Abi', 'Perez', 'abiperez@perez.perez', 'Abi Perez', '2024-06-06 18:16:11', 'Pendiente'),
(9, 'Rodrigo', 'L?pez', 'a01737437@tec.mx', 'Boda', '2024-06-20 17:00:00', 'Pendiente'),
(10, 'Anto', 'R D', 'rodriguezdoloresantonieta@gmail.com', 'prueba', '2024-08-08 13:00:00', 'Pendiente'),
(11, 's', 's', 's@s', 's', '2024-06-11 15:00:00', 'Pendiente'),
(12, 'gg', 'ggg', 'ggggg@gmail.com', 'ggggggggggg', '2024-06-11 17:00:00', 'Pendiente');

-- --------------------------------------------------------

--
-- Table structure for table `topos_admin`
--

CREATE TABLE `topos_admin` (
  `idAdmin` int(11) NOT NULL,
  `idGoogle` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topos_equipo`
--

CREATE TABLE `topos_equipo` (
  `idEquipo` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `creacion` year(4) NOT NULL,
  `goles_totales` int(2) NOT NULL,
  `partidos_totales` int(2) NOT NULL,
  `partidos_ganados` int(2) NOT NULL,
  `partidos_empatados` int(2) NOT NULL,
  `partidos_perdidos` int(2) NOT NULL,
  `puntos_extras` int(2) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `idLiga` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topos_equipo`
--

INSERT INTO `topos_equipo` (`idEquipo`, `nombre`, `creacion`, `goles_totales`, `partidos_totales`, `partidos_ganados`, `partidos_empatados`, `partidos_perdidos`, `puntos_extras`, `logo`, `idLiga`) VALUES
(0, 'Chocolate', '0000', 0, 0, 0, 0, 0, 0, '', 1),
(1, 'Emperadores', '2000', 3, 70, 1, 0, 69, 0, 'https://th.bing.com/th/id/R.4990066cdbf73ade71183850bcb8bd43?rik=vNJa%2b6y1m9GKkA&pid=ImgRaw&r=0', 2),
(2, 'Topos', '1990', 54, 55, 50, 2, 3, 1, 'https://toposfc.org/wp-content/uploads/2020/11/logo_toposfc.png', 1),
(3, 'Patitos ', '2024', 5, 10, 2, 1, 7, 9, '', 2),
(4, 'Petroleros', '2023', 5, 10, 2, 1, 7, 9, 'https://w1.pngwing.com/pngs/835/464/png-transparent-premier-league-logo-football-north-coast-sports-league-team-coach-national-premier-leagues-player.png', 3),
(6, 'Powerpuff', '2003', 40, 35, 33, 1, 1, 5, 'https://paladarnegro.net/escudoteca/mexico/ligamx/png/atlas.png', 3),
(7, 'Bling Bling Boys', '2005', 22, 17, 7, 5, 5, 1, '', 2),
(8, 'Gamesa', '1999', 4, 7, 2, 5, 0, 1, '', 1),
(9, 'Las Extremas', '2018', 4, 5, 3, 1, 1, 0, '', 3),
(11, 'Juana Manrique de Lara', '0000', 0, 0, 0, 0, 0, 0, '', 2),
(12, 'Dise?adoras', '0000', 0, 0, 0, 0, 0, 0, '', 3),
(13, 'Doctores', '0000', 0, 0, 0, 0, 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topos_goles`
--

CREATE TABLE `topos_goles` (
  `idPartido` int(11) NOT NULL,
  `idJugador` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topos_informacion`
--

CREATE TABLE `topos_informacion` (
  `idJugador` int(11) NOT NULL,
  `edad` int(2) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `colonia` varchar(40) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `acuerdoImagen` varchar(5) DEFAULT NULL,
  `acuerdoImagenTutor` varchar(5) DEFAULT NULL,
  `medio` varchar(40) DEFAULT NULL,
  `tutor` varchar(50) DEFAULT NULL,
  `ageReq` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topos_informacion`
--

INSERT INTO `topos_informacion` (`idJugador`, `edad`, `correo`, `colonia`, `telefono`, `acuerdoImagen`, `acuerdoImagenTutor`, `medio`, `tutor`, `ageReq`) VALUES
(2, 19, 'otroejemplodecorreo@outlook.com', 'Tecnol?gico de Monterrey', '5439287615', 'true', 'true', NULL, NULL, NULL),
(6, 20, 'colegioostos@gmail.com', 'Morelos', '5037856957', 'true', 'true', NULL, NULL, NULL),
(7, 20, 'littlenightmares@outlook.com', 'Granjas', '6930572394', 'true', 'true', NULL, NULL, NULL),
(8, 21, 'arlequin@hotmail.com', 'Atlipazahua', '8524697154', 'Acept', 'Acept', 'Invitaci?n directa', 'Milagros Reyes Ger?nimo', 'S?'),
(9, 23, 'chinchilla@hotmail.com', 'Example', '8456176283', 'Acept', 'Acept', 'Invitaci?n directa', 'Gandalf', 'S?');

-- --------------------------------------------------------

--
-- Table structure for table `topos_jugador`
--

CREATE TABLE `topos_jugador` (
  `idJugador` int(11) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `numero` int(2) NOT NULL,
  `posicion` varchar(25) NOT NULL,
  `goles` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topos_jugador`
--

INSERT INTO `topos_jugador` (`idJugador`, `nombres`, `apellidos`, `idEquipo`, `estado`, `numero`, `posicion`, `goles`) VALUES
(0, 'Alejandro', 'Santana Moreno', 0, '', 0, '', 0),
(2, 'Alvaro Alverto', 'Cruz Jim?nez', 2, 'Activo', 5, 'GG', 3),
(3, 'Abigail', 'P?rez Garc?a', 1, 'inactivo', 7, 'JJ', 3),
(4, 'Rodrigo', 'L?pez Guerra', 3, '', 0, '', 0),
(5, 'Alejandro', 'Santana Moreno', 0, '', 0, '', 0),
(6, 'Hector Jos?', 'Rodr?guez Madrigal', 0, '', 0, '', 0),
(7, 'Mart?n', 'de la Fuente Valencia', 0, '', 0, '', 0),
(8, 'Aranza', 'Cerino Ju?rez', 0, '', 0, '', 0),
(9, 'Cristian Alejandro', 'L?pez Balcazar', 13, 'active', 1, 'JJ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `topos_liga`
--

CREATE TABLE `topos_liga` (
  `idLiga` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `partidos_totales` int(11) NOT NULL,
  `goles_totales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topos_liga`
--

INSERT INTO `topos_liga` (`idLiga`, `nombre`, `logo`, `partidos_totales`, `goles_totales`) VALUES
(1, 'Liga Varonil Estrella', 'https://toposfc.org/wp-content/uploads/2020/07/escudo_topos-01.png', 12, 15),
(2, 'Liga Varonil Dorada', 'https://toposfc.org/wp-content/uploads/2020/07/escudo_topos-01.png', 23, 20),
(3, 'Liga Femenil Talpa', 'https://toposfc.org/wp-content/uploads/2020/12/ToposFemenil.png', 20, 40);

-- --------------------------------------------------------

--
-- Table structure for table `topos_partido`
--

CREATE TABLE `topos_partido` (
  `idPartido` int(11) NOT NULL,
  `equipo_casa` int(11) NOT NULL,
  `equipo_visita` int(11) NOT NULL,
  `marcador_casa` int(2) NOT NULL,
  `marcador_visita` int(2) NOT NULL,
  `fecha` datetime NOT NULL,
  `idLiga` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topos_partido`
--

INSERT INTO `topos_partido` (`idPartido`, `equipo_casa`, `equipo_visita`, `marcador_casa`, `marcador_visita`, `fecha`, `idLiga`) VALUES
(1, 8, 2, 4, 5, '2024-05-30 12:29:19', 1),
(3, 1, 3, 80, 1, '2024-05-30 12:30:04', 2),
(4, 6, 4, 5, 3, '2024-05-31 22:40:04', 3);

-- --------------------------------------------------------

--
-- Table structure for table `topos_reservacion`
--

CREATE TABLE `topos_reservacion` (
  `idReserva` int(11) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL,
  `razon` varchar(100) NOT NULL,
  `admin_encargado` int(11) DEFAULT NULL,
  `estado` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'roy', 'roy', 'Roy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`idReserva`);

--
-- Indexes for table `topos_admin`
--
ALTER TABLE `topos_admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `idGoogle` (`idGoogle`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `topos_equipo`
--
ALTER TABLE `topos_equipo`
  ADD PRIMARY KEY (`idEquipo`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `idLiga` (`idLiga`);

--
-- Indexes for table `topos_goles`
--
ALTER TABLE `topos_goles`
  ADD KEY `idPartido` (`idPartido`),
  ADD KEY `idJugador` (`idJugador`);

--
-- Indexes for table `topos_informacion`
--
ALTER TABLE `topos_informacion`
  ADD PRIMARY KEY (`idJugador`);

--
-- Indexes for table `topos_jugador`
--
ALTER TABLE `topos_jugador`
  ADD PRIMARY KEY (`idJugador`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- Indexes for table `topos_liga`
--
ALTER TABLE `topos_liga`
  ADD PRIMARY KEY (`idLiga`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indexes for table `topos_partido`
--
ALTER TABLE `topos_partido`
  ADD PRIMARY KEY (`idPartido`),
  ADD UNIQUE KEY `fecha` (`fecha`),
  ADD KEY `equipo_casa` (`equipo_casa`),
  ADD KEY `equipo_visita` (`equipo_visita`);

--
-- Indexes for table `topos_reservacion`
--
ALTER TABLE `topos_reservacion`
  ADD PRIMARY KEY (`idReserva`),
  ADD UNIQUE KEY `fecha` (`fecha`),
  ADD KEY `admin_encargado` (`admin_encargado`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `topos_informacion`
--
ALTER TABLE `topos_informacion`
  MODIFY `idJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `topos_equipo`
--
ALTER TABLE `topos_equipo`
  ADD CONSTRAINT `topos_equipo_ibfk_1` FOREIGN KEY (`idLiga`) REFERENCES `topos_liga` (`idLiga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topos_goles`
--
ALTER TABLE `topos_goles`
  ADD CONSTRAINT `topos_goles_ibfk_1` FOREIGN KEY (`idPartido`) REFERENCES `topos_partido` (`idPartido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topos_goles_ibfk_2` FOREIGN KEY (`idJugador`) REFERENCES `topos_jugador` (`idJugador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topos_informacion`
--
ALTER TABLE `topos_informacion`
  ADD CONSTRAINT `topos_informacion_ibfk_1` FOREIGN KEY (`idJugador`) REFERENCES `topos_jugador` (`idJugador`);

--
-- Constraints for table `topos_jugador`
--
ALTER TABLE `topos_jugador`
  ADD CONSTRAINT `topos_jugador_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `topos_equipo` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topos_partido`
--
ALTER TABLE `topos_partido`
  ADD CONSTRAINT `topos_partido_ibfk_1` FOREIGN KEY (`equipo_casa`) REFERENCES `topos_equipo` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topos_partido_ibfk_2` FOREIGN KEY (`equipo_visita`) REFERENCES `topos_equipo` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topos_reservacion`
--
ALTER TABLE `topos_reservacion`
  ADD CONSTRAINT `topos_reservacion_ibfk_1` FOREIGN KEY (`admin_encargado`) REFERENCES `topos_admin` (`idAdmin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
