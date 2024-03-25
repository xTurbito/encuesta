-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2024 a las 05:23:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuesta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefamilia`
--

CREATE TABLE `detallefamilia` (
  `idDetalleFamilia` int(11) NOT NULL,
  `idFamilia` int(11) DEFAULT NULL,
  `NumeroVotantes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallefamilia`
--

INSERT INTO `detallefamilia` (`idDetalleFamilia`, `idFamilia`, `NumeroVotantes`) VALUES
(1, 1, 5),
(2, 2, 4),
(3, 3, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestadora`
--

CREATE TABLE `encuestadora` (
  `idEncuestadora` int(11) NOT NULL,
  `idJefa` int(11) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encuestadora`
--

INSERT INTO `encuestadora` (`idEncuestadora`, `idJefa`, `Nombre`) VALUES
(1, 1, 'Encuestadora A'),
(2, 2, 'Encuestadora B'),
(3, 3, 'Encuestadora C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `idFamilia` int(11) NOT NULL,
  `idManzana` int(11) DEFAULT NULL,
  `idPartido` int(11) DEFAULT NULL,
  `idDetalleFamilia` int(11) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`idFamilia`, `idManzana`, `idPartido`, `idDetalleFamilia`, `Nombre`) VALUES
(1, 1, 1, 1, 'Familia López'),
(2, 2, 2, 2, 'Familia García'),
(3, 3, 3, 3, 'Familia Rodríguez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefasmanzanas`
--

CREATE TABLE `jefasmanzanas` (
  `idJefa` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `idSeccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jefasmanzanas`
--

INSERT INTO `jefasmanzanas` (`idJefa`, `Nombre`, `idSeccion`) VALUES
(1, 'María', 1),
(2, 'Pedro', 2),
(3, 'Ana', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manzanas`
--

CREATE TABLE `manzanas` (
  `idManzana` int(11) NOT NULL,
  `idSeccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `manzanas`
--

INSERT INTO `manzanas` (`idManzana`, `idSeccion`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `idPartido` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`idPartido`, `Nombre`) VALUES
(1, 'PRD'),
(2, 'PT'),
(3, 'MORENA'),
(4, 'NO SABE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `idSeccion` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`idSeccion`, `Nombre`) VALUES
(1, 'Sección A'),
(2, 'Sección B'),
(3, 'Sección C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votantes`
--

CREATE TABLE `votantes` (
  `idVotantes` int(11) NOT NULL,
  `idDetalleFamilia` int(11) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `idPartido` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `votantes`
--

INSERT INTO `votantes` (`idVotantes`, `idDetalleFamilia`, `Nombre`, `idPartido`) VALUES
(1, 1, 'Juan', 1),
(2, 2, 'María', 2),
(3, 3, 'Pedro', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallefamilia`
--
ALTER TABLE `detallefamilia`
  ADD PRIMARY KEY (`idDetalleFamilia`),
  ADD KEY `idFamilia` (`idFamilia`);

--
-- Indices de la tabla `encuestadora`
--
ALTER TABLE `encuestadora`
  ADD PRIMARY KEY (`idEncuestadora`),
  ADD KEY `idJefa` (`idJefa`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`idFamilia`),
  ADD KEY `idDetalleFamilia` (`idDetalleFamilia`);

--
-- Indices de la tabla `jefasmanzanas`
--
ALTER TABLE `jefasmanzanas`
  ADD PRIMARY KEY (`idJefa`),
  ADD KEY `idSeccion` (`idSeccion`);

--
-- Indices de la tabla `manzanas`
--
ALTER TABLE `manzanas`
  ADD PRIMARY KEY (`idManzana`),
  ADD KEY `idSeccion` (`idSeccion`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`idPartido`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`idSeccion`);

--
-- Indices de la tabla `votantes`
--
ALTER TABLE `votantes`
  ADD PRIMARY KEY (`idVotantes`),
  ADD KEY `idDetalleFamilia` (`idDetalleFamilia`),
  ADD KEY `idPartido` (`idPartido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallefamilia`
--
ALTER TABLE `detallefamilia`
  MODIFY `idDetalleFamilia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `encuestadora`
--
ALTER TABLE `encuestadora`
  MODIFY `idEncuestadora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `idFamilia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jefasmanzanas`
--
ALTER TABLE `jefasmanzanas`
  MODIFY `idJefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `manzanas`
--
ALTER TABLE `manzanas`
  MODIFY `idManzana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `idPartido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `votantes`
--
ALTER TABLE `votantes`
  MODIFY `idVotantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallefamilia`
--
ALTER TABLE `detallefamilia`
  ADD CONSTRAINT `detallefamilia_ibfk_1` FOREIGN KEY (`idFamilia`) REFERENCES `familias` (`idFamilia`);

--
-- Filtros para la tabla `encuestadora`
--
ALTER TABLE `encuestadora`
  ADD CONSTRAINT `encuestadora_ibfk_1` FOREIGN KEY (`idJefa`) REFERENCES `jefasmanzanas` (`idJefa`);

--
-- Filtros para la tabla `familias`
--
ALTER TABLE `familias`
  ADD CONSTRAINT `familias_ibfk_1` FOREIGN KEY (`idDetalleFamilia`) REFERENCES `detallefamilia` (`idDetalleFamilia`);

--
-- Filtros para la tabla `jefasmanzanas`
--
ALTER TABLE `jefasmanzanas`
  ADD CONSTRAINT `jefasmanzanas_ibfk_1` FOREIGN KEY (`idSeccion`) REFERENCES `secciones` (`idSeccion`);

--
-- Filtros para la tabla `manzanas`
--
ALTER TABLE `manzanas`
  ADD CONSTRAINT `manzanas_ibfk_1` FOREIGN KEY (`idSeccion`) REFERENCES `secciones` (`idSeccion`);

--
-- Filtros para la tabla `votantes`
--
ALTER TABLE `votantes`
  ADD CONSTRAINT `votantes_ibfk_1` FOREIGN KEY (`idDetalleFamilia`) REFERENCES `detallefamilia` (`idDetalleFamilia`),
  ADD CONSTRAINT `votantes_ibfk_2` FOREIGN KEY (`idPartido`) REFERENCES `partidos` (`idPartido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
