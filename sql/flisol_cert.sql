-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2019 at 02:42 PM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flisol_cert`
--

-- --------------------------------------------------------

--
-- Table structure for table `certs_env`
--

DROP TABLE IF EXISTS `certs_env`;
CREATE TABLE `certs_env` (
  `idcerts_env` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `certs_gen`
--

DROP TABLE IF EXISTS `certs_gen`;
CREATE TABLE `certs_gen` (
  `idcerts_gen` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `consultas_gen`
--

DROP TABLE IF EXISTS `consultas_gen`;
CREATE TABLE `consultas_gen` (
  `idconsultas_gen` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pdf_validacion`
--

DROP TABLE IF EXISTS `pdf_validacion`;
CREATE TABLE `pdf_validacion` (
  `idpdf_validacion` int(11) NOT NULL,
  `idusuarios_asist` int(11) NOT NULL,
  `Codigo` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `idroles` int(11) NOT NULL,
  `Nombre_Rol` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncate table before insert `roles`
--

TRUNCATE TABLE `roles`;
--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idroles`, `Nombre_Rol`) VALUES
(1, 'Asistente'),
(2, 'Colaborador'),
(3, 'Conferensista'),
(4, 'Organizador'),
(5, 'Tallerista');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_adm`
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
-- Truncate table before insert `usuarios_adm`
--

TRUNCATE TABLE `usuarios_adm`;
--
-- Dumping data for table `usuarios_adm`
--

INSERT INTO `usuarios_adm` (`idusuarios_adm`, `Nombres`, `Apellidos`, `Email`, `Contrasena`, `Celular`, `Tipo_Documento`, `Documento`) VALUES
(1, 'Admin', 'Admin', 'admin@admin', '$2y$10$.JrBb2WEowzosO8WYxsD8.X9LiUMZtwWyp6kUjum/eo7QwX4H4.Se', 123, 'CC', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_asist`
--

DROP TABLE IF EXISTS `usuarios_asist`;
CREATE TABLE `usuarios_asist` (
  `idusuarios_asist` int(11) NOT NULL,
  `Nombres` varchar(45) COLLATE utf8_bin NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_bin NOT NULL,
  `Tipo_Documento` varchar(45) COLLATE utf8_bin NOT NULL,
  `Documento` int(11) NOT NULL,
  `Correo` varchar(45) COLLATE utf8_bin NOT NULL,
  `Celular` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `idrol` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certs_env`
--
ALTER TABLE `certs_env`
  ADD PRIMARY KEY (`idcerts_env`),
  ADD UNIQUE KEY `idcerts_env_UNIQUE` (`idcerts_env`);

--
-- Indexes for table `certs_gen`
--
ALTER TABLE `certs_gen`
  ADD PRIMARY KEY (`idcerts_gen`),
  ADD UNIQUE KEY `idcerts_gen_UNIQUE` (`idcerts_gen`);

--
-- Indexes for table `consultas_gen`
--
ALTER TABLE `consultas_gen`
  ADD PRIMARY KEY (`idconsultas_gen`),
  ADD UNIQUE KEY `idconsultas_gen_UNIQUE` (`idconsultas_gen`);

--
-- Indexes for table `pdf_validacion`
--
ALTER TABLE `pdf_validacion`
  ADD PRIMARY KEY (`idpdf_validacion`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idroles`),
  ADD UNIQUE KEY `idroles` (`idroles`);

--
-- Indexes for table `usuarios_adm`
--
ALTER TABLE `usuarios_adm`
  ADD PRIMARY KEY (`idusuarios_adm`),
  ADD UNIQUE KEY `idusuarios_adm` (`idusuarios_adm`) USING BTREE,
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Documento` (`Documento`),
  ADD UNIQUE KEY `Celular` (`Celular`);

--
-- Indexes for table `usuarios_asist`
--
ALTER TABLE `usuarios_asist`
  ADD PRIMARY KEY (`idusuarios_asist`) USING BTREE,
  ADD UNIQUE KEY `idusuarios_asist` (`idusuarios_asist`) USING BTREE,
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certs_env`
--
ALTER TABLE `certs_env`
  MODIFY `idcerts_env` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certs_gen`
--
ALTER TABLE `certs_gen`
  MODIFY `idcerts_gen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultas_gen`
--
ALTER TABLE `consultas_gen`
  MODIFY `idconsultas_gen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pdf_validacion`
--
ALTER TABLE `pdf_validacion`
  MODIFY `idpdf_validacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios_adm`
--
ALTER TABLE `usuarios_adm`
  MODIFY `idusuarios_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios_asist`
--
ALTER TABLE `usuarios_asist`
  MODIFY `idusuarios_asist` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
