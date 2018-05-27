-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2018 a las 18:28:17
-- Versión del servidor: 5.7.22-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Tutorias`
--
CREATE DATABASE IF NOT EXISTS `Tutorias` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Tutorias`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumno`
--

CREATE TABLE `Alumno` (
  `matricula` int(7) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `carrera` int(11) DEFAULT NULL,
  `tutor` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Alumno`
--

INSERT INTO `Alumno` (`matricula`, `nombre`, `carrera`, `tutor`) VALUES
(1530071, 'Francisco Isaac Perales Morales', 6, 'A1000'),
(1530072, 'Angela Carrizales Perez', 6, 'A1001'),
(1530220, 'Miguel Angel Perez Sanchez', 8, 'A1010'),
(1530221, 'Miguel Ruiz Cepeda', 5, 'A1000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Carrera`
--

CREATE TABLE `Carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Carrera`
--

INSERT INTO `Carrera` (`id`, `nombre`) VALUES
(4, 'ISA'),
(5, 'PYMES'),
(6, 'ITI'),
(8, 'MECA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Maestro`
--

CREATE TABLE `Maestro` (
  `num_empleado` varchar(10) NOT NULL,
  `carrera` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `superUser` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Maestro`
--

INSERT INTO `Maestro` (`num_empleado`, `carrera`, `nombre`, `email`, `password`, `superUser`) VALUES
('A1000', 6, 'Mario Humberto', 'mrodriguezh@upv.edu.mx', 'mario', 1),
('A1001', 6, 'Alberto Garcia Robledo', 'agarciar@upv.edu.mx', 'garcia', 1),
('A1010', 8, 'Hiram Herrera Rivas', 'hherrerar@upv.com.mx', 'hiram', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tutoria`
--

CREATE TABLE `Tutoria` (
  `id` int(11) NOT NULL,
  `alumno` int(7) DEFAULT NULL,
  `tutor` varchar(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `tipo` varchar(12) DEFAULT NULL,
  `tutoria` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Tutoria`
--

INSERT INTO `Tutoria` (`id`, `alumno`, `tutor`, `fecha`, `hora`, `tipo`, `tutoria`) VALUES
(6, 1530071, 'A1000', '2018-05-27', '17:41:47', 'Individual', 'Ayuda en proyecto final\r\n'),
(7, 1530221, 'A1000', '2018-05-27', '17:43:14', 'Individual', 'Ayuda en trasporte hacia la universidad'),
(8, 1530220, 'A1010', '2018-05-27', '17:47:32', 'Individual', 'Ayuda en problemas de redes wireless');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Alumno`
--
ALTER TABLE `Alumno`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `carrera` (`carrera`);

--
-- Indices de la tabla `Carrera`
--
ALTER TABLE `Carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Maestro`
--
ALTER TABLE `Maestro`
  ADD PRIMARY KEY (`num_empleado`),
  ADD KEY `carrera` (`carrera`);

--
-- Indices de la tabla `Tutoria`
--
ALTER TABLE `Tutoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor` (`tutor`),
  ADD KEY `alumno` (`alumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Carrera`
--
ALTER TABLE `Carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `Tutoria`
--
ALTER TABLE `Tutoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Alumno`
--
ALTER TABLE `Alumno`
  ADD CONSTRAINT `Alumno_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `Carrera` (`id`);

--
-- Filtros para la tabla `Maestro`
--
ALTER TABLE `Maestro`
  ADD CONSTRAINT `Maestro_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `Carrera` (`id`);

--
-- Filtros para la tabla `Tutoria`
--
ALTER TABLE `Tutoria`
  ADD CONSTRAINT `Tutoria_ibfk_1` FOREIGN KEY (`tutor`) REFERENCES `Maestro` (`num_empleado`),
  ADD CONSTRAINT `Tutoria_ibfk_2` FOREIGN KEY (`alumno`) REFERENCES `Alumno` (`matricula`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
