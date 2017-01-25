-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-01-2017 a las 15:03:54
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `brevetes`
--
CREATE DATABASE IF NOT EXISTS `brevetes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `brevetes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` varchar(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
('AI', 'AI'),
('AIIa', 'AII'),
('AIIb', 'AIII'),
('AIIIa', ''),
('AIIIb', ''),
('AIIIc', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `user`, `password`) VALUES
(1, 'amaria', 'amaria123'),
(2, 'victor', 'victor123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usarios` int(11) NOT NULL AUTO_INCREMENT,
  `dni` char(8) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `fecha_tramite` date NOT NULL,
  `estado` varchar(19) DEFAULT NULL,
  `nivel` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`id_usarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usarios`, `dni`, `nombres`, `apellidos`, `fecha_tramite`, `estado`, `nivel`) VALUES
(79, '33444', 'jose', 'ssss', '2017-01-24', 'Pendiente', 'AIIa'),
(80, '4555', 'ssss', 'ssss', '2017-01-24', 'Pendiente', 'AIIa'),
(81, '222', 'sss', 'sss', '2017-01-24', 'Pendiente', 'AIIb'),
(82, '2323', 'holi', 'ASAs', '2017-01-19', 'Entregado', 'AIIIc'),
(83, '7456457', 'victor', 'garibay', '2017-01-19', 'Pendiente', 'AIIIb'),
(84, '21312', 'gary', 'ASdasd', '2017-01-19', 'Pendiente', 'AIIIa'),
(85, '5858585', 'ddddd', 'dddddddd', '2017-01-19', 'Pendiente', 'AIIIa'),
(86, '888', 'ggg', 'ggg', '2017-01-19', 'Pendiente', 'AIIb'),
(87, '55555', 'ffff', 'ffff', '2017-01-23', 'Pendiente', 'AI'),
(88, '7777', 'jjjj', 'jjj', '2017-01-23', 'Pendiente', 'AIIa'),
(89, '666', 'fff', 'hhh', '2017-01-23', 'Pendiente', 'AI'),
(90, '4444', 'ggg', 'ggg', '2017-01-23', 'Pendiente', 'AI'),
(91, '555', 'hhh', 'xxxx', '2017-01-24', 'Pendiente', 'AIIb'),
(92, '666', 'xxx', 'fff', '2017-01-24', 'Entregado', 'AI'),
(93, '55555', 'ghgg', 'ggg', '2017-01-23', 'Entregado', 'AIIIa'),
(94, '444', 'aaa', 'sss', '2017-01-24', 'Pendiente', 'AIIa'),
(95, '2333', 'jjj', 'ssss', '2017-01-24', 'Entregado', 'AIIIc'),
(96, '444433', 'vitor', 'garibay', '2017-01-25', 'Pendiente', 'AIIb'),
(97, '6666', 'hhh', 'hhh', '2017-01-25', 'Pendiente', 'AIIIc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
