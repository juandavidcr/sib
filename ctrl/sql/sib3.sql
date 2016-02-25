-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-02-2016 a las 03:38:44
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
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE IF NOT EXISTS `almacen` (
  `idAlmacen` tinyint(4) NOT NULL,
  `zona` enum('A','B','C','D','E','F') DEFAULT NULL,
  `tipoAlmacen` enum('Mercancia','Refacciones') DEFAULT NULL,
  `status` enum('ok_mercancia','not_ok_mercancia','ok_refacc','not_ok_refacc') DEFAULT NULL,
  `descripcion` text,
  `idmodel` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folios`
--

CREATE TABLE IF NOT EXISTS `folios` (
  `id` mediumint(9) NOT NULL,
  `folio_de_fabrica` mediumint(9) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad_de_cajas` int(8) NOT NULL,
  `total_de_equipos` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `folios`
--

INSERT INTO `folios` (`id`, `folio_de_fabrica`, `fecha`, `cantidad_de_cajas`, `total_de_equipos`) VALUES
(1, 12345, '2016-02-10', 2, 100),
(2, 8388607, '2016-02-18', 1, 1),
(3, 1, '2016-02-18', 1, 11),
(6, 2, '2016-02-18', 1, 1),
(7, 111, '2016-02-18', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE IF NOT EXISTS `modelos` (
  `idmodel` varchar(100) NOT NULL,
  `tipo` enum('smartphone','smartwatch','tablet','drone') DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `precio` double(10,2) NOT NULL,
  PRIMARY KEY (`idmodel`),
  UNIQUE KEY `idmodel` (`idmodel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` mediumint(9) NOT NULL,
  `folioFabrica` mediumint(9) NOT NULL,
  `fecha` date NOT NULL,
  `cantCaja` int(10) unsigned DEFAULT NULL,
  `proveedor` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tipo` enum('smartphone','smartwatch','tablet','drone') DEFAULT NULL,
  `usuario` varchar(200) CHARACTER SET latin1 NOT NULL,
  `cantidad` mediumint(9) DEFAULT NULL,
  `idmodelo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `idProveedor` mediumint(9) NOT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `domicilio` text,
  `telefonos` text,
  `wechat` varchar(50) DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `email` varchar(150) DEFAULT NULL,
  `pagina` varchar(255) DEFAULT NULL,
  `tipo_de_producto` enum('smartphone','smartwatch','tablet','drone') DEFAULT NULL,
  `idmodelo` varchar(100) NOT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_Us` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(12) NOT NULL,
  `tipo_user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Us`, `nombre`, `email`, `password`, `tipo_user`) VALUES
(1, 'Alan shide', 'alan@bebeit.com', '7c4a8d09ca37', 'supervisor'),
(2, 'Tania', 'tania@bebeit.com', '7c4a8d09ca37', 'supervisor'),
(3, 'Yolanda', 'j1dcrane@gmail.com', '5baa61e4c9b9', 'supervisor'),
(6, 'Katy', 'katy@bebeit.com', '7c4a8d09ca37', 'contador'),
(8, 'Johnatan', 'johnatan@bebeit.com', '5baa61e4c9b9', 'subgerente'),
(9, 'Andres', 'andres@bebeit.com', '7c4a8d09ca37', 'supervisor'),
(10, 'Juan  David', 'david@bebeit.com', '5baa61e4c9b9', 'tecnólogo'),
(11, 'Javier', 'javier@bebeit.com', '9d4e1e23bd5b', 'g_ventas'),
(12, 'tania2', 'tania2@bebeit.com', '7110eda4d09e', 'almacenista'),
(13, 'Cesar', 'cesar@bebeit.com', '22ea1c649c82', 'social-manager'),
(14, 'Eduardo Medina', 'eduardom@bebeit.com', 'd9cf7ba5c6dd', 'almacenista'),
(0, 'ivan', 'ivan@bebeit.com', 'af8978b1797b', 'subgerente'),
(0, 'ivan', 'ivan@bebeit.com', 'af8978b1797b', 'subgerente'),
(0, 'ivan', 'ivan@bebeit.com', 'af8978b1797b', 'subgerente'),
(0, 'ivan', 'ivan@bebeit.com', 'af8978b1797b', 'subgerente');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
