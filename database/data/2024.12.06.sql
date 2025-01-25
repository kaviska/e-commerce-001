-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: dad_travel
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `agent_id_image`
--

DROP TABLE IF EXISTS `agent_id_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agent_id_image` (
  `id` int NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_id_image`
--

LOCK TABLES `agent_id_image` WRITE;
/*!40000 ALTER TABLE `agent_id_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent_id_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `agent_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `countries_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_agents_countries1_idx` (`countries_id`),
  CONSTRAINT `fk_agents_countries1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agents_has_agent_id_image`
--

DROP TABLE IF EXISTS `agents_has_agent_id_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agents_has_agent_id_image` (
  `agents_id` bigint unsigned NOT NULL,
  `agent_id_image_id` int NOT NULL,
  PRIMARY KEY (`agents_id`,`agent_id_image_id`),
  KEY `fk_agents_has_agent_id_image_agent_id_image1_idx` (`agent_id_image_id`),
  KEY `fk_agents_has_agent_id_image_agents1_idx` (`agents_id`),
  CONSTRAINT `fk_agents_has_agent_id_image_agent_id_image1` FOREIGN KEY (`agent_id_image_id`) REFERENCES `agent_id_image` (`id`),
  CONSTRAINT `fk_agents_has_agent_id_image_agents1` FOREIGN KEY (`agents_id`) REFERENCES `agents` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents_has_agent_id_image`
--

LOCK TABLES `agents_has_agent_id_image` WRITE;
/*!40000 ALTER TABLE `agents_has_agent_id_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `agents_has_agent_id_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `airs`
--

DROP TABLE IF EXISTS `airs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `airs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `airline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baggage_kg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint unsigned NOT NULL,
  `customer_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `airs_customer_id_foreign` (`customer_id`),
  KEY `airs_status_foreign` (`status`),
  CONSTRAINT `airs_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `airs_status_foreign` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airs`
--

LOCK TABLES `airs` WRITE;
/*!40000 ALTER TABLE `airs` DISABLE KEYS */;
INSERT INTO `airs` VALUES (1,'12de333','12sw','7','2024-09-12','2023-05-06','12','this is internal notes',2,1,'2024-06-11 20:07:14','2024-06-11 20:07:14','2023-03-04'),(2,'12de333','12sw','7','2024-09-12','2023-05-06','12','this is internal notes',2,1,'2024-06-11 20:08:04','2024-06-11 20:08:04','2023-03-04');
/*!40000 ALTER TABLE `airs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `approvel_status`
--

DROP TABLE IF EXISTS `approvel_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `approvel_status` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approvel_status`
--

LOCK TABLES `approvel_status` WRITE;
/*!40000 ALTER TABLE `approvel_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `approvel_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collect_status`
--

DROP TABLE IF EXISTS `collect_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `collect_status` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collect_status`
--

LOCK TABLES `collect_status` WRITE;
/*!40000 ALTER TABLE `collect_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `collect_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Afghanistan'),(2,'Åland Islands'),(3,'Albania'),(4,'Algeria'),(5,'American Samoa'),(6,'Andorra'),(7,'Angola'),(8,'Anguilla'),(9,'Antarctica'),(10,'Antigua and Barbuda'),(11,'Argentina'),(12,'Armenia'),(13,'Aruba'),(14,'Australia'),(15,'Austria'),(16,'Azerbaijan'),(17,'Bahamas '),(18,'Bahrain'),(19,'Bangladesh'),(20,'Barbados'),(21,'Belarus'),(22,'Belgium'),(23,'Belize'),(24,'Benin'),(25,'Bermuda'),(26,'Bhutan'),(27,'Bolivia'),(28,'Bonaire, Sint Eustatius and Saba'),(29,'Bosnia and Herzegovina'),(30,'Botswana'),(31,'Bouvet Island'),(32,'Brazil'),(33,'British Indian Ocean Territory '),(34,'Brunei Darussalam'),(35,'Bulgaria'),(36,'Burkina Faso'),(37,'Burundi'),(38,'Cabo Verde'),(39,'Cambodia'),(40,'Cameroon'),(41,'Canada'),(42,'Cayman Islands '),(43,'Central African Republic '),(44,'Chad'),(45,'Chile'),(46,'China'),(47,'Christmas Island'),(48,'Cocos Islands '),(49,'Colombia'),(50,'Comoros '),(51,'Congo Democratic Republic of'),(52,'Congo '),(53,'Cook Islands '),(54,'Costa Rica'),(55,'Croatia'),(56,'Cuba'),(57,'Curaçao'),(58,'Cyprus'),(59,'Czechia'),(60,'Côte d\'Ivoire'),(61,'Denmark'),(62,'Djibouti'),(63,'Dominica'),(64,'Dominican Republic '),(65,'Ecuador'),(66,'Egypt'),(67,'El Salvador'),(68,'Equatorial Guinea'),(69,'Eritrea'),(70,'Estonia'),(71,'Eswatini'),(72,'Ethiopia'),(73,'Falkland Islands  [Malvinas]'),(74,'Faroe Islands '),(75,'Fiji'),(76,'Finland'),(77,'France'),(78,'French Guiana'),(79,'French Polynesia'),(80,'French Son Territories '),(81,'Gabon'),(82,'Gambia '),(83,'Georgia'),(84,'Germany'),(85,'Ghana'),(86,'Gibraltar'),(87,'Greece'),(88,'Greenland'),(89,'Grenada'),(90,'Guadeloupe'),(91,'Guam'),(92,'Guatemala'),(93,'Guernsey'),(94,'Guinea'),(95,'Guinea-Bissau'),(96,'Guyana'),(97,'Haiti'),(98,'Heard Island and McDonald Islands'),(99,'Holy See '),(100,'Honduras'),(101,'Hong Kong'),(102,'Hungary'),(103,'Iceland'),(104,'India'),(105,'Indonesia'),(106,'Iran (Islamic Republic of)'),(107,'Iraq'),(108,'Ireland'),(109,'Isle of Man'),(110,'Israel'),(111,'Italy'),(112,'Jamaica'),(113,'Japan'),(114,'Jersey'),(115,'Jordan'),(116,'Kazakhstan'),(117,'Kenya'),(118,'Kiribati'),(119,'Korea Democratic People\'s Republic of'),(120,'Korea Republic of'),(121,'Kuwait'),(122,'Kyrgyzstan'),(123,'Lao People\'s Democratic Republic '),(124,'Latvia'),(125,'Lebanon'),(126,'Lesotho'),(127,'Liberia'),(128,'Libya'),(129,'Liechtenstein'),(130,'Lithuania'),(131,'Luxembourg'),(132,'Macao'),(133,'Madagascar'),(134,'Malawi'),(135,'Malaysia'),(136,'Maldives'),(137,'Mali'),(138,'Malta'),(139,'Marshall Islands '),(140,'Martinique'),(141,'Mauritania'),(142,'Mauritius'),(143,'Mayotte'),(144,'Mexico'),(145,'Micronesia (Federated States of)'),(146,'Moldova Republic of'),(147,'Monaco'),(148,'Mongolia'),(149,'Montenegro'),(150,'Montserrat'),(151,'Morocco'),(152,'Mozambique'),(153,'Myanmar'),(154,'Namibia'),(155,'Nauru'),(156,'Nepal'),(157,'Nlands '),(158,'New Caledonia'),(159,'New Zealand'),(160,'Nicaragua'),(161,'Niger '),(162,'Nigeria'),(163,'Niue'),(164,'Norfolk Island'),(165,'Non Mariana Islands '),(166,'Norway'),(167,'Oman'),(168,'Pakistan'),(169,'Palau'),(170,'Palestine, State of'),(171,'Panama'),(172,'Papua New Guinea'),(173,'Paraguay'),(174,'Peru'),(175,'Philippines '),(176,'Pitcairn'),(177,'Poland'),(178,'Portugal'),(179,'Puerto Rico'),(180,'Qatar'),(181,'Republic of North Macedonia'),(182,'Romania'),(183,'Russian Federation '),(184,'Rwanda'),(185,'Réunion'),(186,'Saint Barthélemy'),(187,'Saint Helena, Ascension and Tristan da Cunha'),(188,'Saint Kitts and Nevis'),(189,'Saint Lucia'),(190,'Saint Martin (French part)'),(191,'Saint Pierre and Miquelon'),(192,'Saint Vincent andGrenadines'),(193,'Samoa'),(194,'San Marino'),(195,'Sao Tome and Principe'),(196,'Saudi Arabia'),(197,'Senegal'),(198,'Serbia'),(199,'Seychelles'),(200,'Sierra Leone'),(201,'Singapore'),(202,'Sint Maarten (Dutch part)'),(203,'Slovakia'),(204,'Slovenia'),(205,'Solomon Islands'),(206,'Somalia'),(207,'South Africa'),(208,'South Georgia andSouth Sandwich Islands'),(209,'South Sudan'),(210,'Spain'),(211,'Sri Lanka'),(212,'Sudan '),(213,'Suriname'),(214,'Svalbard and Jan Mayen'),(215,'Sweden'),(216,'Switzerland'),(217,'Syrian Arab Republic'),(218,'Taiwan (Province of China)'),(219,'Tajikistan'),(220,'Tanzania, United Republic of'),(221,'Thailand'),(222,'Timor-Leste'),(223,'Togo'),(224,'Tokelau'),(225,'Tonga'),(226,'Trinidad and Tobago'),(227,'Tunisia'),(228,'Turkey'),(229,'Turkmenistan'),(230,'Turks and Caicos Islands '),(231,'Tuvalu'),(232,'Uganda'),(233,'Ukraine'),(234,'United Arab Emirates '),(235,'United Kingdom of Great Britain and Non Ireland '),(236,'United States Minor Outlying Islands '),(237,'United States of America '),(238,'Uruguay'),(239,'Uzbekistan'),(240,'Vanuatu'),(241,'Venezuela (Bolivarian Republic of)'),(242,'Viet Nam'),(243,'Virgin Islands (British)'),(244,'Virgin Islands (U.S.)'),(245,'Wallis and Futuna'),(246,'Western Sahara'),(247,'Yemen'),(248,'Zambia'),(249,'Zimbabwe');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registerd_date` date NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` bigint unsigned NOT NULL,
  `internal_notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_country_foreign` (`country`),
  CONSTRAINT `customers_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'demo.png','2024-06-10','kaviska dilshan','aisas@gmail.co','0782099179','220/3 m',3,'this is note not','2024-06-10 07:51:23','2024-06-10 01:38:47'),(2,'demo.png','2024-06-10','kaviska dilshan','kaviska525@gmail.com','0782099179','220/3 m',3,'this is note','2024-06-10 01:49:26','2024-06-10 01:49:26'),(3,'demo.png','2024-06-10','kaviska dilshan','kaviska525@gmail.com','0782099179','220/3 m',3,'this is note','2024-06-10 02:14:57','2024-06-10 02:14:57'),(4,'demo.png','2024-06-10','kaviska dilshan','kaviska525@gmail.com','0782099179','220/3 m',3,'this is note','2024-06-10 02:15:01','2024-06-10 02:15:01'),(5,'30b32b09c566524078c03fbc54013d3c.jpg','2024-06-10','kaviska dilshan','kavdiska525@gmail.com','0782099179','220/3 m',3,'this is note','2024-06-10 02:21:20','2024-06-10 02:21:20'),(6,'30b32b09c566524078c03fbc54013d3c.jpg','2024-06-10','kaviska dilshan','kavdissska525@gmail.com','0782099179','220/3 m',3,'this is note','2024-06-10 02:23:06','2024-06-10 02:23:06'),(7,'30b32b09c566524078c03fbc54013d3c.jpg','2024-06-10','kaviska dilshan','kavdisasska525@gmail.com','0782099179','220/3 m',3,'this is note','2024-06-10 02:23:35','2024-06-10 02:23:35'),(8,'1718023977.jpg','2024-06-10','kaviska dilshan','kaisasska525@gmail.com','0782099179','220/3 m',3,'this is note','2024-06-10 07:22:57','2024-06-10 07:22:57'),(9,'1718024085.jpg','2024-06-10','kaviska dilshan','kaisas@gmail.com','0782099179','220/3 m',3,'this is note','2024-06-10 07:24:45','2024-06-10 07:24:45'),(10,'1718025503.jpg','2024-06-10','kaviska dilshan','kaisas@gmail.co','0782099179','220/3 m',3,'this is note','2024-06-10 07:48:23','2024-06-10 07:48:23'),(11,'default.png','2024-06-10','kaviska dilshan','aisas@gmail.co','0782099179','220/3 m',3,'this is note','2024-06-10 07:48:58','2024-06-10 07:48:58');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `countries_id` bigint unsigned NOT NULL,
  `role_id` bigint NOT NULL,
  PRIMARY KEY (`id`,`countries_id`),
  KEY `fk_employees_countries1_idx` (`countries_id`),
  KEY `fk_employees_role1_idx` (`role_id`),
  CONSTRAINT `fk_employees_countries1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `fk_employees_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hotel_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_date` date NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rooms` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint unsigned NOT NULL,
  `country` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customers_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hotels_status_foreign` (`status`),
  KEY `hotels_country_foreign` (`country`),
  KEY `fk_hotels_customers1_idx` (`customers_id`),
  CONSTRAINT `fk_hotels_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `hotels_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `hotels_status_foreign` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (1,'hotel_demo.png','Sharingilla','2024-06-10','2.3 gallfae','3456',4,'kaviska525@gmail.com','0782099179','4','intranal notes',1,3,'2024-06-10 10:11:38','2024-06-10 10:11:38',3),(2,'1718034252.png','Sharingilla','2024-06-10','2.3 gallfae','3456',4,'kaviska525@gmail.com','0782099179','4','intranal notes',1,3,'2024-06-10 10:14:12','2024-06-10 10:14:12',3);
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventories`
--

DROP TABLE IF EXISTS `inventories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `inventory_date` date NOT NULL,
  `stock_no` int NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_stock` int NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventories`
--

LOCK TABLES `inventories` WRITE;
/*!40000 ALTER TABLE `inventories` DISABLE KEYS */;
INSERT INTO `inventories` VALUES (1,'2023-09-12',12,'sample product','sample discryption',12,'sample type','default.png','sample internal note','2024-06-10 11:02:44','2024-06-10 11:02:44'),(2,'2023-09-12',12,'sample product','sample discryption',12,'sample type','1718037389.jpg','sample internal note','2024-06-10 11:06:30','2024-06-10 11:06:30'),(3,'2023-09-12',12,'sample product','sample discryption',12,'sample type','1718037584.jpg','sample internal note','2024-06-10 11:09:44','2024-06-10 11:09:44'),(4,'2023-09-12',12,'sample product','sample discryption',12,'sample type','1718037670.jpg','sample internal note','2024-06-10 11:11:10','2024-06-10 11:11:10');
/*!40000 ALTER TABLE `inventories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_03_09_075136_create_countries_table',2),(5,'2024_04_08_182209_create_customers_table',2),(6,'2024_05_09_072745_create_status_table',2),(7,'2024_06_08_175229_create_hotels_table',3),(8,'2024_06_08_183637_create_airs_table',3),(9,'2024_06_08_185522_create_inventories_table',4),(10,'2024_06_09_041105_create_vechicles_table',4),(11,'2024_06_09_042002_create_agents_table',4),(12,'2024_06_09_055452_create_visas_table',4),(13,'2024_06_09_072213_create_employees_table',4),(14,'2024_06_09_080717_create_tour_locations_table',4),(15,'2024_06_09_083415_create_tours_table',5),(16,'2024_06_09_083530_create_tour_hotels_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owner_nic_images`
--

DROP TABLE IF EXISTS `owner_nic_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `owner_nic_images` (
  `id` int unsigned NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `vechicles_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_owner_nic_images_vechicles1_idx` (`vechicles_id`),
  CONSTRAINT `fk_owner_nic_images_vechicles1` FOREIGN KEY (`vechicles_id`) REFERENCES `vechicles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owner_nic_images`
--

LOCK TABLES `owner_nic_images` WRITE;
/*!40000 ALTER TABLE `owner_nic_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `owner_nic_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_status`
--

DROP TABLE IF EXISTS `payment_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_status` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `payment_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_status`
--

LOCK TABLES `payment_status` WRITE;
/*!40000 ALTER TABLE `payment_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `all` int NOT NULL,
  `tours` int NOT NULL,
  `employees` int NOT NULL,
  `visas` int NOT NULL,
  `agents` int NOT NULL,
  `vechicles` int NOT NULL,
  `inventories` int NOT NULL,
  `airs` int NOT NULL,
  `hotels` int NOT NULL,
  `customers` int NOT NULL,
  `export` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `descryption` longtext NOT NULL,
  `permissions_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`id`),
  KEY `fk_role_permissions1_idx` (`permissions_id`),
  CONSTRAINT `fk_role_permissions1` FOREIGN KEY (`permissions_id`) REFERENCES `permissions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('7F0IheuH7UX9shiI3H8kXC43hfhVGK5jwymt4tfD',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHhtUXVQakpERkxya0tFNnZQRkl4Qm80TE5CM21Lb1ZESXd2c2h5SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1718036313),('oHB4e4Rb3l4yEFLYfIc31beYWosJDIxiPXD7JHui',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWJWQjhBOXdGWTFBNWJ3SGpYY1NWblhqU3IzcWVQMkJ2cmZvdlN5SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1718155820);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Confirmed '),(2,'Pending '),(3,'Cancelled');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submission_type`
--

DROP TABLE IF EXISTS `submission_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `submission_type` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submission_type`
--

LOCK TABLES `submission_type` WRITE;
/*!40000 ALTER TABLE `submission_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `submission_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_hotels`
--

DROP TABLE IF EXISTS `tour_hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tour_hotels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(45) NOT NULL,
  `tours_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tour_hotels_tours1_idx` (`tours_id`),
  CONSTRAINT `fk_tour_hotels_tours1` FOREIGN KEY (`tours_id`) REFERENCES `tours` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_hotels`
--

LOCK TABLES `tour_hotels` WRITE;
/*!40000 ALTER TABLE `tour_hotels` DISABLE KEYS */;
/*!40000 ALTER TABLE `tour_hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_locations`
--

DROP TABLE IF EXISTS `tour_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tour_locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tours_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tour_locations_tours1_idx` (`tours_id`),
  CONSTRAINT `fk_tour_locations_tours1` FOREIGN KEY (`tours_id`) REFERENCES `tours` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_locations`
--

LOCK TABLES `tour_locations` WRITE;
/*!40000 ALTER TABLE `tour_locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `tour_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tours` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tour_date` date NOT NULL,
  `tour_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tours_customer_id_foreign` (`customer_id`),
  CONSTRAINT `tours_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tours`
--

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;
/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vechicle_images`
--

DROP TABLE IF EXISTS `vechicle_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vechicle_images` (
  `id` int unsigned NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `vechicles_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vechicle_images_vechicles1_idx` (`vechicles_id`),
  CONSTRAINT `fk_vechicle_images_vechicles1` FOREIGN KEY (`vechicles_id`) REFERENCES `vechicles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vechicle_images`
--

LOCK TABLES `vechicle_images` WRITE;
/*!40000 ALTER TABLE `vechicle_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `vechicle_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vechicle_insurance_images`
--

DROP TABLE IF EXISTS `vechicle_insurance_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vechicle_insurance_images` (
  `id` int NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `vechicles_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vechicle_insurance_images_vechicles1_idx` (`vechicles_id`),
  CONSTRAINT `fk_vechicle_insurance_images_vechicles1` FOREIGN KEY (`vechicles_id`) REFERENCES `vechicles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vechicle_insurance_images`
--

LOCK TABLES `vechicle_insurance_images` WRITE;
/*!40000 ALTER TABLE `vechicle_insurance_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `vechicle_insurance_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vechicle_license_images`
--

DROP TABLE IF EXISTS `vechicle_license_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vechicle_license_images` (
  `id` int unsigned NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `vechicles_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vechicle_license_images_vechicles1_idx` (`vechicles_id`),
  CONSTRAINT `fk_vechicle_license_images_vechicles1` FOREIGN KEY (`vechicles_id`) REFERENCES `vechicles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vechicle_license_images`
--

LOCK TABLES `vechicle_license_images` WRITE;
/*!40000 ALTER TABLE `vechicle_license_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `vechicle_license_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vechicles`
--

DROP TABLE IF EXISTS `vechicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vechicles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agreement_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vechicles`
--

LOCK TABLES `vechicles` WRITE;
/*!40000 ALTER TABLE `vechicles` DISABLE KEYS */;
/*!40000 ALTER TABLE `vechicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visa_category`
--

DROP TABLE IF EXISTS `visa_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visa_category` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `catagory` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visa_category`
--

LOCK TABLES `visa_category` WRITE;
/*!40000 ALTER TABLE `visa_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `visa_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visas`
--

DROP TABLE IF EXISTS `visas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `visa_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `passengers` int NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customers_id` bigint unsigned NOT NULL,
  `countries_id` bigint unsigned NOT NULL,
  `payment_status_id` bigint unsigned NOT NULL,
  `agents_id` bigint unsigned NOT NULL,
  `visa_category_id` int unsigned NOT NULL,
  `approvel_status_id` bigint unsigned NOT NULL,
  `collect_status_id` bigint unsigned NOT NULL,
  `submission_type_id` int unsigned NOT NULL,
  `payment_status_id1` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_visas_customers1_idx` (`customers_id`),
  KEY `fk_visas_countries1_idx` (`countries_id`),
  KEY `fk_visas_payment_status1_idx` (`payment_status_id`),
  KEY `fk_visas_agents1_idx` (`agents_id`),
  KEY `fk_visas_visa_category1_idx` (`visa_category_id`),
  KEY `fk_visas_approvel_status1_idx` (`approvel_status_id`),
  KEY `fk_visas_collect_status1_idx` (`collect_status_id`),
  KEY `fk_visas_submission_type1_idx` (`submission_type_id`),
  KEY `fk_visas_payment_status2_idx` (`payment_status_id1`),
  CONSTRAINT `fk_visas_agents1` FOREIGN KEY (`agents_id`) REFERENCES `agents` (`id`),
  CONSTRAINT `fk_visas_approvel_status1` FOREIGN KEY (`approvel_status_id`) REFERENCES `approvel_status` (`id`),
  CONSTRAINT `fk_visas_collect_status1` FOREIGN KEY (`collect_status_id`) REFERENCES `collect_status` (`id`),
  CONSTRAINT `fk_visas_countries1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `fk_visas_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `fk_visas_payment_status1` FOREIGN KEY (`payment_status_id`) REFERENCES `payment_status` (`id`),
  CONSTRAINT `fk_visas_payment_status2` FOREIGN KEY (`payment_status_id1`) REFERENCES `payment_status` (`id`),
  CONSTRAINT `fk_visas_submission_type1` FOREIGN KEY (`submission_type_id`) REFERENCES `submission_type` (`id`),
  CONSTRAINT `fk_visas_visa_category1` FOREIGN KEY (`visa_category_id`) REFERENCES `visa_category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visas`
--

LOCK TABLES `visas` WRITE;
/*!40000 ALTER TABLE `visas` DISABLE KEYS */;
/*!40000 ALTER TABLE `visas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-12 11:22:55
