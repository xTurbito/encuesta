-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 08:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encuesta`
--

-- --------------------------------------------------------

--
-- Table structure for table `familias`
--

CREATE TABLE `familias` (
  `idFamilia` int(11) NOT NULL,
  `idManzana` int(11) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `NumVotantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `familias`
--

INSERT INTO `familias` (`idFamilia`, `idManzana`, `Nombre`, `NumVotantes`) VALUES
(1, 1, 'Familia López', 5),
(2, 2, 'Familia García', 3),
(3, 3, 'Familia Rodríguez', 4),
(4, 1, 'Familia Alcocer', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jefasmanzanas`
--

CREATE TABLE `jefasmanzanas` (
  `idJefaManzana` int(11) NOT NULL,
  `NomJefManzana` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jefasmanzanas`
--

INSERT INTO `jefasmanzanas` (`idJefaManzana`, `NomJefManzana`) VALUES
(1, 'María'),
(2, 'Pedro'),
(3, 'Ana');

-- --------------------------------------------------------

--
-- Table structure for table `jefassecciones`
--

CREATE TABLE `jefassecciones` (
  `idJefaSeccion` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jefassecciones`
--

INSERT INTO `jefassecciones` (`idJefaSeccion`, `Nombre`) VALUES
(1, 'Miguel Alcocer'),
(2, 'Frida Gonzalez');

-- --------------------------------------------------------

--
-- Table structure for table `manzanas`
--

CREATE TABLE `manzanas` (
  `idManzana` int(11) NOT NULL,
  `idSeccion` int(11) DEFAULT NULL,
  `idJefaManzana` int(11) DEFAULT NULL,
  `NombreManzana` varchar(255) NOT NULL,
  `NumCasas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manzanas`
--

INSERT INTO `manzanas` (`idManzana`, `idSeccion`, `idJefaManzana`, `NombreManzana`, `NumCasas`) VALUES
(1, 2, 3, 'Manzana 1', 10),
(2, 1, 2, 'Manzana 2', 20),
(3, 1, 1, 'Manzana 3', 15),
(4, 2, 1, 'Manzana 4', 5),
(5, 2, 1, 'Manzana 4', 5);

-- --------------------------------------------------------

--
-- Table structure for table `partidos`
--

CREATE TABLE `partidos` (
  `idPartido` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partidos`
--

INSERT INTO `partidos` (`idPartido`, `Nombre`) VALUES
(1, 'PRD'),
(2, 'PAN'),
(3, 'MORENA'),
(4, 'NO SABE');

-- --------------------------------------------------------

--
-- Table structure for table `secciones`
--

CREATE TABLE `secciones` (
  `idSeccion` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `idJefaSeccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `secciones`
--

INSERT INTO `secciones` (`idSeccion`, `Nombre`, `idJefaSeccion`) VALUES
(1, 'Sección A', NULL),
(2, 'Sección B', NULL),
(3, 'Sección C', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `votantes`
--

CREATE TABLE `votantes` (
  `idVotante` int(11) NOT NULL,
  `NomVotante` varchar(255) DEFAULT NULL,
  `idPartido` int(11) DEFAULT NULL,
  `idFamilia` int(11) DEFAULT NULL,
  `idManzana` int(11) DEFAULT NULL,
  `idSeccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votantes`
--

INSERT INTO `votantes` (`idVotante`, `NomVotante`, `idPartido`, `idFamilia`, `idManzana`, `idSeccion`) VALUES
(6, 'Miguel Alcocer', 3, 4, 1, 2),
(7, 'Frida Gonzalez', 2, 2, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`idFamilia`),
  ADD KEY `fk_idManzana` (`idManzana`);

--
-- Indexes for table `jefasmanzanas`
--
ALTER TABLE `jefasmanzanas`
  ADD PRIMARY KEY (`idJefaManzana`);

--
-- Indexes for table `jefassecciones`
--
ALTER TABLE `jefassecciones`
  ADD PRIMARY KEY (`idJefaSeccion`);

--
-- Indexes for table `manzanas`
--
ALTER TABLE `manzanas`
  ADD PRIMARY KEY (`idManzana`),
  ADD KEY `idSeccion` (`idSeccion`),
  ADD KEY `fk_idJefaManzana` (`idJefaManzana`);

--
-- Indexes for table `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`idPartido`);

--
-- Indexes for table `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`idSeccion`),
  ADD KEY `fk_idJefaSeccion` (`idJefaSeccion`);

--
-- Indexes for table `votantes`
--
ALTER TABLE `votantes`
  ADD PRIMARY KEY (`idVotante`),
  ADD KEY `fk_idPartido` (`idPartido`),
  ADD KEY `fk_idFamilia` (`idFamilia`),
  ADD KEY `idManzana` (`idManzana`),
  ADD KEY `idSeccion` (`idSeccion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `familias`
--
ALTER TABLE `familias`
  MODIFY `idFamilia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jefasmanzanas`
--
ALTER TABLE `jefasmanzanas`
  MODIFY `idJefaManzana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jefassecciones`
--
ALTER TABLE `jefassecciones`
  MODIFY `idJefaSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manzanas`
--
ALTER TABLE `manzanas`
  MODIFY `idManzana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partidos`
--
ALTER TABLE `partidos`
  MODIFY `idPartido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `secciones`
--
ALTER TABLE `secciones`
  MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `votantes`
--
ALTER TABLE `votantes`
  MODIFY `idVotante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `familias`
--
ALTER TABLE `familias`
  ADD CONSTRAINT `fk_idManzana` FOREIGN KEY (`idManzana`) REFERENCES `manzanas` (`idManzana`);

--
-- Constraints for table `manzanas`
--
ALTER TABLE `manzanas`
  ADD CONSTRAINT `fk_idJefaManzana` FOREIGN KEY (`idJefaManzana`) REFERENCES `jefasmanzanas` (`idJefaManzana`),
  ADD CONSTRAINT `manzanas_ibfk_1` FOREIGN KEY (`idSeccion`) REFERENCES `secciones` (`idSeccion`);

--
-- Constraints for table `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `fk_idJefaSeccion` FOREIGN KEY (`idJefaSeccion`) REFERENCES `jefassecciones` (`idJefaSeccion`);

--
-- Constraints for table `votantes`
--
ALTER TABLE `votantes`
  ADD CONSTRAINT `fk_idFamilia` FOREIGN KEY (`idFamilia`) REFERENCES `familias` (`idFamilia`),
  ADD CONSTRAINT `fk_idPartido` FOREIGN KEY (`idPartido`) REFERENCES `partidos` (`idPartido`),
  ADD CONSTRAINT `votantes_ibfk_1` FOREIGN KEY (`idManzana`) REFERENCES `manzanas` (`idManzana`),
  ADD CONSTRAINT `votantes_ibfk_2` FOREIGN KEY (`idSeccion`) REFERENCES `secciones` (`idSeccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
