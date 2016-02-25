-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-02-2016 a las 01:58:23
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sib3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` mediumint(9) NOT NULL AUTO_INCREMENT,
  `folioFabrica` mediumint(9) NOT NULL,
  `fecha` date NOT NULL,
  `cantCaja` int(10) unsigned DEFAULT NULL,
  `proveedor` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tipo` enum('smartphone','smartwatch','tablet','drone') DEFAULT NULL,
  `usuario` varchar(200) CHARACTER SET latin1 NOT NULL,
  `cantidad` mediumint DEFAULT NULL,
  `idmodelo` varchar(100) NOT NULL ,
  FOREIGN KEY idmodelo  REFERENCES modelos(idmodel)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `folioFabrica`, `fecha`, `cantCaja`, `proveedor`, `tipo`, `usuario`, `cantidad`, `cantidadTotal`, `idmodelo`) VALUES
(0, 222, '2016-02-18', 1, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'drone', 'alan@bebeit.com', 200, 200, 'F-805');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
