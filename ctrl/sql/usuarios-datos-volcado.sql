-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-02-2016 a las 00:55:11
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sib2`
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Us`, `nombre`, `email`, `password`, `tipo_user`) VALUES
(1, 'Alan shide', 'alan@bebeit.com', '7c4a8d09ca37', 'supervisor'),
(2, 'tania', 'tania@bebeit.com', '7c4a8d09ca37', 'supervisor'),
(3, 'uiy', 'j1dcrane@gmail.com', '5baa61e4c9b9', 'supervisor'),
(6, 'KATY', 'katy@bebeit.com', '7c4a8d09ca37', 'contador'),
(8, 'juan', '11@gmail.cvom', '5baa61e4c9b9', 'subgerente'),
(9, 'x', 'x@gmail.com', '7c4a8d09ca37', 'supervisor'),
(10, 'Juan  David', 'david@bebeit.com', '5baa61e4c9b9', 'tecnico');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
