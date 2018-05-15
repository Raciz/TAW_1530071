-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2018 a las 16:53:46
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pract6_ej2`
--

-- --------------------------------------------------------

create database pract6_ej2;

--
-- Estructura de tabla para la tabla `basquetbolistas`
--

CREATE TABLE `basquetbolistas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `posicion` varchar(50) NOT NULL,
  `carrera` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `basquetbolistas`
--

INSERT INTO `basquetbolistas` (`id`, `nombre`, `posicion`, `carrera`, `email`) VALUES
(1, 'Juan PÃ©rez', 'Base', 'IngenierÃ­a en MecatrÃ³nica', 'juan@juan.com'),
(2, 'Luis HernÃ¡ndez', 'Escolta', 'IngenierÃ­a en MecatrÃ³nica', 'luis@luis.com'),
(3, 'Diego SÃ¡nchez', 'Alero', 'IngenierÃ­a en MecatrÃ³nica', 'diego@diego.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `futbolistas`
--

CREATE TABLE `futbolistas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `posicion` varchar(50) NOT NULL,
  `carrera` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `futbolistas`
--

INSERT INTO `futbolistas` (`id`, `nombre`, `posicion`, `carrera`, `email`) VALUES
(1, 'Cristian Echartea', 'Delantero', 'IngenierÃ­a en TecnologÃ­as de la InformaciÃ³n', 'cristian@cristian.com'),
(2, 'Enrique JuÃ¡rez', 'Lateral Izquierdo', 'IngenierÃ­a en TecnologÃ­as de la InformaciÃ³n', 'david@david.com'),
(3, 'Cesar VÃ¡zquez', 'Delantero', 'IngenierÃ­a en TecnologÃ­as de la InformaciÃ³n', 'cesar@cesar.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `basquetbolistas`
--
ALTER TABLE `basquetbolistas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `futbolistas`
--
ALTER TABLE `futbolistas`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
