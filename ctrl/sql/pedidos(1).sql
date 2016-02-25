-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2016 a las 00:41:19
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
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` mediumint(9) NOT NULL,
  `folioFabrica` mediumint(9) NOT NULL,
  `fecha` date NOT NULL,
  `cantCaja` int(10) UNSIGNED DEFAULT NULL,
  `proveedor` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tipo` enum('smartphone','smartwatch','tablet','drone') DEFAULT NULL,
  `usuario` varchar(200) CHARACTER SET latin1 NOT NULL,
  `cantidad` int(8) DEFAULT NULL,
  `cantidadTotal` int(8) DEFAULT NULL,
  `idmodelo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `folioFabrica`, `fecha`, `cantCaja`, `proveedor`, `tipo`, `usuario`, `cantidad`, `cantidadTotal`, `idmodelo`) VALUES
(9, 3, '2016-02-11', 1, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartphone', 'alan@bebeit.com', 1, 1, ''),
(10, 3, '2016-02-11', 1, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartphone', 'alan@bebeit.com', 1, 1, ''),
(11, 4, '2016-02-11', 11, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartphone', 'alan@bebeit.com', 11, 11, ''),
(12, 4, '2016-02-11', 11, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartphone', 'alan@bebeit.com', 11, 11, ''),
(13, 5, '2016-02-12', 100, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'drone', 'alan@bebeit.com', 100, 100, ''),
(14, 5, '2016-02-12', 100, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'drone', 'alan@bebeit.com', 100, 100, ''),
(15, 1224, '2016-02-12', 2, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartwatch', 'alan@bebeit.com', 10, 100, ''),
(16, 123, '2016-02-13', 10, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartwatch', 'alan@bebeit.com', 10, 100, ''),
(17, 123, '2016-02-13', 10, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartwatch', 'alan@bebeit.com', 10, 100, ''),
(18, 123, '2016-02-13', 10, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartwatch', 'alan@bebeit.com', 10, 100, ''),
(19, 2222, '2016-02-13', 2, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartphone', 'david@bebeit.com', 10, 20, ''),
(20, 2222, '2016-02-13', 2, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartphone', 'david@bebeit.com', 10, 20, ''),
(33, 40, '2016-02-18', 2, 'x', '', 'alan@bebeit.com', 20, 40, ''),
(34, 40, '2016-02-18', 2, 'x', 'tablet', 'alan@bebeit.com', 20, 40, ''),
(35, 200, '2016-02-18', 2, 'xxx', 'smartphone', 'jorge@bebeit.com', 100, 100, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
