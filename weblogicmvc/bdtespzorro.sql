CREATE DATABASE  IF NOT EXISTS `bdtespzorro` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdtespzorro`;
-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: bdtespzorro
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designacaosocial` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `email` varchar(80) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `telefone` int NOT NULL,
  `nif` int NOT NULL,
  `morada` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `codigopostal` varchar(8) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `localidade` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `capitalsocial` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'TeSPZorro PSI','tespzorro@psi.com',244820300,434434434,'Morro do Lena, Alto do Vieira','2411-901','Leiria',100000);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `telefone` int NOT NULL,
  `nif` int NOT NULL,
  `morada` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `codigopostal` int NOT NULL,
  `localidade` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `role` enum('Cliente','Funcionario','Admin') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','',0,0,'',0,'','Admin'),(2,'user','user','',0,0,'',0,'','Cliente'),(3,'funcionario','funcionario','',0,0,'',0,'','Funcionario'),(16,'teste','teste','teste@teste.com',123456789,123456789,'teste',123456789,'teste','Cliente'),(21,'123andre','123','2@c.c',123456456,123132456,'123',2147483647,'123','Cliente'),(22,'novo','novo','novo@mai.com',123123123,123123123,'novo',1,'novo','Cliente'),(23,'rota','rota','rota@ho.c',123456456,123456789,'teste',1234567,'teste','Cliente');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-05 21:02:23
