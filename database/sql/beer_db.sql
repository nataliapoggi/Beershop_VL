-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: beer_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.38-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `beers`
--

DROP TABLE IF EXISTS `beers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `beers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) unsigned NOT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `id_brand` bigint(20) unsigned NOT NULL,
  `id_category` bigint(20) unsigned NOT NULL,
  `id_style` bigint(20) unsigned NOT NULL,
  `id_origin` bigint(20) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `beers_id_brand_foreign` (`id_brand`),
  KEY `beers_id_category_foreign` (`id_category`),
  KEY `beers_id_style_foreign` (`id_style`),
  KEY `beers_id_origin_foreign` (`id_origin`),
  CONSTRAINT `beers_id_brand_foreign` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id`),
  CONSTRAINT `beers_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`),
  CONSTRAINT `beers_id_origin_foreign` FOREIGN KEY (`id_origin`) REFERENCES `origins` (`id`),
  CONSTRAINT `beers_id_style_foreign` FOREIGN KEY (`id_style`) REFERENCES `styles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beers`
--

LOCK TABLES `beers` WRITE;
/*!40000 ALTER TABLE `beers` DISABLE KEYS */;
INSERT INTO `beers` VALUES (2,'Botella Corona 710',150.00,710,4,3,4,3,'XsnYqwEip7kjC0X4t6zEgLR07K0Z5P77Xnw1FxWJ.png',0,'2019-09-12 23:33:47','2019-09-13 02:33:47'),(3,'Barril Heineken',5000.00,300,2,4,4,2,'of3hxqJfulLdnnku2hkOKas5fyjSImrZVp6jvsmH.jpeg',1,'2019-09-26 20:29:16','2019-09-26 23:29:16'),(4,'Lata Heineken 330',330.00,330,2,1,4,2,'PSR0CzL6ipYI2Ol0YW0lyI2O58JsMNmPJCR3qSRm.jpeg',1,'2019-09-12 17:35:57','2019-09-12 20:35:57'),(5,'Botella Patagonia Amber Lager',730.00,730,3,3,3,1,'67URiotpH5D2PxYD3A0g8zfOwxNXpTbVIO2xWO3q.png',1,'2019-09-12 17:36:09','2019-09-12 20:36:09'),(6,'Botella Patagonia Lager',730.00,730,3,3,3,1,'n0GAbrQ9Xo6JuTqh7XAEPtQ76BKZCWrstVCkmGo1.png',1,'2019-09-12 17:36:20','2019-09-12 20:36:20'),(7,'Lata Patagonia F. IPA',84.00,473,3,1,2,1,'4X2eIfibeqAPdoHEp2RzMbBoWnZJxGPZTOA3sz7M.png',1,'2019-08-19 20:10:25','2019-08-19 20:10:25'),(8,'Botella Quilmes Litro',100.00,1000,1,3,4,1,'bL8HRAnBlAFQlDEojvhGRFyUZBPXNPwZ0GivWYnv.jpeg',1,'2019-08-19 20:16:55','2019-08-19 20:16:55'),(9,'Botella Heineken de 1L ret',108.00,1000,2,3,4,2,'3wia4Wg8tICAOXelwVRaOw65jFSL4ZixdIRf5n6V.jpeg',1,'2019-08-19 20:21:46','2019-08-19 20:21:46'),(10,'Botella Heineken de 1L NO ret',150.00,1000,2,3,4,2,'EDSCfbyZQ1ztnQEAgJrqEmhZ4qzcsV79ob13Eh4z.jpeg',1,'2019-09-12 17:37:26','2019-09-12 20:37:26'),(11,'Botella Quilmes Stout Litro',120.00,1000,1,3,5,1,'BNRbuuBrIcLHRxnazVmWo11usrPpWgYFPTwr90O8.jpeg',1,'2019-08-19 20:27:38','2019-08-19 20:27:38'),(12,'Lata Quilmes 470',42.00,470,1,1,4,1,'rM0zGmg3Xp45ge6BP08ZS0jMFAisUpcVkakyPr4S.jpeg',1,'2019-08-19 20:29:47','2019-08-19 20:29:47'),(13,'Porron Quilmes Stout 340',56.00,340,1,2,5,1,'nz4Ib2XV07LfFFyhwj8TeHaGPhnQJBDtQIJaOdcO.jpeg',1,'2019-08-19 21:06:12','2019-08-19 21:06:12'),(14,'Porron Brahma 340',26.00,340,5,2,4,4,'Le0XtwWtLQs6imOMLdqZIF8rhV0YYf1uJf3PuMXz.jpeg',1,'2019-08-19 21:46:10','2019-08-19 21:46:10'),(16,'Corona porron 355ml',140.00,355,4,2,4,3,'xciBw547CKr6RbNpZLB9dZNRcNvTybigeW3CACMb.png',1,'2019-09-12 17:35:35','2019-09-12 20:35:35'),(19,'prueba c o r',100.00,1000,1,1,1,1,'XrDc08TrQMblJCmsSsACINPreC6GlNR9f8kBgPb2.jpeg',0,'2019-09-04 20:17:30','2019-09-04 23:17:30'),(20,'KURT BEER',300.00,1000,1,4,1,2,'pPTRoRByAHEPPt0RDaUQdbQQjZUqpM60UnYiQ2k3.jpeg',0,'2019-09-29 18:37:57','2019-09-29 21:37:57');
/*!40000 ALTER TABLE `beers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Quilmes'),(2,'Heineken'),(3,'Patagonia'),(4,'Corona'),(5,'Brahma');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Lata'),(2,'Porron'),(3,'Botella'),(4,'Barril');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `answered` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Natalia','Poggi','natalia.poggi@gmail.com','mi primer comentario en laravel','2019-08-18 21:07:36','2019-08-19 00:07:36',1),(2,'Natalia','P','ximenapoggi@gmail.com','uuuuuuuuuuuuu','2019-08-18 21:08:18','2019-08-19 00:08:18',1),(3,'ximena','ppp','qq@gmail.com','123 tooo','2019-08-27 21:34:55','2019-08-28 00:34:55',1),(4,'Natalia','Poggi','natalia.poggi@gmail.com','agrego un comentario','2019-08-30 14:50:42','2019-08-30 17:50:42',1),(5,'lando','digital','lando@digital.com','hago un comentario','2019-09-12 17:34:17','2019-09-12 20:34:17',1),(6,'lando','digital','lando@digital.com','van de nuevo xq no anduvo','2019-09-12 23:32:36','2019-09-13 02:32:36',1),(7,'lando','digital','lando@digital.com','la 3ra es la vencida','2019-09-04 00:36:41','2019-09-04 00:36:41',0),(8,'matute','santos','ms@qq.com','cambio el nombre xq lando no me da suerte','2019-09-04 00:39:26','2019-09-04 00:39:26',0),(9,'nat','pog','iiiiiiii@ii.com','les mando una consulta.\r\nblablabla bla bla bla','2019-09-12 20:25:22','2019-09-12 20:25:22',0);
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (2,'2019_08_16_115243_user_table',1),(3,'2019_08_16_125338_beers_parameters',2),(5,'2019_08_16_130503_categories_table',3),(6,'2019_08_16_130625_beers_table',4),(8,'2019_08_16_133608_contacts_table',5),(9,'2019_08_17_160012_tabla_admin_users',6),(10,'2019_08_17_160624_tabla_admin_users',7),(11,'2019_08_19_105015_beers_table',8),(12,'2019_08_19_123827_beers_table_fkeys',9),(13,'2019_08_23_130445_order_table',10),(14,'2019_08_23_131634_order_table_fk',11),(16,'2019_08_23_132304_order_table_ts',12),(17,'2019_08_30_163246_create_table_orderhd',13),(18,'2019_08_30_163256_create_table_orderdt',13),(19,'2019_08_30_163326_create_table_orderpay',13),(20,'2019_08_30_163340_create_table_orderadd',13);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderadd`
--

DROP TABLE IF EXISTS `orderadd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orderadd` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `orderadd_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orderhd` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderadd`
--

LOCK TABLES `orderadd` WRITE;
/*!40000 ALTER TABLE `orderadd` DISABLE KEYS */;
INSERT INTO `orderadd` VALUES (5,1,'joaquin santos','jsantos@qq.com','williams 1809 lote187 -barrio los ceibos','BA','12345678','2019-09-03 00:16:30','2019-09-03 00:16:30'),(6,2,'esteban santos','esteban@qq.com','lima 123  cp1000','CAP','12345678','2019-09-03 00:25:00','2019-09-03 00:25:00'),(8,3,'Esteban Santos','esteban@qq.com','Agustin Garcia 6649','CAP','91150136676','2019-09-09 22:55:15','2019-09-09 22:55:15'),(10,4,'Mirta Legrand','mirta@legrand.com','libertador 1010 cp1000','CAP','1566669999','2019-09-09 23:18:36','2019-09-09 23:18:36'),(11,5,'Mirta Legrand','mirta@legrand.com','libertador 1010 cp1000','CAP','1599996666','2019-09-10 17:13:30','2019-09-10 17:13:30'),(12,6,'Lio Messi','lio@messi.com','Agustin Garcia 6649','CAP','5555555555','2019-09-11 04:01:06','2019-09-11 04:01:06'),(13,7,'Lo Lo','lolo@com.com','centro commercial nordelta oficina Icconect cp1648','BA','34567890','2019-09-12 20:31:41','2019-09-12 20:31:41'),(14,8,'Uierew Poggi','lll@qq.com','Agustin Garcia 6649','CAP','91150136676','2019-09-13 02:31:29','2019-09-13 02:31:29'),(15,9,'Esteban Santos','esteban@qq.com','Mi calle nro 1000 piso3 CP1000','CAP','12345678','2019-09-17 19:20:45','2019-09-17 19:20:45'),(16,10,'Esteban Santos','esteban@qq.com','Agustin Garcia 6649','CAP','91150136676','2019-09-17 21:21:25','2019-09-17 21:21:25'),(17,11,'Nico Duff','nd@qq.com','Williams 1900 Bo Las Palmas Lote2 CP 1648','CAP','33333333','2019-09-25 18:53:45','2019-09-25 18:53:45'),(18,12,'Nico Duff','nd@qq.com','Williams 1900 Bo Las Palmas Lote2 CP 1648','CAP','33333333','2019-09-25 18:53:45','2019-09-25 18:53:45'),(20,13,'Joaquin Santos','jsantos@qq.com','Liniers 2011 piso 2 dto b CP 1140','CAP','77978888','2019-09-26 23:21:30','2019-09-26 23:21:30'),(21,14,'Joaquin Santos','jsantos@qq.com','Jefferson Avenue 77','CAP','55556666','2019-09-26 23:45:16','2019-09-26 23:45:16'),(22,15,'Esteban Santos','esteban@qq.com','Williams 1809 lote187 -barrio los ceibos','CAP','45226324','2019-09-29 21:36:15','2019-09-29 21:36:15');
/*!40000 ALTER TABLE `orderadd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderdt`
--

DROP TABLE IF EXISTS `orderdt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orderdt` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `cant` bigint(20) unsigned NOT NULL,
  `price` decimal(8,2) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `orderdt_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orderhd` (`order_id`),
  CONSTRAINT `orderdt_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `beers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderdt`
--

LOCK TABLES `orderdt` WRITE;
/*!40000 ALTER TABLE `orderdt` DISABLE KEYS */;
INSERT INTO `orderdt` VALUES (14,1,3,3,1550.00,'2019-09-03 00:16:30','2019-09-03 00:16:30'),(15,1,2,2,150.00,'2019-09-03 00:16:30','2019-09-03 00:16:30'),(16,1,4,3,330.00,'2019-09-03 00:16:30','2019-09-03 00:16:30'),(17,2,4,10,330.00,'2019-09-03 00:25:00','2019-09-03 00:25:00'),(19,3,2,3,150.00,'2019-09-09 22:55:15','2019-09-09 22:55:15'),(20,3,3,1,1550.00,'2019-09-09 22:55:15','2019-09-09 22:55:15'),(22,4,12,100,42.00,'2019-09-09 23:18:36','2019-09-09 23:18:36'),(23,5,2,4,150.00,'2019-09-10 17:13:30','2019-09-10 17:13:30'),(24,5,11,2,120.00,'2019-09-10 17:13:30','2019-09-10 17:13:30'),(25,6,2,10,150.00,'2019-09-11 04:01:06','2019-09-11 04:01:06'),(26,7,2,10,150.00,'2019-09-12 20:31:41','2019-09-12 20:31:41'),(27,7,4,8,330.00,'2019-09-12 20:31:41','2019-09-12 20:31:41'),(28,8,12,4,42.00,'2019-09-13 02:31:29','2019-09-13 02:31:29'),(29,8,5,2,730.00,'2019-09-13 02:31:29','2019-09-13 02:31:29'),(32,9,3,3,1500.00,'2019-09-17 19:20:45','2019-09-17 19:20:45'),(33,10,10,4,150.00,'2019-09-17 21:21:25','2019-09-17 21:21:25'),(34,11,10,3,150.00,'2019-09-25 18:53:45','2019-09-25 18:53:45'),(35,11,4,2,330.00,'2019-09-25 18:53:45','2019-09-25 18:53:45'),(38,13,10,10,150.00,'2019-09-26 23:21:30','2019-09-26 23:21:30'),(39,13,16,3,140.00,'2019-09-26 23:21:30','2019-09-26 23:21:30'),(40,14,10,4,150.00,'2019-09-26 23:45:16','2019-09-26 23:45:16'),(41,15,10,4,150.00,'2019-09-29 21:36:15','2019-09-29 21:36:15'),(42,15,16,2,140.00,'2019-09-29 21:36:15','2019-09-29 21:36:15'),(43,15,13,1,56.00,'2019-09-29 21:36:15','2019-09-29 21:36:15'),(44,15,3,3,5000.00,'2019-09-29 21:36:15','2019-09-29 21:36:15');
/*!40000 ALTER TABLE `orderdt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderhd`
--

DROP TABLE IF EXISTS `orderhd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orderhd` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(8,2) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_ok` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `delivered_ok` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_orderhd_order_id` (`order_id`),
  KEY `idx_orderhd_order_id` (`order_id`),
  KEY `idx_orderhd_user_id` (`user_id`),
  CONSTRAINT `orderhd_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderhd`
--

LOCK TABLES `orderhd` WRITE;
/*!40000 ALTER TABLE `orderhd` DISABLE KEYS */;
INSERT INTO `orderhd` VALUES (10,1,6,'joaquin santos',5940.00,'2019-09-26 20:12:15','2019-09-26 23:12:15',1,1),(11,2,4,'esteban santos',3300.00,'2019-09-24 21:36:12','2019-09-25 00:36:12',1,0),(13,3,4,'Esteban Santos',2000.00,'2019-09-24 21:37:27','2019-09-25 00:37:27',1,0),(15,4,11,'Mirta Legrand',4200.00,'2019-09-25 16:00:24','2019-09-25 19:00:24',1,1),(16,5,11,'Mirta Legrand',840.00,'2019-09-29 18:57:55','2019-09-29 21:57:55',1,0),(17,6,12,'Lio Messi',1500.00,'2019-09-29 18:58:24','2019-09-29 21:58:24',1,0),(18,7,13,'Lo Lo',4140.00,'2019-09-29 19:00:01','2019-09-29 22:00:01',1,0),(19,8,15,'Uierew Poggi',1628.00,'2019-09-13 02:31:29','2019-09-13 02:31:29',0,0),(22,9,4,'Esteban Santos',4500.00,'2019-09-17 19:20:45','2019-09-17 19:20:45',0,0),(23,10,4,'Esteban Santos',600.00,'2019-09-17 21:21:25','2019-09-17 21:21:25',0,0),(24,11,16,'Nico Duff',1110.00,'2019-09-25 18:53:45','2019-09-25 18:53:45',0,0),(25,12,16,'Nico Duff',0.00,'2019-09-25 15:55:59','2019-09-25 18:55:59',1,0),(27,13,6,'Joaquin Santos',1920.00,'2019-09-26 20:45:56','2019-09-26 23:45:56',1,0),(28,14,6,'Joaquin Santos',600.00,'2019-09-29 18:47:39','2019-09-29 21:47:39',1,0),(29,15,4,'Esteban Santos',15936.00,'2019-09-29 21:36:15','2019-09-29 21:36:15',0,0);
/*!40000 ALTER TABLE `orderhd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderpay`
--

DROP TABLE IF EXISTS `orderpay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orderpay` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `cardname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ccnum` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cardtype` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expmonth` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvv` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmation_numb` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_confirmed` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `orderpay_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orderhd` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderpay`
--

LOCK TABLES `orderpay` WRITE;
/*!40000 ALTER TABLE `orderpay` DISABLE KEYS */;
INSERT INTO `orderpay` VALUES (2,1,'joaquin santos','1111111111111111','visa','01/20','333','888','2019-09-24','2019-09-03 00:16:30','2019-09-24 23:56:20'),(3,2,'esteban santos','1111111111111111','visa','01/20','123','5555','2019-09-24','2019-09-03 00:25:00','2019-09-25 00:36:12'),(4,3,'esteban santos','123456789012345','visa','01/20','1234','4444','2019-09-24','2019-09-09 22:55:15','2019-09-25 00:37:27'),(6,4,'mirta legrand','1234567890123456','visa','01/23','777','565656','2019-09-25','2019-09-09 23:18:36','2019-09-25 19:00:24'),(7,5,'mirta legrand','1234567890123456','visa','01/23','444','3334','2019-09-29','2019-09-10 17:13:30','2019-09-29 21:57:55'),(8,6,'ufa lolooooo','1234567890123456','visa','12/24','2233','44','2019-09-29','2019-09-11 04:01:06','2019-09-29 21:58:24'),(9,7,'lando digital','123456789012345','visa','03/23','1234','666','2019-09-29','2019-09-12 20:31:41','2019-09-29 22:00:01'),(10,8,'NATA','12345678901234567','visa','02/23','333',NULL,NULL,'2019-09-13 02:31:29','2019-09-13 02:31:29'),(11,9,'UN NOMBRE LARGO','1234567890123456','visa','01/20','333',NULL,NULL,'2019-09-17 19:20:45','2019-09-17 19:20:45'),(12,10,'NATALIA POGGI','376636747023015','visa','09/20','5520',NULL,NULL,'2019-09-17 21:21:25','2019-09-17 21:21:25'),(13,11,'NATALI POG','376636747023015','amex','09/20','5520',NULL,NULL,'2019-09-25 18:53:45','2019-09-25 18:53:45'),(14,12,'NATALI POG','376636747023015','amex','09/20','5520','44454','2019-09-25','2019-09-25 18:53:45','2019-09-25 18:55:59'),(15,13,'TYRESE GARCIA','343306642815218','amex','02/24','301','343','2019-09-26','2019-09-26 23:21:30','2019-09-26 23:45:56'),(16,14,'RIHANNA WILSON','346323017406975','amex','02/27','262','888','2019-09-29','2019-09-26 23:45:16','2019-09-29 21:47:39'),(17,15,'WILLIAM HALL','4392368454003756','visa','10/19','888',NULL,NULL,'2019-09-29 21:36:15','2019-09-29 21:36:15');
/*!40000 ALTER TABLE `orderpay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `cant` bigint(20) unsigned NOT NULL,
  `price` decimal(8,2) unsigned NOT NULL,
  `paid` tinyint(3) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_product_id_foreign` (`product_id`),
  CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `beers` (`id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (108,11,12,100,42.00,1,'2019-09-09 20:18:08','2019-09-09 20:18:36'),(109,11,2,4,150.00,1,'2019-09-10 14:12:53','2019-09-10 14:13:30'),(110,11,11,2,120.00,1,'2019-09-10 14:13:02','2019-09-10 14:13:30'),(112,12,2,10,150.00,1,'2019-09-11 00:59:23','2019-09-11 01:01:06'),(114,13,2,10,150.00,1,'2019-09-12 17:29:27','2019-09-12 17:31:41'),(115,13,4,8,330.00,1,'2019-09-12 17:29:41','2019-09-12 17:31:41'),(116,15,12,4,42.00,1,'2019-09-12 23:30:17','2019-09-12 23:31:29'),(117,15,5,2,730.00,1,'2019-09-12 23:30:46','2019-09-12 23:31:29'),(118,4,3,3,1500.00,1,'2019-09-17 16:00:59','2019-09-17 16:20:45'),(119,4,10,4,150.00,1,'2019-09-17 16:28:42','2019-09-17 18:21:25'),(120,4,10,4,150.00,1,'2019-09-23 19:58:10','2019-09-29 18:36:15'),(121,4,16,2,140.00,1,'2019-09-23 19:58:20','2019-09-29 18:36:15'),(122,4,13,1,56.00,1,'2019-09-23 19:58:30','2019-09-29 18:36:15'),(123,16,10,3,150.00,1,'2019-09-25 15:43:41','2019-09-25 15:53:45'),(124,16,4,2,330.00,1,'2019-09-25 15:43:49','2019-09-25 15:53:45'),(125,6,10,10,150.00,1,'2019-09-26 20:16:51','2019-09-26 20:21:30'),(126,6,16,3,140.00,1,'2019-09-26 20:16:59','2019-09-26 20:21:30'),(127,6,10,4,150.00,1,'2019-09-26 20:44:06','2019-09-26 20:45:16'),(128,4,3,3,5000.00,1,'2019-09-29 18:30:30','2019-09-29 18:36:15');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origins`
--

DROP TABLE IF EXISTS `origins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `origins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origins`
--

LOCK TABLES `origins` WRITE;
/*!40000 ALTER TABLE `origins` DISABLE KEYS */;
INSERT INTO `origins` VALUES (1,'Argentina'),(2,'Holanda'),(3,'Mexico'),(4,'Brasil');
/*!40000 ALTER TABLE `origins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('natalia.poggi@gmail.com','$2y$10$02vURJe67tUHqISfkUZ1IebchsAu2z.1bkWmk2w1o8FFwsXXXEGEy','2019-08-30 16:56:00');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sizes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min` int(10) unsigned NOT NULL,
  `max` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sizes`
--

LOCK TABLES `sizes` WRITE;
/*!40000 ALTER TABLE `sizes` DISABLE KEYS */;
/*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `styles`
--

DROP TABLE IF EXISTS `styles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `styles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `styles`
--

LOCK TABLES `styles` WRITE;
/*!40000 ALTER TABLE `styles` DISABLE KEYS */;
INSERT INTO `styles` VALUES (1,'No Aplica'),(2,'IPA'),(3,'LAGER'),(4,'RUBIA'),(5,'STOUT');
/*!40000 ALTER TABLE `styles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bdate` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Natalia','Poggi','natalia.poggi@gmail.com',NULL,'$2y$10$FX/B9GwBidC1DUQdpRJOgOAefoIGd6LZzkk5cvdupgTB/7tLJGcbq','2000-08-13','jkGRhDO24KLvNIqyCg6VA3sCfFGxpikhVNU6EdyC4uOvGIIkd9Ht01gPZuUR','2019-08-16 22:22:55','2019-08-16 22:22:55',1,NULL),(2,'Nat','Pog','ximenapoggi@gmail.com',NULL,'$2y$10$hiManM2eRxTiKBx5gP3hgu7lTDMiWaDz9pMYlhfOJoTOM5etJ5Mi.','2000-08-13','NRuhF7LxZpFjFP8RUn2uUguwSQKpT7tax9mlQ2AcMQdWFfKzSn1jrIu5KeYv','2019-08-17 18:53:04','2019-08-17 18:53:04',0,NULL),(3,'Florencia','Florencia','florenciasangineto@gmail.com',NULL,'$2y$10$HZ2cOVgYZnPMbQb1tn1dqOfA3cJFoehUrIrFNKeJbauHAllbn2JSa','2000-08-21','MKkqZ66gbk23iXnTs9xF7uZTkkLQb8jPpjx0V01e1i1jdRVDNrun2O1CDOOy','2019-08-21 17:21:52','2019-08-21 17:21:52',1,NULL),(4,'Esteban','Santos','esteban@qq.com',NULL,'$2y$10$ubbxoE8hJzwjTrgRBZbbCe.ck98mIZOTS4pbk4YZcTMBTZ5CxOeGG','1973-09-08','t9hy5KS4CedPgVNzu7beW0Mi3lZBgfZmG7JfTnlZsA2ZNsOsMf4xDxklxhXw','2019-08-23 15:33:49','2019-08-23 15:33:49',0,NULL),(5,'Natali','Natali','poggi.natalia74@gmail.com',NULL,'$2y$10$VqELlWY1lExt177g2D4WB.Oj3oESFTcUOVPohM4XIKY9JYsGc5oz.','0001-01-01',NULL,'2019-08-27 20:05:16','2019-08-27 20:05:16',0,NULL),(6,'Joaquin','Santos','jsantos@qq.com',NULL,'$2y$10$tZtYzWbTLTb9WAxlzebcCOcfZrSNioJbOwOsLj9o2HZrFGA94qLQi','2001-06-12',NULL,'2019-08-30 00:39:37','2019-08-30 00:39:37',0,NULL),(7,'Alguien','Alguien menor de 18 años','qq@qq.com',NULL,'$2y$10$U72an5nqDOolAD7Hs1dxKO9AP0/.pYrLvTO7JQeC/Agl72yp89xfW','2000-01-01',NULL,'2019-08-30 18:41:42','2019-08-30 18:41:42',0,NULL),(8,'Juliana','Awada','jawada@awada.com',NULL,'$2y$10$aNiFrGxohIOkpMm.N9IVPuNtfGVjwVoXA0uHBMlXj2c/whd/.BBJa','2000-12-09',NULL,'2019-09-07 00:51:34','2019-09-07 00:51:34',0,NULL),(9,'Pruebo Capitalization','Sigo Probando','email@email.com',NULL,'$2y$10$hIKIYKmuBf.z9D8UHTH/PuOeuzoqTyQnB0P4TEzthOE6CFEe2n0xG','2000-01-01',NULL,'2019-09-09 19:23:28','2019-09-09 19:23:28',0,NULL),(10,'Nn','Nn','nn@qq.com',NULL,'$2y$10$7LH/Q7JwL9UMr8A5F.keGesxzYxtyHlhvLXWM8ccSkiV2bQtHwShO','2000-07-07',NULL,'2019-09-09 19:24:22','2019-09-09 19:24:22',0,NULL),(11,'Mirta','Legrand','mirta@legrand.com',NULL,'$2y$10$sEyivslgjnmcbubdsVU48eYyBHFG5NiKzaCBnl8Jn9p6DSRXyJ6ha','1900-01-01',NULL,'2019-09-09 23:10:12','2019-09-09 23:10:12',0,NULL),(12,'Lio','Messi','lio@messi.com',NULL,'$2y$10$jA2tFj2u9uHHpcg.wFqFNeYM5tTZPNYu1wCW/sssGChvqbXXdmHey','2000-01-21',NULL,'2019-09-11 03:58:59','2019-09-11 03:58:59',0,NULL),(13,'Lo','Lo','lolo@com.com',NULL,'$2y$10$q.6A3AqPTtMCOOsblp7gbO2cKgUO2ho3IHOx00hF2Tpj9w/As2kgW','2000-01-01',NULL,'2019-09-12 20:27:27','2019-09-12 20:27:27',0,NULL),(14,'Admin','Admin','admin@admin.com',NULL,'$2y$10$dR0mRogloVdCAeYmmFCcJ.0k7bzGTy06s/ANbeB77xa6JWvSvI8.W','1900-01-01',NULL,'2019-09-12 20:32:25','2019-09-12 20:32:25',1,NULL),(15,'Uierew','Poggi','lll@qq.com',NULL,'$2y$10$HEIn.Jil502Cqa3QwUh5M.Gt/siq5.aZYnzIyGKp/H2EWGHtG8CLS','2000-01-01',NULL,'2019-09-13 02:29:49','2019-09-13 02:29:49',0,NULL),(16,'Nico','Duff','nd@qq.com',NULL,'$2y$10$DotHdTSbweK0t/pQmRtQv.ozjXkNS5Ayt.4qXzNiga9CQ.qusOfKC','2000-01-01',NULL,'2019-09-25 18:43:35','2019-09-25 18:43:35',0,NULL);
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

-- Dump completed on 2019-09-30  9:42:09
