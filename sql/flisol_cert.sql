-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-04-2019 a las 17:57:46
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
  `Contrasena` varchar(45) COLLATE utf8_bin NOT NULL,
  `Celular` int(11) NOT NULL,
  `Tipo_Documento` varchar(45) COLLATE utf8_bin NOT NULL,
  `Documento` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncar tablas antes de insertar `usuarios_adm`
--

TRUNCATE TABLE `usuarios_adm`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_asist`
--

DROP TABLE IF EXISTS `usuarios_asist`;
CREATE TABLE `usuarios_asist` (
  `idusuarios_asist` int(11) NOT NULL,
  `Nombres` varchar(45) COLLATE utf8_bin NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_bin NOT NULL,
  `Documento` int(11) NOT NULL,
  `Correo` varchar(45) COLLATE utf8_bin NOT NULL,
  `Celular` varchar(45) COLLATE utf8_bin NOT NULL,
  `idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncar tablas antes de insertar `usuarios_asist`
--

TRUNCATE TABLE `usuarios_asist`;
--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios_adm`
--
ALTER TABLE `usuarios_adm`
  MODIFY `idusuarios_adm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_asist`
--
ALTER TABLE `usuarios_asist`
  MODIFY `idusuarios_asist` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
