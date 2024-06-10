-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2024 a las 13:11:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `topos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `idReserva` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `horaRsv` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(100) NOT NULL DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`idReserva`, `nombre`, `apellido`, `correo`, `motivo`, `horaRsv`, `estado`) VALUES
(1, 'Eduardo', 'Camarena', 'edu.cama@gmail.com', 'Fiesta para Álvaro', '2024-06-14 11:00:00', 'Pendiente'),
(2, 'Tomás', 'Fredly', 'tom.fre@outlook.com', 'Boda', '2024-06-29 21:00:00', 'Pendiente'),
(3, 'Firulais', 'Del Carmen', 'firu.car@yahoo.com.mx', 'Entrenamiento', '2024-06-16 12:00:00', 'Pendiente'),
(4, 'Carlos', 'Hernández', 'carlos.her@hotmail.com', 'Concierto', '2024-06-30 07:00:00', 'Pendiente'),
(5, 'Claudia', 'Tamara', 'clau.tama@gmail.com', 'Fiesta Infantil', '2024-06-24 12:00:00', 'Pendiente'),
(6, 'Gustavo', 'Díaz', 'gus.diaz23@outlook.com', 'Reunión semanal', '2024-06-29 11:00:00', 'Pendiente'),
(7, 'Carlos', 'Fernández', 'carlos.fernandezs76@yahoo.com.mx', 'Reunión Familiar', '2024-06-11 17:00:00', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topos_equipo`
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
-- Volcado de datos para la tabla `topos_equipo`
--

INSERT INTO `topos_equipo` (`idEquipo`, `nombre`, `creacion`, `goles_totales`, `partidos_totales`, `partidos_ganados`, `partidos_empatados`, `partidos_perdidos`, `puntos_extras`, `logo`, `idLiga`) VALUES
(1, 'Emperadores', '2021', 23, 3, 5, 2, 4, 2, 'https://th.bing.com/th/id/R.4990066cdbf73ade71183850bcb8bd43?rik=vNJa%2b6y1m9GKkA&pid=ImgRaw&r=0', 2),
(2, 'Topos', '2006', 34, 14, 2, 5, 7, 2, 'https://png.pngtree.com/png-clipart/20230813/original/pngtree-mole-animal-logo-icon-design-illustration-vector-ground-rodent-isolated-vector-picture-image_10521127.png', 1),
(3, 'Petroleros', '2010', 29, 24, 12, 7, 5, 5, 'https://i.pinimg.com/originals/a0/42/0f/a0420f76922d64fd0ed7e00c20ad9c3d.png', 3),
(4, 'Patitos', '2014', 53, 53, 12, 2, 15, 1, 'https://www.grupoalza.com/sites/default/files/marcas-taxonomia/corbuma-los-patitos-v2.png', 2),
(5, 'Chocolate', '2015', 23, 21, 19, 1, 1, 5, 'https://logos.textgiraffe.com/logos/logo-name/Chocolate-designstyle-chocolate-m.png', 1),
(6, 'Powerpuff', '2006', 42, 13, 1, 11, 1, 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Powerpuff_Girls_heart_emblem.svg/2188px-Powerpuff_Girls_heart_emblem.svg.png', 3),
(7, 'Las Extremas', '2020', 23, 12, 4, 4, 4, 2, 'https://registro.extremabelleza.com/wp-content/uploads/2023/05/logo-extrema-belleza_01-copia.png', 3),
(8, 'Gamesa', '2016', 23, 12, 3, 5, 4, 3, 'https://seeklogo.com/images/G/Gamesa-logo-6281D3CA58-seeklogo.com.png', 1),
(9, 'Doctores', '2007', 23, 21, 5, 5, 11, 5, 'https://www.metro.cdmx.gob.mx/storage/app/media/La%20red/linea8/doctores.png', 1),
(10, 'Club Atlas', '2019', 12, 10, 3, 2, 5, 4, 'https://paladarnegro.net/escudoteca/mexico/ligamx/png/atlas.png', 3),
(11, 'Bling Bling Boys', '2015', 23, 11, 3, 3, 5, 4, 'https://i.redd.it/cqx5nha9yf691.png', 2),
(12, 'Juana Manrique de Lara', '2005', 12, 3, 1, 1, 1, 1, 'https://lh5.googleusercontent.com/proxy/e_csstrHabgWA6ATKNWSFFDE-u5RAFnQShmBkcpH6-un7lUXLaGiwM7Rcz5mAeiNyY2a_QtP2Cw6bJ2N5AXq1ixwSoVJ9UKzZ3tQ74Hdpcc3KClw', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topos_goles`
--

CREATE TABLE `topos_goles` (
  `idPartido` int(11) NOT NULL,
  `idJugador` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topos_informacion`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topos_jugador`
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
-- Volcado de datos para la tabla `topos_jugador`
--

INSERT INTO `topos_jugador` (`idJugador`, `nombres`, `apellidos`, `idEquipo`, `estado`, `numero`, `posicion`, `goles`) VALUES
(19, 'Yolanda', 'Rosas', 3, 'Activo', 23, 'CA', 2),
(20, 'María', 'Gómez', 6, 'Activo', 2, '3', 2),
(21, 'Ashley', 'Lara', 7, 'Inactivo', 41, '1', 2),
(22, 'Rocío', 'Flores', 10, 'Activo', 42, '5', 4),
(23, 'Marco', 'Díaz', 2, 'Inactivo', 54, 'GR', 3),
(24, 'Juan', 'López', 1, 'Activo', 34, 'CM', 5),
(25, 'Victor', 'Huerta', 4, 'Activo', 54, 'FM', 34),
(26, 'Francisco', 'Maderas', 11, 'Activo', 3, 'FM', 5),
(27, 'Tomás', 'Fredly', 12, 'Activo', 54, 'RM', 4),
(28, 'Carlos', 'Hernández', 5, 'Activo', 43, 'CM', 43),
(29, 'Firulais', 'Del Carmen', 8, 'Activo', 43, 'GR', 54),
(30, 'Eduardo', 'Camarena', 9, 'Activo', 4, 'CM', 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topos_liga`
--

CREATE TABLE `topos_liga` (
  `idLiga` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `partidos_totales` int(11) NOT NULL,
  `goles_totales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `topos_liga`
--

INSERT INTO `topos_liga` (`idLiga`, `nombre`, `logo`, `partidos_totales`, `goles_totales`) VALUES
(1, 'Liga Varonil Estrella', 'https://toposfc.org/wp-content/uploads/2020/07/escudo_topos-01.png', 12, 15),
(2, 'Liga Varonil Dorada', 'https://toposfc.org/wp-content/uploads/2020/07/escudo_topos-01.png', 23, 20),
(3, 'Liga Femenil Talpa', 'https://toposfc.org/wp-content/uploads/2020/12/ToposFemenil.png', 20, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topos_partido`
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
-- Volcado de datos para la tabla `topos_partido`
--

INSERT INTO `topos_partido` (`idPartido`, `equipo_casa`, `equipo_visita`, `marcador_casa`, `marcador_visita`, `fecha`, `idLiga`) VALUES
(1, 1, 11, 2, 4, '2024-06-10 01:27:33', 2),
(2, 4, 12, 3, 4, '2024-06-10 01:27:45', 2),
(3, 4, 1, 1, 2, '2024-06-10 01:28:21', 2),
(4, 5, 2, 1, 1, '2024-06-10 01:28:32', 1),
(5, 9, 8, 2, 3, '2024-06-10 01:28:46', 1),
(6, 3, 10, 3, 4, '2024-06-10 01:28:58', 3),
(7, 3, 6, 2, 4, '2024-06-10 01:29:11', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'roy', 'roy', 'Roy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`idReserva`);

--
-- Indices de la tabla `topos_equipo`
--
ALTER TABLE `topos_equipo`
  ADD PRIMARY KEY (`idEquipo`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `idLiga` (`idLiga`);

--
-- Indices de la tabla `topos_goles`
--
ALTER TABLE `topos_goles`
  ADD KEY `idPartido` (`idPartido`),
  ADD KEY `idJugador` (`idJugador`);

--
-- Indices de la tabla `topos_informacion`
--
ALTER TABLE `topos_informacion`
  ADD PRIMARY KEY (`idJugador`);

--
-- Indices de la tabla `topos_jugador`
--
ALTER TABLE `topos_jugador`
  ADD PRIMARY KEY (`idJugador`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- Indices de la tabla `topos_liga`
--
ALTER TABLE `topos_liga`
  ADD PRIMARY KEY (`idLiga`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `topos_partido`
--
ALTER TABLE `topos_partido`
  ADD PRIMARY KEY (`idPartido`),
  ADD UNIQUE KEY `fecha` (`fecha`),
  ADD KEY `equipo_casa` (`equipo_casa`),
  ADD KEY `equipo_visita` (`equipo_visita`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `topos_informacion`
--
ALTER TABLE `topos_informacion`
  MODIFY `idJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `topos_jugador`
--
ALTER TABLE `topos_jugador`
  MODIFY `idJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `topos_equipo`
--
ALTER TABLE `topos_equipo`
  ADD CONSTRAINT `topos_equipo_ibfk_1` FOREIGN KEY (`idLiga`) REFERENCES `topos_liga` (`idLiga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `topos_goles`
--
ALTER TABLE `topos_goles`
  ADD CONSTRAINT `topos_goles_ibfk_1` FOREIGN KEY (`idPartido`) REFERENCES `topos_partido` (`idPartido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topos_goles_ibfk_2` FOREIGN KEY (`idJugador`) REFERENCES `topos_jugador` (`idJugador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `topos_informacion`
--
ALTER TABLE `topos_informacion`
  ADD CONSTRAINT `topos_informacion_ibfk_1` FOREIGN KEY (`idJugador`) REFERENCES `topos_jugador` (`idJugador`) ON DELETE CASCADE;

--
-- Filtros para la tabla `topos_jugador`
--
ALTER TABLE `topos_jugador`
  ADD CONSTRAINT `topos_jugador_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `topos_equipo` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `topos_partido`
--
ALTER TABLE `topos_partido`
  ADD CONSTRAINT `topos_partido_ibfk_1` FOREIGN KEY (`equipo_casa`) REFERENCES `topos_equipo` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topos_partido_ibfk_2` FOREIGN KEY (`equipo_visita`) REFERENCES `topos_equipo` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
