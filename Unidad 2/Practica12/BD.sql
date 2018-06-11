-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-06-2018 a las 19:18:43
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Inventario`
--
DROP DATABASE IF EXISTS `Inventario`;
CREATE DATABASE IF NOT EXISTS `Inventario` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Inventario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categoria`
--

CREATE TABLE `Categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) DEFAULT NULL,
  `descripcion_categoria` varchar(255) DEFAULT NULL,
  `fecha_de_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Categoria`
--

INSERT INTO `Categoria` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `fecha_de_registro`) VALUES
(1, 'Juguetes', 'juguetes para niÃ±os y niÃ±as', '2018-06-09'),
(3, 'Calzado 3.2.5.4.6', 'Tenis, zapatos, tacones, etc.efawf', '2018-06-09'),
(4, 'Panaderia 2.0', 'Todo tipo de pan dulce y salado. 2.0', '2018-06-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Historial`
--

CREATE TABLE `Historial` (
  `id_historial` int(11) NOT NULL,
  `id_tienda` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `nota` varchar(255) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Historial`
--

INSERT INTO `Historial` (`id_historial`, `id_tienda`, `id_producto`, `id_usuario`, `fecha`, `hora`, `nota`, `referencia`, `cantidad`) VALUES
(7, 2, 3, 1, '2018-06-10', '22:16:47', 'Francisco Isaac Perales Morales agregÃ³ 214212 producto(s) al inventario', '23421', 214212),
(8, 2, 4, 1, '2018-06-11', '00:44:39', 'Francisco Isaac Perales Morales agregÃ³ 1000 producto(s) al inventario', 'fasfafs', 1000),
(9, 2, 4, 1, '2018-06-11', '01:22:47', 'Francisco Isaac Perales Morales eliminÃ³ 500 producto(s) del inventario', NULL, 500),
(10, 2, 4, 1, '2018-06-11', '01:25:18', 'Francisco Isaac Perales Morales agregÃ³ 1 producto(s) al inventario', 'asfwqfvcw', 1),
(11, 2, 4, 1, '2018-06-11', '01:27:36', 'Francisco Isaac Perales Morales agregÃ³ 1 producto(s) al inventario', 'cewf2323', 1),
(12, 2, 4, 1, '2018-06-11', '01:28:24', 'Francisco Isaac Perales Morales eliminÃ³ 2 producto(s) del inventario', 'gfasgfaf', 2),
(13, 2, 4, 6, '2018-06-11', '01:39:39', 'Juan Perez eliminÃ³ 12 producto(s) del inventario', 'asdfaf', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Producto`
--

CREATE TABLE `Producto` (
  `id_producto` int(11) NOT NULL,
  `codigo_producto` char(20) DEFAULT NULL,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `fecha_de_registro` date DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Producto`
--

INSERT INTO `Producto` (`id_producto`, `codigo_producto`, `nombre_producto`, `fecha_de_registro`, `precio`, `img`, `id_categoria`) VALUES
(3, '23423', 'Sailor Saturn', '2018-06-10', 1000, 'views/media/img/sailor-saturn.jpg', 1),
(4, '124214', 'Falulu', '2018-06-11', 20, 'views/media/img/_20180316_143448.JPG', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tienda`
--

CREATE TABLE `Tienda` (
  `id_tienda` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Tienda`
--

INSERT INTO `Tienda` (`id_tienda`, `nombre`, `direccion`, `estado`) VALUES
(2, 'Soriana 2.0', '12 y 13 Berriozabal 2.0', 0),
(3, 'Wal-Mart', '6 Ocampo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tienda_Producto`
--

CREATE TABLE `Tienda_Producto` (
  `id_tienda` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Tienda_Producto`
--

INSERT INTO `Tienda_Producto` (`id_tienda`, `id_producto`, `stock`) VALUES
(2, 3, 214212),
(2, 4, 488);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `usuario` varchar(64) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(54) DEFAULT NULL,
  `fecha_de_registro` date DEFAULT NULL,
  `root` int(1) DEFAULT NULL,
  `id_tienda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id_usuario`, `nombre`, `apellido`, `usuario`, `password`, `email`, `fecha_de_registro`, `root`, `id_tienda`) VALUES
(1, 'Francisco Isaac', 'Perales Morales', 'admin', 'admin', '1530071@upv.edu.mx', '2018-06-08', 1, NULL),
(6, 'Juan', 'Perez', 'juan', 'qweqewqqwr', '1430034@upv.edu.mx', '2018-06-10', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Venta`
--

CREATE TABLE `Venta` (
  `id_venta` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `id_tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Venta`
--

INSERT INTO `Venta` (`id_venta`, `total`, `id_tienda`) VALUES
(7, 1000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Venta_Producto`
--

CREATE TABLE `Venta_Producto` (
  `id_venta` int(11) NOT NULL,
  `id_tienda` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Venta_Producto`
--

INSERT INTO `Venta_Producto` (`id_venta`, `id_tienda`, `id_producto`, `cantidad`, `total`) VALUES
(7, 2, 3, 1, 1000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `Historial`
--
ALTER TABLE `Historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_tienda` (`id_tienda`,`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `Producto`
--
ALTER TABLE `Producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `Tienda`
--
ALTER TABLE `Tienda`
  ADD PRIMARY KEY (`id_tienda`);

--
-- Indices de la tabla `Tienda_Producto`
--
ALTER TABLE `Tienda_Producto`
  ADD PRIMARY KEY (`id_tienda`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tienda` (`id_tienda`);

--
-- Indices de la tabla `Venta`
--
ALTER TABLE `Venta`
  ADD PRIMARY KEY (`id_venta`);

--
-- Indices de la tabla `Venta_Producto`
--
ALTER TABLE `Venta_Producto`
  ADD PRIMARY KEY (`id_venta`,`id_tienda`,`id_producto`),
  ADD KEY `id_tienda` (`id_tienda`,`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Historial`
--
ALTER TABLE `Historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `Producto`
--
ALTER TABLE `Producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Tienda`
--
ALTER TABLE `Tienda`
  MODIFY `id_tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Venta`
--
ALTER TABLE `Venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Historial`
--
ALTER TABLE `Historial`
  ADD CONSTRAINT `Historial_ibfk_1` FOREIGN KEY (`id_tienda`,`id_producto`) REFERENCES `Tienda_Producto` (`id_tienda`, `id_producto`),
  ADD CONSTRAINT `Historial_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usuario`);

--
-- Filtros para la tabla `Producto`
--
ALTER TABLE `Producto`
  ADD CONSTRAINT `Producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`);

--
-- Filtros para la tabla `Tienda_Producto`
--
ALTER TABLE `Tienda_Producto`
  ADD CONSTRAINT `Tienda_Producto_ibfk_1` FOREIGN KEY (`id_tienda`) REFERENCES `Tienda` (`id_tienda`),
  ADD CONSTRAINT `Tienda_Producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `Producto` (`id_producto`);

--
-- Filtros para la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `Usuario_ibfk_1` FOREIGN KEY (`id_tienda`) REFERENCES `Tienda` (`id_tienda`);

--
-- Filtros para la tabla `Venta_Producto`
--
ALTER TABLE `Venta_Producto`
  ADD CONSTRAINT `Venta_Producto_ibfk_1` FOREIGN KEY (`id_tienda`,`id_producto`) REFERENCES `Tienda_Producto` (`id_tienda`, `id_producto`),
  ADD CONSTRAINT `Venta_Producto_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `Venta` (`id_venta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
