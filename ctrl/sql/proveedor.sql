-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2016 a las 22:30:54
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
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` mediumint(9) NOT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `domicilio` text,
  `telefonos` text,
  `wechat` varchar(50) DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `email` varchar(150) DEFAULT NULL,
  `pagina` varchar(255) DEFAULT NULL,
  `tipo_de_producto` enum('smartphone','smartwatch','tablet','drone') CHARACTER SET utf8mb4 DEFAULT NULL,
  `idmodelo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `razon_social`, `domicilio`, `telefonos`, `wechat`, `contacto`, `descripcion`, `email`, `pagina`, `tipo_de_producto`, `idmodelo`) VALUES
(1, 'PIONERO GRUPO COMERCIAL SA. DE CV.', 'HUMBOLDT 56, CENTRO, DEL. CUAHUTEMOC,\r\nCUIDAD DE MEXICO', '+ 52 (55) 55101576', '@BEBEIT', 'ALAN SHIDE', 'VENTAS DE EQUIPO TECNOLÓGICO', 'alan@bebeit.com', 'bebeit.com.mx, bebeit.mx', 'smartphone', 'OB1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
