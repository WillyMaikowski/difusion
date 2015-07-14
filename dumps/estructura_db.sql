-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2015 a las 21:55:16
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.6.99-hhvm

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `DIFUSION`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ACTIVIDADES`
--

CREATE TABLE IF NOT EXISTS `ACTIVIDADES` (
  `ACT_ID` int(11) NOT NULL,
  `ACT_NOMBRE` varchar(255) NOT NULL,
  `ACT_HORA_INI` int(11) NOT NULL,
  `ACT_HORA_FIN` int(11) NOT NULL,
  `ACT_FECHA_FIN` int(11) NOT NULL,
  `ACT_T_ACT_ID` int(11) NOT NULL,
  `ACT_COMENTARIOS` text,
  `ACT_HORAS_EFECT` int(11) DEFAULT NULL,
  `ACT_FECHA_M` int(11) NOT NULL,
  `ACT_FECHA_C` int(11) NOT NULL,
  `ACT_ESTADO` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ASIGNACIONES`
--

CREATE TABLE IF NOT EXISTS `ASIGNACIONES` (
  `ASI_ID` int(11) NOT NULL,
  `ASI_MON_ID` int(11) NOT NULL,
  `ASI_ACT_ID` int(11) NOT NULL,
  `ASI_FECHA_M` int(11) NOT NULL,
  `ASI_FECHA_C` int(11) NOT NULL,
  `ASI_ESTADO` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MONITORES`
--

CREATE TABLE IF NOT EXISTS `MONITORES` (
  `MON_ID` int(11) NOT NULL,
  `MON_NOMBRE` varchar(255) NOT NULL,
  `MON_RUT` varchar(255) NOT NULL,
  `MON_EMAIL` varchar(255) NOT NULL,
  `MON_TELEFONO` int(11) DEFAULT NULL,
  `MON_COLEGIO_ORIGEN` varchar(255) NOT NULL,
  `MON_COLEGIO_TIPO` int(11) NOT NULL,
  `MON_ESTADO` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `T_ACTIVIDAD`
--

CREATE TABLE IF NOT EXISTS `T_ACTIVIDAD` (
  `T_ACT_ID` int(11) NOT NULL,
  `T_ACT_NOMBRE` varchar(255) NOT NULL,
  `T_ACT_PAGO` int(11) NOT NULL,
  `T_ACT_ESTADO` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ACTIVIDADES`
--
ALTER TABLE `ACTIVIDADES`
  ADD PRIMARY KEY (`ACT_ID`);

--
-- Indices de la tabla `ASIGNACIONES`
--
ALTER TABLE `ASIGNACIONES`
  ADD PRIMARY KEY (`ASI_ID`);

--
-- Indices de la tabla `MONITORES`
--
ALTER TABLE `MONITORES`
  ADD PRIMARY KEY (`MON_ID`);

--
-- Indices de la tabla `T_ACTIVIDAD`
--
ALTER TABLE `T_ACTIVIDAD`
  ADD PRIMARY KEY (`T_ACT_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ACTIVIDADES`
--
ALTER TABLE `ACTIVIDADES`
  MODIFY `ACT_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ASIGNACIONES`
--
ALTER TABLE `ASIGNACIONES`
  MODIFY `ASI_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `MONITORES`
--
ALTER TABLE `MONITORES`
  MODIFY `MON_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `T_ACTIVIDAD`
--
ALTER TABLE `T_ACTIVIDAD`
  MODIFY `T_ACT_ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
