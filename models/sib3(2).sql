-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2016 a las 16:03:22
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-06:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sib3`
--
CREATE DATABASE sib3;
use sib3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `idAlmacen` tinyint(4) NOT NULL,
  `zona` enum('A','B','C','D','E','F') DEFAULT NULL,
  `tipoAlmacen` enum('Mercancia','Refacciones') DEFAULT NULL,
  `status` enum('ok_mercancia','not_ok_mercancia','ok_refacc','not_ok_refacc') DEFAULT NULL,
  `descripcion` text,
  `idmodel` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`idAlmacen`, `zona`, `tipoAlmacen`, `status`, `descripcion`, `idmodel`) VALUES
(1, 'A', 'Mercancia', 'ok_mercancia', 'ON1 LISTO PARA SER ENVIADO', 'ON1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `id_devoluciones` int(10) NOT NULL,
  `folio` int(10) NOT NULL,
  `vendedor` varchar(100) NOT NULL,
  `fecha_emision` date NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `RFC` varchar(13) NOT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `telefono_cliente` text NOT NULL,
  `Direccion_cliente` text NOT NULL,
  `cp` int(8) NOT NULL,
  `cantidad` int(6) NOT NULL,
  `cantidad_letra` varchar(255) NOT NULL,
  `Modelo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folios`
--

CREATE TABLE `folios` (
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
(1, 1, '2016-02-19', 1, 10),
(6, 133, '2016-02-19', 2, 200),
(7, 12345, '2016-02-19', 2, 200),
(8, 8, '2016-02-19', 1, 100),
(9, 9, '2016-02-19', 1, 10),
(10, 10, '2016-02-19', 1, 1),
(11, 123456, '2016-02-19', 40, 3000),
(12, 0, '2016-02-19', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imei`
--

CREATE TABLE `imei` (
  `IDIMEI` bigint(20) UNSIGNED NOT NULL,
  `IMEI` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspeccion`
--

CREATE TABLE `inspeccion` (
  `id_inspeccion` int(11) NOT NULL,
  `folio` mediumint(9) NOT NULL,
  `fecha_inspeccion` date NOT NULL,
  `proveedor` varchar(100) NOT NULL,
  `tipo_producto` enum('smartphone','smartwatch','tablet','drone') NOT NULL,
  `model` varchar(100) NOT NULL,
  `almacen` tinyint(4) NOT NULL,
  `zona` char(1) NOT NULL,
  `cantidadTotal` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inspeccion`
--

INSERT INTO `inspeccion` (`id_inspeccion`, `folio`, `fecha_inspeccion`, `proveedor`, `tipo_producto`, `model`, `almacen`, `zona`, `cantidadTotal`) VALUES
(1, 12345, '2016-02-18', 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartphone', 'F805C', 2, 'C', 20),
(2, 12345, '2016-02-18', 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'drone', 'F805C', 1, 'C', 200),
(3, 12345, '2016-02-19', 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartwatch', 'Z50D', 2, 'D', 83),
(4, 12345, '2016-02-19', 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartphone', 'T200L', 1, 'D', 89),
(5, 12345, '2016-02-19', 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'smartwatch', 'Z50N', 1, 'C', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `idmodel` varchar(100) NOT NULL,
  `tipo` enum('smartphone','smartwatch','tablet','drone') DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `precio` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`idmodel`, `tipo`, `nombre`, `color`, `precio`) VALUES
('F805C', 'drone', 'F-805 C', 'Blanco', 1500.00),
('OB1', 'smartphone', 'Opal', 'Blanco', 2400.00),
('OD1', 'smartphone', 'Opal', 'Dorado', 2400.00),
('ON1', 'smartphone', 'Opal', 'Negro', 2400.00),
('T200A', 'smartphone', 'T200', 'Azul', 400.00),
('T200L', 'smartphone', 'T200', 'Lila', 400.00),
('T200N', 'smartphone', 'T200', 'Negro', 400.00),
('T200R', 'smartphone', 'T200', 'Rojo', 400.00),
('T800B', 'smartphone', 'T800', 'Blanco', 2100.00),
('T800N', 'smartphone', 'T800', 'Negro', 2100.00),
('T800R', 'smartphone', 'T800', 'Rojo', 2100.00),
('T800RS', 'smartphone', 'T800', 'Rosa', 2100.00),
('Z50D', 'smartwatch', 'Genius Z50', 'Dorado', 2000.00),
('Z50N', 'smartwatch', 'Genius Z50', 'Negro', 2000.00),
('Z50P', 'smartwatch', 'Genius Z50', 'Plata', 2000.00);


UPDATE `pedidos` SET `idmodelo` = 'F805C' WHERE `pedidos`.`idPedido` = 1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` mediumint(9) NOT NULL AUTO_INCREMENT,
  `folioFabrica` mediumint(9) NOT NULL,
  `fecha` date NOT NULL,
  `cantCaja` int(10) UNSIGNED DEFAULT NULL,
  `proveedor` varchar(255) NOT NULL,
  `tipo` enum('smartphone','smartwatch','tablet','drone') DEFAULT NULL,
  `usuario` varchar(200) NOT NULL,
  `cantidad` mediumint(9) DEFAULT NULL,
  `idmodelo` varchar(100) NOT NULL,
  PRIMARY KEY (idPedido),
  FOREIGN KEY (folioFabrica) REFERENCES folios(folio_de_fabrica)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `folioFabrica`, `fecha`, `cantCaja`, `proveedor`, `tipo`, `usuario`, `cantidad`, `idmodelo`) VALUES
(1, 123456, '2016-02-18', 2, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'drone', 'alan@bebeit.com', 200, 'F-805');

-- --------------------------------------------------------
SELECT folioFabrica
FROM pedidos
INNER JOIN folios
ON pedidos.folioFabrica=folios.folio_de_fabrica;

SELECT folios.folio_de_fabrica, pedidos.folioFabrica
FROM pedidos
INNER JOIN folios
ON folios.folio_de_fabrica=pedidos.folioFabrica
ORDER BY pedidos.folioFabrica;

SELECT FOLIOS.cantidad_de_cajas, pedidos.folioFabrica FROM folios WHERE folio_de_fabrica=folioFabrica
union
SELECT folios.total_de_equipos, pedidos.idmodelo FROM pedidos WHERE folio_de_fabrica=folioFabrica;

SELECT folio_de_fabrica,total_de_equipos FROM folios CROSS JOIN pedidos;

#folioFabrica,cantidad,tipo

select folios.total_de_equipos, pedidos.cantidad, pedidos.tipo, pedidos.cantCaja, folios.folio_de_fabrica, pedidos.idmodelo 
from folios,pedidos 
where folios.folio_de_fabrica=pedidos.folioFabrica;


--  total_de_equipos | cantidad | tipo  | cantCaja | folio_de_fabrica | idmodelo
-- ------------------+----------+-------+----------+------------------+----------
--              3000 |      200 | drone |        2 |           123456 | F805C

--
-- Estructura de tabla para la tabla `proveedor`
--
DROP TABLE proveedor;
CREATE TABLE `proveedor` (
  `idProveedor` varchar(10) NOT NULL,
  `razon_social` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `domicilio` text CHARACTER SET utf8,
  `telefonos` text CHARACTER SET utf8,
  `wechat` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `contacto` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8,
  `email` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `pagina` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `razon_social`, `domicilio`, `telefonos`, `wechat`, `contacto`, `descripcion`, `email`, `pagina`) 
VALUES ('ACM', 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'HUMBOLDT 56, CENTRO, DEL. CUAHUTEMOC,\r\nCUIDAD DE MEXICO', '+ 52 (55) 55101576', '@BEBEIT', 'ALAN SHIDE', 'VENTAS DE EQUIPO TELEFONICO', 'alan@bebeit.com', 'bebeit.com.mx, bebeit.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
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
(2, 'tania', 'tania@bebeit.com', '7c4a8d09ca37', 'supervisor'),
(6, 'Katy', 'katy@bebeit.com', '7c4a8d09ca37', 'contador'),
(8, 'Johnatan', 'johnatan@bebeit.com', '5baa61e4c9b9', 'tecnico'),
(10, 'Juan  David', 'david@bebeit.com', '5baa61e4c9b9', 'tecnico'),
(11, 'Javier', 'javier@bebeit.com', '9d4e1e23bd5b', 'g_ventas'),
(12, 'Amanda', 'amanda@bebeit.com', '7110eda4d09e', 'almacenista'),
(14, 'Eduardo Medina', 'eduardom@bebeit.com', 'd9cf7ba5c6dd', 'almacenista');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`idAlmacen`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`id_devoluciones`);

--
-- Indices de la tabla `folios`
--
ALTER TABLE `folios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `folio_de_fabrica` (`folio_de_fabrica`);

--
-- Indices de la tabla `imei`
--
ALTER TABLE `imei`
  ADD PRIMARY KEY (`IDIMEI`);

--
-- Indices de la tabla `inspeccion`
--
ALTER TABLE `inspeccion`
  ADD PRIMARY KEY (`id_inspeccion`),
  ADD KEY `id_inspeccion` (`id_inspeccion`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`idmodel`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_Us`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `folios`
--
ALTER TABLE `folios`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `imei`
--
ALTER TABLE `imei`
  MODIFY `IDIMEI` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inspeccion`
--
ALTER TABLE `inspeccion`
  MODIFY `id_inspeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
