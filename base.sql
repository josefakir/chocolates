-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 31-08-2016 a las 23:43:40
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `chocolates`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `correo`, `contrasena`, `activo`) VALUES
(1, 'jbecerraromero@gmail.com', '2e49419b9cb99ba0ec10b913be5dc9b4', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `slug`, `activo`) VALUES
(6, 'Chocolates Envueltos', 'chocolates-envueltos', 1),
(7, 'Chocolates Desenvueltos', 'chocolates-desenvueltos', 1),
(8, 'Chocolates por Pieza', 'chocolates-por-pieza', 1),
(9, 'Chocolates Especiales', 'chocolates-especiales', 1),
(10, 'Confitados', 'confitados', 1),
(11, 'Gomitas', 'gomitas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `nombre`, `slug`, `descripcion`, `precio`, `imagen`, `activo`) VALUES
(16, 6, 'Ejemplo de producto 1', 'ejemplo-de-producto-1', '<p>Deliciosa caja de chocolates.</p>', 250, 'http://localhost/chocolates/productos/2016-08-31-22-56-05_ejemplo-de-producto-1_producto.jpg', 1),
(17, 6, 'Ejemplo de producto 2', 'ejemplo-de-producto-2', '<p>Deliciosa caja de chocolates.</p>', 300.5, 'http://localhost/chocolates/productos/2016-08-31-22-56-39_ejemplo-de-producto-2_producto.jpg', 1),
(18, 7, 'Ejemplo de producto 3', 'ejemplo-de-producto-3', '<p>Deliciosa caja de chocolates.</p>', 200, 'http://localhost/chocolates/productos/2016-08-31-22-57-01_ejemplo-de-producto-3_producto.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;