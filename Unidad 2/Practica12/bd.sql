-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-02-2016 a las 17:45:18
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
CREATE DATABASE IF NOT EXISTS `Inventario` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Categoria`
--

INSERT INTO `Categoria` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `fecha_de_registro`) VALUES
(1, 'Lacteos', 'Productos derivados de la leche de vaca', '2018-06-04'),
(2, 'Linea Blanca', 'Lavadoras, Secadoras, Planchas, Estufas.', '2018-06-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Historial`
--

CREATE TABLE `Historial` (
  `id_historial` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `nota` varchar(255) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Historial`
--

INSERT INTO `Historial` (`id_historial`, `id_producto`, `id_usuario`, `fecha`, `hora`, `nota`, `referencia`, `cantidad`) VALUES
(13, 12, 7, '2016-02-11', '11:02:54', 'Mario Humberto Rodriguez agregÃ³ 1000 producto(s) al inventario', '2rfas23', 1000),
(14, 12, 7, '2016-02-11', '11:03:19', 'Mario Humberto Rodriguez eliminÃ³ 500 producto(s) al inventario', '213rff', 500),
(15, 13, 7, '2016-02-11', '10:35:41', 'Mario Humberto Rodriguez agregÃ³ 213 producto(s) al inventario', '1224fdfs', 213),
(16, 13, 7, '2016-02-11', '10:36:00', 'Mario Humberto Rodriguez agregÃ³ 1 producto(s) al inventario', 'sffasfa', 1),
(17, 13, 7, '2016-02-11', '10:36:16', 'Mario Humberto Rodriguez eliminÃ³ 200 producto(s) al inventario', 'sc32casecs', 200),
(18, 13, 7, '2016-02-11', '10:38:47', 'Mario Humberto Rodriguez agregÃ³ 16 producto(s) al inventario', 'zc<zv<zv', 16),
(19, 12, 10, '2016-02-11', '10:43:02', 'Francisco Perales agregÃ³ 100 producto(s) al inventario', 'rfc2c', 100),
(20, 13, 10, '2016-02-11', '10:43:38', 'Francisco Perales agregÃ³ 1000 producto(s) al inventario', 'cvbswesv', 1000);

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
  `stock` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Producto`
--

INSERT INTO `Producto` (`id_producto`, `codigo_producto`, `nombre_producto`, `fecha_de_registro`, `precio`, `stock`, `img`, `id_categoria`) VALUES
(12, '2rfas23', 'Falulu', '2016-02-11', 15, 600, 'views/media/img/_20180316_143448.JPG', 1),
(13, '1224fdfs', 'etc', '2016-02-11', 24, 1030, 'views/media/img/noimg.png', 2);

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
  `fecha_de_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id_usuario`, `nombre`, `apellido`, `usuario`, `password`, `email`, `fecha_de_registro`) VALUES
(7, 'Mario Humberto', 'Rodriguez', 'Mario', 'mario123', 'systemas@gmail.com', '2018-06-03'),
(10, 'Francisco', 'Perales', 'paco', 'paco1001', '1530071@upv.edu.mx', '2016-02-11');

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
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `Producto`
--
ALTER TABLE `Producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Historial`
--
ALTER TABLE `Historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `Producto`
--
ALTER TABLE `Producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Historial`
--
ALTER TABLE `Historial`
  ADD CONSTRAINT `Historial_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `Producto` (`id_producto`),
  ADD CONSTRAINT `Historial_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usuario`);

--
-- Filtros para la tabla `Producto`
--
ALTER TABLE `Producto`
  ADD CONSTRAINT `Producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
