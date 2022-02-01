-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: inventario
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `emp_id` int NOT NULL AUTO_INCREMENT,
  `emp_nombre` varchar(254) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `emp_direccion` varchar(254) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `emp_telefono` varchar(254) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'XYZ','CONDADO ALTO','0987654321');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `pro_id` int NOT NULL AUTO_INCREMENT,
  `emp_id` int DEFAULT NULL,
  `tpr_id` int DEFAULT NULL,
  `pro_Nombre` varchar(254) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `pro_stockActual` int DEFAULT NULL,
  `pro_stockMinimo` int DEFAULT NULL,
  `pro_precioBase` decimal(8,0) DEFAULT NULL,
  `pro_estado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'A',
  `pro_add` datetime DEFAULT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,1,1,'DASDASD',20,10,1,'A','2022-01-31 00:00:00'),(3,1,2,'AZUCAR',11,10,1,'A','2022-01-31 00:00:00'),(4,1,3,'RELAXANT MUSCULAR',9,7,5,'A','2022-01-31 00:00:00'),(5,1,3,'LUVIT B',70,40,15,'A',NULL),(6,1,2,'JABON AKI',20,10,1,'A',NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoiva`
--

DROP TABLE IF EXISTS `tipoiva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipoiva` (
  `tiv_id` int NOT NULL AUTO_INCREMENT,
  `tiv_iva` float DEFAULT NULL,
  `tiv_descripcion` varchar(254) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `tiv_estado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'A',
  `tiv_add` datetime DEFAULT NULL,
  PRIMARY KEY (`tiv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoiva`
--

LOCK TABLES `tipoiva` WRITE;
/*!40000 ALTER TABLE `tipoiva` DISABLE KEYS */;
INSERT INTO `tipoiva` VALUES (1,0.12,'VALOR POR DEFECTO DEL 12%','A','2022-01-31 09:54:58');
/*!40000 ALTER TABLE `tipoiva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoproductos`
--

DROP TABLE IF EXISTS `tipoproductos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipoproductos` (
  `tpr_id` int NOT NULL AUTO_INCREMENT,
  `tpr_descripcion` varchar(254) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`tpr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoproductos`
--

LOCK TABLES `tipoproductos` WRITE;
/*!40000 ALTER TABLE `tipoproductos` DISABLE KEYS */;
INSERT INTO `tipoproductos` VALUES (1,'PAPELERIA'),(2,'SUPERMERCADO'),(3,'DROGUERIA');
/*!40000 ALTER TABLE `tipoproductos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipousuario` (
  `tus_id` int NOT NULL AUTO_INCREMENT,
  `tus_descripcion` varchar(254) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`tus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'USUARIO'),(2,'ADMINISTRADOR');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccionventa`
--

DROP TABLE IF EXISTS `transaccionventa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaccionventa` (
  `pro_id` int NOT NULL,
  `usu_id` int NOT NULL,
  `tiv_id` int NOT NULL,
  `ven_id` int NOT NULL AUTO_INCREMENT,
  `ven_pago` float DEFAULT NULL,
  PRIMARY KEY (`ven_id`,`pro_id`,`usu_id`,`tiv_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccionventa`
--

LOCK TABLES `transaccionventa` WRITE;
/*!40000 ALTER TABLE `transaccionventa` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaccionventa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `usu_id` int NOT NULL AUTO_INCREMENT,
  `tus_id` int DEFAULT NULL,
  `emp_id` int DEFAULT NULL,
  `usu_usuario` varchar(254) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `usu_password` varchar(254) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `usu_add` datetime DEFAULT NULL,
  `usu_estado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'A',
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,2,1,'DAVID01','e10adc3949ba59abbe56e057f20f883e','2022-01-31 09:56:53','A');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-31 20:17:34
