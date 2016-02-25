-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2016 a las 04:30:50
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sib3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `idmodel` varchar(100) NOT NULL UNIQUE,
  `tipo` enum('smartphone','smartwatch','tablet','drone') DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `precio` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `modelos`
--

TRUNCATE TABLE `modelos`;
--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`idmodel`, `tipo`, `nombre`, `color`, `precio`) VALUES
('F805C', 'drone', 'F-805 C', 'Blanco', 1500.00),
('OB1', 'smartphone', 'Opal', 'Blanco', 2400.00),
('OD1', 'smartphone', 'Opal', 'Dorado', 2400.00),
('ON1', 'smartphone', 'Opal', 'Negro', 2400.00),
('T200A', 'smartphone', 'T200', 'Azul', 800.00),
('T200L', 'smartphone', 'T200', 'Lila', 800.00),
('T200N', 'smartphone', 'T200', 'Negro', 800.00),
('T200R', 'smartphone', 'T200', 'Rojo', 800.00),
('T800B', 'smartphone', 'T800', 'Blanco', 2100.00),
('T800N', 'smartphone', 'T800', 'Negro', 2100.00),
('T800R', 'smartphone', 'T800', 'Rojo', 2100.00),
('T800RS', 'smartphone', 'T800', 'Rosa', 2100.00),
('Z50D', 'smartwatch', 'Genius Z50', 'Dorado', 2000.00),
('Z50N', 'smartwatch', 'Genius Z50', 'Negro', 2000.00),
('Z50P', 'smartwatch', 'Genius Z50', 'Plata', 2000.00);

UPDATE `modelos` SET `idProveedor` = 'ACM' WHERE `modelos`.`idmodel` = 'OB1';
UPDATE `modelos` SET `idProveedor` = 'ACM' WHERE `modelos`.`idmodel` = 'OD1';
UPDATE `modelos` SET `idProveedor` = 'ACM' WHERE `modelos`.`idmodel` = 'ON1';

UPDATE `modelos` SET `idProveedor` = 'ACM' WHERE `modelos`.`idmodel` = 'T200A';
UPDATE `modelos` SET `idProveedor` = 'ACM' WHERE `modelos`.`idmodel` = 'T200L';
UPDATE `modelos` SET `idProveedor` = 'ACM' WHERE `modelos`.`idmodel` = 'T200N';
UPDATE `modelos` SET `idProveedor` = 'ACM' WHERE `modelos`.`idmodel` = 'T200R';

UPDATE `modelos` SET `idProveedor` = 'ACM' WHERE `modelos`.`idmodel` = 'T800B';
UPDATE `modelos` SET `idProveedor` = 'ACM' WHERE `modelos`.`idmodel` = 'T800N';
UPDATE `modelos` SET `idProveedor` = 'ACM' WHERE `modelos`.`idmodel` = 'T800RS';
UPDATE `modelos` SET `idProveedor` = 'ACM' WHERE `modelos`.`idmodel` = 'T800R';
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`idmodel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
