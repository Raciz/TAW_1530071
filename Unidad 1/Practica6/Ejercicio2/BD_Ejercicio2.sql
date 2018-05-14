-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-05-2018 a las 10:09:42
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
-- Base de datos: `Deportistas_UPV`
--
CREATE DATABASE IF NOT EXISTS `Deportistas_UPV` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Deportistas_UPV`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Basquetbolistas`
--

CREATE TABLE `Basquetbolistas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `posicion` varchar(20) DEFAULT NULL,
  `carrera` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Basquetbolistas`
--

INSERT INTO `Basquetbolistas` (`id`, `nombre`, `posicion`, `carrera`, `email`) VALUES
(45, 'Miguel Angel Perez Sanchez', 'Tirador', 'ITI', '1530220@upv.edu.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Futbolista`
--

CREATE TABLE `Futbolista` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `posicion` varchar(20) DEFAULT NULL,
  `carrera` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Futbolista`
--

INSERT INTO `Futbolista` (`id`, `nombre`, `posicion`, `carrera`, `email`) VALUES
(10, 'Francisco Isaac Perales Morales', 'Portero', 'Ingenieria En Tecnologias de la Informacion', '1530071@upv.edu.mx');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Basquetbolistas`
--
ALTER TABLE `Basquetbolistas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Futbolista`
--
ALTER TABLE `Futbolista`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
