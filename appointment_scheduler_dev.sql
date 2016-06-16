-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: scheduler_db
-- ------------------------------------------------------
-- Server version	5.6.28-1

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) unsigned NOT NULL,
  `emp_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `accounts_emp_num_unique` (`emp_num`),
  KEY `accounts_employee_id_foreign` (`employee_id`),
  CONSTRAINT `accounts_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agendas`
--

DROP TABLE IF EXISTS `agendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `appointment_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `agendas_appointment_id_foreign` (`appointment_id`),
  CONSTRAINT `agendas_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendas`
--

LOCK TABLES `agendas` WRITE;
/*!40000 ALTER TABLE `agendas` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment_department`
--

DROP TABLE IF EXISTS `appointment_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment_department` (
  `appointment_id` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment_department`
--

LOCK TABLES `appointment_department` WRITE;
/*!40000 ALTER TABLE `appointment_department` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment_employee`
--

DROP TABLE IF EXISTS `appointment_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment_employee` (
  `appointment_id` int(10) unsigned NOT NULL,
  `employee_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment_employee`
--

LOCK TABLES `appointment_employee` WRITE;
/*!40000 ALTER TABLE `appointment_employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `set_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `purpose` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employee_id` int(10) unsigned NOT NULL,
  `venue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Information Technology','2016-05-23 23:23:37','2016-05-23 23:23:37'),(2,'Executive Office','2016-05-23 23:23:37','2016-05-23 23:23:37'),(3,'Quality Management Representative','2016-05-23 23:23:37','2016-05-23 23:23:37'),(4,'Office of the Student Affairs','2016-05-23 23:23:37','2016-05-23 23:23:37'),(5,'Registrar','2016-05-23 23:23:37','2016-05-23 23:23:37'),(6,'Sickbay','2016-05-23 23:23:37','2016-05-23 23:23:37'),(7,'Guidance','2016-05-23 23:23:37','2016-05-23 23:23:37'),(8,'Library','2016-05-23 23:23:38','2016-05-23 23:23:38'),(9,'Finance','2016-05-23 23:23:38','2016-05-23 23:23:38'),(10,'Campus Management Office','2016-05-23 23:23:38','2016-05-23 23:23:38'),(11,'Corporate Relations','2016-05-23 23:23:38','2016-05-23 23:23:38'),(12,'Human Resource','2016-05-23 23:23:38','2016-05-23 23:23:38'),(13,'Maritime Affairs','2016-05-23 23:23:38','2016-05-23 23:23:38'),(14,'Center of Competency and Assessment','2016-05-23 23:23:38','2016-05-23 23:23:38'),(15,'Research','2016-05-23 23:23:38','2016-05-23 23:23:38'),(16,'TESDA Program','2016-05-23 23:23:38','2016-05-23 23:23:38'),(17,'Alumni Office','2016-05-23 23:23:38','2016-05-23 23:23:38'),(18,'NROTC','2016-05-23 23:23:38','2016-05-23 23:23:38'),(19,'Academic','2016-05-23 23:23:38','2016-05-23 23:23:38'),(20,'Shipboard Training Office','2016-05-23 23:23:38','2016-05-23 23:23:38'),(21,'Marine Engineering','2016-05-23 23:23:38','2016-05-23 23:23:38'),(22,'Marine Transportation','2016-05-23 23:23:38','2016-05-23 23:23:38'),(23,'Customs Administration','2016-05-23 23:23:38','2016-05-23 23:23:38'),(24,'Senior High School','2016-05-23 23:23:38','2016-05-23 23:23:38');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `level_id` int(10) unsigned NOT NULL,
  `position_id` int(10) unsigned NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `account_id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_emp_num_unique` (`emp_num`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'254-09-01','Emmanuel','Carlos','Navarro','',1,2,34,'',NULL,'2016-05-23 23:23:41','2016-06-04 00:55:04',0,'mmfi.mst@gmail.com'),(2,'102-06-93','Sabino Czar','Cloma','Manglicmot','II',2,1,2,'',NULL,'2016-05-23 23:23:41','2016-05-23 23:23:41',0,'mmfi.mst@gmail.com'),(4,'134-09-93','Rosabella','Cuadra','Manglicmot','',9,2,6,'',NULL,'2016-05-23 23:23:42','2016-05-23 23:23:42',0,'mmfi.mst@gmail.com'),(5,'208-08-97','Rachel','Luga','Manglicmot','',3,1,3,'',NULL,'2016-05-23 23:23:42','2016-05-23 23:23:42',0,'mmfi.mst@gmail.com'),(11,'192-07-96','Maricel','Salonga','Esguerra','',19,2,20,'',NULL,'2016-06-04 01:08:51','2016-06-04 01:08:51',0,'mmfi.mst@gmail.com'),(12,'117-06-93','Jennilyn','Alcantara','Del Rosario','',19,2,20,'',NULL,'2016-06-04 01:10:07','2016-06-04 01:10:07',0,'mmfi.mst@gmail.com'),(13,'499-08-14','Rowena','Sarsalejo','Gomez','',8,2,41,'',NULL,'2016-06-04 01:10:55','2016-06-04 01:10:55',0,'mmfi.mst@gmail.com'),(14,'516-04-15','Richard','Lamban','Oandasan','',19,2,10,'',NULL,'2016-06-04 01:13:47','2016-06-04 01:13:47',0,'mmfi.mst@gmail.com'),(15,'373-06-11','Manolito','Solis','Cayabyab','',19,2,19,'',NULL,'2016-06-04 01:14:29','2016-06-04 01:14:29',0,'mmfi.mst@gmail.com'),(16,'375-07-11','Nestor','Reyes','Sanglay','',10,2,27,'',NULL,'2016-06-04 01:15:56','2016-06-04 01:15:56',0,'mmfi.mst@gmail.com'),(18,'318-11-06','Citadel','Barcelona','Punzal','',16,2,18,'',NULL,'2016-06-04 01:18:39','2016-06-04 01:18:39',0,'mmfi.mst@gmail.com'),(19,'313-07-06','Jemmuel','Caluya','Roque','',4,2,15,'',NULL,'2016-06-04 01:20:11','2016-06-04 01:20:11',0,'mmfi.mst@gmail.com'),(20,'1','Anita','Rivera','Cabalce','',5,2,23,'',NULL,'2016-06-04 01:21:47','2016-06-04 01:21:47',0,'mmfi.mst@gmail.com');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,'Executive Level','2016-05-23 23:23:41','2016-05-23 23:23:41'),(2,'Managerial Level','2016-05-23 23:23:41','2016-05-23 23:23:41'),(3,'Operational Level','2016-05-23 23:23:41','2016-05-23 23:23:41');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_04_26_065716_create_employees_table',1),('2016_04_26_072306_create_departments_table',1),('2016_04_26_072347_create_positions_table',1),('2016_04_26_072428_create_levels_table',1),('2016_04_26_073007_create_appointments_table',1),('2016_04_26_074832_create_agendas_table',1),('2016_04_26_080841_create_appointment_employee_table',1),('2016_04_26_080931_create_appointment_department_table',1),('2016_05_04_062417_add_subject_column_to_appointments_table',1),('2016_05_06_024846_add_employee_id_to_appointments_table',1),('2016_05_11_022143_add_id_column_to_appointment_employee_table',1),('2016_05_14_030834_add_id_column_to_appointment_department_table',1),('2016_05_18_005220_create_accounts_table',1),('2016_05_20_070746_add_status_column_to_appointment_employee_table',2),('2016_05_20_101336_add_venue_column_to_appointments_table',3),('2016_05_20_111412_add_account_id_column_to_employees_table',4),('2016_05_21_170945_add_email_column_to_employees_table',4),('2016_05_21_215829_add_notes_column_to_appointments_table',4),('2016_05_21_215905_add_notes_column_to_appointment_employee_table',4),('2016_06_06_011321_add_reason_column_to_appointments_table',5),('2016_06_06_012315_add_reason_column_to_appointment_employee_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (1,'President','2016-05-23 23:23:38','2016-05-23 23:23:38'),(2,'Chief Executive Officer','2016-05-23 23:23:38','2016-05-23 23:23:38'),(3,'Quality Management Representative Head','2016-05-23 23:23:38','2016-05-23 23:23:38'),(4,'Academics Director','2016-05-23 23:23:39','2016-05-23 23:23:39'),(5,'Human Resource Director','2016-05-23 23:23:39','2016-05-23 23:23:39'),(6,'Finance Director','2016-05-23 23:23:39','2016-05-23 23:23:39'),(7,'Corporate Relations Director','2016-05-23 23:23:39','2016-05-23 23:23:39'),(8,'Executive Secretary','2016-05-23 23:23:39','2016-05-23 23:23:39'),(9,'Executive Staff','2016-05-23 23:23:39','2016-05-23 23:23:39'),(10,'Assistant Academic Director','2016-05-23 23:23:39','2016-05-23 23:23:39'),(11,'Assistant Finance Director','2016-05-23 23:23:39','2016-05-23 23:23:39'),(12,'Payroll Officer','2016-05-23 23:23:39','2016-05-23 23:23:39'),(13,'Cashier','2016-05-23 23:23:39','2016-05-23 23:23:39'),(14,'Purchaser','2016-05-23 23:23:39','2016-05-23 23:23:39'),(15,'Student Affairs Director','2016-05-23 23:23:39','2016-05-23 23:23:39'),(16,'Guidance Coordinator','2016-05-23 23:23:39','2016-05-23 23:23:39'),(17,'Dean','2016-05-23 23:23:39','2016-05-23 23:23:39'),(18,'Program Chair','2016-05-23 23:23:39','2016-05-23 23:23:39'),(19,'Assistant Program Chair','2016-05-23 23:23:39','2016-05-23 23:23:39'),(20,'Academic Coordinator','2016-05-23 23:23:39','2016-05-23 23:23:39'),(21,'Course Coordinator','2016-05-23 23:23:39','2016-05-23 23:23:39'),(22,'Faculty','2016-05-23 23:23:39','2016-05-23 23:23:39'),(23,'Registrar','2016-05-23 23:23:39','2016-05-23 23:23:39'),(24,'Assistant Registrar','2016-05-23 23:23:39','2016-05-23 23:23:39'),(25,'Registrar Evaluator','2016-05-23 23:23:40','2016-05-23 23:23:40'),(26,'Staff','2016-05-23 23:23:40','2016-05-23 23:23:40'),(27,'Campus Management Head','2016-05-23 23:23:40','2016-05-23 23:23:40'),(28,'Assistant Campus Management Head','2016-05-23 23:23:40','2016-05-23 23:23:40'),(29,'Student Discipline Head','2016-05-23 23:23:40','2016-05-23 23:23:40'),(30,'EX-O','2016-05-23 23:23:40','2016-05-23 23:23:40'),(31,'School Nurse','2016-05-23 23:23:40','2016-05-23 23:23:40'),(32,'Research Head','2016-05-23 23:23:40','2016-05-23 23:23:40'),(33,'Curriculum Instructions and Supervisor','2016-05-23 23:23:40','2016-05-23 23:23:40'),(34,'Information Technology Head','2016-05-23 23:23:40','2016-05-23 23:23:40'),(35,'Property Custodian','2016-05-23 23:23:40','2016-05-23 23:23:40'),(36,'School Driver','2016-05-23 23:23:40','2016-05-23 23:23:40'),(37,'Maintenance','2016-05-23 23:23:40','2016-05-23 23:23:40'),(38,'Information Officer','2016-05-23 23:23:40','2016-05-23 23:23:40'),(39,'Facilitator','2016-05-23 23:23:40','2016-05-23 23:23:40'),(40,'Shipboard Training Officer','2016-05-23 23:23:40','2016-05-23 23:23:40'),(41,'Librarian','2016-05-23 23:23:40','2016-05-23 23:23:40'),(42,'Assistant Librarian','2016-05-23 23:23:41','2016-05-23 23:23:41'),(43,'Library Aide','2016-05-23 23:23:41','2016-05-23 23:23:41'),(44,'School Physician','2016-05-23 23:23:41','2016-05-23 23:23:41'),(45,'School Dentist','2016-05-23 23:23:41','2016-05-23 23:23:41'),(46,'Guidance Facilitator','2016-05-23 23:23:41','2016-05-23 23:23:41'),(47,'Sports Coordinator','2016-05-23 23:23:41','2016-05-23 23:23:41'),(48,'Coach','2016-05-23 23:23:41','2016-05-23 23:23:41'),(49,'Assitant Coach','2016-05-23 23:23:41','2016-05-23 23:23:41'),(50,'Trainers','2016-05-23 23:23:41','2016-05-23 23:23:41'),(51,'Internal Auditor','2016-05-23 23:23:41','2016-05-23 23:23:41');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2016-06-16 10:26:24
