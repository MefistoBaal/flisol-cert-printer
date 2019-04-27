-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: flisol_cert
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `certs_env`
--

DROP TABLE IF EXISTS `certs_env`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certs_env` (
  `idcerts_env` int(11) NOT NULL AUTO_INCREMENT,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idcerts_env`),
  UNIQUE KEY `idcerts_env_UNIQUE` (`idcerts_env`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certs_env`
--

LOCK TABLES `certs_env` WRITE;
/*!40000 ALTER TABLE `certs_env` DISABLE KEYS */;
INSERT INTO `certs_env` VALUES (1,0),(2,0);
/*!40000 ALTER TABLE `certs_env` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certs_gen`
--

DROP TABLE IF EXISTS `certs_gen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certs_gen` (
  `idcerts_gen` int(11) NOT NULL AUTO_INCREMENT,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idcerts_gen`),
  UNIQUE KEY `idcerts_gen_UNIQUE` (`idcerts_gen`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certs_gen`
--

LOCK TABLES `certs_gen` WRITE;
/*!40000 ALTER TABLE `certs_gen` DISABLE KEYS */;
INSERT INTO `certs_gen` VALUES (1,71),(2,0);
/*!40000 ALTER TABLE `certs_gen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas_gen`
--

DROP TABLE IF EXISTS `consultas_gen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultas_gen` (
  `idconsultas_gen` int(11) NOT NULL AUTO_INCREMENT,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idconsultas_gen`),
  UNIQUE KEY `idconsultas_gen_UNIQUE` (`idconsultas_gen`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas_gen`
--

LOCK TABLES `consultas_gen` WRITE;
/*!40000 ALTER TABLE `consultas_gen` DISABLE KEYS */;
INSERT INTO `consultas_gen` VALUES (1,12),(2,0);
/*!40000 ALTER TABLE `consultas_gen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdf_validacion`
--

DROP TABLE IF EXISTS `pdf_validacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pdf_validacion` (
  `idpdf_validacion` int(11) NOT NULL,
  `Codigo` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idpdf_validacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdf_validacion`
--

LOCK TABLES `pdf_validacion` WRITE;
/*!40000 ALTER TABLE `pdf_validacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `pdf_validacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `idroles` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Rol` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idroles`),
  UNIQUE KEY `idroles` (`idroles`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Asistente'),(2,'Colaborador'),(3,'Conferensista'),(4,'Organizador'),(5,'Tallerista');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_adm`
--

DROP TABLE IF EXISTS `usuarios_adm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_adm` (
  `idusuarios_adm` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(45) COLLATE utf8_bin NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_bin NOT NULL,
  `Email` varchar(45) COLLATE utf8_bin NOT NULL,
  `Contrasena` varchar(150) COLLATE utf8_bin NOT NULL,
  `Celular` int(11) NOT NULL,
  `Tipo_Documento` varchar(45) COLLATE utf8_bin NOT NULL,
  `Documento` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idusuarios_adm`),
  UNIQUE KEY `idusuarios_adm` (`idusuarios_adm`) USING BTREE,
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Documento` (`Documento`),
  UNIQUE KEY `Celular` (`Celular`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_adm`
--

LOCK TABLES `usuarios_adm` WRITE;
/*!40000 ALTER TABLE `usuarios_adm` DISABLE KEYS */;
INSERT INTO `usuarios_adm` VALUES (1,'Admin','Admin','admin@admin','$2y$10$.JrBb2WEowzosO8WYxsD8.X9LiUMZtwWyp6kUjum/eo7QwX4H4.Se',123,'CC','123456');
/*!40000 ALTER TABLE `usuarios_adm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_asist`
--

DROP TABLE IF EXISTS `usuarios_asist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_asist` (
  `idusuarios_asist` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(45) COLLATE utf8_bin NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_bin NOT NULL,
  `Tipo_Documento` varchar(45) COLLATE utf8_bin NOT NULL,
  `Documento` int(11) NOT NULL,
  `Correo` varchar(45) COLLATE utf8_bin NOT NULL,
  `Celular` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `idrol` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusuarios_asist`) USING BTREE,
  UNIQUE KEY `idusuarios_asist` (`idusuarios_asist`) USING BTREE,
  UNIQUE KEY `Correo` (`Correo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_asist`
--

LOCK TABLES `usuarios_asist` WRITE;
/*!40000 ALTER TABLE `usuarios_asist` DISABLE KEYS */;
INSERT INTO `usuarios_asist` VALUES (1,'Santiago','Hurtado','C&eacute;dula de Ciudadania',1057601581,'desarrollo-web@zk.com.co','',1,'2019-04-25 22:56:31'),(3,'usuario','prueba','C&eacute;dula de Extranger&iacute;a',1234556,'asd@asd','',2,'2019-04-27 02:47:56'),(5,'usuario','prueba','C&eacute;dula de Extranger&iacute;a',1234556,'asd@asd2','',2,'2019-04-27 02:57:16'),(6,'usuario','usuario','C&eacute;dula de Extranger&iacute;a',1312334534,'asdasd@asdasd','',3,'2019-04-27 02:57:33'),(7,'user','user','C&eacute;dula de Extranger&iacute;a',13123123,'asdqwe@asdqwe','',1,'2019-04-27 03:42:44'),(8,'user2','user2','Tarjeta de Identidad',123123123,'ljlkj@&ntilde;laksd','',3,'2019-04-27 03:45:11'),(9,'data','data','C&eacute;dula de Extranger&iacute;a',123123123,'asdasddata@&aelig;sdasd','12312',4,'2019-04-27 04:28:45');
/*!40000 ALTER TABLE `usuarios_asist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-27  3:26:48
