-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-04-2019 a las 00:04:08
-- Versión del servidor: 10.3.14-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `flisol_cert`
--
DROP DATABASE IF EXISTS `flisol_cert`;
CREATE DATABASE IF NOT EXISTS `flisol_cert` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `flisol_cert`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certs_env`
--

DROP TABLE IF EXISTS `certs_env`;
CREATE TABLE `certs_env` (
  `idcerts_env` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncar tablas antes de insertar `certs_env`
--

TRUNCATE TABLE `certs_env`;
--
-- Volcado de datos para la tabla `certs_env`
--

INSERT INTO `certs_env` (`idcerts_env`, `Cantidad`) VALUES
(1, 0),
(2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certs_gen`
--

DROP TABLE IF EXISTS `certs_gen`;
CREATE TABLE `certs_gen` (
  `idcerts_gen` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncar tablas antes de insertar `certs_gen`
--

TRUNCATE TABLE `certs_gen`;
--
-- Volcado de datos para la tabla `certs_gen`
--

INSERT INTO `certs_gen` (`idcerts_gen`, `Cantidad`) VALUES
(1, 0),
(2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas_gen`
--

DROP TABLE IF EXISTS `consultas_gen`;
CREATE TABLE `consultas_gen` (
  `idconsultas_gen` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncar tablas antes de insertar `consultas_gen`
--

TRUNCATE TABLE `consultas_gen`;
--
-- Volcado de datos para la tabla `consultas_gen`
--

INSERT INTO `consultas_gen` (`idconsultas_gen`, `Cantidad`) VALUES
(1, 0),
(2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `idroles` int(11) NOT NULL,
  `Nombre_Rol` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncar tablas antes de insertar `roles`
--

TRUNCATE TABLE `roles`;
--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idroles`, `Nombre_Rol`) VALUES
(1, 'Asistente'),
(2, 'Colaborador'),
(3, 'Conferensista'),
(4, 'Organizador'),
(5, 'Tallerista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_adm`
--

DROP TABLE IF EXISTS `usuarios_adm`;
CREATE TABLE `usuarios_adm` (
  `idusuarios_adm` int(11) NOT NULL,
  `Nombres` varchar(45) COLLATE utf8_bin NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_bin NOT NULL,
  `Email` varchar(45) COLLATE utf8_bin NOT NULL,
  `Contrasena` varchar(150) COLLATE utf8_bin NOT NULL,
  `Celular` int(11) NOT NULL,
  `Tipo_Documento` varchar(45) COLLATE utf8_bin NOT NULL,
  `Documento` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncar tablas antes de insertar `usuarios_adm`
--

TRUNCATE TABLE `usuarios_adm`;
--
-- Volcado de datos para la tabla `usuarios_adm`
--

INSERT INTO `usuarios_adm` (`idusuarios_adm`, `Nombres`, `Apellidos`, `Email`, `Contrasena`, `Celular`, `Tipo_Documento`, `Documento`) VALUES
(1, 'Admin', 'Admin', 'admin@admin', '$2y$10$.JrBb2WEowzosO8WYxsD8.X9LiUMZtwWyp6kUjum/eo7QwX4H4.Se', 123, 'CC', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_asist`
--

DROP TABLE IF EXISTS `usuarios_asist`;
CREATE TABLE `usuarios_asist` (
  `idusuarios_asist` int(11) NOT NULL,
  `Nombres` varchar(45) COLLATE utf8_bin NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_bin NOT NULL,
  `Tipo_Documento` varchar(45) COLLATE utf8_bin NOT NULL,
  `Documento` int(11) NOT NULL,
  `Correo` varchar(45) COLLATE utf8_bin NOT NULL,
  `Celular` varchar(45) COLLATE utf8_bin NOT NULL,
  `idrol` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncar tablas antes de insertar `usuarios_asist`
--

TRUNCATE TABLE `usuarios_asist`;
--
-- Volcado de datos para la tabla `usuarios_asist`
--

INSERT INTO `usuarios_asist` (`idusuarios_asist`, `Nombres`, `Apellidos`, `Tipo_Documento`, `Documento`, `Correo`, `Celular`, `idrol`, `Fecha`) VALUES
(1, 'Santiago', 'Hurtado', 'C&eacute;dula de Ciudadania', 1057601581, 'desarrollo-web@zk.com.co', '', 1, '2019-04-25 22:56:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `certs_env`
--
ALTER TABLE `certs_env`
  ADD PRIMARY KEY (`idcerts_env`),
  ADD UNIQUE KEY `idcerts_env_UNIQUE` (`idcerts_env`);

--
-- Indices de la tabla `certs_gen`
--
ALTER TABLE `certs_gen`
  ADD PRIMARY KEY (`idcerts_gen`),
  ADD UNIQUE KEY `idcerts_gen_UNIQUE` (`idcerts_gen`);

--
-- Indices de la tabla `consultas_gen`
--
ALTER TABLE `consultas_gen`
  ADD PRIMARY KEY (`idconsultas_gen`),
  ADD UNIQUE KEY `idconsultas_gen_UNIQUE` (`idconsultas_gen`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idroles`),
  ADD UNIQUE KEY `idroles` (`idroles`);

--
-- Indices de la tabla `usuarios_adm`
--
ALTER TABLE `usuarios_adm`
  ADD PRIMARY KEY (`idusuarios_adm`),
  ADD UNIQUE KEY `idusuarios_adm` (`idusuarios_adm`) USING BTREE,
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Documento` (`Documento`),
  ADD UNIQUE KEY `Celular` (`Celular`);

--
-- Indices de la tabla `usuarios_asist`
--
ALTER TABLE `usuarios_asist`
  ADD PRIMARY KEY (`idusuarios_asist`) USING BTREE,
  ADD UNIQUE KEY `idusuarios_asist` (`idusuarios_asist`) USING BTREE,
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD UNIQUE KEY `Celular` (`Celular`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `certs_env`
--
ALTER TABLE `certs_env`
  MODIFY `idcerts_env` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `certs_gen`
--
ALTER TABLE `certs_gen`
  MODIFY `idcerts_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `consultas_gen`
--
ALTER TABLE `consultas_gen`
  MODIFY `idconsultas_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios_adm`
--
ALTER TABLE `usuarios_adm`
  MODIFY `idusuarios_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_asist`
--
ALTER TABLE `usuarios_asist`
  MODIFY `idusuarios_asist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
