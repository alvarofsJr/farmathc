-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: farmcrud
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(125) NOT NULL,
  `tipo` enum('produto','remedio') NOT NULL,
  `categoria_pai_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorias_categoria_pai_id_foreign` (`categoria_pai_id`),
  CONSTRAINT `categorias_categoria_pai_id_foreign` FOREIGN KEY (`categoria_pai_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Produtos','produto',NULL,'2025-04-08 01:29:53','2025-04-08 01:29:53'),(2,'Remédios','remedio',NULL,'2025-04-08 01:29:53','2025-04-08 01:29:53'),(3,'Higiene Pessoal','produto',1,'2025-04-08 01:29:54','2025-04-08 01:29:54'),(4,'Alimentos','produto',1,'2025-04-08 01:29:54','2025-04-08 01:29:54'),(5,'Bebidas','produto',1,'2025-04-08 01:29:54','2025-04-08 01:29:54'),(6,'Analgésicos','remedio',2,'2025-04-08 01:29:54','2025-04-08 01:29:54'),(7,'Antibióticos','remedio',2,'2025-04-08 01:29:54','2025-04-08 01:29:54'),(8,'Antialérgicos','remedio',2,'2025-04-08 01:29:54','2025-04-08 01:29:54'),(9,'teste produto','produto',NULL,'2025-04-08 04:31:22','2025-04-08 04:31:22'),(10,'teste remedinho','remedio',NULL,'2025-04-08 04:31:32','2025-04-09 21:38:09'),(20,'teste modal papai','produto',NULL,'2025-04-09 21:42:44','2025-04-09 21:42:44');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-09 15:48:18
