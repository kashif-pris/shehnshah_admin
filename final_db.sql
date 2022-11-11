-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: shenshaw
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `city_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('Active','In-Active') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,1,'Banyan tree','Active','2022-07-19 09:46:32','2022-07-20 01:59:39',1),(2,2,'admin','Active','2022-07-19 10:35:14','2022-07-20 00:35:57',1),(3,4,'Hotel','Active','2022-07-20 01:38:24','2022-07-20 01:38:24',1),(4,6,'ff','Active','2022-07-27 04:38:03','2022-07-27 04:38:03',1),(5,2,'hamza','Active','2022-08-10 00:15:42','2022-08-10 00:15:42',1),(6,2,'gg','Active','2022-08-10 00:17:59','2022-08-10 00:18:13',1),(7,9,'lk','Active','2022-08-10 05:17:29','2022-08-10 05:17:41',1),(8,1,'Test Area','Active','2022-08-15 12:32:14','2022-08-15 12:32:14',1);
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_drafts`
--

DROP TABLE IF EXISTS `booking_drafts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_drafts` (
  `id` int NOT NULL,
  `businessId` int DEFAULT NULL,
  `serviceId` int DEFAULT NULL,
  `offeringId` int DEFAULT NULL,
  `customerId` int DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `walkinBooking` tinyint(1) DEFAULT NULL,
  `business` json DEFAULT NULL,
  `customer` json DEFAULT NULL,
  `vehicle` json DEFAULT NULL,
  `offering` json DEFAULT NULL,
  `queue` json DEFAULT NULL,
  `slot` json DEFAULT NULL,
  `discount` json DEFAULT NULL,
  `coupon` json DEFAULT NULL,
  `invoice` json DEFAULT NULL,
  `payment` json DEFAULT NULL,
  `worker` json DEFAULT NULL,
  `startDate` timestamp NULL DEFAULT NULL,
  `endDate` timestamp NULL DEFAULT NULL,
  `status` varchar(45) DEFAULT 'Draft',
  `rate` tinyint(1) DEFAULT NULL,
  `reviewId` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `_updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_drafts`
--

LOCK TABLES `booking_drafts` WRITE;
/*!40000 ALTER TABLE `booking_drafts` DISABLE KEYS */;
INSERT INTO `booking_drafts` VALUES (39,1,1,NULL,NULL,'2022-05-31 11:43:02',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"price\": 25, \"specs\": [\"SUV\"], \"title\": \"Body Wash\", \"cover1\": \"bw-cover_1.png\", \"cover2\": \"bw-cover_2.png\", \"gallery\": [\"1\", \"2\", \"3\"], \"options\": [\"Body Wash\", \"Option2\"], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"subTitle\": \"Body Wash Sub Title\", \"postGrace\": 5, \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1, \"processTime\": 20, \"processGrace\": 10}','{\"id\": 1, \"alias\": \"Q1\", \"title\": \"Queue One\"}','{\"to\": [8, 0], \"end\": [7, 40], \"date\": \"2022-04-05\", \"from\": [7, 0], \"start\": [7, 10]}',NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}','{\"amount\": 26.25, \"method\": \"Cash\", \"reference\": \"cash\"}','{\"id\": 1, \"image\": \"w_img.png\", \"phone\": \"971507285969\", \"title\": \"zaka\"}',NULL,'2022-04-10 13:26:47','Draft',NULL,NULL,'2022-06-01 14:13:21','2022-06-01 14:13:21','2022-06-01 18:53:41','2022-06-01 18:53:41'),(40,NULL,NULL,NULL,NULL,'2022-05-30 11:43:02',0,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"price\": 25, \"specs\": [\"SUV\"], \"title\": \"Body Wash\", \"cover1\": \"bw-cover_1.png\", \"cover2\": \"bw-cover_2.png\", \"gallery\": [\"1\", \"2\", \"3\"], \"options\": [\"Body Wash\", \"Option2\"], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"subTitle\": \"Body Wash Sub Title\", \"postGrace\": 5, \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1, \"processTime\": 20, \"processGrace\": 10}',NULL,NULL,'{\"rate\": 10, \"title\": \"Flat 10% Discount\"}',NULL,'{\"tax\": 1.13, \"total\": 23.63, \"value\": 25, \"discount\": 2.5, \"subTotal\": 22.5, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\", \"discountTitle\": \"Flat 10% Discount\"}',NULL,NULL,'2022-04-10 13:05:37','2022-04-10 13:05:37','Draft',NULL,NULL,'2022-05-31 23:58:53','2022-05-31 23:58:53','2022-06-01 18:53:41','2022-06-01 18:53:41'),(41,NULL,NULL,NULL,NULL,'2022-05-29 11:43:02',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"price\": 25, \"specs\": [\"SUV\"], \"title\": \"Body Wash\", \"cover1\": \"bw-cover_1.png\", \"cover2\": \"bw-cover_2.png\", \"gallery\": [\"1\", \"2\", \"3\"], \"options\": [\"Body Wash\", \"Option2\"], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"subTitle\": \"Body Wash Sub Title\", \"postGrace\": 5, \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1, \"processTime\": 20, \"processGrace\": 10}',NULL,NULL,'{\"rate\": 10, \"title\": \"Flat 10% Discount\"}',NULL,'{\"tax\": 1.13, \"total\": 23.63, \"value\": 25, \"discount\": 2.5, \"subTotal\": 22.5, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\", \"discountTitle\": \"Flat 10% Discount\"}',NULL,NULL,'2022-04-10 13:05:37','2022-04-10 13:05:37','Draft',NULL,NULL,'2022-05-31 23:58:53','2022-05-31 23:58:53','2022-06-01 18:53:41','2022-06-01 18:53:41'),(42,NULL,NULL,NULL,NULL,'2022-05-28 11:43:02',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-04-10 13:05:37','2022-04-10 13:05:37','Draft',NULL,NULL,'2022-05-31 23:54:16','2022-05-31 23:54:16','2022-06-01 18:53:41','2022-06-01 18:53:41'),(43,1,1,NULL,NULL,'2022-05-27 11:43:02',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"price\": 25, \"specs\": [\"SUV\"], \"title\": \"Body Wash\", \"cover1\": \"bw-cover_1.png\", \"cover2\": \"bw-cover_2.png\", \"gallery\": [\"1\", \"2\", \"3\"], \"options\": [\"Body Wash\", \"Option2\"], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"subTitle\": \"Body Wash Sub Title\", \"postGrace\": 5, \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1, \"processTime\": 20, \"processGrace\": 10}',NULL,NULL,'{\"rate\": 10, \"title\": \"Flat 10% Discount\"}',NULL,'{\"tax\": 1.13, \"total\": 23.63, \"value\": 25, \"discount\": 2.5, \"subTotal\": 22.5, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\", \"discountTitle\": \"Flat 10% Discount\"}',NULL,NULL,'2022-04-10 13:05:37','2022-04-10 13:05:37','Draft',NULL,NULL,'2022-05-31 23:54:16','2022-05-31 23:54:16','2022-06-01 18:53:41','2022-06-01 18:53:41'),(44,1,1,NULL,NULL,'2022-05-28 17:29:27',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"price\": 25, \"specs\": [\"SUV\"], \"title\": \"Body Wash\", \"cover1\": \"bw-cover_1.png\", \"cover2\": \"bw-cover_2.png\", \"gallery\": [\"1\", \"2\", \"3\"], \"options\": [\"Body Wash\", \"Option2\"], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"subTitle\": \"Body Wash Sub Title\", \"postGrace\": 5, \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1, \"processTime\": 20, \"processGrace\": 10}',NULL,NULL,'{\"id\": 1, \"rate\": 10, \"cover\": \"discount_1_cover\", \"title\": \"Flat Discount 10%\", \"value\": null, \"businessId\": 1, \"description\": \"Flat Discount 10%\"}',NULL,'{\"tax\": 1.13, \"total\": 23.63, \"value\": 25, \"discount\": 2.5, \"subTotal\": 22.5, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\", \"discountTitle\": \"Flat Discount 10%\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-05-31 23:35:34','2022-05-31 23:37:44','2022-06-01 18:53:41','2022-06-01 18:53:41'),(45,1,1,NULL,NULL,'2022-05-26 11:43:02',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"hours\": null, \"price\": 25, \"specs\": [\"SUV\"], \"title\": \"Body Wash\", \"breaks\": null, \"cover1\": \"bw-cover_1.png\", \"cover2\": \"bw-cover_2.png\", \"gallery\": [\"1\", \"2\", \"3\"], \"options\": [\"Body Wash\", \"Option2\"], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"subTitle\": \"Body Wash Sub Title\", \"postGrace\": 5, \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1, \"processTime\": 20, \"processGrace\": 10}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 14:53:10','2022-06-01 14:53:10','2022-06-01 18:53:41','2022-06-01 18:53:41'),(46,1,1,1,1,'2022-06-01 11:43:02',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"price\": 25, \"specs\": [\"SUV\"], \"title\": \"Body Wash\", \"cover1\": \"bw-cover_1.png\", \"cover2\": \"bw-cover_2.png\", \"gallery\": [\"1\", \"2\", \"3\"], \"options\": [\"Body Wash\", \"Option2\"], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"subTitle\": \"Body Wash Sub Title\", \"postGrace\": 5, \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1, \"processTime\": 20, \"processGrace\": 10}','{\"id\": 1, \"alias\": \"Q1\", \"title\": \"Queue One\", \"walkin\": 0}','{\"to\": [9, 0], \"end\": [8, 40], \"date\": \"2022-05-28\", \"from\": [8, 0], \"start\": [8, 10]}','{\"id\": 1, \"rate\": 10, \"cover\": \"discount_1_cover\", \"title\": \"Flat Discount 10%\", \"value\": null, \"businessId\": 1, \"description\": \"Flat Discount 10%\"}',NULL,'{\"tax\": 1.13, \"total\": 23.63, \"value\": 25, \"discount\": 2.5, \"subTotal\": 22.5, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\", \"discountTitle\": \"Flat Discount 10%\"}','{\"amount\": 23.63, \"method\": \"Cash\", \"reference\": \"1234\"}','{\"id\": 1, \"image\": \"w_img.png\", \"phone\": \"971507285969\", \"title\": \"zaka\"}','2022-05-29 02:08:50','2022-05-29 03:51:49','Cancelled',NULL,NULL,'2022-06-01 15:05:40','2022-06-01 15:05:40','2022-06-01 18:53:41','2022-06-01 18:53:41'),(48,1,1,1,1,'2022-06-01 11:43:02',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubaii\", \"registration\": \"P 52789\"}','{\"id\": 1, \"price\": 25, \"specs\": [\"SUV\"], \"title\": \"Body Wash\", \"cover1\": \"bw-cover_1.png\", \"cover2\": \"bw-cover_2.png\", \"gallery\": [\"1\", \"2\", \"3\"], \"options\": [\"Body Wash\", \"Option2\"], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"subTitle\": \"Body Wash Sub Title\", \"postGrace\": 5, \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1, \"processTime\": 20, \"processGrace\": 10}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-05-31 23:49:02','2022-05-31 23:51:31','2022-06-01 18:53:41','2022-06-01 18:53:41'),(49,1,1,1,1,'2022-06-01 11:43:02',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"price\": 25, \"specs\": [\"SUV\"], \"title\": \"Body Wash\", \"cover1\": \"bw-cover_1.png\", \"cover2\": \"bw-cover_2.png\", \"gallery\": [\"1\", \"2\", \"3\"], \"options\": [\"Body Wash\", \"Option2\"], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"subTitle\": \"Body Wash Sub Title\", \"postGrace\": 5, \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1, \"processTime\": 20, \"processGrace\": 10}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:05:40','2022-06-01 15:05:40','2022-06-01 18:53:41','2022-06-01 18:53:41'),(50,1,1,1,1,'2022-06-01 11:43:02',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"specs\": [\"SUV\"], \"title\": \"Body Wash\", \"options\": [\"Body Wash\", \"Option2\"], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"subTitle\": \"Body Wash Sub Title\", \"postGrace\": 5, \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1, \"processTime\": 20, \"processGrace\": 10}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:05:40','2022-06-01 15:05:40','2022-06-01 18:53:41','2022-06-01 18:53:41'),(51,1,1,1,1,'2022-06-01 11:43:02',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}','{\"id\": 1, \"alias\": \"Q1\", \"title\": \"Queue One\", \"walkin\": 0}','{\"to\": [18, 50], \"end\": [18, 30], \"date\": \"2022-05-30\", \"from\": [17, 45], \"start\": [18, 0]}','{\"id\": 1, \"rate\": 10, \"cover\": \"discount_1_cover\", \"title\": \"Flat Discount 10%\", \"value\": null, \"businessId\": 1, \"description\": \"Flat Discount 10%\"}',NULL,'{\"tax\": 1.13, \"total\": 23.63, \"value\": 25, \"discount\": 2.5, \"subTotal\": 22.5, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\", \"discountTitle\": \"Flat Discount 10%\"}','{\"amount\": 23.63, \"method\": \"Cash\", \"reference\": \"1234\"}','{\"id\": 1, \"image\": \"w_img.png\", \"phone\": \"971507285969\", \"title\": \"zaka\"}','2022-05-30 14:32:01','2022-05-30 14:32:25','Completed',3,13,'2022-06-01 15:05:40','2022-06-01 15:05:40','2022-06-01 18:53:41','2022-06-01 18:53:41'),(52,1,1,1,1,'2022-06-01 15:08:19',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:09:04','2022-06-01 15:09:04','2022-06-01 18:53:41','2022-06-01 18:53:41'),(53,1,1,1,1,'2022-06-01 15:08:21',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:09:04','2022-06-01 15:09:04','2022-06-01 18:53:41','2022-06-01 18:53:41'),(54,1,1,1,1,'2022-06-01 15:08:23',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:09:04','2022-06-01 15:09:04','2022-06-01 18:53:41','2022-06-01 18:53:41'),(55,1,1,1,1,'2022-06-01 15:08:24',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:09:04','2022-06-01 15:09:04','2022-06-01 18:53:41','2022-06-01 18:53:41'),(56,1,1,1,1,'2022-06-01 15:16:32',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:17:30','2022-06-01 15:17:30','2022-06-01 18:53:41','2022-06-01 18:53:41'),(57,1,1,1,1,'2022-06-01 15:16:33',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:17:30','2022-06-01 15:17:30','2022-06-01 18:53:41','2022-06-01 18:53:41'),(58,1,1,1,1,'2022-06-01 15:16:34',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:17:30','2022-06-01 15:17:30','2022-06-01 18:53:41','2022-06-01 18:53:41'),(59,1,1,1,1,'2022-06-01 15:16:35',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:17:30','2022-06-01 15:17:30','2022-06-01 18:53:41','2022-06-01 18:53:41'),(60,1,1,1,1,'2022-06-01 15:16:36',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:17:30','2022-06-01 15:17:30','2022-06-01 18:53:41','2022-06-01 18:53:41'),(61,1,1,1,1,'2022-06-01 15:19:06',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:19:18','2022-06-01 15:19:18','2022-06-01 18:53:41','2022-06-01 18:53:41'),(62,1,1,1,1,'2022-06-01 15:19:07',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:19:18','2022-06-01 15:19:18','2022-06-01 18:53:41','2022-06-01 18:53:41'),(63,1,1,1,1,'2022-06-01 15:19:07',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:19:18','2022-06-01 15:19:18','2022-06-01 18:53:41','2022-06-01 18:53:41'),(64,1,1,1,1,'2022-06-01 15:19:08',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:19:18','2022-06-01 15:19:18','2022-06-01 18:53:41','2022-06-01 18:53:41'),(65,1,1,1,1,'2022-06-01 15:19:09',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:19:18','2022-06-01 15:19:18','2022-06-01 18:53:41','2022-06-01 18:53:41'),(66,1,1,1,1,'2022-06-01 15:19:10',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:19:18','2022-06-01 15:19:18','2022-06-01 18:53:41','2022-06-01 18:53:41'),(67,1,1,1,1,'2022-06-01 15:20:55',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:21:06','2022-06-01 15:21:06','2022-06-01 18:53:41','2022-06-01 18:53:41'),(68,1,1,1,1,'2022-06-01 15:20:56',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:21:06','2022-06-01 15:21:06','2022-06-01 18:53:41','2022-06-01 18:53:41'),(69,1,1,1,1,'2022-06-01 15:20:56',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:21:06','2022-06-01 15:21:06','2022-06-01 18:53:41','2022-06-01 18:53:41'),(70,1,1,1,1,'2022-06-01 15:20:57',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:21:06','2022-06-01 15:21:06','2022-06-01 18:53:41','2022-06-01 18:53:41'),(71,1,1,1,1,'2022-05-01 15:22:42',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:24:42','2022-06-01 15:24:42','2022-06-01 18:53:41','2022-06-01 18:53:41'),(72,1,1,1,1,'2022-05-01 15:22:42',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:24:42','2022-06-01 15:24:42','2022-06-01 18:53:41','2022-06-01 18:53:41'),(73,1,1,1,1,'2022-05-01 15:22:42',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 15:24:42','2022-06-01 15:24:42','2022-06-01 18:53:41','2022-06-01 18:53:41');
/*!40000 ALTER TABLE `booking_drafts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_history`
--

DROP TABLE IF EXISTS `booking_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_history` (
  `id` int NOT NULL,
  `businessId` int DEFAULT NULL,
  `serviceId` int DEFAULT NULL,
  `offeringId` int DEFAULT NULL,
  `customerId` int DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `walkinBooking` tinyint(1) DEFAULT NULL,
  `business` json DEFAULT NULL,
  `customer` json DEFAULT NULL,
  `vehicle` json DEFAULT NULL,
  `offering` json DEFAULT NULL,
  `queue` json DEFAULT NULL,
  `slot` json DEFAULT NULL,
  `discount` json DEFAULT NULL,
  `coupon` json DEFAULT NULL,
  `invoice` json DEFAULT NULL,
  `payment` json DEFAULT NULL,
  `worker` json DEFAULT NULL,
  `startDate` timestamp NULL DEFAULT NULL,
  `endDate` timestamp NULL DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `rate` tinyint(1) DEFAULT NULL,
  `reviewId` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isHistory` tinyint(1) DEFAULT '1',
  `_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `_updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_history`
--

LOCK TABLES `booking_history` WRITE;
/*!40000 ALTER TABLE `booking_history` DISABLE KEYS */;
INSERT INTO `booking_history` VALUES (74,1,1,1,1,'2022-05-01 15:22:42',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'No Show',NULL,NULL,NULL,NULL,1,'2022-06-01 18:55:38','2022-06-01 18:55:38'),(75,1,1,1,1,'2022-05-01 15:22:45',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'No Show',NULL,NULL,'2022-06-01 18:58:11','2022-06-01 19:03:25',1,'2022-06-01 19:03:30','2022-06-01 19:03:30'),(76,1,1,1,1,'2022-05-28 19:05:08',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Completed',3,NULL,'2022-06-01 19:05:08','2022-06-01 19:47:37',1,'2022-06-01 19:47:42','2022-06-01 19:47:42'),(77,1,1,1,1,'2022-05-01 19:05:09',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Suspended',NULL,NULL,'2022-06-01 19:05:09','2022-06-01 19:28:48',1,'2022-06-01 19:29:29','2022-06-01 19:29:29'),(78,1,1,1,1,'2022-05-21 19:05:10',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Completed',NULL,NULL,'2022-06-01 19:05:10','2022-06-01 19:47:37',1,'2022-06-01 19:47:42','2022-06-01 19:47:42'),(79,1,1,1,1,'2022-05-01 19:05:11',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Cancelled',NULL,NULL,'2022-06-01 19:05:11','2022-06-01 19:28:48',1,'2022-06-01 19:29:29','2022-06-01 19:29:29'),(80,1,1,1,1,'2022-05-01 19:05:12',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Completed',NULL,NULL,'2022-06-01 19:05:12','2022-06-01 22:37:07',1,'2022-06-01 22:37:15','2022-06-01 22:37:15'),(81,1,1,1,1,'2022-05-01 19:29:18',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Completed',NULL,NULL,'2022-06-01 19:29:18','2022-06-01 22:38:56',1,'2022-06-01 22:39:03','2022-06-01 22:39:03'),(82,1,1,1,1,'2022-05-01 20:58:09',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Completed',NULL,NULL,'2022-06-01 20:58:09','2022-06-01 22:40:57',1,'2022-06-01 22:41:02','2022-06-01 22:41:02'),(83,1,1,1,1,'2022-05-01 20:58:10',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Completed',NULL,NULL,'2022-06-01 20:58:10','2022-06-01 22:46:11',1,'2022-06-01 22:46:16','2022-06-01 22:46:16');
/*!40000 ALTER TABLE `booking_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `businessId` int DEFAULT NULL,
  `serviceId` int DEFAULT NULL,
  `offeringId` int DEFAULT NULL,
  `customerId` int DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `walkinBooking` tinyint(1) DEFAULT '0',
  `business` json DEFAULT NULL,
  `customer` json DEFAULT NULL,
  `vehicle` json DEFAULT NULL,
  `offering` json DEFAULT NULL,
  `queue` json DEFAULT NULL,
  `slot` json DEFAULT NULL,
  `discount` json DEFAULT NULL,
  `coupon` json DEFAULT NULL,
  `invoice` json DEFAULT NULL,
  `payment` json DEFAULT NULL,
  `worker` json DEFAULT NULL,
  `startDate` timestamp NULL DEFAULT NULL,
  `endDate` timestamp NULL DEFAULT NULL,
  `status` varchar(45) DEFAULT 'Draft',
  `rate` tinyint(1) DEFAULT NULL,
  `reviewId` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (84,1,1,1,1,'2022-06-01 20:58:11',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:11','2022-06-01 20:58:11'),(85,1,1,1,1,'2022-06-01 20:58:12',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:12','2022-06-01 20:58:12'),(86,1,1,1,1,'2022-06-01 20:58:12',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:12','2022-06-01 20:58:12'),(87,1,1,1,1,'2022-06-01 20:58:13',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:13','2022-06-01 20:58:13'),(88,1,1,1,1,'2022-06-01 20:58:14',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:14','2022-06-01 20:58:14'),(89,1,1,1,1,'2022-06-01 20:58:18',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:18','2022-06-01 20:58:18'),(90,1,1,1,1,'2022-06-01 20:58:20',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:20','2022-06-01 20:58:20'),(91,1,1,1,1,'2022-06-01 20:58:21',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:21','2022-06-01 20:58:21'),(92,1,1,1,1,'2022-06-01 20:58:22',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:22','2022-06-01 20:58:22'),(93,1,1,1,1,'2022-06-01 20:58:22',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:22','2022-06-01 20:58:22'),(94,1,1,1,1,'2022-06-01 20:58:23',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:23','2022-06-01 20:58:23'),(95,1,1,1,1,'2022-06-01 20:58:23',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:23','2022-06-01 20:58:23'),(96,1,1,1,1,'2022-06-01 20:58:24',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:24','2022-06-01 20:58:24'),(97,1,1,1,1,'2022-06-01 20:58:25',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:25','2022-06-01 20:58:25'),(98,1,1,1,1,'2022-06-01 20:58:25',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:25','2022-06-01 20:58:25'),(99,1,1,1,1,'2022-06-01 20:58:26',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:26','2022-06-01 20:58:26'),(100,1,1,1,1,'2022-06-01 20:58:27',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:27','2022-06-01 20:58:27'),(101,1,1,1,1,'2022-06-01 20:58:27',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:27','2022-06-01 20:58:27'),(102,1,1,1,1,'2022-06-01 20:58:28',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:28','2022-06-01 20:58:28'),(103,1,1,1,1,'2022-06-01 20:58:28',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:28','2022-06-01 20:58:28'),(104,1,1,1,1,'2022-06-01 20:58:29',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:29','2022-06-01 20:58:29'),(105,1,1,1,1,'2022-06-01 20:58:29',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:29','2022-06-01 20:58:29'),(106,1,1,1,1,'2022-06-01 20:58:30',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:30','2022-06-01 20:58:30'),(107,1,1,1,1,'2022-06-01 20:58:31',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:31','2022-06-01 20:58:31'),(108,1,1,1,1,'2022-06-01 20:58:31',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:31','2022-06-01 20:58:31'),(109,1,1,1,1,'2022-06-01 20:58:32',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:32','2022-06-01 20:58:32'),(110,1,1,1,1,'2022-06-01 20:58:33',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:33','2022-06-01 20:58:33'),(111,1,1,1,1,'2022-06-01 20:58:33',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:33','2022-06-01 20:58:33'),(112,1,1,1,1,'2022-06-01 20:58:34',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:34','2022-06-01 20:58:34'),(113,1,1,1,1,'2022-06-01 20:58:35',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:35','2022-06-01 20:58:35'),(114,1,1,1,1,'2022-06-01 20:58:35',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:35','2022-06-01 20:58:35'),(115,1,1,1,1,'2022-06-01 20:58:36',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:36','2022-06-01 20:58:36'),(116,1,1,1,1,'2022-06-01 20:58:36',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:36','2022-06-01 20:58:36'),(117,1,1,1,1,'2022-06-01 20:58:37',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:37','2022-06-01 20:58:37'),(118,1,1,1,1,'2022-06-01 20:58:37',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:37','2022-06-01 20:58:37'),(119,1,1,1,1,'2022-06-01 20:58:38',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:38','2022-06-01 20:58:38'),(120,1,1,1,1,'2022-06-01 20:58:40',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:40','2022-06-01 20:58:40'),(121,1,1,1,1,'2022-06-01 20:58:46',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:46','2022-06-01 20:58:46'),(122,1,1,1,1,'2022-06-01 20:58:49',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:49','2022-06-01 20:58:49'),(123,1,1,1,1,'2022-06-01 20:58:50',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:50','2022-06-01 20:58:50'),(124,1,1,1,1,'2022-06-01 20:58:51',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:51','2022-06-01 20:58:51'),(125,1,1,1,1,'2022-06-01 20:58:52',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:52','2022-06-01 20:58:52'),(126,1,1,1,1,'2022-06-01 20:58:52',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:52','2022-06-01 20:58:52'),(127,1,1,1,1,'2022-06-01 20:58:53',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:58:53','2022-06-01 20:58:53'),(128,1,1,1,1,'2022-06-01 20:59:08',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:08','2022-06-01 20:59:08'),(129,1,1,1,1,'2022-06-01 20:59:09',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:09','2022-06-01 20:59:09'),(130,1,1,1,1,'2022-06-01 20:59:09',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:09','2022-06-01 20:59:09'),(131,1,1,1,1,'2022-06-01 20:59:10',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:10','2022-06-01 20:59:10'),(132,1,1,1,1,'2022-06-01 20:59:11',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:11','2022-06-01 20:59:11'),(133,1,1,1,1,'2022-06-01 20:59:11',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:11','2022-06-01 20:59:11'),(134,1,1,1,1,'2022-06-01 20:59:12',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:12','2022-06-01 20:59:12'),(135,1,1,1,1,'2022-06-01 20:59:13',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:13','2022-06-01 20:59:13'),(136,1,1,1,1,'2022-06-01 20:59:13',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:13','2022-06-01 20:59:13'),(137,1,1,1,1,'2022-06-01 20:59:14',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:14','2022-06-01 20:59:14'),(138,1,1,1,1,'2022-06-01 20:59:14',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:14','2022-06-01 20:59:14'),(139,1,1,1,1,'2022-06-01 20:59:15',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:15','2022-06-01 20:59:15'),(140,1,1,1,1,'2022-06-01 20:59:15',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:15','2022-06-01 20:59:15'),(141,1,1,1,1,'2022-06-01 20:59:16',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:16','2022-06-01 20:59:16'),(142,1,1,1,1,'2022-06-01 20:59:16',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:16','2022-06-01 20:59:16'),(143,1,1,1,1,'2022-06-01 20:59:16',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:16','2022-06-01 20:59:16'),(144,1,1,1,1,'2022-06-01 20:59:17',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:17','2022-06-01 20:59:17'),(145,1,1,1,1,'2022-06-01 20:59:17',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:17','2022-06-01 20:59:17'),(146,1,1,1,1,'2022-06-01 20:59:18',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:18','2022-06-01 20:59:18'),(147,1,1,1,1,'2022-06-01 20:59:19',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:19','2022-06-01 20:59:19'),(148,1,1,1,1,'2022-06-01 20:59:20',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:20','2022-06-01 20:59:20'),(149,1,1,1,1,'2022-06-01 20:59:21',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:21','2022-06-01 20:59:21'),(150,1,1,1,1,'2022-06-01 20:59:21',1,NULL,'{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-01 20:59:21','2022-06-01 20:59:21'),(151,1,1,1,1,'2022-06-02 13:11:27',1,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}','{\"id\": 1, \"vin\": null, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1, \"businessId\": 1, \"offeringId\": 1}',NULL,NULL,NULL,NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-02 13:11:27','2022-06-02 13:11:27'),(152,1,1,1,1,'2022-06-05 02:58:20',0,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}',NULL,NULL,'{\"type\": \"icoupon\"}',NULL,'{}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-05 02:58:20','2022-06-05 02:58:20'),(153,1,1,1,1,'2022-06-05 02:58:52',0,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}',NULL,NULL,'{\"type\": \"icoupon\"}',NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"subTotal\": 25, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-05 02:58:52','2022-06-05 02:58:52'),(154,1,1,1,1,'2022-06-05 03:01:14',0,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}',NULL,NULL,'{\"type\": \"icoupon\"}',NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"subTotal\": 25, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-05 03:01:14','2022-06-05 03:01:14'),(155,1,1,1,1,'2022-06-05 03:04:14',0,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}',NULL,NULL,'{\"type\": \"icoupon\"}',NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"subTotal\": 25, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-05 03:04:14','2022-06-05 03:04:14'),(156,1,1,1,1,'2022-06-05 03:08:29',0,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}',NULL,NULL,'{\"rate\": 20, \"type\": \"icoupon\", \"cover\": \"cover\", \"title\": \"Coupon Title\", \"value\": null, \"discount\": 5, \"highlight\": \"Cash Voucher\", \"discountId\": 2}',NULL,'{\"tax\": 1, \"total\": 21, \"value\": 25, \"discount\": 5, \"subTotal\": 20, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\", \"discountTitle\": \"Coupon Title\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-05 03:08:29','2022-06-05 03:08:29'),(157,1,1,1,1,'2022-06-05 03:14:48',0,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}',NULL,NULL,'null',NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-06-05 03:14:48','2022-06-05 03:14:48'),(158,1,1,1,1,'2022-06-05 03:15:38',0,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}','{\"id\": 1, \"alias\": \"Q1\", \"title\": \"Queue One\", \"walkin\": 0}','{\"to\": [18, 50], \"end\": [18, 30], \"date\": \"2022-06-30\", \"from\": [17, 45], \"start\": [18, 0], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"postGrace\": 5, \"processTime\": 20, \"processGrace\": 10}','{\"rate\": 20, \"type\": \"coupon\", \"cover\": \"cover\", \"title\": \"Coupon Title\", \"value\": null, \"discount\": 5, \"highlight\": \"Cash Voucher\", \"discountId\": 1}',NULL,'{\"tax\": 1, \"type\": \"icoupon\", \"total\": 21, \"value\": 25, \"discount\": 5, \"subTotal\": 20, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\", \"discountTitle\": \"Coupon Title\"}','{\"amount\": 21, \"method\": \"Cash\", \"reference\": \"1234\"}',NULL,NULL,NULL,'Booked',NULL,NULL,'2022-06-05 03:15:38','2022-06-07 13:52:21'),(159,1,1,1,1,'2022-07-19 12:49:37',0,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}',NULL,NULL,'null',NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',5,14,'2022-07-19 12:49:37','2022-08-11 20:34:24'),(160,1,1,1,1,'2022-07-29 17:12:33',0,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}',NULL,NULL,'null',NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}',NULL,NULL,NULL,NULL,'Draft',NULL,NULL,'2022-07-29 17:12:33','2022-07-29 17:12:33'),(161,1,1,1,1,'2022-07-29 17:19:04',0,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}',NULL,NULL,'null',NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}','{\"amount\": 26.25, \"method\": \"Cash on Delivery\", \"reference\": \"1234x54\"}',NULL,NULL,NULL,'Draft',NULL,NULL,'2022-07-29 17:19:04','2022-08-10 20:22:21'),(162,1,1,1,1,'2022-08-10 18:24:57',1,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}','{\"id\": 1, \"alias\": \"Q1\", \"title\": \"Queue One\", \"walkin\": 0}','{\"id\": \"1_2022-8-11_8,0_8,10_8,40_9,0\", \"to\": [9, 0], \"end\": [8, 40], \"date\": \"2022-8-11\", \"from\": [8, 0], \"start\": [8, 10], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"postGrace\": 5, \"processTime\": 20, \"processGrace\": 10}','null',NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}','{\"amount\": 26.25, \"method\": \"Cash on Delivery\", \"reference\": \"1234x54\"}',NULL,NULL,NULL,'Draft',NULL,NULL,'2022-08-10 18:24:57','2022-08-10 20:22:05'),(163,1,1,1,1,'2022-08-10 19:53:23',1,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}','{\"id\": 1, \"alias\": \"Q1\", \"title\": \"Queue One\", \"walkin\": 0}','{\"id\": \"1_2022-8-11_17,45_18,0_18,30_18,50\", \"to\": [18, 50], \"end\": [18, 30], \"date\": \"2022-8-11\", \"from\": [17, 45], \"start\": [18, 0], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"postGrace\": 5, \"processTime\": 20, \"processGrace\": 10}','{\"rate\": 20, \"type\": \"coupon\", \"cover\": \"cover\", \"title\": \"Coupon Title\", \"value\": null, \"discount\": 5, \"highlight\": \"Cash Voucher\", \"discountId\": 1}',NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}','{\"amount\": 26.25, \"method\": \" \", \"reference\": \" \"}',NULL,'2022-08-12 05:13:27',NULL,'In Progress',NULL,NULL,'2022-08-10 19:53:23','2022-08-12 05:13:27'),(164,1,1,1,1,'2022-08-12 05:39:52',1,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}','{\"id\": 1, \"alias\": \"Q1\", \"title\": \"Queue One\", \"walkin\": 0}','{\"id\": \"1_2022-8-12_11,15_11,30_12,0_12,20\", \"to\": [12, 20], \"end\": [12, 0], \"date\": \"2022-8-12\", \"from\": [11, 15], \"start\": [11, 30], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"postGrace\": 5, \"processTime\": 20, \"processGrace\": 10}','{\"rate\": 20, \"type\": \"coupon\", \"cover\": \"cover\", \"title\": \"Coupon Title\", \"value\": null, \"discount\": 5, \"highlight\": \"Cash Voucher\", \"discountId\": 1}',NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}','{\"amount\": 26.25, \"method\": \" \", \"reference\": \" \"}',NULL,'2022-08-12 12:10:26','2022-08-12 14:08:03','Completed',NULL,NULL,'2022-08-12 05:39:52','2022-08-12 14:08:02'),(165,1,1,1,1,'2022-08-12 09:55:53',1,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}','{\"id\": 1, \"alias\": \"Q1\", \"title\": \"Queue One\", \"walkin\": 0}','{\"id\": \"1_2022-8-12_21,40_21,55_22,25_22,40\", \"to\": [22, 40], \"end\": [22, 25], \"date\": \"2022-8-12\", \"from\": [21, 40], \"start\": [21, 55], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"postGrace\": 5, \"processTime\": 20, \"processGrace\": 10}','{\"rate\": 20, \"type\": \"coupon\", \"cover\": \"cover\", \"title\": \"Coupon Title\", \"value\": null, \"discount\": 5, \"highlight\": \"Cash Voucher\", \"discountId\": 1}',NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}','{\"amount\": 26.25, \"method\": \"Cash on Delivery\", \"reference\": \"1234x54\"}',NULL,'2022-08-12 12:03:23','2022-08-12 14:24:49','Completed',NULL,NULL,'2022-08-12 09:55:53','2022-08-12 14:24:48'),(166,1,1,1,1,'2022-08-15 10:57:56',1,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"id\": 1, \"cover\": \"bw-cover_1.png\", \"price\": 25, \"title\": \"Body Wash\", \"subTitle\": \"Body Wash Sub Title\", \"serviceId\": 1}','{\"id\": 1, \"alias\": \"Q1\", \"title\": \"Queue One\", \"walkin\": 0}','{\"id\": \"1_2022-8-15_17,15_17,30_18,0_18,20\", \"to\": [18, 20], \"end\": [18, 0], \"date\": \"2022-8-15\", \"from\": [17, 15], \"start\": [17, 30], \"preTime\": 10, \"postTime\": 15, \"preGrace\": 5, \"postGrace\": 5, \"processTime\": 20, \"processGrace\": 10}','null',NULL,'{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Body Wash\"}','{\"amount\": 26.25, \"method\": \" \", \"reference\": \" \"}',NULL,NULL,NULL,'Draft',NULL,NULL,'2022-08-15 10:57:56','2022-08-15 10:58:34');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_customers`
--

DROP TABLE IF EXISTS `business_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business_customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `businessId` int DEFAULT NULL,
  `customerId` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_customers`
--

LOCK TABLES `business_customers` WRITE;
/*!40000 ALTER TABLE `business_customers` DISABLE KEYS */;
INSERT INTO `business_customers` VALUES (1,1,1,'2022-06-02 14:34:05','2022-06-02 14:34:05');
/*!40000 ALTER TABLE `business_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_offerings`
--

DROP TABLE IF EXISTS `business_offerings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business_offerings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `offeringId` int NOT NULL,
  `businessId` int NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `subTitle` varchar(250) DEFAULT NULL,
  `about` text,
  `cover` varchar(100) DEFAULT NULL,
  `gallery` json DEFAULT NULL,
  `price` double DEFAULT NULL,
  `preTime` int DEFAULT '0',
  `preGrace` int DEFAULT '0',
  `processTime` int DEFAULT NULL,
  `processGrace` int DEFAULT NULL,
  `postTime` int DEFAULT '0',
  `postGrace` int DEFAULT '0',
  `breaks` json DEFAULT NULL,
  `hours` json DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `couponIds` json DEFAULT NULL,
  `icouponIds` json DEFAULT NULL,
  `conditions` json DEFAULT NULL,
  `otherConditions` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_offerings`
--

LOCK TABLES `business_offerings` WRITE;
/*!40000 ALTER TABLE `business_offerings` DISABLE KEYS */;
INSERT INTO `business_offerings` VALUES (17,29,19,'AL Safeer Car Wash','AL Safeer Car Wash','AL Safeer Car Wash','http://localhost:8000/offering_cover/610911368.44.jpg','[\"http://localhost:8000/business_gallery/2029589705.kkkk.jpg\", \"http://localhost:8000/business_gallery/1131154410.44.jpg\"]',34,601,322,319,133,542,44,NULL,NULL,1,'null','null','{\"cashOnDelivery\": \"false\", \"advanceCancellation\": \"yes\", \"cancellationAllowed\": \"false\"}','[]','2022-08-18 10:53:29','2022-08-18 10:53:49'),(18,29,19,'AL Safeer Car Wash','AL Safeer Car Wash','AL Safeer Car Wash','http://localhost:8000/offering_cover/610911368.44.jpg','[\"http://localhost:8000/business_gallery/1558121425.44.jpg\"]',12,999,363,94,479,187,965,NULL,NULL,1,'null','[\"18\"]','{\"cashOnDelivery\": \"false\", \"advanceCancellation\": \"yes\", \"cancellationAllowed\": \"false\"}','[]','2022-08-18 10:55:20','2022-08-18 11:23:00'),(19,29,19,'AL Safeer Car Wash','AL Safeer Car Wash','AL Safeer Car Wash','http://localhost:8000/offering_cover/610911368.44.jpg','[\"http://127.0.0.1:8000/business_gallery/1191441364.44.jpg\"]',44,2,3,3,2,43,3,NULL,NULL,1,'null','[\"20\"]','{\"cashOnDelivery\": \"false\", \"advanceCancellation\": null, \"cancellationAllowed\": \"false\"}','[]','2022-08-18 23:42:05','2022-08-19 00:44:41'),(20,30,20,'car wash','dfhb','hj','http://127.0.0.1:8000/offering_cover/1918642216.44.jpg','[\"http://127.0.0.1:8000/business_gallery/173237343.44.jpg\"]',44,2,3,3,2,43,3,NULL,NULL,1,'null','null','{\"cashOnDelivery\": \"false\", \"advanceCancellation\": \"sdfse\", \"cancellationAllowed\": \"false\"}','[\"dsdcs\", \"test\"]','2022-08-19 00:32:32','2022-08-19 00:42:31'),(21,29,19,'sfs','efsd','dd','http://127.0.0.1:8000/offering_cover/1895314501.44.jpg','[\"http://127.0.0.1:8000/business_gallery/1146881341.44.jpg\"]',NULL,2,3,3,2,43,3,NULL,NULL,1,'null','null','{\"cashOnDelivery\": \"false\", \"advanceCancellation\": \"dfbgdf\", \"cancellationAllowed\": \"false\"}','[\"dsdcs\", \"gdf\"]','2022-08-19 00:53:17','2022-08-19 00:58:25'),(22,29,19,'Offering Full  body wash','Offering Full  body wash','AL Safeer Car Wash','http://localhost:8000/offering_cover/610911368.44.jpg','[\"http://127.0.0.1:8000/business_gallery/1701491907.kkkk.jpg\", \"http://127.0.0.1:8000/business_gallery/561931995.kkkk.jpg\"]',50,1,2,3,4,5,6,NULL,NULL,1,'[\"24\"]','null','{\"cashOnDelivery\": \"true\", \"advanceCancellation\": \"5\", \"cancellationAllowed\": \"true\"}','[\"1\", \"2\", \"3\", \"4\"]','2022-08-19 01:59:54','2022-08-19 08:27:17'),(24,29,19,'AL Safeer Car Wash','AL Safeer Car Wash','AL Safeer Car Wash','http://127.0.0.1:8000/offering_cover/1823408001.44.jpg','[\"http://127.0.0.1:8000/business_gallery/1506066884.44.jpg\"]',324,2,3,3,2,3,4,NULL,NULL,1,'[]','[]','{\"cashOnDelivery\": \"false\", \"advanceCancellation\": \"gthy\", \"cancellationAllowed\": \"false\"}','[\"dsdcs\"]','2022-08-22 06:27:10','2022-08-22 06:27:10');
/*!40000 ALTER TABLE `business_offerings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_services`
--

DROP TABLE IF EXISTS `business_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business_services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `businessId` int NOT NULL,
  `serviceId` int NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_services`
--

LOCK TABLES `business_services` WRITE;
/*!40000 ALTER TABLE `business_services` DISABLE KEYS */;
INSERT INTO `business_services` VALUES (1,1,1,1,'2022-06-02 14:38:07','2022-06-02 14:38:07'),(2,1,2,1,'2022-06-02 14:38:07','2022-06-02 14:38:07'),(3,2,1,1,'2022-08-15 09:27:16','2022-08-15 09:27:16'),(4,3,3,1,'2022-08-15 10:59:12','2022-08-15 10:59:12'),(5,4,3,1,'2022-08-15 11:11:35','2022-08-15 11:11:35'),(6,5,2,1,'2022-08-16 05:18:01','2022-08-16 05:18:01'),(7,6,2,1,'2022-08-16 05:28:00','2022-08-16 05:28:00'),(8,7,2,1,'2022-08-16 05:34:32','2022-08-16 05:34:32'),(9,8,2,1,'2022-08-16 05:51:55','2022-08-16 05:51:55'),(10,9,2,1,'2022-08-16 05:58:44','2022-08-16 05:58:44'),(11,10,2,1,'2022-08-16 06:05:01','2022-08-16 06:05:01'),(12,11,2,1,'2022-08-16 23:34:23','2022-08-16 23:34:23'),(13,12,2,1,'2022-08-16 23:49:16','2022-08-16 23:49:16'),(14,13,2,1,'2022-08-17 09:42:28','2022-08-17 09:42:28'),(15,14,2,1,'2022-08-18 01:54:31','2022-08-18 01:54:31'),(16,15,1,1,'2022-08-18 04:47:49','2022-08-18 04:47:49'),(17,16,1,1,'2022-08-18 04:51:09','2022-08-18 04:51:09'),(18,17,2,1,'2022-08-18 07:19:20','2022-08-18 07:19:20'),(19,18,1,1,'2022-08-18 07:52:52','2022-08-18 07:52:52'),(20,19,1,1,'2022-08-18 09:58:29','2022-08-18 09:58:29'),(21,20,1,1,'2022-08-19 00:15:13','2022-08-19 00:15:13'),(22,20,5,1,'2022-08-19 00:22:30','2022-08-19 00:22:30'),(23,21,2,1,'2022-08-19 02:10:45','2022-08-19 02:10:45'),(24,21,3,1,'2022-08-19 02:10:45','2022-08-19 02:10:45'),(25,22,2,1,'2022-08-19 05:11:38','2022-08-19 05:11:38'),(26,23,2,1,'2022-08-19 08:07:07','2022-08-19 08:07:07'),(27,24,2,1,'2022-08-22 05:47:57','2022-08-22 05:47:57');
/*!40000 ALTER TABLE `business_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_settings`
--

DROP TABLE IF EXISTS `business_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business_settings` (
  `id` bigint unsigned NOT NULL,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_settings`
--

LOCK TABLES `business_settings` WRITE;
/*!40000 ALTER TABLE `business_settings` DISABLE KEYS */;
INSERT INTO `business_settings` VALUES (1,'TimeZone',NULL,NULL,NULL),(2,'BusinessName','Shehnshah',NULL,NULL),(3,'Mobile','03078787841',NULL,NULL),(4,'BookingNotification','Yes',NULL,NULL),(5,'Image',NULL,NULL,NULL),(6,'Email','prismatic@gmail.com',NULL,NULL),(7,'Address','required',NULL,NULL),(9,'Vehicle','[\"\"]',NULL,NULL),(10,'Make','[\"\"]',NULL,NULL),(12,'Model','[\"\"]',NULL,NULL);
/*!40000 ALTER TABLE `business_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `businesses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `serviceId` int DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `settings` json DEFAULT NULL,
  `hours` json DEFAULT NULL,
  `breaks` json DEFAULT NULL,
  `intervals` json DEFAULT NULL,
  `iTitles` json DEFAULT NULL,
  `logo` varchar(145) DEFAULT NULL,
  `cover` varchar(145) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(145) DEFAULT 'United Arab Emirates',
  `lat` varchar(45) DEFAULT NULL,
  `lng` varchar(45) DEFAULT NULL,
  `about` text,
  `gallery` json DEFAULT NULL,
  `contact` json DEFAULT NULL,
  `rating` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesses`
--

LOCK TABLES `businesses` WRITE;
/*!40000 ALTER TABLE `businesses` DISABLE KEYS */;
INSERT INTO `businesses` VALUES (19,1,'AL Safeer Car Wash',NULL,'[[0, 0, 0, 0], [8, 0, 19, 0], [8, 0, 19, 0], [8, 0, 19, 0], [8, 0, 19, 0], [8, 0, 19, 0], [8, 0, 19, 0]]','[[0, 0, 0, 0], [13, 0, 14, 0], [13, 0, 14, 0], [13, 0, 14, 0], [13, 0, 14, 0], [13, 0, 14, 0], [13, 0, 14, 0]]',NULL,NULL,'http://localhost:8000/vendor_logo/1610739093.44.jpg','http://localhost:8000/vendor_cover/185682703.44.jpg','bank road, gujranwala','1','1','UAE','23.836768845635856','46.23427460937501','AL Safeer Car Wash','[\"http://localhost:8000/business_gallery/2058401399.kkkk.jpg\"]','{\"email\": \"Prismatic@customer.com\", \"phone\": \"31252625415\", \"webiste\": \"test@gmail.com\"}',NULL,'2022-08-18 09:58:29','2022-08-19 02:17:17'),(20,5,'car wash',NULL,'[[7, 30, 7, 30], [7, 30, 7, 30], [7, 30, 7, 30], [7, 30, 7, 30], [7, 30, 7, 30], [7, 30, 7, 30], [7, 30, 7, 30]]','[[8, 30, 9, 0], [8, 30, 9, 0], [8, 30, 9, 0], [8, 30, 9, 0], [8, 30, 9, 0], [8, 30, 9, 0], [8, 30, 9, 0]]',NULL,NULL,'http://127.0.0.1:8000/vendor_logo/2054167824.44.jpg','http://127.0.0.1:8000/vendor_cover/1153006546.44.jpg','fdgd','1','1','UAE','546364','67676767','sdf','[\"http://127.0.0.1:8000/business_gallery/1864321632.44.jpg\", \"http://127.0.0.1:8000/business_gallery/231887101.44.jpg\"]','{\"email\": \"Prismatic@customer.com\", \"phone\": \"31252625415\", \"webiste\": \"google.com\"}',NULL,'2022-08-19 00:15:13','2022-08-19 00:22:30'),(21,3,'Vendor Title',NULL,'[[0, 0, 0, 0], [8, 0, 20, 0], [8, 0, 20, 0], [8, 0, 20, 0], [8, 0, 20, 0], [8, 0, 20, 0], [8, 0, 20, 0]]','[[0, 0, 0, 0], [1, 0, 2, 0], [1, 0, 2, 0], [1, 0, 2, 0], [1, 0, 2, 0], [1, 0, 2, 0], [1, 0, 2, 0]]',NULL,NULL,'395757646.ee.jpg','1803975443.kkkk.jpg','bank road, gujranwala','1','1','UAE','23.414018698530228','54.71571992187501','dfb','[\"http://localhost:8000/business_gallery/817561973.ee.jpg\", \"1393035382.44.jpg\"]','{\"email\": \"Imti5476az@Imtiaz.com\", \"phone\": \"4574577557\", \"webiste\": \"google.com\"}',NULL,'2022-08-19 02:10:45','2022-08-19 05:07:50'),(22,2,'hf',NULL,'[[8, 0, 8, 0], [8, 0, 8, 0], [8, 0, 8, 0], [8, 0, 8, 0], [8, 0, 8, 0], [8, 0, 8, 0], [8, 0, 8, 0]]','[[7, 30, 7, 30], [7, 30, 7, 30], [7, 30, 7, 30], [7, 30, 7, 30], [7, 30, 7, 30], [7, 30, 7, 30], [7, 30, 7, 30]]',NULL,NULL,'http://localhost:8000/vendor_logo/1416371692.kkkk.jpg','http://localhost:8000/vendor_cover/323980091.44.jpg','fdg','1','1','UAE','25.13649487113741','51.28798554687501','fdvg','[\"http://localhost:8000/business_gallery/970839781.44.jpg\", \"http://localhost:8000/business_gallery/585782453.ee.jpg\", \"http://localhost:8000/business_gallery/237612012.44.jpg\", \"http://localhost:8000/business_gallery/434967352.44.jpg\", \"http://localhost:8000/business_gallery/22319616.kkkk.jpg\", \"http://localhost:8000/business_gallery/868614975.kkkk.jpg\", \"http://localhost:8000/business_gallery/2081879066.kkkk.jpg\", \"http://localhost:8000/business_gallery/728932603.44.jpg\"]','{\"email\": \"ChaseUp@ChaseUp.com\", \"phone\": \"31252628596\", \"webiste\": \"www.google.com\"}',NULL,'2022-08-19 05:11:38','2022-08-19 05:16:02'),(23,2,'Entry En',NULL,'[[8, 0, 20, 30], [8, 0, 20, 30], [8, 0, 20, 30], [8, 0, 20, 30], [8, 0, 20, 30], [8, 0, 20, 30], [8, 0, 20, 30]]','[[1, 30, 2, 30], [1, 30, 2, 30], [1, 30, 2, 30], [1, 30, 2, 30], [1, 30, 2, 30], [1, 30, 2, 30], [1, 30, 2, 30]]',NULL,NULL,'http://localhost:8000/vendor_logo/877819545.kkkk.jpg','http://localhost:8000/vendor_cover/725932956.ee.jpg','bank road, gujranwala','2','2','UAE','22.908979511699947','54.82558320312501','ddbffb','[\"http://localhost:8000/business_gallery/292898185.ee.jpg\"]','{\"email\": \"Prism345345atic@customer.com\", \"phone\": \"35344345\", \"webiste\": \"www.google.com\"}',NULL,'2022-08-19 08:07:07','2022-08-19 08:07:07'),(24,2,'dfgdg',NULL,'[[9, 30, 8, 30], [9, 30, 8, 30], [9, 30, 8, 30], [9, 30, 8, 30], [9, 30, 8, 30], [9, 30, 8, 30], [9, 30, 8, 30]]','[[6, 30, 8, 30], [6, 30, 8, 30], [6, 30, 8, 30], [6, 30, 8, 30], [6, 30, 8, 30], [6, 30, 8, 30], [6, 30, 8, 30]]',NULL,NULL,'http://127.0.0.1:8000/vendor_logo/366770820.44.jpg','http://127.0.0.1:8000/vendor_cover/1756126209.kkkk.jpg','cfgbf','1','1','UAE','25.339664189677436','51.68341674878002','fgbh','[\"http://127.0.0.1:8000/business_gallery/1464204806.44.jpg\", \"http://127.0.0.1:8000/business_gallery/654039329.kkkk.jpg\", \"http://127.0.0.1:8000/business_gallery/1352748309.44.jpg\"]','{\"email\": \"GYL2222@GYL1.com\", \"phone\": \"45435435\", \"webiste\": \"google.com\"}',NULL,'2022-08-22 05:47:57','2022-08-22 05:49:28');
/*!40000 ALTER TABLE `businesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `status` enum('Active','In-Active') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Zayed City','Active','2022-07-19 06:41:55','2022-07-20 01:59:12',1),(2,'Abu Dhabi','Active','2022-07-19 23:39:31','2022-07-19 23:39:31',1),(4,'Sharjah','Active','2022-07-20 00:13:49','2022-07-20 00:13:49',1),(5,'Ras Al-Khaimah','Active','2022-07-20 01:55:37','2022-07-20 01:55:37',1),(6,'dd','Active','2022-07-27 04:37:44','2022-07-27 04:37:44',1),(7,'sd','Active','2022-08-10 00:15:23','2022-08-10 00:15:23',1),(8,'ss','Active','2022-08-10 00:17:31','2022-08-10 00:17:46',1),(9,'adminb','Active','2022-08-10 05:17:02','2022-08-10 05:17:11',1);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon_history`
--

DROP TABLE IF EXISTS `coupon_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon_history` (
  `id` int NOT NULL,
  `businessId` int DEFAULT NULL,
  `serviceId` int DEFAULT NULL,
  `title` varchar(145) DEFAULT NULL,
  `subTitle` varchar(145) DEFAULT NULL,
  `about` text,
  `cover` varchar(145) DEFAULT NULL,
  `highlight` varchar(145) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discountRate` int DEFAULT NULL,
  `discountValue` int DEFAULT NULL,
  `isInstant` tinyint(1) DEFAULT NULL,
  `saleConditions` json DEFAULT NULL,
  `useConditions` json DEFAULT NULL,
  `otherConditions` json DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isHistory` tinyint(1) DEFAULT '1',
  `_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `_updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon_history`
--

LOCK TABLES `coupon_history` WRITE;
/*!40000 ALTER TABLE `coupon_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupon_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon_sale`
--

DROP TABLE IF EXISTS `coupon_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon_sale` (
  `id` int NOT NULL AUTO_INCREMENT,
  `businessId` int DEFAULT NULL,
  `couponId` int DEFAULT NULL,
  `coupon` json DEFAULT NULL,
  `serviceId` int DEFAULT NULL,
  `customerId` int DEFAULT NULL,
  `business` json DEFAULT NULL,
  `customer` json DEFAULT NULL,
  `vehicle` json DEFAULT NULL,
  `conditions` json DEFAULT NULL,
  `otherConditions` json DEFAULT NULL,
  `invoice` json DEFAULT NULL,
  `payment` json DEFAULT NULL,
  `status` varchar(45) DEFAULT 'Draft',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon_sale`
--

LOCK TABLES `coupon_sale` WRITE;
/*!40000 ALTER TABLE `coupon_sale` DISABLE KEYS */;
INSERT INTO `coupon_sale` VALUES (1,1,1,'{\"about\": \"About Coupon\", \"cover\": \"cover\", \"price\": 50.5, \"title\": \"Coupon Title\", \"subTitle\": \"Coupon Sub Title\", \"highlight\": \"Cash Voucher\", \"discountRate\": 10, \"discountValue\": null}',NULL,1,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}',NULL,'{\"to\": \"2022-07-28\", \"days\": \"[\'Monday\']\", \"from\": \"2022-05-28\", \"shifts\": \"[\'Morning\']\", \"dailyLimit\": 1, \"totalLimit\": 1, \"valueLimit\": 700, \"weeklyLimit\": 1, \"yearlyLimit\": 1, \"monthlyLimit\": 1, \"discountLimit\": 300, \"advanceBooking\": 24}','[\"other condition 1\", \"other condition 2\"]','{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Coupon Title\"}',NULL,'Used','2022-06-02 21:14:58','2022-06-02 21:14:58','2022-06-07 16:01:08'),(2,1,1,'{\"about\": \"About Coupon\", \"cover\": \"cover\", \"price\": 50.5, \"title\": \"Coupon Title\", \"subTitle\": \"Coupon Sub Title\", \"highlight\": \"Cash Voucher\", \"discountRate\": 10, \"discountValue\": null}',NULL,1,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}',NULL,'{\"to\": \"2022-07-28\", \"days\": \"[\'Monday\']\", \"from\": \"2022-05-28\", \"shifts\": \"[\'Morning\']\", \"dailyLimit\": 1, \"totalLimit\": 1, \"valueLimit\": 700, \"weeklyLimit\": 1, \"yearlyLimit\": 1, \"monthlyLimit\": 1, \"discountLimit\": 300, \"advanceBooking\": 24}','[\"other condition 1\", \"other condition 2\"]','{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Coupon Title\"}','{\"amount\": 26.25}','Bought','2022-06-01 21:14:58','2022-06-02 21:14:58','2022-08-10 19:19:56'),(3,1,1,'{\"about\": \"About Coupon\", \"cover\": \"cover\", \"price\": 50.5, \"title\": \"Coupon Title\", \"subTitle\": \"Coupon Sub Title\", \"highlight\": \"Cash Voucher\", \"discountRate\": 10, \"discountValue\": null}',NULL,1,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\", \"ownerBusinessId\": 1, \"selectedVehicle\": 1}',NULL,'{\"to\": \"2022-05-28\", \"days\": \"[\'Monday\']\", \"from\": \"2022-04-28\", \"shifts\": \"[\'Morning\']\", \"dailyLimit\": 1, \"totalLimit\": 1, \"valueLimit\": 700, \"weeklyLimit\": 1, \"yearlyLimit\": 1, \"monthlyLimit\": 1, \"discountLimit\": 300, \"advanceBooking\": 24}','[\"other condition 1\", \"other condition 2\"]','{\"tax\": 1.25, \"total\": 26.25, \"value\": 25, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Coupon Title\"}',NULL,'Sold','2021-05-31 21:14:58','2022-06-02 21:14:58','2022-06-06 14:18:52'),(4,1,1,'{\"id\": 1, \"cover\": \"cover\", \"price\": 50.5, \"title\": \"Coupon Title\", \"subTitle\": \"Coupon Sub Title\", \"highlight\": \"Cash Voucher\", \"serviceId\": 1}',1,1,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"to\": \"2022-06-05\", \"from\": \"2022-06-01\", \"dailyLimit\": 4, \"totalLimit\": 4, \"weeklyLimit\": 4, \"yearlyLimit\": 4, \"monthlyLimit\": 4}',NULL,'{\"tax\": 2.53, \"total\": 53.03, \"value\": 50.5, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Coupon Title\"}',NULL,NULL,'2022-06-06 18:00:17','2022-06-06 18:00:17','2022-07-29 17:28:36'),(5,1,1,'{\"id\": 1, \"cover\": \"cover\", \"price\": 50.5, \"title\": \"Coupon Title\", \"subTitle\": \"Coupon Sub Title\", \"highlight\": \"Cash Voucher\", \"serviceId\": 1}',1,1,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"to\": \"2022-06-05\", \"from\": \"2022-06-01\", \"dailyLimit\": 4, \"totalLimit\": 4, \"weeklyLimit\": 4, \"yearlyLimit\": 4, \"monthlyLimit\": 4}','\"[\'Can be redeemed with online booking only\', \'Redeemed coupon can not be claimed back upon booking cancellation\']\"','{\"tax\": 2.53, \"total\": 53.03, \"value\": 50.5, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Coupon Title\"}','{\"amount\": 53.03, \"method\": \"Cash\", \"reference\": \"1234\"}','Bought','2022-06-06 18:07:15','2022-06-06 18:07:15','2022-06-06 18:20:16'),(6,1,2,'{\"id\": 1, \"cover\": \"cover\", \"price\": 50.5, \"title\": \"Coupon Title\", \"subTitle\": \"Coupon Sub Title\", \"highlight\": \"Cash Voucher\", \"serviceId\": 1}',1,1,'{\"id\": 1, \"lat\": \"lat\", \"lng\": \"lng\", \"area\": \"area\", \"city\": \"city\", \"logo\": \"logo.png\", \"title\": \"AL Safeer Car Wash\", \"street\": \"street\"}','{\"id\": 1, \"name\": \"zaka\", \"email\": \"zakashah@hotmail.com\", \"image\": \"zaka_pr.png\", \"mobile\": \"971-507285969\"}','{\"id\": 1, \"make\": \"Toyota\", \"type\": \"Sedan\", \"year\": 2014, \"color\": \"Grey\", \"model\": \"Corolla\", \"emirate\": \"Dubai\", \"registration\": \"P 52789\"}','{\"to\": \"2022-06-05\", \"from\": \"2022-06-01\", \"dailyLimit\": 4, \"totalLimit\": 4, \"weeklyLimit\": 4, \"yearlyLimit\": 4, \"monthlyLimit\": 4}','\"[\'Can be redeemed with online booking only\', \'Redeemed coupon can not be claimed back upon booking cancellation\']\"','{\"tax\": 2.53, \"total\": 53.03, \"value\": 50.5, \"discount\": 0, \"taxTitle\": \"VAT 5%\", \"lineTitle\": \"Coupon Title\"}','{\"amount\": 53.03, \"method\": \"Cash\", \"reference\": \"1234\"}','Bought','2022-08-10 19:16:06','2022-08-10 19:16:06','2022-08-11 19:39:44');
/*!40000 ALTER TABLE `coupon_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon_sale_history`
--

DROP TABLE IF EXISTS `coupon_sale_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon_sale_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `couponId` int DEFAULT NULL,
  `coupon` json DEFAULT NULL,
  `businessId` int DEFAULT NULL,
  `customerId` int DEFAULT NULL,
  `business` json DEFAULT NULL,
  `customer` json DEFAULT NULL,
  `conditions` json DEFAULT NULL,
  `otherConditions` json DEFAULT NULL,
  `invoice` json DEFAULT NULL,
  `payment` json DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isHistory` tinyint(1) DEFAULT '1',
  `_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `_updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon_sale_history`
--

LOCK TABLES `coupon_sale_history` WRITE;
/*!40000 ALTER TABLE `coupon_sale_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupon_sale_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon_use`
--

DROP TABLE IF EXISTS `coupon_use`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon_use` (
  `id` int NOT NULL AUTO_INCREMENT,
  `saleId` int DEFAULT NULL,
  `bookingId` int DEFAULT NULL,
  `value` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon_use`
--

LOCK TABLES `coupon_use` WRITE;
/*!40000 ALTER TABLE `coupon_use` DISABLE KEYS */;
INSERT INTO `coupon_use` VALUES (1,1,1,100,10,'2022-06-02 21:45:29','2022-06-02 21:45:29','2022-06-02 21:45:29'),(2,1,1,100,10,'2022-06-02 21:45:29','2022-06-02 21:45:29','2022-06-02 21:45:29'),(3,1,158,25,5,'2022-06-07 14:29:52','2022-06-07 14:29:52','2022-06-07 14:29:52'),(4,1,158,25,5,'2022-06-07 14:30:34','2022-06-07 14:30:34','2022-06-07 14:30:34'),(5,1,158,25,5,'2022-06-07 14:36:00','2022-06-07 14:36:00','2022-06-07 14:36:00'),(7,1,158,25,5,'2022-06-07 15:59:09','2022-06-07 15:59:09','2022-06-07 15:59:09'),(8,1,158,25,5,'2022-06-07 16:00:19','2022-06-07 16:00:19','2022-06-07 16:00:19'),(9,1,158,25,5,'2022-06-07 16:01:08','2022-06-07 16:01:08','2022-06-07 16:01:08'),(10,1,158,25,5,'2022-08-11 10:22:33','2022-08-11 10:22:33','2022-08-11 10:22:33'),(11,1,163,25,5,'2022-08-11 10:45:47','2022-08-11 10:45:47','2022-08-11 10:45:47'),(12,1,164,25,5,'2022-08-12 05:44:45','2022-08-12 05:44:45','2022-08-12 05:44:45'),(13,1,164,25,5,'2022-08-12 05:46:23','2022-08-12 05:46:23','2022-08-12 05:46:23'),(14,1,165,25,5,'2022-08-12 09:57:56','2022-08-12 09:57:56','2022-08-12 09:57:56');
/*!40000 ALTER TABLE `coupon_use` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon_use_history`
--

DROP TABLE IF EXISTS `coupon_use_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon_use_history` (
  `id` int NOT NULL,
  `saleId` json DEFAULT NULL,
  `bookingId` json DEFAULT NULL,
  `value` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `_updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isHistory` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon_use_history`
--

LOCK TABLES `coupon_use_history` WRITE;
/*!40000 ALTER TABLE `coupon_use_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupon_use_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `businessId` int DEFAULT NULL,
  `serviceId` int DEFAULT NULL,
  `title` varchar(145) DEFAULT NULL,
  `subTitle` varchar(145) DEFAULT NULL,
  `about` text,
  `description` varchar(500) DEFAULT NULL,
  `cover` varchar(145) DEFAULT NULL,
  `highlight` varchar(145) DEFAULT NULL,
  `price` double DEFAULT '0',
  `discountRate` int DEFAULT NULL,
  `discountValue` int DEFAULT NULL,
  `isInstant` tinyint(1) DEFAULT '1',
  `saleConditions` json DEFAULT NULL,
  `useConditions` json DEFAULT NULL,
  `otherConditions` json DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (20,19,1,'coupons_list','coupons_list','coupons_list','coupons_list','http://localhost:8000/coupons/934682785.44.jpg','coupons_list',44,2,NULL,0,'{\"to\": \"2022-10-13\", \"from\": \"2010-05-01\", \"dailyLimit\": \"312\", \"totalLimit\": \"285\", \"weeklyLimit\": \"712\", \"yearlyLimit\": \"552\", \"monthlyLimit\": \"748\"}','{\"to\": \"2022-10-07\", \"days\": [\"MO\", \"TH\", \"FR\"], \"from\": \"2015-04-14\", \"shifts\": [\"Morning\", \"afternoon\"], \"dailyLimit\": \"124\", \"totalLimit\": \"649\", \"valueLimit\": \"150\", \"weeklyLimit\": \"94\", \"yearlyLimit\": \"547\", \"monthlyLimit\": \"473\", \"discountLimit\": \"417\"}','[\"dsdcs\", \"test\"]',0,'Draft','2022-08-18 11:54:05','2022-08-19 07:34:31'),(21,20,5,'fhb','zfbhg','gggggggb','fgb','http://127.0.0.1:8000/coupons/474724593.44.jpg','fg',44,2,NULL,0,'{\"to\": \"2022-09-02\", \"from\": \"2022-08-20\", \"dailyLimit\": \"4\", \"totalLimit\": \"43\", \"weeklyLimit\": \"32\", \"yearlyLimit\": \"8\", \"monthlyLimit\": \"32\"}','{\"to\": \"2022-08-13\", \"days\": [\"TU\"], \"from\": \"2022-08-13\", \"shifts\": [\"Evening\"], \"dailyLimit\": \"78\", \"totalLimit\": \"8\", \"valueLimit\": \"35\", \"weeklyLimit\": \"87\", \"yearlyLimit\": \"7\", \"monthlyLimit\": \"7\", \"discountLimit\": \"34\"}','[\"efsg\"]',0,'Draft','2022-08-19 01:47:48','2022-08-19 01:47:48'),(22,19,NULL,'dfgd','xgb','fgb','gb','http://127.0.0.1:8000/coupons/1151349167.44.jpg','hdf',44,2,NULL,0,'{\"to\": \"2022-08-27\", \"from\": \"2022-08-13\", \"dailyLimit\": \"78\", \"totalLimit\": \"8\", \"weeklyLimit\": \"87\", \"yearlyLimit\": \"7\", \"monthlyLimit\": \"7\"}','{\"to\": \"2022-09-03\", \"days\": [\"TU\"], \"from\": \"2022-08-13\", \"shifts\": [\"Evening\"]}','[\"6u6u\"]',0,'Draft','2022-08-19 01:50:54','2022-08-19 06:34:09'),(23,21,NULL,'Title','Sub Title','vdfv','dfvb','http://127.0.0.1:8000/coupons/238926703.kkkk.jpg','45%',50,5,NULL,1,'{\"to\": \"2022-08-31\", \"from\": \"2022-08-19\", \"dailyLimit\": \"5\", \"totalLimit\": \"5\", \"weeklyLimit\": \"5\", \"yearlyLimit\": \"5\", \"monthlyLimit\": \"5\"}','{\"to\": \"2022-09-01\", \"days\": [\"SU\", \"MO\", \"FR\"], \"from\": \"2022-08-19\", \"shifts\": [\"Morning\", \"afternoon\"], \"dailyLimit\": null, \"totalLimit\": null, \"weeklyLimit\": null, \"yearlyLimit\": null, \"monthlyLimit\": null}','[\"A1\", \"A2\", \"S3\"]',1,'Draft','2022-08-19 01:57:12','2022-08-19 08:17:45'),(24,19,NULL,'testv','d','dfb','dfb','http://localhost:8000/coupons/836770384.kkkk.jpg','high',50,5,NULL,1,'{\"to\": \"2022-08-31\", \"from\": \"2022-08-19\", \"dailyLimit\": \"3\", \"totalLimit\": \"50\", \"weeklyLimit\": \"5\", \"yearlyLimit\": \"6\", \"monthlyLimit\": \"6\"}','{\"to\": \"2022-08-19\", \"days\": [\"SU\", \"MO\"], \"from\": \"2022-08-19\", \"shifts\": [\"Morning\", \"Evening\"], \"dailyLimit\": null, \"totalLimit\": null, \"weeklyLimit\": null, \"yearlyLimit\": null, \"monthlyLimit\": null}','[\"d\"]',1,'Draft','2022-08-19 08:22:32','2022-08-19 08:53:04'),(25,21,NULL,'hghj','cfdsf','gjmh','yggggggg','http://127.0.0.1:8000/coupons/280804283.44.jpg','dfvd',324,2,NULL,0,'{\"to\": \"2022-08-30\", \"from\": \"2022-08-20\", \"dailyLimit\": \"78\", \"totalLimit\": \"89\", \"weeklyLimit\": \"87\", \"yearlyLimit\": \"7\", \"monthlyLimit\": \"7\"}','{\"to\": \"2022-09-02\", \"days\": [\"TH\"], \"from\": \"2022-08-06\", \"shifts\": [\"afternoon\"]}','[\"mmmm\", \"nnnn\", \"oooo\", \"pppp\", \"qqqqq\"]',0,'Draft','2022-08-21 23:51:22','2022-08-22 00:57:58'),(26,19,1,'kk','dg','dgv','dg','http://127.0.0.1:8000/coupons/1858481306.44.jpg','gdf',44,2,NULL,0,'[2022, 234, 908, 8, 2022, 9, 32]','[2022, 78, 8, 79, 56, 2022, 87, 7, 56, 1, 1]','[\"dsdcs\", \"gtxg\", \"gtrf\"]',0,'Draft','2022-08-22 01:41:45','2022-08-22 01:41:45'),(27,19,1,'rr','rr','cbfvg','fgb','http://127.0.0.1:8000/coupons/1883905668.44.jpg','dfvd',44,2,NULL,1,'[2022, 234, 43, 8, 2022, 9, 32]','[2022, 78, 89, 3, 324, 2022, 87, 24, 34, 1, 1]','[\"dsdcs\", \"sd\", \"sds\"]',0,'Draft','2022-08-22 01:48:22','2022-08-22 01:48:22'),(28,19,1,'ed','xdgf','dfg','xfd','http://127.0.0.1:8000/coupons/1336529963.44.jpg','dfvd',44,2,NULL,0,'{\"to\": \"2022-09-03\", \"from\": \"2022-08-10\", \"dailyLimit\": \"7565\", \"totalLimit\": \"43\", \"weeklyLimit\": \"32\", \"yearlyLimit\": \"8\", \"monthlyLimit\": \"32\"}','{\"to\": \"2022-09-02\", \"days\": [\"SU\", \"MO\", \"TU\", \"WE\", \"TH\", \"FR\", \"SA\"], \"from\": \"2022-08-10\", \"shifts\": [\"Morning\", \"Evening\", \"afternoon\"], \"dailyLimit\": \"78\", \"totalLimit\": \"8\", \"valueLimit\": null, \"weeklyLimit\": \"87\", \"yearlyLimit\": \"7\", \"monthlyLimit\": \"7\", \"discountLimit\": \"45\"}','[\"dsdcs\", \"dfg\", \"fgh\"]',0,'Draft','2022-08-22 02:08:21','2022-08-22 02:08:21'),(29,19,1,'safeer','safeer','safeer','safeer','http://127.0.0.1:8000/coupons/782120719.44.jpg','2sdsfgdsfg',44,2,NULL,0,'{\"to\": \"2022-09-03\", \"from\": \"2022-08-27\", \"dailyLimit\": 4, \"totalLimit\": 43, \"weeklyLimit\": 32, \"yearlyLimit\": 8, \"monthlyLimit\": 32}','{\"to\": \"2022-08-30\", \"days\": [\"SU\", \"MO\", \"TU\", \"WE\", \"TH\", \"FR\", \"SA\"], \"from\": \"2022-08-18\", \"shifts\": [\"Morning\", \"Evening\", \"afternoon\"], \"dailyLimit\": \"78\", \"totalLimit\": \"8\", \"valueLimit\": \"89\", \"weeklyLimit\": \"87\", \"yearlyLimit\": \"7\", \"monthlyLimit\": \"7\", \"discountLimit\": \"67\"}','[\"dsdcs\", \"gdx\", \"gdxg\"]',0,'Draft','2022-08-22 02:50:39','2022-08-22 02:50:39'),(30,20,1,'car wash','dfgddfvg','dgf','df','http://127.0.0.1:8000/coupons/517513722.44.jpg','dsdxzf',44,2,NULL,0,'{\"to\": \"2022-09-01\", \"from\": \"2022-08-10\", \"dailyLimit\": 4, \"totalLimit\": 43, \"weeklyLimit\": 3, \"yearlyLimit\": 8, \"monthlyLimit\": 32}','{\"to\": \"2022-09-08\", \"days\": [\"SU\", \"MO\", \"TU\", \"WE\", \"TH\", \"FR\", \"SA\"], \"from\": \"2022-08-10\", \"shifts\": [\"Morning\", \"Evening\", \"afternoon\"], \"dailyLimit\": \"78\", \"totalLimit\": \"8\", \"valueLimit\": \"34\", \"weeklyLimit\": \"87\", \"yearlyLimit\": \"4\", \"monthlyLimit\": \"7\", \"discountLimit\": \"345\"}','[\"dsdcs\", \"sfs\", \"sdfs\"]',0,'Draft','2022-08-22 03:01:29','2022-08-22 03:01:29'),(31,21,NULL,'bbbbbbbbb','srfsd','fd','gyjm','http://127.0.0.1:8000/coupons/1982381353.44.jpg','tgijk',50,3,NULL,0,'{\"to\": \"2022-08-26\", \"from\": \"2022-08-09\", \"dailyLimit\": 78, \"totalLimit\": 8, \"weeklyLimit\": 100, \"yearlyLimit\": 7, \"monthlyLimit\": 7}','{\"to\": \"2022-09-06\", \"days\": [\"SU\", \"MO\", \"TU\", \"WE\", \"TH\", \"FR\", \"SA\"], \"from\": \"2022-08-18\", \"shifts\": [\"Morning\", \"Evening\", \"afternoon\"]}','[\"tyh\", \"tghy\", \"tuj\"]',0,'Draft','2022-08-22 03:07:31','2022-08-22 04:26:40'),(32,19,NULL,'kh','fxdg','dg','fg','http://127.0.0.1:8000/coupons/1965781777.44.jpg','ghg',44,2,NULL,0,'{\"to\": \"2022-08-19\", \"from\": \"2022-08-11\", \"dailyLimit\": 78, \"totalLimit\": 8, \"weeklyLimit\": 3, \"yearlyLimit\": 4, \"monthlyLimit\": 7}','{\"to\": \"2022-09-03\", \"days\": [\"SU\", \"MO\", \"TU\", \"WE\", \"TH\", \"FR\", \"SA\"], \"from\": \"2022-08-26\", \"shifts\": [\"Morning\", \"Evening\", \"afternoon\"]}','[\"dgfr\", \"hjg\"]',0,'Draft','2022-08-22 04:35:37','2022-08-22 04:39:14'),(33,21,NULL,'ht','dg','gf','gb','http://127.0.0.1:8000/coupons/826209091.44.jpg','dfg',44,10,NULL,0,'{\"to\": \"2022-09-02\", \"from\": \"2022-08-11\", \"dailyLimit\": \"78\", \"totalLimit\": \"8\", \"weeklyLimit\": \"87\", \"yearlyLimit\": \"7\", \"monthlyLimit\": \"7\"}','{\"to\": \"2022-08-27\", \"days\": [\"SU\", \"MO\", \"TU\", \"WE\", \"TH\", \"FR\", \"SA\"], \"from\": \"2022-08-25\", \"shifts\": [\"Morning\", \"Evening\", \"afternoon\"]}','[\"ghhj\", \"tfh\", \"grfg\"]',0,'Draft','2022-08-22 04:41:00','2022-08-22 04:47:49'),(34,19,NULL,'gh','gh','hg','h','http://127.0.0.1:8000/coupons/1867686548.44.jpg','fgh',44,NULL,22,0,'{\"to\": \"2022-09-08\", \"from\": \"2022-08-05\", \"dailyLimit\": \"5656\", \"totalLimit\": \"56\", \"weeklyLimit\": \"46\", \"yearlyLimit\": \"76\", \"monthlyLimit\": \"56\"}','{\"to\": \"2022-09-03\", \"days\": [\"SU\", \"MO\", \"TU\", \"WE\", \"TH\", \"FR\", \"SA\"], \"from\": \"2022-08-09\", \"shifts\": [\"Morning\", \"Evening\", \"afternoon\"], \"dailyLimit\": null, \"totalLimit\": null, \"weeklyLimit\": null, \"yearlyLimit\": null, \"monthlyLimit\": null}','[\"dsdcs\", \"fgx\", \"xr\"]',0,'Draft','2022-08-22 04:49:45','2022-08-22 04:53:04'),(35,19,1,'car','khg','ctuj','cyuj','http://127.0.0.1:8000/coupons/1572959525.44.jpg','dfvd',324,NULL,NULL,0,'{\"to\": \"2022-08-27\", \"from\": \"2022-08-10\", \"dailyLimit\": 78, \"totalLimit\": 8, \"weeklyLimit\": 87, \"yearlyLimit\": 7, \"monthlyLimit\": 7}','{\"to\": \"2022-08-20\", \"days\": [\"SU\", \"MO\", \"TU\", \"WE\", \"TH\", \"FR\", \"SA\"], \"from\": \"2022-08-13\", \"shifts\": [\"Morning\", \"Evening\", \"afternoon\"], \"dailyLimit\": 78, \"totalLimit\": 8, \"weeklyLimit\": 87, \"yearlyLimit\": 100, \"monthlyLimit\": 5}','[\"fgh\", \"fg\"]',0,'Draft','2022-08-22 04:55:21','2022-08-22 05:36:09');
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ownerBusinessId` int DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `selectedVehicle` int DEFAULT NULL,
  `balance` double DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,1,'zaka','971-507285969','zakashah@hotmail.com','zaka_pr.png',1,33.63,'2022-06-02 14:39:01','2022-06-02 14:39:01'),(2,NULL,'zahra','971-562779495','zahra.zakashah@gmail.com','zahra_pr.png',NULL,0,'2022-06-02 14:39:01','2022-06-02 14:39:01'),(10,1,'name','+971504859696','email.domain@site.com',NULL,NULL,0,'2022-06-02 14:39:01','2022-06-02 14:39:01'),(12,1,'name','+971504859697','email.domain@site.com',NULL,6,0,'2022-06-02 14:39:01','2022-06-02 14:39:01'),(13,1,'Zaka Shah','+971507285969','zakashah@hotmail.com',NULL,NULL,0,'2022-08-15 10:52:35','2022-08-15 10:52:35'),(14,2,'bilal Qureshi','+9203130971390','bilal1390@gmail.com',NULL,NULL,0,'2022-08-15 10:57:30','2022-08-19 07:07:27');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `serviceId` int DEFAULT NULL,
  `businessId` int DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `highlight` varchar(145) DEFAULT NULL,
  `description` varchar(145) DEFAULT NULL,
  `cover` varchar(245) DEFAULT NULL,
  `rate` int DEFAULT NULL,
  `value` double DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts`
--

LOCK TABLES `discounts` WRITE;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
INSERT INTO `discounts` VALUES (10,1,19,'Flat 10% OFF','service','service','http://localhost:8000/discount/1577466904.44.jpg',55,NULL,0,'2022-08-18 11:56:00','2022-08-18 11:56:26'),(11,5,20,'df','ghj','fgf','http://127.0.0.1:8000/discount/981999105.44.jpg',55,NULL,1,'2022-08-22 05:37:44','2022-08-22 05:40:16');
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `make`
--

DROP TABLE IF EXISTS `make`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `make` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('Active','In-Active') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `make`
--

LOCK TABLES `make` WRITE;
/*!40000 ALTER TABLE `make` DISABLE KEYS */;
INSERT INTO `make` VALUES (1,'Workshop','In-Active','2022-07-18 06:25:02','2022-07-22 11:31:50',1),(3,'Subhash','In-Active','2022-07-18 06:35:19','2022-07-18 06:35:27',1),(4,'admin','Active','2022-07-18 06:38:01','2022-07-18 06:38:01',1),(5,'Bilal Quershi','Active','2022-07-19 11:37:42','2022-07-19 11:37:42',1),(6,'makeee','Active','2022-08-10 00:14:17','2022-08-10 00:16:47',1),(7,'mnmn','Active','2022-08-10 05:15:30','2022-08-10 05:15:42',1),(8,'bv','Active','2022-08-11 00:01:17','2022-08-11 00:01:30',1);
/*!40000 ALTER TABLE `make` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (29,'2014_10_12_000000_create_users_table',1),(30,'2014_10_12_100000_create_password_resets_table',1),(31,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(32,'2019_08_19_000000_create_failed_jobs_table',1),(33,'2019_12_14_000001_create_personal_access_tokens_table',1),(34,'2022_06_27_102734_create_sessions_table',1),(35,'2022_06_28_045929_create_permission_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `make_id` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('Active','In-Active') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model`
--

LOCK TABLES `model` WRITE;
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` VALUES (1,4,'Bilal Quershi','In-Active','2022-07-18 06:56:11','2022-07-22 11:32:21',1),(3,5,'Kashif Ali','Active','2022-07-18 07:40:25','2022-07-18 07:40:25',1),(5,5,'df','Active','2022-07-27 04:37:27','2022-07-27 04:37:27',1),(6,5,'sgfd','Active','2022-07-28 01:17:49','2022-07-28 01:17:49',1),(7,3,'dfdg','Active','2022-07-28 01:18:06','2022-07-28 01:18:06',1),(8,1,'gg','Active','2022-07-28 01:18:40','2022-07-28 01:18:40',1),(9,3,'ddd','Active','2022-07-28 01:38:09','2022-07-28 01:38:09',1),(10,5,'ff','Active','2022-07-28 01:42:07','2022-07-28 01:42:07',1),(11,6,'ggsgsg','Active','2022-08-10 00:15:11','2022-08-10 00:15:11',1),(12,5,'mmnn','Active','2022-08-10 00:17:01','2022-08-10 00:17:18',1),(13,5,'lk','Active','2022-08-10 05:15:57','2022-08-10 05:16:17',1),(14,3,'sdgfdr','Active','2022-08-11 00:01:44','2022-08-11 00:01:44',1);
/*!40000 ALTER TABLE `model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',9),(3,'App\\Models\\User',10),(2,'App\\Models\\User',12),(2,'App\\Models\\User',13),(3,'App\\Models\\User',14),(3,'App\\Models\\User',15),(5,'App\\Models\\User',17),(3,'App\\Models\\User',18);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offerings`
--

DROP TABLE IF EXISTS `offerings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offerings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `serviceId` int NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `subTitle` varchar(250) DEFAULT NULL,
  `about` text,
  `cover` varchar(100) DEFAULT NULL,
  `specs` json DEFAULT NULL,
  `options` json DEFAULT NULL,
  `gallery` json DEFAULT NULL,
  `conditions` json DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offerings`
--

LOCK TABLES `offerings` WRITE;
/*!40000 ALTER TABLE `offerings` DISABLE KEYS */;
INSERT INTO `offerings` VALUES (29,1,'AL Safeer Car Wash','AL Safeer Car Wash','AL Safeer Car Wash','http://localhost:8000/offering_cover/610911368.44.jpg','[\"AL Safeer Car Wash\"]','[\"AL Safeer Car Wash\"]','[\"http://localhost:8000/offering_gallery/57708605.44.jpg\", \"http://localhost:8000/offering_gallery/1251249186.kkkk.jpg\"]','{\"cashOnDelivery\": \"true\", \"advanceCancellation\": \"yes\", \"cancellationAllowed\": \"true\"}',0,'2022-08-18 10:03:58','2022-08-18 10:52:05'),(30,1,'car wash','dfhb','hj','http://127.0.0.1:8000/offering_cover/1918642216.44.jpg','[\"hjbj\"]','[\"bh j,\"]','[\"http://127.0.0.1:8000/offering_gallery/1875430914.44.jpg\"]','{\"cashOnDelivery\": \"false\", \"advanceCancellation\": \"dsvf\", \"cancellationAllowed\": \"false\"}',0,'2022-08-19 00:17:28','2022-08-19 00:41:28'),(31,5,'sfs','efsd','dd','http://127.0.0.1:8000/offering_cover/1895314501.44.jpg','[\"sfsd\"]','[\"sdef\"]','[\"http://127.0.0.1:8000/offering_gallery/1928478685.44.jpg\"]','{\"cashOnDelivery\": \"false\", \"advanceCancellation\": \"fdf\", \"cancellationAllowed\": \"false\"}',0,'2022-08-19 00:51:33','2022-08-19 00:51:33'),(32,3,'final offer  test','test 1','about','http://localhost:8000/offering_cover/1076673113.kkkk.jpg','[\"s-1\", \"s-2\"]','[\"o-1\", \"o-2\"]','[\"http://localhost:8000/offering_gallery/606449450.kkkk.jpg\", \"http://localhost:8000/offering_gallery/843871010.ee.jpg\"]','{\"cashOnDelivery\": \"true\", \"advanceCancellation\": \"5\", \"cancellationAllowed\": \"true\"}',0,'2022-08-19 07:59:03','2022-08-19 07:59:03'),(33,1,'teet','dvffv','dffd','http://localhost:8000/offering_cover/8955966.kkkk.jpg','[null]','[null]','[]','{\"cashOnDelivery\": \"false\", \"advanceCancellation\": null, \"cancellationAllowed\": \"false\"}',0,'2022-08-19 08:02:19','2022-08-19 08:02:19'),(34,1,'rty','df','About','http://localhost:8000/offering_cover/214627718.44.jpg','[\"fgh\"]','[\"fghb\"]','[\"http://localhost:8000/offering_gallery/2028414750.44.jpg\"]','{\"cashOnDelivery\": \"false\", \"advanceCancellation\": null, \"cancellationAllowed\": \"false\"}',0,'2022-08-19 09:00:25','2022-08-19 09:00:25'),(35,3,'frgvd','gfrd','gfrv','http://127.0.0.1:8000/offering_cover/95805528.44.jpg','[\"frvg\", \"frgv\"]','[\"fgv\", \"fvg\"]','[\"http://127.0.0.1:8000/offering_gallery/1077148624.44.jpg\"]','{\"cashOnDelivery\": \"false\", \"advanceCancellation\": \"gdfvg\", \"cancellationAllowed\": \"false\"}',0,'2022-08-22 05:50:24','2022-08-22 06:15:13');
/*!40000 ALTER TABLE `offerings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otp_codes`
--

DROP TABLE IF EXISTS `otp_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `otp_codes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `phone` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otp_codes`
--

LOCK TABLES `otp_codes` WRITE;
/*!40000 ALTER TABLE `otp_codes` DISABLE KEYS */;
INSERT INTO `otp_codes` VALUES (11,0,'923211488906','93423','2022-07-23 17:15:08','2022-07-23 17:15:08');
/*!40000 ALTER TABLE `otp_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `main` tinyint NOT NULL DEFAULT '0',
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` tinyint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1',
  `guard_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int DEFAULT '0',
  `sub_menu` varchar(45) COLLATE utf8_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'permission',1,'fa-cog menu-icon',0,1,'web','2022-07-04 23:40:31','2022-08-15 09:02:44','permissions','Permission',2,'0'),(7,'role',1,'fa-location-arrow menu-icon',0,1,'web','2022-07-04 23:40:31','2022-08-15 09:05:06','roles.index','Role',3,'0'),(8,'role_create',0,NULL,7,1,'web','2022-07-04 23:40:31','2022-07-04 23:40:31',NULL,'Add Role',0,'1'),(12,'booking_create',0,NULL,11,1,'web','2022-07-04 23:40:31','2022-07-04 23:40:31',NULL,NULL,0,'1'),(28,'Coupons_List',0,'coupon-list',27,1,'web','2022-07-04 23:40:31','2022-08-15 09:13:06','coupon-list',NULL,0,'0'),(29,'Add_Coupons',0,NULL,27,1,'web','2022-07-04 23:40:31','2022-07-20 06:59:46','coupon-add','New Coupons',0,'1'),(30,'coupon_create',0,NULL,27,1,'web','2022-07-04 23:40:31','2022-07-04 23:40:31',NULL,NULL,0,'1'),(33,'Manage_Services',1,'fa-certificate',0,1,'web','2022-07-04 23:40:31','2022-08-15 09:06:16',NULL,'Manage Services',5,'0'),(34,'Service_List',0,'service-list',33,1,'web','2022-07-04 23:40:31','2022-08-15 09:17:13','service-list','Service List',0,'0'),(35,'Add_Service',0,NULL,33,1,'web','2022-07-04 23:40:31','2022-07-05 06:58:45','service-add','Service Create',0,'1'),(36,'mange_service_create',0,NULL,33,1,'web','2022-07-04 23:40:31','2022-07-04 23:40:31',NULL,NULL,0,'1'),(44,'mange_worker_delete',0,NULL,39,1,'web','2022-07-04 23:40:31','2022-07-04 23:40:31',NULL,NULL,0,'1'),(45,'user',1,'fa-users menu-icon',0,1,'web','2022-07-04 23:40:31','2022-08-15 09:05:33',NULL,'Users',4,'0'),(46,'user_create',0,NULL,45,1,'web','2022-07-04 23:40:31','2022-07-22 11:45:34','users.create','Add User',0,'1'),(49,'business_setup',1,'fa-cog',0,1,'web','2022-07-04 23:40:31','2022-07-05 08:15:50',NULL,'Business Setup',6,'1'),(56,'manage_worker',0,'worker-add',39,1,'web','2022-07-05 02:19:08','2022-08-15 12:17:36','worker-add','Manage Workers',0,'0'),(58,'Add Role',0,'all-roles',7,1,'web','2022-07-05 05:09:49','2022-08-15 09:15:47','all-roles','Roles List',0,'0'),(60,'Add permissions',0,NULL,1,1,'web','2022-07-05 06:34:03','2022-07-05 07:19:15','permissions.create','Add Persmission',0,'1'),(62,'Manage Vendors',1,'fa-users menu-icon',0,1,'web','2022-07-05 06:44:37','2022-08-15 09:05:50',NULL,'Manage Vendors',7,'0'),(63,'Add-Vendor',0,'vendor-list-show-all',62,1,'web','2022-07-05 06:46:31','2022-07-22 12:01:02','add-vendor','Add Vendor',0,'1'),(64,'Vendor List',0,'vendor-list-show-all',62,1,'web','2022-07-05 06:46:48','2022-08-15 09:17:36','vendor-list-show-all','Vendor List',0,'0'),(69,'permissions List',0,'permissions.index',1,1,'web','2022-07-05 07:25:09','2022-08-15 09:15:34','permissions.index','Permission List',0,'0'),(72,'update_settings',0,'business.update-setup',49,1,'web','2022-07-05 10:13:20','2022-07-05 10:14:17','business-setup','Update Settings',0,'1'),(73,'lookups',1,NULL,0,1,'web','2022-07-13 06:40:36','2022-08-15 08:53:51',NULL,'Lookups',1,'0'),(75,'vehicle_type_list',0,NULL,73,1,'web','2022-07-18 04:33:43','2022-07-18 04:33:43','vehicle-type-list','Vehicle Types',0,'0'),(76,'make',0,NULL,73,1,'web','2022-07-18 06:09:25','2022-07-18 06:09:25','make-list','Make',0,'0'),(77,'model',0,NULL,73,1,'web','2022-07-18 06:49:22','2022-07-18 06:49:22','model-list','Model',0,'0'),(78,'Manage_Offerings',1,'fa-share',0,1,'web','2022-07-04 23:40:31','2022-08-15 09:06:38',NULL,'Manage Offerings',7,'0'),(79,'offering_list',0,'offering-list',78,1,'web','2022-07-04 23:40:31','2022-08-15 09:17:46','offering-list','Offering List',0,'0'),(80,'city',0,NULL,73,1,'web','2022-07-19 11:01:22','2022-07-19 11:01:22','city-list','City',0,'0'),(81,'area',0,NULL,73,1,'web','2022-07-19 11:01:41','2022-07-19 11:01:41','area-list','Area',0,'0'),(85,'coupon',1,'fa-gift menu-icon',0,1,'web','2022-07-20 06:58:45','2022-08-15 09:03:12','#0','Manage Coupons',0,'0'),(86,'coupon_list',0,'coupon-list',85,1,'web','2022-07-21 09:16:42','2022-08-15 09:13:24','coupon-list','Coupon List',0,'0'),(87,'manage_queue',1,'fa-list menu-icon',0,1,'web','2022-07-21 11:30:03','2022-08-15 09:03:37','#0','Manage Queue',0,'0'),(88,'queue',0,'queue-list',87,1,'web','2022-07-21 11:30:36','2022-08-15 09:13:52','queue-list','Queue',0,'0'),(89,'discount',1,'fa-percent menu-icon',0,1,'web','2022-07-22 00:13:57','2022-08-15 09:04:24','#0','Manage Discount',0,'0'),(90,'discount_list',0,'discount-list',89,1,'web','2022-07-22 00:14:42','2022-08-15 09:14:07','discount-list','Discount',0,'0'),(93,'manage_users',0,'users.index',45,1,'web','2022-07-22 11:49:55','2022-08-15 09:16:57','users.index','Manage Users',0,'0'),(96,'business_offering',0,'business-offering-list',78,1,'web','2022-08-04 00:30:46','2022-08-15 09:17:57','business-offering-list','Business Offering',0,'0'),(97,'mm',0,'booking-list',7,1,'web','2022-08-10 00:18:35','2022-08-10 00:18:58','booking-list','Permission',0,'1'),(98,'edit_coupon',0,'#0',1,1,'web','2022-08-15 07:02:43','2022-08-15 07:07:34','#0','Edit Coupon',0,'1'),(99,'delete_coupon',0,'#0',1,1,'web','2022-08-15 07:04:34','2022-08-15 07:04:34','#0','Delete Coupon',0,'1'),(100,'view_coupon',0,'#0',1,1,'web','2022-08-15 07:05:52','2022-08-15 07:05:52','#0','View Coupon',0,'1'),(101,'queue_view',0,'#0',87,1,'web','2022-08-15 07:16:56','2022-08-15 09:09:47','#0','Queue View',0,'1'),(102,'queue_edit',0,'#0',87,1,'web','2022-08-15 07:17:25','2022-08-15 07:17:25','#0','Queue Edit',0,'1'),(103,'queue_delete',0,'#0',87,1,'web','2022-08-15 07:17:47','2022-08-15 07:17:47','#0','Queue Delete',0,'1'),(104,'queue_add',0,'#0',87,1,'web','2022-08-15 07:18:08','2022-08-15 07:19:22','#0','Queue Add',0,'1'),(105,'discount_add',0,'discount-list',89,1,'web','2022-08-15 07:32:18','2022-08-15 07:55:03','#0','Add Discount',0,'1'),(106,'discount_view',0,'discount-list',89,1,'web','2022-08-15 07:46:56','2022-08-15 07:55:16','#0','Discount View',0,'1'),(107,'discount_edit',0,'#0',89,1,'web','2022-08-15 07:56:25','2022-08-15 07:56:25','#0','Discount Edit',0,'1'),(108,'discount_delete',0,'#0',89,1,'web','2022-08-15 07:57:04','2022-08-15 07:57:04','#0','Discount Delete',0,'1'),(109,'user-add',0,'#0',45,1,'web','2022-08-15 08:20:57','2022-08-15 08:20:57','#0','User Add',0,'1'),(110,'user-edit',0,'#0',45,1,'web','2022-08-15 08:21:37','2022-08-15 08:21:37','#0','User Edit',0,'1'),(111,'user-view',0,'#0',45,1,'web','2022-08-15 08:22:12','2022-08-15 08:22:12','#0','User View',0,'1'),(112,'user-delete',0,'#0',45,1,'web','2022-08-15 08:22:50','2022-08-15 08:22:50','#0','User Delete',0,'1'),(113,'Worker',1,'fa-user',0,1,'web','2022-08-17 00:01:05','2022-08-17 00:03:12','worker-list','Worker',0,'0'),(114,'worker list',0,'#0',113,1,'web','2022-08-17 00:04:32','2022-08-17 00:05:54','worker-list','worker list',0,'0');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'MyAuthApp','ab23df24284540b8c077cb3135b330833e6a50bd901d23259b89f8fe8f4346fd','[\"*\"]',NULL,'2022-07-07 05:38:10','2022-07-07 05:38:10'),(2,'App\\Models\\User',1,'MyAuthApp','fb06ff751c8e29417953403d162ae207fef3906be72134f38cb289343d4102b9','[\"*\"]',NULL,'2022-07-07 05:38:17','2022-07-07 05:38:17'),(3,'App\\Models\\User',1,'MyAuthApp','354e31b5a9458914c3f82fb681c2152d8d87566e080c3146f9c78727d4376895','[\"*\"]',NULL,'2022-07-07 05:38:22','2022-07-07 05:38:22'),(4,'App\\Models\\User',1,'MyAuthApp','73db28007c1f40fc43d8dc0b869e8ff3d014eeb3eeb077b497b6cacb8dfbf4b4','[\"*\"]',NULL,'2022-07-07 05:38:26','2022-07-07 05:38:26'),(5,'App\\Models\\User',1,'MyAuthApp','ddaab8614f0ca4fba5147045d2b65de1ddc50f067791b4c811cacf4dae06dd42','[\"*\"]',NULL,'2022-07-07 05:38:29','2022-07-07 05:38:29'),(6,'App\\Models\\User',1,'MyAuthApp','15bfe55b3893a8be0edf9440202d8d5acc392e1cd4f01f0c5a8e4eac41219b44','[\"*\"]',NULL,'2022-07-07 05:38:32','2022-07-07 05:38:32'),(7,'App\\Models\\User',1,'MyAuthApp','bc83a3968d0e7a62f3f0c986f676be179c1ef66e60a2e360c439821c3e262a90','[\"*\"]',NULL,'2022-07-07 07:00:45','2022-07-07 07:00:45');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `queues`
--

DROP TABLE IF EXISTS `queues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `queues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `businessId` int DEFAULT NULL,
  `walkin` tinyint(1) DEFAULT '0',
  `title` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `offerings` json DEFAULT NULL,
  `hours` json DEFAULT NULL,
  `breaks` json DEFAULT NULL,
  `intervals` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `queues`
--

LOCK TABLES `queues` WRITE;
/*!40000 ALTER TABLE `queues` DISABLE KEYS */;
INSERT INTO `queues` VALUES (7,20,1,'Testing','Alias','[30, 31, 29]',NULL,NULL,NULL,'2022-08-18 11:32:50','2022-08-19 01:17:44'),(8,19,0,'rtg','rtg','[30, 31, 29]',NULL,NULL,NULL,'2022-08-19 01:23:28','2022-08-19 01:23:59'),(9,20,0,'fh','hf','[29]',NULL,NULL,NULL,'2022-08-19 01:37:03','2022-08-19 01:38:02'),(10,19,0,'yty','ty','[29]',NULL,NULL,NULL,'2022-08-19 01:41:51','2022-08-19 01:42:49'),(11,20,1,'sdvsd','vdssv','[30]',NULL,NULL,NULL,'2022-08-19 08:36:17','2022-08-19 08:36:17'),(12,19,0,'kkkkkkf','ftuj','[29]',NULL,NULL,NULL,'2022-08-22 05:37:02','2022-08-22 05:37:11');
/*!40000 ALTER TABLE `queues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `businessId` int DEFAULT NULL,
  `serviceId` int DEFAULT NULL,
  `bookingId` int DEFAULT NULL,
  `offeringId` int DEFAULT NULL,
  `customerId` int DEFAULT NULL,
  `rate` tinyint(1) DEFAULT NULL,
  `remark` varchar(500) DEFAULT NULL,
  `reply` varchar(100) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pics` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,1,1,51,1,1,1,'review','reply','2022-04-14 16:57:26','[\"pic1.png\", \"pic2.png\"]','2022-06-02 14:39:27','2022-06-02 14:39:27'),(2,1,1,51,1,1,2,'review','reply','2022-04-14 16:57:26','[\"pic1.png\", \"pic2.png\"]','2022-06-02 14:39:27','2022-06-02 14:39:27'),(3,1,1,51,1,1,2,'review','reply','2022-04-14 16:57:26','[\"pic1.png\", \"pic2.png\"]','2022-06-02 14:39:27','2022-06-02 14:39:27'),(4,1,1,51,1,1,3,'review','reply','2022-04-14 16:57:26','[\"pic1.png\", \"pic2.png\"]','2022-06-02 14:39:27','2022-06-02 14:39:27'),(5,1,1,51,1,1,3,'review','reply','2022-04-14 16:57:26','[\"pic1.png\", \"pic2.png\"]','2022-06-02 14:39:27','2022-06-02 14:39:27'),(6,1,1,51,1,1,3,'review','reply','2022-04-14 16:57:26','[\"pic1.png\", \"pic2.png\"]','2022-06-02 14:39:27','2022-06-02 14:39:27'),(7,1,1,51,1,1,4,'review','reply','2022-04-14 16:57:26','[\"pic1.png\", \"pic2.png\"]','2022-06-02 14:39:27','2022-06-02 14:39:27'),(8,1,1,51,1,1,4,'review','reply','2022-04-14 16:57:26','[\"pic1.png\", \"pic2.png\"]','2022-06-02 14:39:27','2022-06-02 14:39:27'),(9,1,1,51,1,1,4,'review','reply','2022-04-14 16:57:26','[\"pic1.png\", \"pic2.png\"]','2022-06-02 14:39:27','2022-06-02 14:39:27'),(10,1,1,51,1,1,4,'review','reply','2022-04-14 16:57:26','[\"pic1.png\", \"pic2.png\"]','2022-06-02 14:39:27','2022-06-02 14:39:27'),(11,1,1,51,1,1,5,NULL,NULL,'2022-05-31 19:49:40',NULL,'2022-06-02 14:39:27','2022-06-02 14:39:27'),(13,1,1,51,1,1,5,'good job once','this is reply','2022-05-31 19:54:08','[\"picture_2\"]','2022-06-02 14:39:27','2022-06-02 14:39:27'),(14,1,1,159,1,1,5,NULL,NULL,'2022-08-11 20:34:24','[\"picture_14\"]','2022-08-11 20:34:24','2022-08-12 06:48:11'),(15,NULL,NULL,76,NULL,NULL,5,NULL,NULL,'2022-08-11 20:46:36',NULL,'2022-08-11 20:46:36','2022-08-11 20:46:36'),(16,NULL,NULL,76,NULL,NULL,4,NULL,NULL,'2022-08-11 20:46:46',NULL,'2022-08-11 20:46:46','2022-08-11 20:55:10'),(17,NULL,NULL,76,NULL,NULL,4,NULL,NULL,'2022-08-11 20:51:44',NULL,'2022-08-11 20:51:44','2022-08-11 20:51:44'),(18,NULL,NULL,76,NULL,NULL,4,NULL,NULL,'2022-08-11 20:53:43',NULL,'2022-08-11 20:53:43','2022-08-11 20:53:43'),(19,NULL,NULL,78,NULL,NULL,4,'this is remarks',NULL,'2022-08-11 20:56:41',NULL,'2022-08-11 20:56:41','2022-08-11 20:56:42');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(7,1),(8,1),(12,1),(28,1),(29,1),(33,1),(34,1),(44,1),(45,1),(46,1),(49,1),(56,1),(58,1),(60,1),(62,1),(63,1),(64,1),(69,1),(72,1),(73,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(93,1),(96,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(109,1),(110,1),(111,1),(112,1),(113,1),(114,1),(1,5),(1,6);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `key` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Shehnshah admin (All right)','web','2022-07-04 23:40:31','2022-08-10 10:27:30','admin-ar'),(3,'Shehnshah CS (read only)','web','2022-07-04 23:46:07','2022-08-10 10:28:31','cs-ro'),(5,'Business Admin Read-Only (Admin Panel)','web','2022-07-29 05:27:50','2022-08-10 10:29:08','business-ro'),(6,'Business Admin Read-Write (Admin Panel)','web','2022-07-29 05:28:44','2022-08-10 10:29:37','business-rw'),(9,'Business Supervisor All Rights (Business App)','web','2022-08-10 00:19:24','2022-08-10 10:30:04','business-user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Car Wash','carwash.png','2022-06-02 14:39:35','2022-06-02 14:39:35'),(2,'Oil Change','oilchange.png','2022-06-02 14:39:35','2022-06-02 14:39:35'),(3,'Car wash T1','http://localhost:8000/service/630926125.ee.jpg','2022-08-15 10:39:34','2022-08-15 10:39:34'),(4,'Title','http://localhost:8000/service/224759002.ee.jpg','2022-08-15 10:55:54','2022-08-15 10:55:54'),(5,'car','http://127.0.0.1:8000/service/1503409685.44.jpg','2022-08-19 00:15:58','2022-08-19 00:15:58'),(6,'fgb','http://127.0.0.1:8000/service/812143090.44.jpg','2022-08-22 05:45:59','2022-08-22 05:45:59');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `payload` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('dfwbQxolz6NqkfGIQB2IJLlwTrOwxmlnNFsZ42IT',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoickprSzNaVEtoY0RWTjRvclBzVW9nYTBNeEhEaXgwOHpjY2FRMnJ3MCI7czoxMToiYWN0aXZlX3JvbGUiO086ODoic3RkQ2xhc3MiOjE6e3M6Mzoia2V5IjtzOjg6ImFkbWluLWFyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1661230533),('gyjPaOG8PGAPOegbu8G95pdNh1bwqOzUMcsx9kHB',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZnVSYjZnZTNIWFhGZ0FURU9sVDlUaXkxb3UwSlF2M1RYWUdpRW82TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjExOiJhY3RpdmVfcm9sZSI7Tzo4OiJzdGRDbGFzcyI6MTp7czozOiJrZXkiO3M6ODoiYWRtaW4tYXIiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1661230842),('pN5DlFinxkd6anKnElfezDrpCQbY74QIzBBfj8qe',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZWJrd1hsYkJJTkQ4RzlMbUYyTWwwV25Ga2U3Z0ptQTZyeEoxRVFHbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTE6ImFjdGl2ZV9yb2xlIjtOO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1661230502);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slot_history`
--

DROP TABLE IF EXISTS `slot_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slot_history` (
  `id` int NOT NULL,
  `bookingId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `queueId` int DEFAULT NULL,
  `start` json DEFAULT NULL,
  `end` json DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `_updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slot_history`
--

LOCK TABLES `slot_history` WRITE;
/*!40000 ALTER TABLE `slot_history` DISABLE KEYS */;
INSERT INTO `slot_history` VALUES (1,NULL,'2022-06-01 00:00:00',1,'[9, 30]','[10, 0]',1,'2022-06-02 14:39:41','2022-06-02 16:11:43','2022-06-02 16:34:54','2022-06-02 16:34:54'),(11,39,'2022-06-01 00:00:00',1,'[7, 10]','[7, 40]',1,'2022-06-02 14:39:41','2022-06-02 16:12:34','2022-06-02 16:34:54','2022-06-02 16:34:54'),(12,39,'2022-05-31 00:00:00',1,'[7, 10]','[7, 40]',1,'2022-06-02 14:39:41','2022-06-02 16:12:34','2022-06-02 16:34:54','2022-06-02 16:34:54');
/*!40000 ALTER TABLE `slot_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slots`
--

DROP TABLE IF EXISTS `slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slots` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bookingId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `queueId` int DEFAULT NULL,
  `start` json DEFAULT NULL,
  `end` json DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slots`
--

LOCK TABLES `slots` WRITE;
/*!40000 ALTER TABLE `slots` DISABLE KEYS */;
INSERT INTO `slots` VALUES (13,39,'2022-06-02 00:00:00',1,'[7, 10]','[7, 40]',1,'2022-06-02 14:39:41','2022-06-02 16:11:20'),(14,39,'2022-06-02 00:00:00',1,'[7, 10]','[7, 40]',1,'2022-06-02 14:39:41','2022-06-02 16:11:20'),(15,39,'2022-06-02 00:00:00',1,'[7, 10]','[7, 40]',1,'2022-06-02 14:39:41','2022-06-02 16:11:20'),(16,39,'2022-06-02 00:00:00',1,'[7, 10]','[7, 40]',1,'2022-06-02 14:39:41','2022-06-02 16:11:20'),(17,46,'2022-06-02 00:00:00',1,'[8, 10]','[8, 40]',1,'2022-06-02 14:39:41','2022-06-02 16:11:20'),(18,158,'2022-06-30 00:00:00',1,'[18, 0]','[18, 30]',1,'2022-06-05 12:41:56','2022-06-05 12:41:56'),(19,158,'2022-06-30 00:00:00',1,'[18, 0]','[18, 30]',1,'2022-06-07 14:02:55','2022-06-07 14:02:55'),(20,158,'2022-06-30 00:00:00',1,'[18, 0]','[18, 30]',1,'2022-06-07 14:05:15','2022-06-07 14:05:15'),(21,158,'2022-06-30 00:00:00',1,'[18, 0]','[18, 30]',1,'2022-06-07 14:07:24','2022-06-07 14:07:24'),(35,158,'2022-06-30 00:00:00',1,'[18, 0]','[18, 30]',1,'2022-06-07 14:29:52','2022-06-07 14:29:52'),(36,158,'2022-06-30 00:00:00',1,'[18, 0]','[18, 30]',1,'2022-06-07 14:30:34','2022-06-07 14:30:34'),(37,158,'2022-06-30 00:00:00',1,'[18, 0]','[18, 30]',1,'2022-06-07 14:36:00','2022-06-07 14:36:00'),(39,158,'2022-06-30 00:00:00',1,'[18, 0]','[18, 30]',1,'2022-06-07 15:59:09','2022-06-07 15:59:09'),(40,158,'2022-06-30 00:00:00',1,'[18, 0]','[18, 30]',1,'2022-06-07 16:00:19','2022-06-07 16:00:19'),(41,158,'2022-06-30 00:00:00',1,'[18, 0]','[18, 30]',1,'2022-06-07 16:01:08','2022-06-07 16:01:08'),(44,158,'2022-06-30 00:00:00',1,'[18, 0]','[18, 30]',1,'2022-08-11 10:22:33','2022-08-11 10:22:33'),(45,163,'2022-08-11 00:00:00',1,'[18, 0]','[18, 30]',1,'2022-08-11 10:45:47','2022-08-11 10:45:47'),(47,164,'2022-08-12 00:00:00',1,'[11, 30]','[12, 0]',1,'2022-08-12 05:44:45','2022-08-12 05:44:45'),(48,164,'2022-08-12 00:00:00',1,'[11, 30]','[12, 0]',1,'2022-08-12 05:46:23','2022-08-12 05:46:23'),(50,165,'2022-08-12 00:00:00',1,'[21, 55]','[22, 25]',1,'2022-08-12 09:57:56','2022-08-12 09:57:56');
/*!40000 ALTER TABLE `slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `businessId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'shenshah_staff','',0,NULL,'admin','admin@admin.com',NULL,'$2y$10$6dEkJcL3ZLaM1jvv.qIVyOntpk0iahDdyCfs0pJimOuVd1yrMY01i',NULL,NULL,NULL,'IKtKNNaGHA1BFtDSH6XaoJ4OKxJuj5bTKlSarCCHMOaIb3MPp0d1jxuEgUpG',NULL,NULL,NULL,NULL,NULL),(5,NULL,'',0,NULL,'jwt','jwtuser@gmail.com',NULL,'$2b$10$1gjKNKG1RR0yZUoD3hfjHumS2.BLTmSsj2RkU6g.wICRyqnuOwkQy',NULL,NULL,NULL,'M2cBWdPYEsLspc82bk7tLIFGSz0SxlL0FaPwsWdZ0g3pYh1bkRPm50Pq5Xno',NULL,NULL,NULL,NULL,NULL),(9,'shenshah_staff',NULL,2,NULL,'Booking list','Imtiaz@Imtiaz.com',NULL,'$2y$10$S/ozc3CJFn68I7Mjb3xIl.y48rIODo9G.WuGe9GQMeOjsiuVfWTh6',NULL,NULL,NULL,NULL,NULL,'Screenshot-2_1658819465.png','2022-07-26 02:11:05','2022-07-26 05:09:58',10),(10,'vendor_staff',NULL,3,NULL,'Booking list','Prismatic@customer.com',NULL,'$2y$10$ConlUHGRt7vIb.XBzTc4RebOOcYsIoiBYjR3cf7c0uRqFZUKRhGxa',NULL,NULL,NULL,NULL,NULL,'Screenshot-4_1658821885.png','2022-07-26 02:51:25','2022-07-26 03:00:38',7),(12,'vendor_staff',NULL,2,NULL,'ujju','rr@gmail.com',NULL,'$2y$10$nPkEuD4rL7eyYeHBGLJJK.DVQxRUeYYKu7AEUKedY3xDWT9mXBLpC',NULL,NULL,NULL,NULL,NULL,'Screenshot-1_1659098523.png','2022-07-29 07:42:03','2022-07-29 07:44:34',14),(13,'vendor_staff',NULL,2,NULL,'jjjjjjjjjjj','fd@gmail.com',NULL,'$2y$10$ose5ZatwRH3GGqkntMLVwO7la0cXmDTr4HOCBleiks3ec2zs04KMW',NULL,NULL,NULL,NULL,NULL,'Screenshot-1_1659099139.png','2022-07-29 07:52:19','2022-07-29 07:52:39',14),(14,'vendor_staff',NULL,3,NULL,'fff','jj@gmail.com',NULL,'$2y$10$oBEtPoPSmmkEwxMRNSiPV.tKuecbMX/hc4ryUPOCr7O3xiVyypE.m',NULL,NULL,NULL,NULL,NULL,'Screenshot-3_1659344573.png','2022-08-01 04:02:53','2022-08-01 04:02:53',19),(15,'vendor_staff',NULL,3,NULL,'tyht','fg@gmail.com',NULL,'$2y$10$sHt.n.9OyL8Vi1jZpNluKe.5Az4AEiItuIj7At7Z26AYEowbQtWay',NULL,NULL,NULL,NULL,NULL,'Screenshot-2_1659344868.png','2022-08-01 04:07:48','2022-08-01 04:07:48',19),(16,'shenshah_user','923078881628',3,NULL,'Kashig Gul','jwtuser4@gmail.com',NULL,'$2b$10$cjrIuTcRRtuiWBPP1RsPz.6jF9TyNXbUPBV0ve9iC9QYyLeyCQG6S',NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,NULL),(17,'vendor_manager',NULL,5,NULL,'Vendor User','aqib@gmail.com',NULL,'$2y$10$ps.jsmYEzhm7P0Lju8mlZuJXDBVvSAlzWjamigBpmuR.i/lkSwuaS',NULL,NULL,NULL,NULL,NULL,'ee_1660576266.jpg','2022-08-15 10:11:06','2022-08-15 10:11:06',NULL),(18,'shenshah_staff',NULL,3,NULL,'FFF','FFF@FFF.com',NULL,'$2y$10$/elwDQnf4Yj8tfEGG1zKr.Tv2srbWUJ7b/6eM27YCZw2TnyVus/pO',NULL,NULL,NULL,NULL,NULL,'44_1660624696.jpg','2022-08-15 23:38:16','2022-08-15 23:38:16',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_type`
--

DROP TABLE IF EXISTS `vehicle_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `status` enum('Active','In-Active') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_type`
--

LOCK TABLES `vehicle_type` WRITE;
/*!40000 ALTER TABLE `vehicle_type` DISABLE KEYS */;
INSERT INTO `vehicle_type` VALUES (1,'mmmm','Active','2022-07-18 04:31:30','2022-08-10 00:16:03',1),(4,'Suzuki','Active','2022-07-18 05:56:13','2022-07-18 05:56:13',1),(5,'sfdsf','Active','2022-07-18 06:27:15','2022-07-22 11:29:54',1),(7,'nnnn','Active','2022-08-10 00:11:51','2022-08-10 00:12:04',1),(8,'bnbnb','Active','2022-08-10 05:15:05','2022-08-10 05:15:18',1),(9,'fd','Active','2022-08-11 00:00:51','2022-08-11 00:01:06',1);
/*!40000 ALTER TABLE `vehicle_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customerId` int DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `emirate` varchar(45) DEFAULT NULL,
  `registration` varchar(45) DEFAULT NULL,
  `make` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `year` int DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `vin` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (1,1,'Sedan','Dubai','P 52789','Toyota','Corolla',2014,'Grey',NULL,'2022-06-02 14:39:46','2022-06-02 14:39:46'),(2,1,'Sedan','Dubai','P 61311','Nissan','Micra',2015,'White',NULL,'2022-06-02 14:39:46','2022-06-02 14:39:46'),(6,12,'Sedan','Sharjah','32145','Nissan','Altima',2014,'red',NULL,'2022-06-02 14:39:46','2022-06-02 14:39:46');
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workers`
--

DROP TABLE IF EXISTS `workers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `businessId` int DEFAULT NULL,
  `serviceId` int DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workers`
--

LOCK TABLES `workers` WRITE;
/*!40000 ALTER TABLE `workers` DISABLE KEYS */;
INSERT INTO `workers` VALUES (1,1,1,'zaka','w_img.png','971507285969',1,'2022-06-02 14:40:01','2022-06-02 14:40:01'),(2,1,1,'sfsd','http://localhost:8000/worker/1419555258.44.jpg','03236803561',1,'2022-08-17 00:25:43','2022-08-17 00:25:43'),(3,19,1,'Worker','http://localhost:8000/worker/533754131.44.jpg','03054987770',1,'2022-08-18 12:00:25','2022-08-18 12:00:25'),(4,21,2,'test worker','http://localhost:8000/worker/1076763708.ee.jpg','dfbdfb',1,'2022-08-19 08:35:13','2022-08-19 08:35:13'),(5,19,1,'mg','http://127.0.0.1:8000/worker/1040550481.44.jpg','03224674908',1,'2022-08-22 05:40:37','2022-08-22 05:43:46'),(6,19,1,'efv','http://localhost:8000/worker/1099410163.44.jpg','03127391831',1,'2022-08-22 06:43:44','2022-08-22 06:44:11'),(7,19,1,'rtg','http://localhost:8000/worker/1023774715.gg.jpg','03074698578',1,'2022-08-22 06:48:48','2022-08-22 06:48:48');
/*!40000 ALTER TABLE `workers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-11 11:46:38
