-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2022 a las 05:33:08
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nomina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apropiaciones`
--

CREATE TABLE `apropiaciones` (
  `Pension` float DEFAULT NULL,
  `Salud` float DEFAULT NULL,
  `Arl` float DEFAULT NULL,
  `Sena` float DEFAULT NULL,
  `ICBF` float DEFAULT NULL,
  `Caja_Comp` float DEFAULT NULL,
  `Id_Apro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `Cargo` varchar(20) DEFAULT NULL,
  `Id_Contrato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones`
--

CREATE TABLE `deducciones` (
  `Salud_Empl` float DEFAULT NULL,
  `Pension_Empl` float DEFAULT NULL,
  `Id_Deduc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devengado`
--

CREATE TABLE `devengado` (
  `Salario_b` float DEFAULT NULL,
  `Aux_trans` float DEFAULT NULL,
  `Id_Deveng` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Id_Empleado` int(11) NOT NULL,
  `Nombres` varchar(70) DEFAULT NULL,
  `Apellidos` varchar(70) DEFAULT NULL,
  `Correo` varchar(70) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Cedula` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `Id_Nit` int(11) NOT NULL,
  `Nombre_Em` varchar(70) DEFAULT NULL,
  `Direccion_Em` varchar(70) DEFAULT NULL,
  `Correo_Em` varchar(70) DEFAULT NULL,
  `Telefono_Em` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE `jornadas` (
  `Diurna` float DEFAULT NULL,
  `Nocturna` float DEFAULT NULL,
  `H_E_Diurna` float DEFAULT NULL,
  `H_E_Nocturna` float DEFAULT NULL,
  `Trabajo_Noc` float DEFAULT NULL,
  `Trabajo_Dominc` float DEFAULT NULL,
  `H_E_Dominc_Diurna` float DEFAULT NULL,
  `H_E_Dominc_Noc` float DEFAULT NULL,
  `Trabajo_Extra_Noc` float DEFAULT NULL,
  `Id_Jornada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presta_sociales`
--

CREATE TABLE `presta_sociales` (
  `Cesantias` float DEFAULT NULL,
  `Vacaciones` float DEFAULT NULL,
  `Prima_serv` float DEFAULT NULL,
  `Id_Prestaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_nomina`
--

CREATE TABLE `tipos_nomina` (
  `Nom_Quincenal` float DEFAULT NULL,
  `Nom_Mensual` float DEFAULT NULL,
  `Id_Tiposnom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apropiaciones`
--
ALTER TABLE `apropiaciones`
  ADD PRIMARY KEY (`Id_Apro`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`Id_Contrato`);

--
-- Indices de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  ADD PRIMARY KEY (`Id_Deduc`);

--
-- Indices de la tabla `devengado`
--
ALTER TABLE `devengado`
  ADD PRIMARY KEY (`Id_Deveng`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Id_Empleado`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Id_Nit`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`Id_Jornada`);

--
-- Indices de la tabla `presta_sociales`
--
ALTER TABLE `presta_sociales`
  ADD PRIMARY KEY (`Id_Prestaciones`);

--
-- Indices de la tabla `tipos_nomina`
--
ALTER TABLE `tipos_nomina`
  ADD PRIMARY KEY (`Id_Tiposnom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
