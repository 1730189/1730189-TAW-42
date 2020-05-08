-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-05-2020 a las 01:41:30
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `practica_no_cuenta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Congelados'),
(2, 'Enlatados'),
(4, 'Ropa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_fabricante`
--

CREATE TABLE IF NOT EXISTS `categoria_fabricante` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categoria_fabricante`
--

INSERT INTO `categoria_fabricante` (`id`, `nombre`) VALUES
(1, 'Cementero'),
(2, 'Metalurgica'),
(4, 'Siderurgica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante`
--

CREATE TABLE IF NOT EXISTS `fabricante` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombre_fabricante` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `id_categoriafabricante` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoriafabricante` (`id_categoriafabricante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `fabricante`
--

INSERT INTO `fabricante` (`id`, `nombre_fabricante`, `direccion`, `correo`, `telefono`, `id_categoriafabricante`) VALUES
(1, 'Memo', 'Su casa', 'memo12@gmail.com', '8341234567', 1),
(4, 'Juan', 'Por ahi', 'juan12@gmail.com', '8349876543', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio_venta` int(20) NOT NULL,
  `precio_compra` int(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio_venta`, `precio_compra`, `color`, `id_categoria`) VALUES
(1, 'Helado Napolitano', 'Helado con sabor a fresa, vainilla y chocolate', 20, 10, 'Celeste', 1),
(5, 'Lata de sardinas', 'Lata llena de sardinas en vinagre', 13, 5, 'Plateada', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fabricante`
--
ALTER TABLE `fabricante`
  ADD CONSTRAINT `fabricante_ibfk_1` FOREIGN KEY (`id_categoriafabricante`) REFERENCES `categoria_fabricante` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
