-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2019 a las 16:56:26
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tarea`
--

CREATE TABLE `tbl_tarea` (
  `pkid_tarea` int(11) NOT NULL,
  `nombre_tarea` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_tarea` date NOT NULL,
  `hora_tarea` time(6) NOT NULL,
  `descripcion_tarea` text COLLATE utf8_spanish2_ci NOT NULL,
  `estado` enum('Asignado','Completado','','') COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_tarea`
--

INSERT INTO `tbl_tarea` (`pkid_tarea`, `nombre_tarea`, `fecha_tarea`, `hora_tarea`, `descripcion_tarea`, `estado`) VALUES
(2, 'organizar pcs de lab2', '2019-11-29', '12:00:00.000000', 'se colocaron pcs nuevos', 'Completado'),
(3, 'instalacion de programas a los pcs ', '2019-12-01', '14:00:00.000000', 'se pretende instalar programas de uso para programar en php', 'Completado'),
(5, 'actualizacion de programas', '2019-11-29', '17:00:00.000000', 'de debe actualizar los programas en los que se van a programar en php ', 'Asignado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_tarea`
--
ALTER TABLE `tbl_tarea`
  ADD PRIMARY KEY (`pkid_tarea`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_tarea`
--
ALTER TABLE `tbl_tarea`
  MODIFY `pkid_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
