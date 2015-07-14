-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2015 a las 22:00:22
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

--
-- Volcado de datos para la tabla `ACTIVIDADES`
--

INSERT INTO `ACTIVIDADES` (`ACT_ID`, `ACT_NOMBRE`, `ACT_HORA_INI`, `ACT_HORA_FIN`, `ACT_FECHA_FIN`, `ACT_T_ACT_ID`, `ACT_COMENTARIOS`, `ACT_HORAS_EFECT`, `ACT_FECHA_M`, `ACT_FECHA_C`, `ACT_ESTADO`) VALUES
(1, 'Visitame', 0, 0, 0, 1, NULL, NULL, 0, 0, 1);

--
-- Volcado de datos para la tabla `ASIGNACIONES`
--

INSERT INTO `ASIGNACIONES` (`ASI_ID`, `ASI_MON_ID`, `ASI_ACT_ID`, `ASI_FECHA_M`, `ASI_FECHA_C`, `ASI_ESTADO`) VALUES
(1, 1, 1, 0, 0, 1);

--
-- Volcado de datos para la tabla `MONITORES`
--

INSERT INTO `MONITORES` (`MON_ID`, `MON_NOMBRE`, `MON_RUT`, `MON_EMAIL`, `MON_TELEFONO`, `MON_COLEGIO_ORIGEN`, `MON_COLEGIO_TIPO`, `MON_ESTADO`) VALUES
(1, 'Willy Maikowski', '17679753-3', 'willy.maikowski@gmail.com', NULL, 'JV Lastarria', 1, 1);

--
-- Volcado de datos para la tabla `T_ACTIVIDAD`
--

INSERT INTO `T_ACTIVIDAD` (`T_ACT_ID`, `T_ACT_NOMBRE`, `T_ACT_PAGO`, `T_ACT_ESTADO`) VALUES
(1, 'Feria', 0, 1),
(2, 'Visita', 0, 1),
(3, 'Administrativa', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
