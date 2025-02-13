-- MariaDB dump 10.19  Distrib 10.6.16-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: viladmin_vilcom_portal
-- ------------------------------------------------------
-- Server version	10.6.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Office Equipment','Office related assets such as computers, printers etc','2024-07-02 08:20:29'),(2,'Server Equipment','Server related assets such as servers, storage etc','2024-07-02 08:20:29'),(3,'Network Equipment','Networking related assets such as routers, switches etc','2024-07-02 08:23:08'),(4,'Software License','Software licenses used','2024-07-02 08:23:08');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Commercial','The department for commercial','2024-07-02 07:28:15'),(3,'Rollout & Support','This is department for Projects & Rollout and support maintenance\r\n ','2024-07-02 07:29:18'),(4,'Finance','The finance department','2024-07-02 07:29:18'),(5,'Human Resource','This is the human resource department','2024-07-02 07:30:34'),(6,'IT and Systems','This is the IT and Systems department','2024-07-02 07:30:34'),(7,'Marketing','This is the marketing department','2024-07-02 07:37:38'),(8,'Planning and Design','This is the planning and design department','2024-07-02 07:37:38'),(9,'Procurement','This is the procurement department','2024-07-02 07:39:00'),(11,'Sales','This is the sales department','2024-07-02 07:40:53'),(12,'Special Projects','This is the special projects department','2024-07-02 07:40:53'),(14,'Management','This is the top level management','2024-07-02 07:42:24'),(15,'SOC','Service Operation Center','2024-07-09 10:04:01'),(17,'Former Employees','This are employees who left','2024-09-30 11:55:45'),(18,'Sales','This is the sales department','2024-10-01 07:40:12');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_depreciation_log`
--

DROP TABLE IF EXISTS `equipment_depreciation_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_depreciation_log` (
  `equipment_depreciation_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `depreciated_value` decimal(19,2) DEFAULT NULL,
  `equipment_id` int(11) NOT NULL,
  `upated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`equipment_depreciation_id`),
  KEY `equipment_has_equipment_depreciation_log` (`equipment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Keeps a log of depreciation values over time';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_depreciation_log`
--

LOCK TABLES `equipment_depreciation_log` WRITE;
/*!40000 ALTER TABLE `equipment_depreciation_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipment_depreciation_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_incident`
--

DROP TABLE IF EXISTS `equipment_incident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_incident` (
  `equipment_incident_id` int(11) NOT NULL AUTO_INCREMENT,
  `incident_date` date DEFAULT NULL,
  `type_of_incident` varchar(50) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `process` varchar(50) DEFAULT NULL,
  `priority` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `root_cause` text DEFAULT NULL,
  `action_plan` text DEFAULT NULL,
  `date_action_completed` date DEFAULT NULL,
  `equipment_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`equipment_incident_id`),
  KEY `equipment_has_equipment_incident` (`equipment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_incident`
--

LOCK TABLES `equipment_incident` WRITE;
/*!40000 ALTER TABLE `equipment_incident` DISABLE KEYS */;
INSERT INTO `equipment_incident` VALUES (1,'2024-07-04','type_of_incident','source','process','Low','Pending','description','root_cause','Dummy data','2024-07-01',3,'2024-07-04 05:46:29'),(2,'2024-07-04','Hardware Failure','Employee Feedback','Business Planning Process','Low','Approved','Internet connectivity on laptop','I might have dropped the laptop accidentally','Dummy Data','2024-07-01',3,'2024-07-04 07:01:17'),(3,'2024-07-15','Physical Damage','Employee Feedback','Rollout Process','Low','Approved','I accidentally poured water on the laptop while I was working','The keyboard is not funcioning','dummy data','2024-07-01',3,'2024-07-15 06:11:48'),(4,'2024-07-11','Performance Issue','Employee Feedback','Support and Maintenance','Medium','Pending','Computer components are outdated and require Upgrade\r\nFrom 500GB HDD to 256 GB SSD  KES 4,000\r\nBattery Replacement KES 2,800','Machine Aging','Action plan pending','2024-07-11',161,'2024-07-15 10:45:15'),(5,'2024-07-22','Power Issue','Employee Feedback','Rollout Process','Medium','Pending','The battery life has to pass','Battery needs replacement','Action plan pending','2024-07-22',3,'2024-07-22 10:32:36');
/*!40000 ALTER TABLE `equipment_incident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_repair`
--

DROP TABLE IF EXISTS `equipment_repair`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_repair` (
  `equipment_repair_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) DEFAULT NULL,
  `priority` varchar(30) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `equipment_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`equipment_repair_id`),
  KEY `equipment_has_repair` (`equipment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_repair`
--

LOCK TABLES `equipment_repair` WRITE;
/*!40000 ALTER TABLE `equipment_repair` DISABLE KEYS */;
INSERT INTO `equipment_repair` VALUES (1,'Replacement Recommended','High','2024-08-02',3,'2024-07-11 19:52:36');
/*!40000 ALTER TABLE `equipment_repair` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_warranty`
--

DROP TABLE IF EXISTS `equipment_warranty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_warranty` (
  `equipment_warranty_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `warranty_provider` text DEFAULT NULL COMMENT 'The name of the company or provider offering warranty',
  `warranty_type` varchar(30) DEFAULT NULL COMMENT 'Type of warranty(e.g. manufacturer''s warranty, extended warranty)',
  `warranty_details` text DEFAULT NULL COMMENT 'Details about what is covered under the warranty',
  `warranty_contact` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT 'Contact information for the warranty provider, email of phone',
  `equipment_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`equipment_warranty_id`),
  KEY `equipment_has_warranty` (`equipment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_warranty`
--

LOCK TABLES `equipment_warranty` WRITE;
/*!40000 ALTER TABLE `equipment_warranty` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipment_warranty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` text DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `customer_name` text DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `customer_email` text DEFAULT NULL,
  `customer_phone` varchar(50) DEFAULT NULL,
  `bank_name` text DEFAULT NULL,
  `account_name` text DEFAULT NULL,
  `account_number` text DEFAULT NULL,
  `mpesa` text DEFAULT NULL,
  `mpesa_name` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL COMMENT 'Paid, unpaid, refund, cancel',
  `discount` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(19,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`invoice_id`),
  KEY `user_has_invoice` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (5,'VL59571001','2024-07-18','ABC Company','Thika Road, Thika','info@abccompany.com','0707690456','Commercial Bank','ABC Company','01124356464785','0707690456','ABC Company',' All accounts are to be paid within 7 days from receipt of invoice.','Unpaid',0.00,230.24,1439.00,1669.24,2,'2024-07-06 14:09:05'),(6,'VL59571002','2024-07-25','Geonet Technologies','Embakasi','info@geonet-tech.co.ke','01143547465','KCB','Geonet Technologies','11233244243535','01143547465','John Doe','All accounts are to be paid within 7 days from receipt of invoice.','Unpaid',0.00,213584.80,1334905.00,1548489.80,2,'2024-07-06 19:16:33'),(7,'VL59571003','2024-07-11','Test 01','Nairobi','test01@vilcom.co.ke','0707690456','Commercial Bank','01124356464785','Test01','0707690456','Test01','Looking forward to working with you','Paid',0.00,219.36,1371.00,1590.36,1,'2024-07-08 10:21:15'),(8,'VL59571004','2024-07-26','Test01','Mombasa Road Ramco Court Block B','test01@gmail.com','0785949949','Equity Bank','Test01','1123244232452','N/A','N/A','Thank you!','Unpaid',1416.00,14340.96,89631.00,103971.96,2,'2024-07-19 09:03:00'),(9,'VL59571005','2024-08-03','Nakuru Warehouse','01 ojijord','rodgers.kipkirui@vilcom.co.ke','0727219046','Equity','Vilcom','1234567','88888',' Vilcom','Sale of fttb','Paid',0.00,0.00,0.00,0.00,5,'2024-08-02 08:43:37'),(10,'VL59571006','2024-10-07','Telcoptics Solutions Ltd','Mombasa, Haile Sellassie Avenue','joseph@josejiff.com','0736978322','N/A','N/A','N/A','N/A','N/A','Payment will be made through Mpesa prompt message in the website https://hosting.vilcom-net.co.ke/ once plan is selected','Unpaid',0.00,639.84,3999.00,4638.84,1,'2024-10-07 10:35:17'),(11,'VL59571007','2024-10-07','Telcoptics Solutions Ltd','Mombasa, Haile Sellassie Avenue','joseph@josejiff.com','0736978322','N/A','N/A','N/A','N/A','N/A','Payment will be made through Mpesa prompt message in the website https://hosting.vilcom-net.co.ke/ once plan is selected','Unpaid',0.00,551.52,3447.00,3998.52,1,'2024-10-07 10:43:44'),(12,'VL59571008','2024-10-08','Solomon Mbithi Mutua','Mombasa Rd','solomon.mutua@vilcom.co.ke','0729709011','equity','solomon','5788888888','897987','7787777','PAID','Paid',300.00,13872.00,86700.00,100572.00,58,'2024-10-08 09:05:00');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_item`
--

DROP TABLE IF EXISTS `invoice_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_item` (
  `invoice_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` text DEFAULT NULL,
  `item_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(19,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`invoice_item_id`),
  KEY `invoice_has_invoice_item` (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_item`
--

LOCK TABLES `invoice_item` WRITE;
/*!40000 ALTER TABLE `invoice_item` DISABLE KEYS */;
INSERT INTO `invoice_item` VALUES (11,'VL002','Farming IMS','Farming information management system',4,173.00,0.00,692.00,5,'2024-07-06 14:53:40'),(10,'VL001','Health IMS','Health Information Management System',3,145.00,0.00,435.00,5,'2024-07-06 14:52:38'),(12,'VL003','Inventory IMS','Inventory Information Management System',4,78.00,0.00,312.00,5,'2024-07-06 15:01:06'),(13,'VL001','Company Website','Development of the main company website',1,20435.00,0.00,20435.00,6,'2024-07-06 19:17:56'),(14,'VL002','South C Cabinets','Rent our cabinets at South C',4,34567.00,0.00,138268.00,6,'2024-07-06 19:19:22'),(15,'VL003','Health IMS','Health Information Management System',3,23465.00,0.00,70395.00,6,'2024-07-06 19:20:03'),(16,'VL004','Farming IMS','Farming information management system',7,143652.00,0.00,1005564.00,6,'2024-07-06 19:20:27'),(17,'VL005','Sales Tracking App','An app that tracks their sales agents',1,100243.00,0.00,100243.00,6,'2024-07-06 19:21:26'),(18,'VL001','Health IMS','Health Information Management System',3,457.00,0.00,1371.00,7,'2024-07-08 10:22:13'),(19,'VL001','Farming IMS','A farming information management system',4,19834.00,1248.00,78088.00,8,'2024-07-19 09:05:30'),(20,'VL002','Health IMS','Health Information Management System',7,1673.00,168.00,11543.00,8,'2024-07-19 09:07:22'),(21,'VL001','Shared Hosting Standard Plan','100GB NVMe SSD Disk Space',1,3999.00,0.00,3999.00,10,'2024-10-07 10:36:47'),(22,'VL001','Hosting Standard Plan','100GB NVMe SSD Disk Space',1,3447.00,0.00,3447.00,11,'2024-10-07 10:45:27'),(23,'VL001','WIFI','WIFI',30,2900.00,300.00,86700.00,12,'2024-10-08 09:05:10');
/*!40000 ALTER TABLE `invoice_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logistics`
--

DROP TABLE IF EXISTS `logistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logistics` (
  `logistics_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_description` text DEFAULT NULL,
  `model` text DEFAULT NULL,
  `acquisition_date` date DEFAULT NULL,
  `released_date` date DEFAULT NULL,
  `cost` decimal(19,2) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `serial_no` text DEFAULT NULL,
  `insurance_info` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `insurance_expiry` date DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `depreciation_rate` decimal(19,2) DEFAULT NULL,
  `current_value` decimal(19,2) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`logistics_id`),
  KEY `fk_department` (`department_id`),
  KEY `fk_user` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logistics`
--

LOCK TABLES `logistics` WRITE;
/*!40000 ALTER TABLE `logistics` DISABLE KEYS */;
INSERT INTO `logistics` VALUES (2,'Vehicle','Nissan NV200','2023-11-24','2023-11-24',1600000.00,'Mombasa','Active','KDN 107S','APA','Comprehensive','2024-12-13','OWN',0.25,1229115.82,3,23,'2024-10-22 14:22:54'),(3,'Vehicle','Nissan NV200','2023-11-24','2023-11-24',1600000.00,'Nairobi','Active','KDN 109S','APA','Comprehensive','2024-12-13','OWN',0.25,1229115.82,3,148,'2024-10-22 14:23:52'),(4,'Vehicle','Nissan NV200','2023-11-24','2023-11-24',1600000.00,'Rongai','Active','KDN 112S','APA','Comprehensive','2024-12-13','OWN',0.25,1229115.82,3,37,'2024-10-22 14:34:40'),(5,'Vehicle','Nissan NV200','2023-11-07','2023-11-07',1600000.00,'Nairobi','Active','KDN 112S','APA','Comprehensive','2024-11-22','OWN',0.25,1229115.82,12,17,'2024-10-22 14:29:22'),(6,'Vehicle','Probox','2023-11-24','2023-11-24',1200000.00,'Rongai','Active','KDN 391N','APA','Comprehensive','2024-11-23','OWN',0.25,921836.86,3,109,'2024-10-22 14:43:30'),(7,'Vehicle','Probox','2023-11-24','2023-11-24',1200000.00,'Nakuru','Active','KDN 392N','APA','Comprehensive','2024-11-24','OWN',0.25,921836.86,3,110,'2024-10-22 14:34:01'),(8,'Vehicle','Probox','2023-11-24','2023-11-24',1200000.00,'Eldoret','Active','KDN 394N','APA','Comprehensive','2023-11-25','OWN',0.10,1089524.20,3,108,'2024-10-22 14:35:53'),(9,'Vehicle','Probox','2023-11-07','2023-11-07',1200000.00,'Nairobi','Active','KDN 395N','APA','Comprehensive','2024-11-26','OWN',0.10,1089524.20,1,71,'2024-10-22 14:40:52'),(10,'Vehicle','Probox','2023-11-07','2023-11-07',1200000.00,'Rongai','Active','KDN 105S','APA','Comprehensive','2024-12-13','OWN',0.10,1089524.20,3,112,'2024-10-22 14:45:47'),(11,'Vehicle','Probox','2023-11-07','2023-11-07',1200000.00,'Mombasa','Active','KDN 106S','APA','Comprehensive','2024-12-13','OWN',0.10,1089524.20,3,113,'2024-10-22 14:48:32'),(12,'Vehicle','Probox','2024-10-01','2024-10-01',35000.00,'Nairobi','Active','KDA 835V','Directline','TPO','2025-10-02','Hired',0.25,35000.00,3,142,'2024-10-22 15:10:21'),(34,'Vehicle','Probox','2024-06-18','2024-06-18',40000.00,'Eldoret','Active','KDH 263J','Directline','TPO','2025-03-26','Hired',0.10,38619.58,3,135,'2024-10-23 13:01:13'),(33,'Vehicle','Probox','2024-05-31','2024-05-31',42500.00,'Nairobi','Active','KDQ 830D','APA','Comprehensive','2025-06-28','Hired',0.25,37699.11,5,60,'2024-10-23 12:54:28'),(15,'Vehicle','Probox','2024-02-19','2024-02-19',38000.00,'Lodwar','Active','KDM 781M','Kenyan Alliance','TPO','2024-08-18','Hired',0.10,35422.45,3,132,'2024-10-22 15:21:19'),(31,'Vehicle','Probox','2024-05-30','2024-05-30',40000.00,'Eldoret','Active','KDE 947W','The Monarch','TPO','2025-03-01','Hired',0.10,38281.98,3,149,'2024-10-23 12:46:28'),(17,'Vehicle','Probox','2024-03-26','2024-03-26',38000.00,'Nairobi','Active','KDA 814K','Directline','TPO','2024-12-19','Hired',0.10,35734.83,3,123,'2024-10-22 15:27:15'),(32,'Vehicle','Probox','2024-05-30','2024-05-30',40000.00,'Eldoret','Active','KDE 947W','The Monarch','TPO','2025-03-01','Hired',0.10,38281.98,3,149,'2024-10-23 12:46:28'),(19,'Vehicle','Probox','2024-04-04','2024-04-04',38000.00,'Rongai','Active','KCR 537G','Occidental','Comprehensive','2025-04-17','Hired',0.10,36049.97,3,128,'2024-10-22 15:35:36'),(29,'Vehicle','Nissan NV200','2024-01-01','2024-01-01',38000.00,'Nakuru','Active','KDE 429E','Trident','TPO','2024-11-17','Hired',0.10,35112.80,3,147,'2024-10-23 12:41:40'),(27,'Vehicle','Dyna Canter','2024-01-01','2024-01-01',90000.00,'Isiolo','Active','KDJ 217W','Africa MERCHANT','TPO','2024-12-10','Own',0.10,83161.90,3,127,'2024-10-23 12:36:13'),(22,'Vehicle','Probox','2024-04-26','2024-04-26',38000.00,'Rongai','Active','KDP 312Y','APA','TPO','2024-12-07','Hired',0.10,36049.97,3,145,'2024-10-22 15:44:54'),(24,'Vehicle','Probox','2024-05-04','2024-05-04',40000.00,'Nakuru','Active','KDK 894B','Trident','Comprehensive','2024-11-20','Hired',0.10,38281.98,3,146,'2024-10-23 09:09:05'),(25,'Vehicle','Probox','2024-05-07','2024-05-07',40000.00,'Nairobi','Active','KDL 263U','Kenyan Alliance','Comprehensive','2025-07-23','Hired',0.25,35481.52,9,56,'2024-10-23 12:53:36'),(28,'Vehicle','Nissan Juke','2024-03-05','2024-03-05',60000.00,'Nairobi','Active','KDH 978A','Africa MERCHANT','TPO','2025-01-08','Hired',0.10,56423.42,1,3,'2024-10-23 12:38:54'),(35,'Vehicle','Probox','2024-06-19','2024-06-19',40000.00,'Kitale','Active','KDH 263J','Directline','Comprehensive','2025-03-26','Hired',0.10,38619.58,3,138,'2024-10-23 13:03:17'),(36,'Vehicle','Probox','2024-09-03','2024-09-03',40000.00,'Nakuru','Active','KDJ 804X','Trident','TPO','2025-10-05','Hired',0.10,39650.34,3,122,'2024-10-23 13:08:28'),(37,'Vehicle','Probox','2023-09-05','2023-09-05',42500.00,'Eldoret','Active','KDN 864D','AIG','Comprehensive','2025-09-02','Hired',0.10,37915.63,3,139,'2024-10-23 13:12:23'),(38,'Vehicle','Probox','2024-01-01','2024-01-01',650000.00,'Meru','Active','KCX 725R','APA','Comprehensive','2025-01-13','Own',0.10,600613.71,3,116,'2024-10-23 13:18:27'),(39,'Vehicle','Probox','2024-01-01','2024-01-01',650000.00,'Meru','Active','KCX 743R','APA','Comprehensive','2025-01-14','Own',0.10,600613.71,3,117,'2024-10-23 13:19:56'),(40,'Vehicle','Probox','2024-01-01','2024-01-01',600000.00,'Nakuru','Active','KCV 885J','APA','Comprehensive','2025-07-17','Own',0.25,483556.47,3,118,'2024-10-23 13:23:55'),(41,'Vehicle','Probox','2024-01-01','2024-01-01',650000.00,'Ruiru','Active','KCQ 108D','APA','Comprehensive','2024-07-18','Own',0.10,600613.71,3,121,'2024-10-23 13:22:52'),(43,'Vehicle','Probox','2024-01-01','2024-01-01',600000.00,'Eldoret','Active','KCK 758Z','APA','Comprehensive','2025-07-27','Own',0.25,483556.47,3,134,'2024-10-23 13:40:42'),(44,'Vehicle','Probox','2024-01-01','2024-01-01',550000.00,'Eldoret','Active','KCK 762Z','APA','Comprehensive','2025-07-27','Own',0.25,443260.10,3,150,'2024-10-23 13:41:20'),(45,'Vehicle','Probox','2024-01-01','2024-01-01',550000.00,'Rongai','Active','KCK 712Z','APA','Comprehensive','2025-07-27','Own',0.10,508211.60,3,131,'2024-10-23 13:43:35'),(46,'Vehicle','Probox','2024-01-01','2024-01-01',550000.00,'Eldoret','Active','KCR 495S','APA','Comprehensive','2025-09-23','Own',0.10,508211.60,3,119,'2024-10-23 13:45:07'),(55,'Vehicle','Canter','2024-02-18','2024-02-18',1300000.00,'Nakuru','Active','KDA 740N','Trident','TPO','2025-02-09','Own',0.25,1073126.36,3,94,'2024-10-23 14:10:27'),(48,'Motor Bike','Motor Bike','2023-06-23','2023-06-23',65000.00,'Nairobi','Active','KMEF 753M','APA','Comprehensive','2025-09-06','Own',0.25,44292.31,9,56,'2024-10-23 13:50:04'),(49,'Vehicle','Probox','2024-01-01','2024-01-01',550000.00,'Eldoret','Active','KCR 364K','APA','Comprehensive','2025-08-24','Own',0.10,508211.60,3,120,'2024-10-23 13:49:38'),(50,'Fork Lift','Fork Lift','2024-01-01','2024-01-01',1100000.00,'Nairobi','Active','KMHA 505A','APA','Comprehensive','0001-01-01','Uninsured\r\nShared',0.10,1016423.20,9,130,'2024-10-23 13:52:47'),(56,'Vehicle','Canter','2023-11-22','2023-11-22',1100000.00,'Nairobi','Active','KDN 180W','APA','Comprehensive','2025-01-16','Own',0.10,998730.51,9,114,'2024-10-23 14:12:21'),(52,'Vehicle','Toyota Corolla','2024-10-01','2024-10-01',60000.00,'Nairobi','Active','KCK 709W','APA','Comprehensive','2025-10-01','Hired',0.10,60000.00,11,35,'2024-10-23 13:56:54'),(53,'Vehicle','Dyna Canter','2024-08-26','2024-01-01',1100000.00,'Nairobi','Active','KCT 388H','Trident','Comprehensive','2025-10-15','Own',0.25,1048502.72,3,96,'2024-10-23 14:28:24'),(57,'Vehicle','Probox','2024-05-25','2024-01-01',40000.00,'Bungoma','Active','KDN 607J','Invesco','Comprehensive','2025-02-27','Hired',0.25,35481.52,3,152,'2024-10-23 14:23:48'),(58,'Vehicle','Probox','2024-09-03','2024-01-01',40000.00,'Bungoma','Active','KDM 629Z','Directline','TPO','2024-09-25','Hired',0.10,39650.34,3,151,'2024-10-23 14:25:48');
/*!40000 ALTER TABLE `logistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `network_depreciaiton_log`
--

DROP TABLE IF EXISTS `network_depreciaiton_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `network_depreciaiton_log` (
  `network_depreciation_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `depreciated_value` decimal(19,2) DEFAULT NULL,
  `network_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`network_depreciation_id`),
  KEY `network_has_network_depreciation_log` (`network_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `network_depreciaiton_log`
--

LOCK TABLES `network_depreciaiton_log` WRITE;
/*!40000 ALTER TABLE `network_depreciaiton_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `network_depreciaiton_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `network_equipment`
--

DROP TABLE IF EXISTS `network_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `network_equipment` (
  `network_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` text DEFAULT NULL,
  `system_name` text DEFAULT NULL,
  `system_manufacturer` text DEFAULT NULL,
  `system_model` text DEFAULT NULL,
  `system_sku` text DEFAULT NULL,
  `processor` text DEFAULT NULL,
  `baseboard_product` text DEFAULT NULL,
  `installed_ram` text DEFAULT NULL,
  `storage_medium` text DEFAULT NULL,
  `serial_number` text DEFAULT NULL,
  `charger` text DEFAULT NULL,
  `date_issued` date DEFAULT NULL,
  `date_of_purchase` date DEFAULT NULL,
  `purchase_cost` decimal(19,2) DEFAULT NULL,
  `depreciation_rate` decimal(19,2) DEFAULT NULL,
  `current_value` decimal(19,2) DEFAULT NULL,
  `origin` varchar(30) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`network_id`),
  KEY `category_has_network_equipment` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `network_equipment`
--

LOCK TABLES `network_equipment` WRITE;
/*!40000 ALTER TABLE `network_equipment` DISABLE KEYS */;
INSERT INTO `network_equipment` VALUES (1,'Vilcom-Milimani_DC_BNG\n','BNG\n','NCA-5520','NCA-5520','5D8EEDAAE973B7DE','Intel(R) Xeon 6226R 2.9GHz, 16 Core','N/A','64.0 GB','1TB HDD','5D8EEDAAE973B7DE','Dual AC PSU','2021-03-11','2021-03-11',800000.00,0.25,306639.10,'Vilcom',3,'2024-07-08 06:13:25'),(2,'Vilcom-Milimani_DC_Switch_01','Switch','Huawei','Huawei','N/A','N/A','N/A','N/A','N/A','2102350DLTDMLB000302','Single AC PSUSingle AC PSU','2021-03-11','2021-03-11',400000.00,0.25,153319.55,'Vilcom',3,'2024-07-08 07:47:24'),(3,'Emerald server at Milimani Datacentre','VILCOM-AD-FS-2','HPE','ProLiant DL380e Gen8','N/A','Intel(R) Xeon(R) CPU E5-2407 0 @ 2.20GHz, 2195 Mhz, 4 Core(s), 4 Logical Processor(s)','N/A','24.0 GB','2TB HDD','CN741100CZ','Dual PSU','2021-02-19','2021-02-19',160000.00,0.25,55720.02,'Vilcom',1,'2024-10-08 11:06:29');
/*!40000 ALTER TABLE `network_equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `network_repair`
--

DROP TABLE IF EXISTS `network_repair`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `network_repair` (
  `network_repair_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) DEFAULT NULL,
  `priority` varchar(30) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `network_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`network_repair_id`),
  KEY `network_has_repair` (`network_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `network_repair`
--

LOCK TABLES `network_repair` WRITE;
/*!40000 ALTER TABLE `network_repair` DISABLE KEYS */;
/*!40000 ALTER TABLE `network_repair` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `network_warranty`
--

DROP TABLE IF EXISTS `network_warranty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `network_warranty` (
  `network_warranty_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `warranty_provider` text DEFAULT NULL,
  `warranty_type` varchar(30) DEFAULT NULL,
  `warranty_details` text DEFAULT NULL,
  `warranty_contact` text DEFAULT NULL,
  `network_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`network_warranty_id`),
  KEY `network_has_warranty` (`network_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `network_warranty`
--

LOCK TABLES `network_warranty` WRITE;
/*!40000 ALTER TABLE `network_warranty` DISABLE KEYS */;
/*!40000 ALTER TABLE `network_warranty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `office_equipment`
--

DROP TABLE IF EXISTS `office_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `office_equipment` (
  `equipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `system_name` text DEFAULT NULL,
  `system_manufacturer` text DEFAULT NULL,
  `system_model` text DEFAULT NULL,
  `system_sku` text DEFAULT NULL,
  `processor` text DEFAULT NULL,
  `baseboard_product` text DEFAULT NULL,
  `installed_ram` text DEFAULT NULL,
  `storage_medium` text DEFAULT NULL,
  `serial_number` text DEFAULT NULL,
  `charger` text DEFAULT NULL,
  `mouse_assigned` varchar(30) DEFAULT NULL,
  `date_issued` date DEFAULT NULL,
  `date_of_purchase` date DEFAULT NULL,
  `depreciation_rate` decimal(19,2) DEFAULT NULL,
  `current_value` decimal(19,2) DEFAULT NULL,
  `purchase_cost` decimal(19,2) DEFAULT NULL,
  `origin` varchar(30) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`equipment_id`),
  KEY `user_has_office_equipment` (`user_id`),
  KEY `category_has_office_equipment` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=180 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office_equipment`
--

LOCK TABLES `office_equipment` WRITE;
/*!40000 ALTER TABLE `office_equipment` DISABLE KEYS */;
INSERT INTO `office_equipment` VALUES (2,'VILCOM-063','HP','HP EliteBook 830 G5','3RB38UT#ABA','Intel(R) Core(TM) i5-8350U CPU @ 1.70GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','83B3','16.00 GB','256GB SSD','5CG92047GX','Issued','Yes','2024-04-04','2024-04-04',0.25,48220.29,55680.00,'Vilcom',1,1,'2024-10-11 11:29:18'),(3,'VILCOM-024','Apple','Apple M1 Imac','N/A','Apple Silicon M1','N/A','8GB','256GB SSD','FVFJD9JPQ6LC','Issued','Yes','2024-07-01','2024-07-30',0.25,142680.00,142680.00,'Vilcom',10,1,'2024-07-30 18:37:43'),(4,'DESKTOP-MMMBJU2','HP','HP EliteBook 840 G6','4WG30AV','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','16.00 GB','512 SSD','5CG9399TRT','Issued','Yes','2024-01-26','2023-01-01',0.25,34424.51,53000.00,'Vilcom',44,1,'2024-07-30 09:28:09'),(5,'VILCOM-062','HP','HP EliteBook 830 G5','3RB38UT#ABA','Intel(R) Core(TM) i5-8350U CPU @ 1.70GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','83B3','16.00 GB','256 SSD','5CG920476C','Issued','Yes','2024-04-04','2023-01-01',0.25,36165.22,55680.00,'Vilcom',5,1,'2024-07-30 09:41:25'),(6,'VILCOM-028','HP','HP EliteBook 840 G6','7TZ64UC#B1L','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','16.00 GB','512 SSD','5CG937575X','ISSUED','Yes','2023-08-04','2023-01-01',0.25,34424.51,53000.00,'Vilcom',11,1,'2024-07-09 09:58:52'),(7,'Monitor','Dell','Dell P2319H Monitor','N/A','N/A','N/A','N/A','N/A','CN-0FWXV1-TV200-9BF-0WBB-A07','N/A','No','2023-11-28','2023-01-01',0.25,9742.79,15000.00,'Vilcom',11,1,'2024-07-09 10:02:04'),(8,'VILCOM-079','HP','HP EliteBook 840 G6','4WG26AV','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','16.00 GB','256 SSD','5CG0091VXJ','ISSUED','Yes','2023-08-25','2023-01-01',0.25,34424.51,53000.00,'Vilcom',12,1,'2024-07-09 10:07:41'),(9,'Monitor','Dell','Dell P2319H Monitor','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-8CH-399I-A05','N/A','No','2024-04-13','2023-01-01',0.25,7144.71,11000.00,'Vilcom',12,1,'2024-07-09 11:28:00'),(10,'VILCOM-038','HP','HP EliteBook 830 G5','2FZ81AV','Intel(R) Core(TM) i5-7300U CPU @ 2.60GHz, 2712 Mhz, 2 Core(s), 4 Logical Processor(s)','83B3','16.00GB','16.00GB','5CG9191Y2C','N/A','Yes','2024-08-11','2023-01-01',0.25,34424.51,53000.00,'Vilcom',13,1,'2024-07-09 11:42:58'),(11,'Monitor','HP','HP E243','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-8CH-399I-A05','N/A','No','2024-07-01','2024-07-30',0.25,18000.00,18000.00,'Vilcom',12,1,'2024-07-30 12:57:24'),(12,'VILCOM-022','HP','HP EliteBook x360 1030 G3','6FV59UP#ABA','Intel(R) Core(TM) i5-8350U CPU @ 1.70GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','8438','16.00 GB','512GB SSD','5CD9129LFJ','ISSUED','Yes','2023-02-01','2023-01-01',0.25,32475.95,50000.00,'Vilcom',14,1,'2024-07-09 11:52:12'),(13,'VILCOM-075','HP','HP EliteBook 840 G6','4WG26AV','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','16GB','256GB SSD','5CG0020K3B','Issued','Yes','2023-08-25','2023-01-01',0.25,34424.51,53000.00,'Vilcom',15,1,'2024-07-09 11:58:10'),(14,'Monitor','Dell','Dell P2219H Monitor','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-8CH-399I-A07','N/A','No','2023-04-13','2023-01-01',0.25,7144.71,11000.00,'Vilcom',15,1,'2024-07-09 12:08:15'),(15,'WIRELESS-RADIO-','HP','HP EliteBook 830 G6','8BA97EC#B1L','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','854A','12.00GB','512GB SSD','5CG9482VDF','Issued','Yes','2023-08-09','2023-01-01',0.25,34424.51,53000.00,'Vilcom',17,1,'2024-07-29 07:00:16'),(16,'VILCOM-020','HP','HP ProBook 430 G5','5EC87PC#AB4','Intel(R) Core(TM) i5-8250U CPU @ 1.60GHz, 1800 Mhz, 4 Core(s), 8 Logical Processor(s)','8377','16.00GB','512GB SSD','5CD8504Y0Q','Issued','Yes','2023-04-05','2023-01-01',0.25,35723.55,55000.00,'Vilcom',16,1,'2024-07-09 12:21:03'),(17,'VILCOM-060','HP','HP EliteBook 745 G5','6NY10UP#ABA','AMD Ryzen 7 PRO 2700U w/ Radeon Vega Mobile Gfx, 2200 Mhz, 4 Core(s), 8 Logical Processor(s)','83D5','16.00GB','256GB SSD','5CG92653MV','Issued','Yes','2024-09-01','2024-09-25',0.25,55680.00,55680.00,'Vilcom',68,1,'2024-09-30 12:00:38'),(18,'VILCOM-051','HP','HP EliteBook 830 G6','9DB55EC#ABA','Intel(R) Core(TM) i5-8265U CPU @ 1.60GHz, 1800 Mhz, 4 Core(s), 8 Logical Processor(s)','854A','16.00GB','256GB SSD','5CG0150P7W','Issued','No','2024-02-29','2023-01-01',0.25,34060.78,52440.00,'Vilcom',19,1,'2024-07-09 12:49:41'),(19,'Android Phone','Xaiomi','Xiaomi Redmi 13C','N/A','Helio G85, Octa Core, 2â€‰GHz','N/A','16.00GB','128GB','51221/64NR12629','Issued','No','2024-06-03','2023-01-01',0.25,10716.41,16499.00,'Vilcom',19,1,'2024-07-09 12:54:19'),(20,'VILCOM-036','HP','HP EliteBook 830 G5','2FZ82AV','Intel(R) Core(TM) i5-8250U CPU @ 1.60GHz, 1800 Mhz, 4 Core(s), 8 Logical Processor(s)','83B3','16.00 GB','256GB SSD','5CG8372HFN','Issued','Yes','2023-09-12','2024-01-01',0.25,45899.35,53000.00,'Vilcom',21,1,'2024-07-09 13:08:35'),(21,'Monitor','Dell','Dell P2219H Monitor','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-91N-07AL-A03','Issued','No','2024-05-09','2023-01-01',0.25,7144.71,11000.00,'Vilcom',21,1,'2024-07-09 13:12:44'),(22,'VILCOM-074','HP','MINI-Desktop ProDesk 600 G9','2Z019LS#ABM','Helio G85, Octa Core, 2â€‰GHz','8598','16GB','256GB SSD 500GB HDD','8CC0113VT1','Issued','Yes','2024-06-03','2024-01-01',0.25,45899.35,53000.00,'Vilcom',20,1,'2024-07-29 08:20:30'),(23,'VILCOM-065','HP','HP EliteBook 830 G5','3RB38UT#ABA','Intel(R) Core(TM) i5-8350U CPU @ 1.70GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','83B3','16.00GB','256GB SSD','5CG9020D6D','Issued','Yes','2024-04-04','2023-01-01',0.25,36165.22,55680.00,'Vilcom',22,1,'2024-07-09 13:25:00'),(24,'VILCOM-001','HP','HP EliteBook Folio 1040 G1','K3A36PC#ABG','Intel(R) Core(TM) i5-4300U CPU @ 1.90GHz, 2501 Mhz, 2 Core(s), 4 Logical Processor(s)','213E','8.00 GB','256GB SSD','8CG52210CF','Issued','Yes','2021-03-09','2023-01-01',0.25,21155.60,35000.00,'Vilcom',106,1,'2024-10-08 09:47:18'),(25,'VILCOM-061','HP','HP EliteBook 840 G5','3YH32UC#ABA','Intel(R) Core(TM) i5-7300U CPU @ 2.60GHz, 2712 Mhz, 2 Core(s), 4 Logical Processor(s)','83B2','16.00 GB','256GB SSD','5CG9401LT1','Issued','Yes','2024-09-01','2024-09-05',0.25,55680.00,55680.00,'Vilcom',18,1,'2024-09-30 11:59:42'),(26,'Monitor','Dell','Dell P2219H Monitor','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-91N-085L-A03','Issued','Yes','2024-07-01','2024-05-15',0.25,10485.03,11000.00,'Vilcom',9,1,'2024-07-30 11:04:52'),(27,'VILCOM-048','HP','HP EliteBook x360 830 G6','7PK05PA#ABG','Intel(R) Core(TM) i5-8265U CPU @ 1.60GHz, 1800 Mhz, 4 Core(s), 8 Logical Processor(s)','8548','16.00 GB','256GB SSD','5CG95149F1','Issued','Yes','2023-06-04','2023-01-01',0.25,45206.53,69600.00,'Vilcom',25,1,'2024-07-09 13:40:11'),(28,'Monitor','Dell','Dell P2219H Monitor','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-8CH-03801-A03','Issued','No','2024-05-09','2023-01-01',0.25,7144.71,11000.00,'Vilcom',25,1,'2024-07-09 13:44:45'),(29,'VILCOM-046','HP','HP EliteBook 830 G6','7NK29UT#ABA','Intel(R) Core(TM) i5-8265U CPU @ 1.60GHz, 1800 Mhz, 4 Core(s), 8 Logical Processor(s)','8548','16.00 GB','256GB SSD','5CG93809TQ','Issued','Yes','2023-10-24','2023-01-01',0.25,35723.55,55000.00,'Vilcom',26,1,'2024-07-09 13:48:31'),(30,'VILCOM-034','HP','HP EliteBook 830 G5','2FZ81AV','Intel(R) Core(TM) i5-7300U CPU @ 2.60GHz, 2712 Mhz, 2 Core(s), 4 Logical Processor(s)','83B3','16.00 GB','256GB SSD','5CG9130PLG','Issued','Yes','2023-08-10','2023-01-01',0.25,34424.51,53000.00,'Vilcom',27,1,'2024-07-09 13:54:17'),(31,'VILCOM-040','HP','HP EliteBook 830 G6','8ML17ES#ABU','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','854A','16.00 GB','256GB SSD','5CG9513QN5','Issued','Yes','2023-09-20','2023-01-01',0.25,34424.51,53000.00,'Vilcom',28,1,'2024-07-09 13:58:13'),(32,'VILCOM-004','DELL','Latitude E5270','06DD','Intel(R) Core(TM) i5-6300U CPU @ 2.40GHz, 2501 Mhz, 2 Core(s), 4 Logical Processor(s)','08RCYC','8.00 GB','256GB SSD','DN4J0G2','Issued','Yes','2021-04-26','2023-01-01',0.25,22733.17,35000.00,'Vilcom',29,1,'2024-07-09 14:01:48'),(33,'VILCOM-030','HP','HP EliteBook 830 G5','2FZ81AV','Intel(R) Core(TM) i5-7300U CPU @ 2.60GHz, 2712 Mhz, 2 Core(s), 4 Logical Processor(s)','83B3','16.00 GB','256GB SSD','5CG9191XYL','Issued','Yes','0202-08-09','2023-01-01',0.25,34424.51,53000.00,'Vilcom',29,1,'2024-07-09 14:10:41'),(34,'Monitor','DELL','Dell P2319H Monitor','N/A','N/A','N/A','N/A','N/A','CN-0FWXV1-TV200-9B9-00AT-A07','Issued','Yes','2023-11-28','2023-01-01',0.25,9066.68,15000.00,'Vilcom',51,1,'2024-10-02 07:36:32'),(35,'VILCOM-058','HP','HP EliteBook 840 G6','8RK46PC#ABG','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','16.00 GB','256GB SSD','5CG95123V9','Issued','Yes','2024-03-07','2023-01-01',0.25,33655.53,55680.00,'Vilcom',5,1,'2024-10-02 07:39:28'),(36,'Monitor','DELL','Dell P2219H Monitor','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-9B9-01ET-A07','Issued','Yes','2024-04-13','2023-01-01',0.25,6648.90,11000.00,'Vilcom',86,1,'2024-10-02 07:38:34'),(37,'Monitor','Dell','Dell P2319H Monitor','1FH47AA 1FH47AC 1FH47A7','N/A','N/A','N/A','N/A','CNK9320RK4','Issued','No','2024-07-01','2024-07-30',0.25,11000.00,11000.00,'Vilcom',31,1,'2024-07-30 12:59:34'),(38,'VILCOM-047','HP','HP EliteBook 830 G5','2FZ82AV','Intel(R) Core(TM) i5-8250U CPU @ 1.60GHz, 1800 Mhz, 4 Core(s), 8 Logical Processor(s)','83B3','16.00 GB','512GB SSD','5CG9061DRJ','Issued','Yes','2023-10-16','2023-01-01',0.25,34424.51,53000.00,'Vilcom',31,1,'2024-07-09 14:29:17'),(39,'VILCOM-081','HP','HP EliteBook 840 G6','4WE10AV','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','854A','16.00 GB','256GB','5CG021B22H','Issued','Yes','2024-05-15','2024-01-01',0.25,45899.35,53000.00,'Vilcom',32,1,'2024-07-09 14:33:08'),(40,'VILCOM-066','HP ','HP EliteBook x360 1030 G2','1WB83AV','Intel(R) Core(TM) i5-7300U CPU @ 2.60GHz, 2712 Mhz, 2 Core(s), 4 Logical Processor(s)','83B3','16.00 GB','256GB SSD','5CG8206N4J','Issued','Yes','2023-09-01','2023-01-01',0.25,35723.55,55000.00,'Vilcom',35,1,'2024-07-30 05:42:14'),(41,'VILCOM-057','HP','HP EliteBook 745 G5','4JB95UT#ABA','AMD Ryzen 7 PRO 2700U w/ Radeon Vega Mobile Gfx, 2200 Mhz, 4 Core(s), 8 Logical Processor(s)','83D5','16.00 GB','256GB SSD','5CG94000BP','Issued','Yes','2024-03-04','2023-01-01',0.25,33655.53,55680.00,'Vilcom',104,1,'2024-10-08 07:58:59'),(42,'Monitor','Dell','Dell P2219H Monitor','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-91A-DRNBA-A03','Issued','No','2024-05-09','2023-01-01',0.25,7144.71,11000.00,'Vilcom',39,1,'2024-07-30 06:13:33'),(43,'VILCOM-023','HP','HP Pavilion Laptop 15-eg0xxx','2N1K7PA#ACJ','11th Gen Intel(R) Core(TM) i5-1135G7 @ 2.40GHz, 2419 Mhz, 4 Core(s), 8 Logical Processor(s)','8850','8.00 GB','512GB SSD','5CD1386PWS','Issued','Yes','2022-07-18','2023-01-01',0.25,51961.52,80000.00,'Vilcom',36,1,'2024-07-09 14:48:30'),(44,'VILCOM-052','HP','HP EliteBook 830 G6','9DB55EC#ABA','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','854A','16.00GB','256GB SSD','5CG0150P85','Issued','No','2024-02-26','2023-01-01',0.25,34060.78,52440.00,'Vilcom',37,1,'2024-07-09 14:56:54'),(45,'VILCOM-037','HP','HP EliteBook 830 G5','2FZ82AV','Intel(R) Core(TM) i5-8250U CPU @ 1.60GHz, 1800 Mhz, 4 Core(s), 8 Logical Processor(s)','83B3','16.00GB','512GB SSD','5CG8521W8G','Issued','Yes','2023-08-11','2023-01-01',0.25,34424.51,53000.00,'Vilcom',38,1,'2024-07-09 15:00:11'),(46,'VILCOM-077','HP','HP EliteBook 840 G6','4WG26AV','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','16.00GB','256GB SSD','5CG9501ZBW','Issued','Yes','2023-08-25','2023-01-01',0.25,34424.51,53000.00,'Vilcom',39,1,'2024-07-09 15:08:36'),(47,'VILCOM-033','HP','HP EliteBook 830 G5','2FZ81AV','Intel(R) Core(TM) i5-7300U CPU @ 2.60GHz, 2712 Mhz, 2 Core(s), 4 Logical Processor(s)','83B3','16.00 GB','256GB SSD','5CG9191ZC8','Issued','Yes','2023-08-10','2023-01-01',0.25,34424.51,53000.00,'Vilcom',55,1,'2024-07-09 15:12:11'),(48,'VILCOM-017','HP','HP ProBook 430 G5','5EC87PC#AB4','Intel(R) Core(TM) i5-8250U CPU @ 1.60GHz, 1800 Mhz, 4 Core(s), 8 Logical Processor(s)','8377','16.OOGB','512GB SSD','5CD8504Y0T','Issued','Yes','2024-04-05','2023-01-01',0.25,35723.55,55000.00,'Vilcom',56,1,'2024-07-09 15:17:43'),(49,'Monitor','DELL','Dell P2219H Monitor','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-91O-ALRL-A03','Issued','No','2024-04-05','2023-01-01',0.25,7144.71,11000.00,'Vilcom',56,1,'2024-07-09 15:20:09'),(50,'Monitor','Dell','Dell P2319H Monitor','N/A','N/A','N/A','N/A','N/A','CN-0FWXV1-TV259-9BF-0WBB-A07','Issued','Yes','2024-07-01','2024-07-31',0.25,11000.00,11000.00,'Vilcom',40,1,'2024-07-31 12:32:37'),(51,'VILCOM-082','HP','HP Zbook 14u G5','8RJ77PC#ABG','Intel(R) Core(TM) i7-8665U CPU ','8549','16.00 GB','512GB SSD','5CG0034GLB','Issued','Yes','2024-05-31','2023-01-01',0.25,50480.62,77720.00,'Vilcom',40,1,'2024-07-09 15:27:29'),(52,'VILCOM-031','HP','HP EliteBook 830 G5','2FZ81AV','Intel(R) Core(TM) i5-7300U CPU @ 2.60GHz, 2712 Mhz, 2 Core(s), 4 Logical Processor(s)','83B3','16.00GB','256GB SSD','5CG9191YMT','Issued','Yes','2023-08-10','2023-01-01',0.25,34424.51,53000.00,'Vilcom',41,1,'2024-07-09 15:32:59'),(53,'VILCOM-059','HP','HP EliteBook 840 G5','3YH32UC#ABA','Intel(R) Core(TM) i5-7300U CPU @ 2.60GHz, 2712 Mhz, 2 Core(s), 4 Logical Processor(s)','83B3','16.00GB','256GB SSD','5CG8454BV0','Issued','Yes','2023-03-07','2023-01-01',0.25,36165.22,55680.00,'Vilcom',43,1,'2024-07-30 06:34:31'),(54,'VILCOM-032','HP','HP EliteBook 830 G5','2FZ81AV','Intel(R) Core(TM) i5-7300U CPU @ 2.60GHz, 2712 Mhz, 2 Core(s), 4 Logical Processor(s)','83B3','16.00GB','256GB SSD','5CG9191Y5Q','Issued','Yes','2023-08-10','2023-01-01',0.25,34424.51,53000.00,'Vilcom',42,1,'2024-07-10 05:54:13'),(55,'Monitor','Dell','Dell P2219H Monitor','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-8CH-39H1-A03','Issued','No','2024-05-09','2023-01-01',0.25,7144.71,11000.00,'Vilcom',43,1,'2024-07-10 05:58:08'),(56,'VILCOM-066','HP','HP EliteBook 840 G6','3RB38UT#ABA','Intel(R) Core(TM) i5-8350U CPU @ 1.70GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','83B3','16.00GB','256GB SSD','5CG904458T','Issued','Yes','2024-04-24','2024-01-10',0.25,45962.83,55680.00,'Vilcom',33,1,'2024-09-17 07:32:48'),(57,'VILCOM-045','HP','HP EliteBook 830 G5','7YL62ES#ABU','Intel(R) Core(TM) i5-8350U CPU @ 1.70GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','83B3','16.00GB','512GB SSD','5CG9418J2H','Issued','Yes','2023-10-05','2023-01-01',0.25,34424.51,53000.00,'Vilcom',45,1,'2024-07-10 06:12:07'),(58,'VILCOM-084','HP','HP EliteBook 840 G5','9DB55EC#ABA','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','16.00GB','256GB SSD','5CG9033G8Z','Issued','Yes','2024-07-01','2024-07-30',0.25,48000.00,48000.00,'Vilcom',53,1,'2024-07-30 13:49:53'),(59,'VILCOM-076','HP','HP EliteBook 840 G6','4WG26AV','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','16.00GB','256GB SSD','5CG94209BP','Issued','Yes','2024-06-04','2023-01-01',0.25,32035.62,53000.00,'Vilcom',105,1,'2024-10-08 07:56:32'),(60,'DESKTOP-80I3CTN','HP','HP EliteBook 840 G6','3RF13UT#ABA','Intel(R) Core(TM) i5-8350U CPU @ 1.70GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','83B2','16.00 GB','512GB SSD','5CG9033G8Z','Issued','No','2024-02-10','2023-01-01',0.25,41439.32,63800.00,'Vilcom',47,1,'2024-07-10 06:49:55'),(61,'VILCOM-083','HP','HP EliteBook 840 G6','4WG26AV','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','16.OO GB','256GB SSD','5CG9074G8Z','Issued','Yes','2024-06-04','2023-01-01',0.25,31176.91,48000.00,'Vilcom',48,1,'2024-07-10 06:56:28'),(62,'VILCOM-073','HP','MINI-Desktop ProDesk 600 G8','2Z019LS#ABM','Intel(R) Core(TM) i7-9700T CPU @ 2.00GHz, 1992 Mhz, 8 Core(s), 8 Logical Processor(s)','8598','16.00GB','256GB SSD 500GB HDD','8CC0113W7B','Issued','Yes','2024-07-08','2024-07-30',0.25,45680.00,45680.00,'Vilcom',68,1,'2024-07-31 12:29:53'),(63,'Monitor','Dell','Dell P2219H Monitor','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-8CH-9CM9-A03','Issued','No','2024-04-12','2024-01-01',0.25,9526.28,11000.00,'Vilcom',5,1,'2024-07-30 09:45:33'),(64,'VILCOM-073','HP','MINI-Desktop ProDesk 600 G8','2Z019LS#ABM','Intel(R) Core(TM) i7-9700T CPU @ 2.00GHz, 1992 Mhz, 8 Core(s), 8 Logical Processor(s)','8598','16.00GB','256GB SSD 500GB HDD','8CC0113W7B','Issued','Yes','2024-06-04','2023-01-01',0.25,29020.51,44680.00,'Vilcom',49,1,'2024-07-10 07:34:55'),(65,'VILCOM-014','HP','HP ENVY Laptop 14-eb0xxx','31H10PA#ABG','11th Gen Intel(R) Core(TM) i5-1135G7 @ 2.40GHz, 2419 Mhz, 4 Core(s), 8 Logical Processor(s)','8815','16.00GB','512GB SSD','5CD0516J3M','Issued','Yes','2023-05-22','2024-01-01',0.25,85390.10,98600.00,'Vilcom',50,1,'2024-07-10 07:40:58'),(66,'Monitor','HP','HP E243i Monitor','N/A','N/A','N/A','N/A','N/A','CNK9300754','Issued','No','2024-01-30','2023-01-01',0.25,10522.21,16200.00,'Vilcom',50,1,'2024-07-10 07:47:52'),(67,'VILCOM-015','HP','HP EliteBook x360 1030 G3','5TQ06UP#ABA','Intel(R) Core(TM) i7-8650U CPU @ 1.90GHz, 2112 Mhz, 4 Core(s), 8 Logical Processor(s)','8438','16.00GB','512GB SSD','5CD916724P','Issued','Yes','2024-01-09','2023-01-01',0.25,32475.95,50000.00,'Vilcom',51,1,'2024-07-10 07:56:33'),(68,'VILCOM-088','HP','HP EliteBook 840 G6','4WG89AV','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','16.00GB','256GB SSD','5CG4574G8W','Issued','Yes','2024-07-01','2024-07-30',0.25,48000.00,48000.00,'Vilcom',52,1,'2024-07-31 10:05:34'),(69,'VILCOM-053','HP','HP EliteBook 830 G6','9DB55EC#ABA','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','854A','16.00GB','256GB SSD','5CG0150P62','Issued','No','2024-02-26','2023-01-01',0.25,34060.78,52440.00,'Vilcom',54,1,'2024-07-10 08:33:27'),(70,'VILCOM-085','HP','HP EliteBook 840 G6','4WG43AV','Intel(R) Core(TM) i5-7300U CPU @ 2.60GHz, 2712 Mhz, 2 Core(s), 4 Logical Processor(s)','8549','16.00GB','256GB SSD','5CG90237G8F','Issued','Yes','2024-07-01','2024-07-30',0.25,48000.00,48000.00,'Vilcom',1,1,'2024-07-30 13:48:10'),(71,'Monitor','Dell','Dell P2319H Monitor','N/A','N/A','N/A','N/A','N/A','CN-0FWXV1-TV200-989-01ET-A07','Issued','No','2023-11-28','2023-01-01',0.25,9742.79,15000.00,'Vilcom',57,1,'2024-07-10 08:45:56'),(72,'VILCOM-054','HP','HP EliteBook 830 G6','4WE10AV','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','854A','16.00GB','256GB SSD','5CG0219Z94','Issued','No','2024-02-27','2023-01-01',0.25,34060.78,52440.00,'Vilcom',57,1,'2024-07-10 08:51:37'),(73,'VILCOM-080','HP','HP EliteBook 840 G6','5WH22US#ABA','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','16.00GB','256GB SSD','5CG93434WH','Issued','Yes','2023-08-25','2023-01-01',0.25,34424.51,53000.00,'Vilcom',58,1,'2024-07-10 08:59:57'),(74,'Monitor','Dell','Dell P2219H Monitor','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-8CH-02H1-A03','Issued','No','2024-05-09','2023-01-01',0.25,7144.71,11000.00,'Vilcom',58,1,'2024-07-10 09:03:10'),(75,'VILCOM-056','HP','HP EliteBook 830 G6','5CG0150P7R','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','854A','16.00GB','256GB SSD','9DB55EC#ABA','Issued','No','2024-02-28','2023-01-01',0.25,34060.78,52440.00,'Vilcom',59,1,'2024-07-10 09:09:41'),(76,'DESKTOP-HKEBGGD','HP','HP EliteBook 830 G6','8JM82US#ABA','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','854A','16.00GB','512GB SSD','5CG9430T91','Issued','Yes','2024-09-18','2024-01-01',0.25,42714.15,53000.00,'Vilcom',101,1,'2024-10-01 14:30:09'),(77,'VILCOM-050','HP','HP EliteBook 840 G5','3RF09UT#ABA','Intel(R) Core(TM) i5-8250U CPU @ 1.60GHz, 1800 Mhz, 4 Core(s), 8 Logical Processor(s)','83B2','16.00GB','512GB SSD','5CG8125534','Issued','No','2024-02-19','2023-01-01',0.25,41439.32,63800.00,'Vilcom',60,1,'2024-07-10 09:20:26'),(78,'VILCOM-041','HP','HP EliteBook 830 G6','8ML17ES#ABU','Intel(R) Core(TM) i5-8365U CPU @ 1.60GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)','854A','16.00GB','256GB SSD','5CG945587V','Issued','Yes','2023-09-25','2023-01-01',0.25,34424.51,53000.00,'Vilcom',61,1,'2024-07-10 09:23:45'),(79,'TV','Hisense','N/A','N/A','N/A','N/A','N/A','N/A','3TE55F2316A901ACH510164','Issued','No','2023-11-28','2023-01-01',0.25,42218.74,65000.00,'Vilcom',68,1,'2024-07-10 10:19:43'),(80,'TV','Hisense','55A6G','N/A','N/A','N/A','N/A','N/A','Hisense-55A6G','Issued','No','2023-11-28','2023-01-01',0.25,42218.74,65000.00,'Vilcom',68,1,'2024-07-10 10:28:50'),(81,'CCTV','HIK Vision','N/A','N/A','N/A','N/A','N/A','N/A','DS-7608NI-Q2/8P0820190813CCRRD50003942WCVU','Issued','No','2021-03-25','2023-01-01',0.25,65195.47,100375.00,'Vilcom',68,1,'2024-07-10 10:33:31'),(82,'TV','TCL','N/A','N/A','N/A','N/A','N/A','N/A','2311ELG205866A00074','Issued','Yes','2023-11-28','2023-01-01',0.25,42575.97,65550.00,'Vilcom',68,1,'2024-07-10 11:23:24'),(83,'VILCOM-027','HP','HP EliteBook 840 G6','7YE17UC#B1L','Intel(R) Core(TM) i5-8365U CPU @ 2.30GHz, 2400 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','12.00 GB','500GB SSD','5CG9505LCZ','Issued','Yes','2024-05-17','2023-01-01',0.25,35723.55,55000.00,'Vilcom',68,1,'2024-07-10 11:45:14'),(84,'Monitor','Dell','Dell P2219H Monitor','N/A','N/A','N/A','N/A','N/A','CN-OV7JP5-QDC00-03A-0PT1-A38','Issued','Yes','2024-04-12','2023-01-01',0.25,7144.71,11000.00,'Vilcom',1,1,'2024-07-30 05:27:03'),(85,'VILCOM-072','HP','MINI-Desktop ProDesk 600 G7','2Z019LS#ABM','Intel(R) Core(TM) i7-9700T CPU @ 2.00GHz, 1992 Mhz, 8 Core(s), 8 Logical Processor(s)','8598','16.00GB','256GB SSD 500GB HDD','8CC0113VY9','Issued','Yes','2024-06-03','2023-01-01',0.25,36165.22,55680.00,'Vilcom',68,1,'2024-07-10 11:56:12'),(86,'CCTV','HIK Vision.Nvr & D-Link switch','DS-7608NI-Q1/8P/M.  DGS-F1100-10PS-E ','N/A','N/A','N/A','N/A','N/A','AF7881653   H110P23110887','Issued','No','2024-04-08','2023-01-01',0.25,33612.61,51750.00,'Vilcom',68,1,'2024-07-10 12:01:16'),(87,'VILCOM-019','LENOVO','VILCOM-019','LENOVO_MT_10M8_BU_Think_FM_ThinkCentre M710s','Intel(R) Core(TM) i7-7700 CPU @ 3.60GHz, 3600 Mhz, 4 Core(s), 8 Logical Processor(s)','3102','8.00GB','256GB SSD + 500GB HDD','PC0NC3W3','Issued','Yes','2024-07-01','2024-07-31',0.25,50000.00,50000.00,'Vilcom',70,1,'2024-07-30 12:19:40'),(88,'VILCOM-AD-FS-7','LENOVO','10M8S4GM00','LENOVO_MT_10M8_BU_Think_FM_ThinkCentre M710s','Intel(R) Core(TM) i5-7500 CPU @ 3.40GHz, 3408 Mhz, 4 Core(s), 4 Logical Processor(s)','3102','8.00GB','256GB SSD + 500GB HDD','PC0RVBHW','Issued','Yes','2024-07-01','2024-07-31',0.25,50000.00,50000.00,'Vilcom',70,1,'2024-07-30 12:26:35'),(89,'VILCOM-025','LENOVO','10SKS21Q01','LENOVO_MT_10SK_BU_Think_FM_ThinkCentre M920s','Intel(R) Core(TM) i7-8700 CPU @ 3.20GHz, 3192 Mhz, 6 Core(s), 12 Logical Processor(s)','3132','16.00GB','256GB SSD + 500GB HDD','PC1627VT','Issued','Yes','2024-07-01','2024-07-31',0.25,46400.00,46400.00,'Vilcom',70,1,'2024-07-30 12:18:53'),(90,'WIN-9DV6B2ANQ8F','LENOVO','10SKS21Q01','LENOVO_MT_10SK_BU_Think_FM_ThinkCentre M920s','Intel(R) Core(TM) i7-8700 CPU @ 3.20GHz, 3192 Mhz, 6 Core(s), 12 Logical Processor(s)','3132','16.00GB','256GB SSD + 500GB HDD','PC1627VW','Issued','Yes','2024-01-01','2024-07-30',0.25,46400.00,46400.00,'Vilcom',70,1,'2024-07-30 12:17:45'),(91,'VILCOM-042','LENOVO','10SKS21Q01','LENOVO_MT_10SK_BU_Think_FM_ThinkCentre M920s','Intel(R) Core(TM) i7-8700 CPU @ 3.20GHz, 3192 Mhz, 6 Core(s), 12 Logical Processor(s)','3132','12.00GB','256GB SSD + 500GB HDD','PC16KZ0R','Issued','Yes','2024-01-01','2024-07-30',0.25,35000.00,35000.00,'Vilcom',70,1,'2024-07-30 12:14:08'),(92,'VILCOM-037','HP','HP EliteBook 830 G5','5CG9505LCZ','Intel(R) Core(TM) i5-8365U CPU @ 2.30GHz, 2400 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','12.00GB','500GB SSD','5CG8521W8G','Issued','Yes','2024-07-01','2024-07-30',0.25,55000.00,55000.00,'Vilcom',87,1,'2024-07-31 10:48:09'),(93,'VILCOM-027','HP','HP EliteBook 840 G6','5CG9505LCZ','Intel(R) Core(TM) i5-8365U CPU @ 2.30GHz, 2400 Mhz, 4 Core(s), 8 Logical Processor(s)','8549','12.00GB','500GB SSD','500GB SSD','Issued','Yes','2024-12-05','2023-01-01',0.25,35723.55,55000.00,'Vilcom',68,1,'2024-07-11 10:33:13'),(94,'VILCOM-021','HP','HP EliteBook x360 1030 G2','2TJ74UC#ABA','Intel(R) Core(TM) i7-7600U CPU @ 2.80GHz, 2904 Mhz, 2 Core(s), 4 Logical Processor(s)','827D','16.00GB','256GB SSD','5CG8336BWS','Issued','Yes','2024-03-06','2023-01-01',0.25,35723.55,55000.00,'Vilcom',68,1,'2024-07-11 10:39:11'),(95,'VILCOM-072','HP','MINI-Desktop ProDesk 600 G7','2Z019LS#ABM','Intel(R) Core(TM) i7-9700T CPU @ 2.00GHz, 1992 Mhz, 8 Core(s), 8 Logical Processor(s)','8598','16.00GB','256GB SSD 500GB HDD','8CC0113VY9','Issued','Yes','2024-03-06','2023-01-01',0.25,35723.55,55000.00,'Vilcom',68,1,'2024-07-11 10:47:08'),(96,'VILCOM-072','HP','MINI-Desktop ProDesk 600 G7','2Z019LS#ABM','Intel(R) Core(TM) i7-9700T CPU @ 2.00GHz, 1992 Mhz, 8 Core(s), 8 Logical Processor(s)','8598','16.00GB','256GB SSD 500GB HDD','8CC0113VY9','Issued','Yes','2024-03-06','2023-01-01',0.25,35723.55,55000.00,'Vilcom',68,1,'2024-07-11 11:28:12'),(97,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',52,1,'2024-07-31 10:50:22'),(98,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',54,1,'2024-07-31 10:41:13'),(99,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',58,1,'2024-07-31 10:51:20'),(100,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',56,1,'2024-07-31 10:52:58'),(101,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',22,1,'2024-07-31 10:55:21'),(102,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',59,1,'2024-07-31 10:55:58'),(103,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',72,1,'2024-07-31 10:56:58'),(104,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',73,1,'2024-07-31 11:00:03'),(105,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',74,1,'2024-07-31 11:00:53'),(106,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',1,1,'2024-07-31 11:01:29'),(107,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',76,1,'2024-07-31 11:02:15'),(108,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',77,1,'2024-07-31 11:03:09'),(109,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',78,1,'2024-07-31 11:03:58'),(110,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',79,1,'2024-07-31 10:22:03'),(111,'Headphones','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,3667.00,3667.00,'Vilcom',80,1,'2024-07-31 10:23:09'),(112,'IP Phones','Grand Stream','9o','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-03-06','2023-01-01',0.25,7253.35,12000.00,'Vilcom',47,1,'2024-10-02 07:42:49'),(113,'IP Phone','Grand Stream','9o','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-03-06','2023-01-01',0.25,7253.35,12000.00,'Vilcom',10,1,'2024-10-02 07:44:10'),(114,'IP Phone','Grand Stream','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-03-06','2023-01-01',0.25,7253.35,12000.00,'Vilcom',26,1,'2024-10-02 07:43:41'),(115,'IP Phone','Grand Stream','9o','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-03-06','2023-01-01',0.25,7253.35,12000.00,'Vilcom',58,1,'2024-10-02 07:45:17'),(116,'IP Phone','Grand Stream','9o','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-03-06','2023-01-01',0.25,7253.35,12000.00,'Vilcom',53,1,'2024-10-02 07:49:43'),(117,'IP Phone','Grand Stream','9o','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-03-06','2024-01-01',0.25,9671.13,12000.00,'Vilcom',44,1,'2024-10-02 07:50:11'),(118,'IP Phone','Grand Stream','9o','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-03-06','2023-01-01',0.25,7253.35,12000.00,'Vilcom',19,1,'2024-10-02 07:51:46'),(119,'IP Phone','Grand Stream','9o','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-03-06','2023-01-01',0.25,7253.35,12000.00,'Vilcom',50,1,'2024-10-02 07:52:21'),(120,'IP Phone','Grand Stream','9o','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-03-06','2023-01-01',0.25,7253.35,12000.00,'Vilcom',9,1,'2024-10-02 07:53:57'),(121,'IP Phone','Grand Stream','9o','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2023-01-01',0.25,7794.23,12000.00,'Vilcom',68,1,'2024-07-11 12:26:20'),(122,'IP Phone','Grand Stream','9o','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2023-01-01',0.25,7794.23,12000.00,'Vilcom',68,1,'2024-07-11 12:34:59'),(123,'IP Phone','Grand Stream','9o','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2023-01-01',0.25,7794.23,12000.00,'Vilcom',68,1,'2024-07-11 12:43:14'),(124,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,5500.00,5500.00,'Vilcom',81,1,'2024-07-31 10:24:17'),(125,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,5500.00,5500.00,'Vilcom',82,1,'2024-07-31 10:28:06'),(126,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,5500.00,5500.00,'Vilcom',84,1,'2024-07-31 10:30:26'),(127,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,5500.00,5500.00,'Vilcom',86,1,'2024-07-31 10:31:27'),(128,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,5500.00,5500.00,'Vilcom',61,1,'2024-07-31 10:32:05'),(129,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,5500.00,5500.00,'Vilcom',16,1,'2024-07-31 10:33:31'),(130,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,5500.00,5500.00,'Vilcom',27,1,'2024-07-31 10:34:23'),(131,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,5500.00,5500.00,'Vilcom',13,1,'2024-07-31 10:38:37'),(132,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,5500.00,5500.00,'Vilcom',42,1,'2024-07-31 10:42:34'),(133,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,5500.00,5500.00,'Vilcom',87,1,'2024-07-31 10:48:56'),(134,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2024-01-01',0.25,4763.14,5500.00,'Vilcom',68,1,'2024-07-12 06:35:22'),(135,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2023-01-01',0.25,3572.35,5500.00,'Vilcom',68,1,'2024-07-12 06:41:04'),(136,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2023-01-01',0.25,3572.35,5500.00,'Vilcom',68,1,'2024-07-12 06:41:53'),(137,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-03-06','2024-01-01',0.25,4763.14,5500.00,'Vilcom',68,1,'2024-07-12 06:44:16'),(138,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2023-01-01',0.25,3572.35,5500.00,'Vilcom',68,1,'2024-07-12 06:45:04'),(139,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2023-01-01',0.25,3572.35,5500.00,'Vilcom',68,1,'2024-07-12 06:45:56'),(140,'Headphone','LOGITECH','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-04','2023-01-01',0.25,3572.35,5500.00,'Vilcom',68,1,'2024-07-12 06:47:06'),(141,'Headphone','LOGITECH','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-04','2023-01-01',0.25,3572.35,5500.00,'Vilcom',68,1,'2024-07-12 06:48:44'),(142,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2023-01-01',0.25,3572.35,5500.00,'Vilcom',68,1,'2024-07-12 07:02:16'),(143,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2023-01-01',0.25,3572.35,5500.00,'Vilcom',68,1,'2024-07-12 07:04:00'),(144,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2023-01-01',0.25,3572.35,5500.00,'Vilcom',68,1,'2024-07-12 07:05:28'),(145,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2023-01-01',0.25,3572.35,5500.00,'Vilcom',68,1,'2024-07-12 07:06:19'),(146,'Headphone','LOGITECH','H540','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-03-06','2023-01-01',0.25,3572.35,5500.00,'Vilcom',68,1,'2024-07-12 07:54:25'),(147,'VILCOM-072','HP','MINI-Desktop ProDesk 600 G7','2Z019LS#ABM','Intel(R) Core(TM) i7-9700T CPU @ 2.00GHz, 1992 Mhz, 8 Core(s), 8 Logical Processor(s)','8598','16.00GB','256GB SSD 500GB HDD','8CC0113VY9','Issued','Yes','2024-03-06','2023-01-01',0.25,0.00,0.00,'Vilcom',70,1,'2024-10-08 09:47:47'),(148,'VILCOM-072','HP','MINI-Desktop ProDesk 600 G7','2Z019LS#ABM','Intel(R) Core(TM) i7-9700T CPU @ 2.00GHz, 1992 Mhz, 8 Core(s), 8 Logical Processor(s)','8598','16.00GB','256GB SSD 500GB HDD','8CC0113VY9','Issued','Yes','2024-03-06','2023-01-01',0.25,0.00,0.00,'Vilcom',70,1,'2024-10-08 09:48:11'),(149,'VILCOM-043','LENOVO','10SKS21Q01','LENOVO_MT_10SK_BU_Think_FM_ThinkCentre M920s','Intel(R) Core(TM) i7-8700 CPU @ 3.20GHz, 3192 Mhz, 6 Core(s), 12 Logical Processor(s)','3132','12.00GB','256GB SSD 500GB HDD','PC14PVKY','Issued','Yes','2023-01-10','2023-01-01',0.25,22733.17,35000.00,'Vilcom',70,1,'2024-07-12 09:41:29'),(150,'VILCOM-044','LENOVO','10SKS21Q01','LENOVO_MT_10SK_BU_Think_FM_ThinkCentre M920s','Intel(R) Core(TM) i7-8700 CPU @ 3.20GHz, 3192 Mhz, 6 Core(s), 12 Logical Processor(s)','3132','12.00GB','256GB SSD 500GB HDD','PC1627VY','Issued','Yes','2023-01-10','2023-01-01',0.25,22733.17,35000.00,'Vilcom',70,1,'2024-07-12 09:44:48'),(151,'TO BE ASSIGNED','LAPTOP','10SKS21Q01','N/A','N/A','N/A','12.00GB','N/A','PC1567VY','Issued','Yes','2024-07-01','2024-07-30',0.25,35000.00,35000.00,'Vilcom',1,1,'2024-07-30 12:29:02'),(162,'Monitor','Dell','Dell P2319H Monitor','4WG26AV','N/A','N/A','N/A','N/A','CN-0FWXV1-TV200-9BF-0WBB-A07','N/A','Yes','2024-07-01','2024-07-30',0.25,11000.00,11000.00,'Vilcom',34,1,'2024-07-30 13:01:20'),(152,'Monitor','HP','HP E243 Monitor','N/A','N/A','N/A','12.00GB','N/A','6CMA350S2M','Issued','No','2023-01-10','2023-01-01',0.25,6495.19,10000.00,'Vilcom',70,1,'2024-07-12 10:10:09'),(153,'Monitor','HP','HP E243 Monitor','N/A','N/A','N/A','N/A','N/A','3CQ3251K92','Issued','No','2023-01-10','2023-01-01',0.25,6495.19,10000.00,'Vilcom',70,1,'2024-07-12 10:13:43'),(154,'Monitor','HP','HP E243 Monitor','N/A','N/A','N/A','N/A','N/A','3CQ3301HGC','Issued','No','2023-01-10','2023-01-01',0.25,6495.19,10000.00,'Vilcom',70,1,'2024-07-12 10:16:31'),(155,'Monitor','HP','HP E243 Monitor','N/A','N/A','N/A','N/A','N/A','6CM3482KTT','Issued','No','2023-01-10','2023-01-01',0.25,6495.19,10000.00,'Vilcom',70,1,'2024-07-12 10:20:30'),(156,'Monitor','Dell','Dell Monitor','N/A','N/A','N/A','N/A','N/A','N/A','Issued','No','2023-01-10','2023-01-01',0.25,6495.19,10000.00,'Vilcom',70,1,'2024-07-12 10:22:41'),(157,'Monitor','Dell','Dell Monitor','N/A','N/A','N/A','N/A','N/A','CN-OYDJM4-9CP-17WL-A14','Issued','No','2023-01-10','2023-01-01',0.25,6495.19,10000.00,'Vilcom',70,1,'2024-07-12 10:25:02'),(158,'Monitor','HP','HP E243 Monitor','N/A','N/A','N/A','N/A','N/A','3CQ0350RQP','Issued','No','2023-01-10','2023-01-01',0.25,6495.19,10000.00,'Vilcom',70,1,'2024-07-12 10:28:07'),(159,'Monitor','HP','HP E243 Monitor','N/A','N/A','N/A','N/A','N/A','3CQ0350RQP','Issued','No','2023-01-10','2023-01-01',0.25,6495.19,10000.00,'Vilcom',70,1,'2024-07-12 10:39:46'),(160,'VILCOM-006','HP','HP EliteBook 840 G3','2FV34UC#ABA','Intel(R) Core(TM) i5-6300U CPU @ 2.40GHz, 2496 Mhz, 2 Core(s), 4 Logical Processor(s)','8079','8.00GB','256GB SSD','5CG7433C0B','Issued','Yes','2021-02-09','2023-01-01',0.25,27279.80,42000.00,'Vilcom',71,1,'2024-07-12 12:19:02'),(161,'VILCOM-002','HP','HP ProBook 430 G3','Y5W97PA#AB4','Intel(R) Core(TM) i7-6500U CPU @ 2.50GHz, 2592 Mhz, 2 Core(s), 4 Logical Processor(s)','80FF','8.00 GB','512 HDD','5CD712BRZR','ISSUED','Yes','2024-06-21','2021-03-09',0.25,13415.46,35000.00,'Vilcom',68,1,'2024-07-15 10:36:23'),(163,'Monitor','Dell','Dell P2319H Monitor','N/A','N/A','N/A','N/A','N/A','CN-0FWXV1-TV259-9BF-0WBB-A07','N/A','Yes','2024-07-01','2024-07-30',0.25,11000.00,11000.00,'Vilcom',46,1,'2024-07-30 13:02:59'),(164,'Laptop Stand','NA','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-07-01','2024-07-30',0.25,800.00,800.00,'Vilcom',58,1,'2024-07-30 13:30:13'),(165,'Laptop Stand','NA','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,800.00,800.00,'Vilcom',45,1,'2024-07-30 13:30:49'),(166,'Laptop Stand','NA','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-07-01','2024-07-30',0.25,800.00,800.00,'Vilcom',28,1,'2024-07-30 13:31:27'),(167,'Laptop Stand','NA','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,800.00,800.00,'Vilcom',26,1,'2024-07-30 13:33:55'),(168,'Laptop Stand','NA','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-07-01','2024-07-30',0.25,800.00,800.00,'Vilcom',14,1,'2024-07-30 13:34:33'),(169,'Laptop Stand','NA','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-07-01','2024-07-30',0.25,800.00,800.00,'Vilcom',7,1,'2024-07-30 13:48:33'),(170,'Laptop Stand','NA','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-07-30','2024-07-01',0.25,800.00,800.00,'Vilcom',59,1,'2024-07-31 10:07:54'),(171,'Laptop Stand','NA','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,1500.00,1500.00,'Vilcom',32,1,'2024-07-31 12:29:09'),(172,'Laptop Stand','NA','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','Yes','2024-07-01','2024-07-30',0.25,1500.00,1500.00,'Vilcom',48,1,'2024-07-31 12:28:21'),(173,'Laptop Stand','NA','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','No','2024-07-01','2024-07-31',0.25,1500.00,1500.00,'Vilcom',40,1,'2024-07-31 12:34:14'),(174,'VILCOM-021','HP','HP EliteBook x360 1030 G2','2TJ74UC#ABA','Intel(R) Core(TM) i7-7600U CPU @ 2.80GHz, 2904 Mhz, 2 Core(s), 4 Logical Processor(s)','827D','16.00 GB','256 SSD','5CG8336BWS','ISSUED','Yes','2024-10-01','2024-10-01',0.25,55000.00,55000.00,'Vilcom',90,1,'2024-10-01 14:53:15'),(175,'VILCOM-106','HP','HP EliteBook 830 G6','2TJ74UC#ABA','Intel(R) Core(TM) i5-7600U CPU @ 2.80GHz, 2904 Mhz, 2 Core(s), 4 Logical Processor(s)','827D','16.00 GB','256 SSD','5CG9192VR5','ISSUED','Yes','2024-01-01','2024-10-02',0.25,55000.00,55000.00,'Vilcom',91,1,'2024-10-08 07:53:16'),(176,'VILCOM-106','HP','HP EliteBook 830 G6','2TJ74UC#ABA','Intel(R) Core(TM) i5-7600U CPU @ 2.80GHz, 2904 Mhz, 2 Core(s), 4 Logical Processor(s)','827D','16.00 GB','256 SSD','5CG8355C23','ISSUED','Yes','2024-01-08','2024-10-08',0.25,55000.00,55000.00,'Vilcom',6,1,'2024-10-08 07:54:47'),(177,'Lenovo Tablet','Lenovo','TB350XU','N/A','N/A','N/A','6 GB','128 GB','869309064612273','ISSUED','Yes','2024-01-01','2024-01-01',0.25,44326.01,55000.00,'Vilcom',29,1,'2024-10-09 10:11:01'),(178,'Lenovo Tablet','Lenovo','TB350XU','N/A','N/A','N/A','6 GB','128 GB','869309064612273','ISSUED','Yes','2024-10-01','2024-10-01',0.25,55000.00,55000.00,'Vilcom',29,1,'2024-10-09 10:12:10'),(179,'VILCOM-123','HP','HP Zbook Fury 17 G7  Mobile Workstation','302M4EC#ABB','Intel(R) Core(TM) i7-10850 CPU @ 2.70GHz, 2712 Mhz, 6 Core(s), 12 Logical Processor(s)','8780','32','512 SSD','CND11339H8','ISSUED','Yes','2025-02-12','2025-02-11',0.25,69000.00,69000.00,'Vilcom',90,1,'2025-02-12 14:01:08');
/*!40000 ALTER TABLE `office_equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quote`
--

DROP TABLE IF EXISTS `quote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quote` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_number` text DEFAULT NULL,
  `quote_date` date DEFAULT NULL,
  `customer_name` text DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `customer_email` text DEFAULT NULL,
  `customer_phone` varchar(50) DEFAULT NULL,
  `bank_name` text DEFAULT NULL,
  `account_name` text DEFAULT NULL,
  `account_number` text DEFAULT NULL,
  `mpesa` text DEFAULT NULL,
  `mpesa_name` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL COMMENT 'pending, approved, rejected, default:pending',
  `discount` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(19,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`quote_id`),
  KEY `user_has_quote` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quote`
--

LOCK TABLES `quote` WRITE;
/*!40000 ALTER TABLE `quote` DISABLE KEYS */;
INSERT INTO `quote` VALUES (1,'VLQ59571001','2024-07-07','ABC Company','Thika Road, Thika','info@abccompany.com','0707690456','Commercial Bank','ABC Company','21172374747474','0707690456','ABC Company','Looking forward to working with you','Pending',0.00,146109.28,913183.00,1059292.28,2,'2024-07-07 07:24:26'),(2,'VLQ59571002','2024-07-08','Victor Kimaiyo','moi ave 24','victor.kimaiyo@vilcom.co.ke','0703632585','Equity','vilcom','0722346004','567145','0722346004','Looking forward for your approval','Pending',0.00,2980.80,18630.00,21610.80,5,'2024-07-08 15:14:24'),(3,'VLQ59571003','2024-07-10','Rodgers Tome Momanyi','Astrol, Utawala - Nairobi, Kenya','rodgers.momanyi@vilcom.co.ke','0711411020','test','test','test','test','test','test','Pending',0.00,32000.00,200000.00,232000.00,9,'2024-07-09 13:14:40'),(4,'VLQ59571004','2024-07-17','bajiinsurance','Ramco Court, Mombasa Road','bajiinsuranceltd@gmail.com','0720 676767','N/A','N/A','N/A','N/A','N/A','Thank you for choosing to work with us.','Pending',0.00,5600.00,35000.00,40600.00,39,'2024-07-17 10:49:58'),(5,'VLQ59571005','2024-07-19','Saro labs','Nairobi','info@sarolabs.io','0707690456','Equity Bank','Saro','1123244232452','N/A','N/A','Thank you for choosing to working with us','Pending',13864.00,116649.28,729058.00,845707.28,2,'2024-07-19 07:26:21'),(6,'VLQ59571006','2024-07-19','Test01','Mombasa Road Ramco Court Block B','test01@gmail.com','0785949949','Equity Bank','Test01','1123244232452','N/A','N/A','Thank you for choosing to working with us','Approved',0.00,23576.48,147353.00,170929.48,2,'2024-07-19 07:50:28'),(7,'VLQ59571007','2024-07-22','Test01','Mombasa Road Ramco Court Block B','test01@gmail.com','0785949949','N/A','N/A','N/A','0785949949','Test01','Thank for choosing to work with us','Pending',91000.00,132276.80,826730.00,959006.80,2,'2024-07-22 10:36:17'),(8,'VLQ59571008','2024-07-23','Elvis Chirchir','Road C','elvis.chirchir@vilcom.co.ke','0710202075','N/A','N/A','N/A','0710202075','Elvis Chirchir','Thank you to choosing to working with us','Pending',0.00,564.80,3530.00,4094.80,25,'2024-07-23 12:56:48'),(9,'VLQ59571009','2024-08-10','Omnivoltaic Energy Solutions (Kenya) Co. LTD','N/A','susanah_onacha@omnivoltaic.com','0705 197026','N/A','N/A','N/A','N/A','N/A','Thanks for choosing to work with us','Approved',0.00,8736.00,54600.00,63336.00,39,'2024-08-10 09:04:15'),(10,'VLQ59571010','2024-10-08','Solomon Mbithi Mutua','Mombasa Rd','solomon.mutua@vilcom.co.ke','0729709011','equity','solomon','5788888888','897987','808988888','pay before EOD','Pending',300.00,13872.00,86700.00,100572.00,58,'2024-10-08 09:01:20'),(11,'VLQ59571011','2024-11-19','Hon Charles M. Ongoto','Ramco Court House No. A13','charlesongoto@yahoo.com','0712045712','N/A','N/A','N/A','N/A','N/A','Payment details for the web development service will be shared once work is completed, for the shared web hosting, payment is automated','Pending',0.00,2482.56,15516.00,17998.56,1,'2024-11-19 08:35:24');
/*!40000 ALTER TABLE `quote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quote_item`
--

DROP TABLE IF EXISTS `quote_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quote_item` (
  `quote_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` text DEFAULT NULL,
  `item_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(19,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `quote_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`quote_item_id`),
  KEY `quote_has_quote_item` (`quote_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quote_item`
--

LOCK TABLES `quote_item` WRITE;
/*!40000 ALTER TABLE `quote_item` DISABLE KEYS */;
INSERT INTO `quote_item` VALUES (1,'VL001','South C Cabinets','Rent our cabinets at South C',3,123000.00,0.00,369000.00,1,'2024-07-07 07:25:03'),(2,'VL002','Health IMS','Health Information Management System',1,23445.00,0.00,23445.00,1,'2024-07-07 07:25:34'),(3,'VL003','Farming IMS','Farming information management system',1,456732.00,0.00,456732.00,1,'2024-07-07 07:26:07'),(4,'VL004','Company Website','Development of the main company website',2,32003.00,0.00,64006.00,1,'2024-07-07 07:26:37'),(5,'VL001','web service','webdesign',5,3726.00,0.00,18630.00,2,'2024-07-08 15:15:15'),(6,'VL001','laptop','laptop',4,50000.00,0.00,200000.00,3,'2024-07-09 13:15:26'),(7,'VL001','Grandstream GWN7625 ','GWN 4x4:4 and 2x2:2 Indoor Wi-Fi 5 Access Point',2,17500.00,0.00,35000.00,4,'2024-07-17 10:53:36'),(8,'VL001','Farming IMS','A farming information management system',3,13450.00,900.00,39450.00,5,'2024-07-19 07:27:11'),(9,'VL002','Health IMS','Health Information Management System',4,175643.00,12964.00,689608.00,5,'2024-07-19 07:28:18'),(10,'VL001','Farming IMS','A farming information management system',7,14567.00,0.00,101969.00,6,'2024-07-19 07:55:13'),(11,'VL002','Health IMS','Health Information Management System',8,5673.00,0.00,45384.00,6,'2024-07-19 08:00:01'),(12,'VL001','Farming IMS','A farming information management system',3,17643.00,0.00,52929.00,7,'2024-07-22 10:38:20'),(13,'VL002','4K Screen Monitor','A monitor for analysis',7,123543.00,91000.00,773801.00,7,'2024-07-22 10:39:11'),(14,'VL001','Dark Fiber','Installation cost(One off Cost)',1,2200.00,0.00,2200.00,8,'2024-07-23 12:59:35'),(15,'VL002','ICOLO','ICOLO TO SEACOM 18.9Km DF  (1st July 2024- 31st July 2024)',19,70.00,0.00,1330.00,8,'2024-07-23 13:00:42'),(16,'VL001','Grandstream GWN7625 ','GWN 4x4:4 and 2x2:2 Indoor Wi-Fi 5 Access Point',2,21000.00,0.00,42000.00,9,'2024-08-10 09:20:14'),(17,'VL002','Installation Cost','(Labour)',1,12600.00,0.00,12600.00,9,'2024-08-10 09:22:02'),(18,'VL001','WIFI','WIFI',30,2900.00,300.00,86700.00,10,'2024-10-08 09:02:08'),(19,'VL001','100 GB Shared Hosting ','100GB Shared Hosting Plan',1,3447.00,0.00,3447.00,11,'2024-11-19 08:37:42'),(20,'VL002','Website','Web Design & Development Service',1,12069.00,0.00,12069.00,11,'2024-11-19 08:39:12');
/*!40000 ALTER TABLE `quote_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `priority` varchar(30) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`request_id`),
  KEY `user_has_request` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES (1,'Mouse','I need a mouse for use','Approved','Low',2,'2024-07-03 11:45:16'),(2,'Keyboard','I need a key board for multitasking','Pending','Low',2,'2024-07-03 11:57:13'),(3,'High end PC','I need a laptop with a higher graphics processing unit and a more higher RAM and processing for increased processing and execution','Approved','Low',2,'2024-07-07 16:18:13'),(4,'4K Screen Monitor','For efficient analysis because the data is  humorgous','Pending','Medium',2,'2024-07-22 10:27:06'),(5,'mouse','replacemebt','Approved','High',25,'2024-07-23 12:46:29'),(6,'Laptop ','A good Laptop able to accept all systems needed at SOC department for efficiency and easy  task handling without any disruptions.','Pending','High',74,'2024-08-15 12:30:38'),(7,'Laptop, Headset & Mouse.','Work Laptop and its accessories, Mouse and Headset for Retention agent Munene Mwenda.','Pending','High',54,'2024-08-16 06:29:59'),(8,'Laptop ','I am writing to inform you that there are currently no computers available in the SOC department. Due to this, I would like to request a laptop to ensure I can continue my work efficiently.Please let me know the process for obtaining a laptop or if there is any additional information you need from me to facilitate this request.','Pending','Medium',76,'2024-08-23 08:03:06');
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Admin','This is the administrator of the whole web portal','2024-07-02 07:25:11'),(2,'Management','This is the top level management','2024-07-02 07:25:11'),(3,'HOD','This is the head of department','2024-07-02 07:26:06'),(4,'Staff','This is an employee','2024-07-02 07:26:06'),(5,'Auditor','The Auditor','2024-11-18 17:37:50');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server`
--

DROP TABLE IF EXISTS `server`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server` (
  `server_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` text DEFAULT NULL,
  `system_name` text DEFAULT NULL,
  `system_manufacturer` text DEFAULT NULL,
  `system_model` text DEFAULT NULL,
  `system_sku` text DEFAULT NULL,
  `processor` text DEFAULT NULL,
  `baseboard_product` text DEFAULT NULL,
  `installed_ram` text DEFAULT NULL,
  `storage_medium` text DEFAULT NULL,
  `serial_number` text DEFAULT NULL,
  `charger` text DEFAULT NULL,
  `date_issued` date DEFAULT NULL,
  `date_of_purchase` date DEFAULT NULL,
  `depreciation_rate` decimal(19,2) DEFAULT NULL,
  `current_value` decimal(19,2) DEFAULT NULL,
  `purchase_cost` decimal(19,2) DEFAULT NULL,
  `origin` varchar(30) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`server_id`),
  KEY `category_has_server` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server`
--

LOCK TABLES `server` WRITE;
/*!40000 ALTER TABLE `server` DISABLE KEYS */;
INSERT INTO `server` VALUES (1,'Emerald server at Milimani Datacentre','VILCOM-AD-FS-2','HPE','ProLiant DL380e Gen8','668666-291','Intel(R) Xeon(R) CPU E5-2407 0 @ 2.20GHz, 2195 Mhz, 4 Core(s), 4 Logical Processor(s)','N/A','24.0 GB','2TB HDD','CN741100CZ','Dual PSU','2021-02-19','2021-02-19',0.25,59875.06,160000.00,'Vilcom',2,'2024-07-08 07:54:04');
/*!40000 ALTER TABLE `server` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_depreciaiton_log`
--

DROP TABLE IF EXISTS `server_depreciaiton_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_depreciaiton_log` (
  `server_depreciation_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `depreciated_value` decimal(19,2) DEFAULT NULL,
  `server_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`server_depreciation_id`),
  KEY `server_has_server_depreciation_log` (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_depreciaiton_log`
--

LOCK TABLES `server_depreciaiton_log` WRITE;
/*!40000 ALTER TABLE `server_depreciaiton_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `server_depreciaiton_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_repair`
--

DROP TABLE IF EXISTS `server_repair`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_repair` (
  `server_repair_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) DEFAULT NULL,
  `priority` varchar(30) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `server_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`server_repair_id`),
  KEY `server_has_repair` (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_repair`
--

LOCK TABLES `server_repair` WRITE;
/*!40000 ALTER TABLE `server_repair` DISABLE KEYS */;
/*!40000 ALTER TABLE `server_repair` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_warranty`
--

DROP TABLE IF EXISTS `server_warranty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_warranty` (
  `server_warranty_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `warranty_provider` text DEFAULT NULL,
  `warranty_type` varchar(30) DEFAULT NULL,
  `warranty_details` text DEFAULT NULL,
  `warranty_contact` text DEFAULT NULL,
  `server_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`server_warranty_id`),
  KEY `server_has_warranty` (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_warranty`
--

LOCK TABLES `server_warranty` WRITE;
/*!40000 ALTER TABLE `server_warranty` DISABLE KEYS */;
/*!40000 ALTER TABLE `server_warranty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `software_license`
--

DROP TABLE IF EXISTS `software_license`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `software_license` (
  `license_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `license_key` text DEFAULT NULL,
  `issued_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `purchase_cost` decimal(19,2) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`license_id`),
  KEY `user_has_software_license` (`user_id`),
  KEY `category_has_software_license` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `software_license`
--

LOCK TABLES `software_license` WRITE;
/*!40000 ALTER TABLE `software_license` DISABLE KEYS */;
/*!40000 ALTER TABLE `software_license` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support_machines`
--

DROP TABLE IF EXISTS `support_machines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `support_machines` (
  `support_machine_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_description` text DEFAULT NULL,
  `model` text DEFAULT NULL,
  `acquisition_date` date DEFAULT NULL,
  `released_date` date DEFAULT NULL,
  `cost` decimal(19,2) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `serial_no` text DEFAULT NULL,
  `insurance_info` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `calibration_status` text DEFAULT NULL,
  `calibration_certno` text DEFAULT NULL,
  `asset_id` text DEFAULT NULL,
  `repair_details` text DEFAULT NULL,
  `repaired_by` text DEFAULT NULL,
  `insurance_expiry` date DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `depreciation_rate` decimal(19,2) DEFAULT NULL,
  `current_value` decimal(19,2) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`support_machine_id`),
  KEY `fk_department` (`department_id`),
  KEY `fk_user` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_machines`
--

LOCK TABLES `support_machines` WRITE;
/*!40000 ALTER TABLE `support_machines` DISABLE KEYS */;
INSERT INTO `support_machines` VALUES (2,'Splicing Machine','FUJIKURA 90S','2023-07-06','2023-07-06',668250.00,'Eldoret','Active','HW6VT12LCA2XXNVH','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','own',0.25,455359.06,3,108,'2024-11-20 10:43:43'),(3,'Splicing Machine','FUJIKURA 90S','2022-01-01','2022-01-01',668250.00,'Eldoret','Active','XL0STAZMM6VADSHK','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Repaired',0.25,302940.57,3,139,'2024-10-24 08:14:46'),(4,'Splicing Machine','FUJIKURA 90S','2022-01-01','2022-01-01',668250.00,'Nakuru','Active','AYKN3XEZ8FTRXV09','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Own',0.25,302940.57,3,122,'2024-10-24 08:14:19'),(5,'Splicing Machine','FUJIKURA 90S','2022-01-01','2022-01-01',668250.00,'Nakuru','Active','7LK65EV400YXD5F5','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Own',0.25,302940.57,3,110,'2024-10-24 08:20:15'),(8,'Splicing Machine','FUJIKURA 90S','2023-08-08','2023-08-08',668250.00,'Mombasa','Active','7W967BVD06YLBZHX','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Own',0.10,590956.11,3,113,'2024-10-24 08:19:13'),(7,'Splicing Machine','FUJIKURA 90S','2024-01-30','2024-01-30',668250.00,'Nairobi','Active','LTL9660X4HAMBC16','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','New',0.10,617477.09,3,141,'2024-10-24 08:16:28'),(9,'Splicing Machine','FUJIKURA 90S','2024-03-27','2024-03-27',668250.00,'Rongai','Active','KMVJ4145E26HYEDL','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Own',0.10,628415.80,3,112,'2024-10-24 08:21:56'),(10,'Splicing Machine','FUJIKURA 90S','2024-04-26','2024-04-26',668250.00,'Nakuru','Active','G8S5Z5GZJBCHZZ7B','1 YEAR','Comprehensive','Active','012197-001',NULL,NULL,NULL,'2024-07-07','Own',0.10,633957.61,3,110,'2024-11-20 13:35:30'),(11,'Splicing Machine','FUJIKURA 90S','2024-08-16','2024-08-16',668250.00,'Office','Inactive','DSJN81ZRMCROX426','1 YEAR','Comprehensive','Active','012197-001',NULL,NULL,NULL,'2025-07-07','New',0.10,656617.90,3,57,'2024-11-20 13:36:02'),(12,'Splicing Machine','FUJIKURA 90S','2024-08-16','2024-08-16',668250.00,'Office','Inactive','G6DRBDSEJEAZWTDO','1 YEAR','Comprehensive','Active','012197-001',NULL,NULL,NULL,'2025-07-07','New',0.10,656617.90,3,57,'2024-11-20 13:36:20'),(13,'Splicing Machine','FUJIKURA 80S','2022-01-01','2022-01-01',400000.00,'Office','Active','XWMKTKLOTPLFXLKS','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Own',0.25,181333.68,3,57,'2024-10-24 08:35:35'),(14,'Splicing Machine','FUJIKURA 80S','2022-01-01','2022-01-01',400000.00,'Office','Active','IJVKS6VT4073XFDL','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Status Active',0.25,168750.00,3,37,'2025-01-09 05:57:37'),(15,'Splicing Machine','FUJIKURA 80S','2022-01-01','2022-01-01',400000.00,'Nairobi','Active','3L34TMWAEPV3XHVI','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Own',0.25,181333.68,3,71,'2024-10-24 08:47:11'),(16,'Splicing Machine','FUJIKURA 70S','2022-01-01','2022-01-01',350000.00,'Office','Inactive','MPGMXSS40JWDNAHR','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Own',0.10,261959.98,3,57,'2024-10-24 08:38:36'),(17,'Splicing Machine','FUJIKURA 62S','2022-01-01','2022-01-01',300000.00,'Nakuru','Inactive','8H8W37FI6Y5KW8EG','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Own',0.25,136000.26,3,53,'2024-10-24 08:49:04'),(18,'Splicing Machine','FUJIKURA 62S','2022-01-01','2022-01-01',300000.00,'Rongai','Active','CR4XC29HVNRCNWSA','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Own',0.25,136000.26,3,144,'2024-10-24 08:48:00'),(19,'Splicing Machine','FUJIKURA 62S','2022-01-01','2022-01-01',300000.00,'Eldoret','Inactive','THXOVY88XV6W1KY','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Own',0.10,224537.12,9,44,'2024-10-24 08:46:16'),(20,'Splicing Machine','FUJIKURA 41S','2022-01-01','2022-01-01',321030.00,'Kitale','Active','4KD39Z54VY6SNYNW','1 YEAR','Comprehensive',NULL,NULL,'VNL02/23/FSM/ELD\n',NULL,NULL,'2025-07-07','VNL02/23/FSM/ELD\r\n',0.25,145533.88,3,138,'2024-11-20 15:09:20'),(21,'Splicing Machine','Signal Fire','2024-01-30','2024-01-30',120000.00,'Office','Inactive','A33A23062554','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Repaired ',0.25,94420.36,3,57,'2024-11-19 11:35:02'),(22,'Splicing Machine','Signal Fire','2024-06-06','2024-06-06',120000.00,'Rongai','Active','A33N23051139','1 YEAR','Comprehensive',NULL,NULL,'VNL/03/23/FSM\n',NULL,NULL,'2025-07-07','VNL/03/23/FSM\r\n',0.25,109027.24,3,109,'2024-11-20 15:09:32'),(23,'Splicing Machine','Signal Fire','2024-08-01','2024-08-01',120000.00,'Rongai','Active','A33B23060048','1 YEAR','Comprehensive',NULL,NULL,'VNL/04/23/RNG\n',NULL,NULL,'2024-07-07','VNL/04/23/RNG\r\n',0.25,114382.12,3,131,'2024-11-20 15:09:41'),(24,'Splicing Machine','Signal Fire','2024-06-06','2024-06-06',120000.00,'Isiolo','Active','A33P23070052','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2024-07-07','Null',0.10,115858.73,3,137,'2024-10-24 09:04:40'),(25,'Splicing Machine','Signal Fire','2024-08-01','2024-08-01',120000.00,'Rongai','Active','A33F23070488','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Null',0.25,114382.12,3,142,'2024-10-24 09:07:21'),(26,'Splicing Machine','Signal Fire','2024-01-30','2024-01-30',120000.00,'Nakuru','Active','A33C23071358','1 YEAR','Comprehensive',NULL,NULL,'VNL/FFM/12/24/FS\n',NULL,NULL,'2024-07-07','VNL/FFM/12/24/FS\r\n',0.10,110882.53,3,118,'2024-11-20 15:09:54'),(27,'Splicing Machine','Signal Fire','2023-11-22','2023-11-22',120000.00,'Nakuru','Active','A33B23071353','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Null',0.10,108952.42,1,147,'2024-10-24 09:10:45'),(28,'Splicing Machine','Signal Fire','2024-06-05','2024-06-05',120000.00,'Nakuru','Active','A33123052204','1 YEAR','Comprehensive',NULL,NULL,'VNL/SPM/01/23\n',NULL,NULL,'2025-07-07','VNL/SPM/01/23\r\n',0.10,115858.73,3,117,'2024-11-20 15:10:03'),(29,'Splicing Machine','Signal Fire','2023-01-10','2023-01-10',120000.00,'Eldoret','Active','A33B23070778','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Null',0.10,99794.28,3,150,'2024-10-24 09:13:44'),(30,'Splicing Machine','Signal Fire','2023-11-22','2023-11-22',120000.00,'Eldoret','Active','A33Q23063742','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Null',0.10,108952.42,3,120,'2024-10-24 09:15:34'),(31,'Splicing Machine','Signal Fire','2024-06-06','2024-06-06',120000.00,'Eldoret','Active','A33B23070737','1 YEAR','Comprehensive',NULL,NULL,'VNL/05/23/FSM\n',NULL,NULL,'2025-07-07','VNL/05/23/FSM\r\n',0.10,115858.73,3,134,'2024-11-20 15:10:11'),(32,'Splicing Machine','Signal Fire','2024-01-30','2024-01-30',120000.00,'Kakamega','Active','A33B23071505','1 YEAR','Comprehensive',NULL,NULL,'VNL/FFS/11/24/FS\n',NULL,NULL,'2025-07-07','VNL/FFS/11/24/FS\r\n',0.25,96711.29,3,151,'2024-11-20 15:10:19'),(33,'Splicing Machine','Signal Fire','2024-01-30','2024-01-30',120000.00,'Nairobi','Active','A33B23071505','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Null',0.10,110882.53,1,17,'2024-10-24 09:24:16'),(35,'Splicing Machine','Signal Fire','2023-02-27','2023-02-27',120000.00,'Nakuru','Active','A33R23073727','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','South C',0.10,100674.33,3,146,'2024-10-24 09:27:39'),(36,'Splicing Machine','Signal Fire','2023-02-27','2023-02-27',120000.00,'Mombasa','Active','A33Q23062541','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Null',0.10,100674.33,3,123,'2024-10-24 09:29:29'),(37,'Splicing Machine','Signal Fire','2023-02-27','2023-02-27',120000.00,'Meru','Active','A33D23063182','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Repaired, in Isiolo\r\n',0.10,100674.33,3,116,'2024-10-24 09:31:20'),(38,'Splicing Machine','Signal Fire','2023-02-27','2023-02-27',120000.00,'Ruiru','Active','A33P23070035','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Null',0.10,100674.33,1,128,'2024-10-24 09:32:56'),(39,'Splicing Machine','Signal Fire','2023-02-27','2023-02-27',120000.00,'Ruiru','Active','A33P23070035','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Null',0.10,100674.33,1,128,'2024-10-24 09:32:56'),(40,'Splicing Machine','Signal Fire','2024-05-27','2024-05-27',120000.00,'Bungoma','Active','A33F24011655','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2023-07-07','Null',0.10,114845.93,3,124,'2024-10-24 09:34:41'),(41,'Splicing Machine','Signal Fire','2024-05-30','2024-05-30',120000.00,'Eldoret','Active','A33324011528','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Null',0.10,114845.93,1,149,'2024-10-24 09:36:08'),(42,'Splicing Machine','Signal Fire','2024-05-30','2024-05-30',120000.00,'Eldoret','Active','A33S24011746','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Null',0.10,114845.93,3,135,'2024-10-24 09:37:26'),(43,'Splicing Machine','Signal Fire','2024-05-30','2024-05-30',120000.00,'Lodwar','Active','A33B23114301','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Lodwar to replace the faulty\r\n',0.10,114845.93,3,132,'2024-10-24 09:38:34'),(44,'OTDR','EXFO','2022-01-01','2022-01-01',614250.00,'Eldoret','Active','PM-MAX-730-CSA-2EA','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-07-07','Null',0.10,459739.76,3,108,'2024-10-24 09:44:38'),(45,'OTDR','EXFO','2023-07-06','2023-07-06',614250.00,'Mombasa','Active','1741182','1 YEAR','Comprehensive','Active','CERT-00002F',NULL,NULL,NULL,'2025-07-07','New',0.10,538453.62,3,113,'2024-11-20 13:32:50'),(46,'OTDR','EXFO','2024-05-15','2024-05-15',886346.00,'Nairobi','Active','1648960','1 YEAR','Comprehensive','Active','CERT-00002F',NULL,NULL,NULL,'2025-07-07','New',0.10,848276.95,3,71,'2024-11-20 13:33:27'),(47,'OTDR','EXFO','2024-03-23','2024-03-23',886346.00,'Nakuru','Active','1745574','1 YEAR','Comprehensive','Active','CERT-00151H',NULL,NULL,NULL,'2025-07-07','New',0.10,833511.16,3,118,'2024-11-20 13:33:41'),(48,'OTDR','EXFO','2022-01-01','2025-01-01',4550.00,'ELDORET','Active','PM-MAX-730-CSA-2EA','1 YEAR','Comprehensive',NULL,NULL,NULL,NULL,NULL,'2025-01-01','N/A',0.10,3316.95,3,108,'2025-01-29 08:15:20');
/*!40000 ALTER TABLE `support_machines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporary_allocation`
--

DROP TABLE IF EXISTS `temporary_allocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temporary_allocation` (
  `allocation_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `id_number` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL COMMENT 'allocated, returned, default: allocated',
  `user_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`allocation_id`),
  KEY `equipment_has_temporary_allocation` (`equipment_id`),
  KEY `user_has_temporary_allocation` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporary_allocation`
--

LOCK TABLES `temporary_allocation` WRITE;
/*!40000 ALTER TABLE `temporary_allocation` DISABLE KEYS */;
/*!40000 ALTER TABLE `temporary_allocation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`),
  KEY `department_has_user` (`department_id`),
  KEY `role_has_user` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Hillary','Chesaro','hillary.chesaro@vilcom.co.ke','$2y$10$MCn4pyDRAbGm9xxMPrGsWentjtWls7UIn2rlTiUyx1vENbaUD6Ou.','Approved',6,1,'2024-07-02 07:57:56'),(2,'Tom','Harry','tom.harry@vilcom.co.ke','$2y$10$GJtlh1qKhxt69LqpaogjzuBJx0DpycUz.ovX/yB8tDfLgmVKfh4b2','Pending',17,4,'2024-07-02 12:32:20'),(3,'David','Mwangi','david.mwangi@vilcom.co.ke','$2y$10$EbnGRv6/Fl1mRkkd.n6SI.VRyMSPmq3fGp9ytyFtnyEHwP3PCLU4G','Pending',11,4,'2024-07-08 10:59:56'),(4,'Mary','Jane','mary.jane@vilcom.co.ke','$2y$10$/0I9KryWCEZ0RxFFLxc/b.Gx87oKmtaqSH5UF8fWiLC57Mgg3GfJi','Pending',6,5,'2024-07-08 11:05:59'),(5,'Mark','Yegon','mark.yegon@vilcom.co.ke','$2y$10$IcIkP9FTMZz8omy00pc6z.wr4DneAjorQjJMPnvSCX.byVgzfDHNS','Approved',6,1,'2024-07-08 14:15:46'),(6,'Victor','Kimaiyo','victor.kimaiyo@vilcom.co.ke','$2y$10$81twqPVYOXU4pfvak/Blbug1B2TlkcifGZchgn7eI5oU0Ehb8BUNq','Pending',18,4,'2024-07-09 05:51:07'),(7,'Sarah','Mugambi','sarah.mugambi@vilcom.co.ke','$2y$10$hprLDgARbyvQzZ3JO.tvK.S4.kR.kBSTCGSm9hkCZdFB5LwuNsQvK','Pending',9,3,'2024-07-09 05:51:54'),(8,'Meshack',' Kimaiyo','meshack.kimaiyo@vilcom.co.ke','$2y$10$9twweMaurV3XIAVxduNcq.4PiX48iQFMC0hfDcyssJ4/vfzzeNcYe','Pending',17,4,'2024-07-09 06:54:24'),(9,'Rodgers','Momanyi','rodgers.momanyi@vilcom.co.ke','$2y$10$qtQwoUTD/.DmnSOkBkTeWuD.JQCZIf0u0NwfC6szVuK8muOa.wrs.','Pending',6,1,'2024-07-09 08:58:42'),(10,'Agnes','Limo','agnes@vilcom.co.ke','$2y$10$vuf5QFRwOwyhjX3XE53LLOsp8pRCVm056lLxiwb6q0xCejXsHBAJK','Pending',14,2,'2024-07-09 09:46:22'),(11,'Anastacia','kiprono','anastacia.kiprono@vilcom.com','$2y$10$hPgi2adqYTSrOoMODiLXjeunDdoDo.oxO2ITk3i2QkcmFSg9OS1Vu','Pending',8,4,'2024-07-09 09:47:34'),(12,'Ann','Keter','ann.keter@vilcom.co.ke','$2y$10$eo3tOvhLqMgq.UCtHOFgceybd5v18LsvRSy5zArZCXMiXt.pFhzOu','Pending',8,3,'2024-07-09 09:49:10'),(13,'Ann ','Njeri','ann.njeri@vilcom.co.ke','$2y$10$FFqdCYAKppyBckGZsx9iIutWpfe/DEeeqVAGguixleSXHRxJ3Gfti','Pending',15,4,'2024-07-09 09:52:18'),(14,'Arnold','Wanyonyi','arnold.wanyonyi@vilcom.co.ke','$2y$10$RKQTxthJDYU3Q4LyrpYyMuKjlHxuUjHzguTa0gdv8MhcVuZ4Y/zFC','Pending',5,4,'2024-07-09 09:53:48'),(15,'Bethwel ','Kiprono','bethwel.kiprono@vilcom.co.ke','$2y$10$2QRn8N26IWcCF9.urx7HIuO6eNWp8IaSRcrAWmyMCjfLiKcEhsPhm','Pending',8,4,'2024-07-09 09:55:32'),(16,'Boniface','Muthoka','boniface.muthoka@vilcom.co.ke','$2y$10$Q4JrJOMZtpBWmzthU0g7KOZc7s35IhtsfbcpTh3gvlTqxgdNIJiaa','Approved',15,3,'2024-07-09 09:56:45'),(17,'Caleb ','Kipkirui','caleb.kipkirui@vilcom.co.ke','$2y$10$k3CUlSA6CV42zc43NJqKxOq0Vc8v82std4jxY4bppBaxyawn7zXfe','Pending',12,4,'2024-07-09 09:58:31'),(18,'Beatrice','Chepsoi','beatrice.chepsoi@vilcom.co.ke','$2y$10$K15SVV3brZWKpCso.bJJ2OLeVG7lv4.iyYfk/NxjdysK1wvS2LATO','Pending',11,4,'2024-07-09 09:59:57'),(19,'Carolyne','Kiprop','carolyne.kiprop@vilcom.co.ke','$2y$10$RokY2XKaGH5EYZ7U.ng9FO9rksJpULJSoHL.cntp1Y7bkEEGOkob.','Pending',11,4,'2024-07-09 10:01:57'),(20,'Catherine','Lagat','catherine.langat@vilcom.co.ke','$2y$10$zyB51wc2klhQUeNJx1QJheWsoYwtDjXx.XZDCQOFhBFk8/Z8yXsqO','Pending',11,4,'2024-07-09 10:04:02'),(21,'Cornelius','Mutia','cornelius.mutia@vilcom.co.ke','$2y$10$cuIgfy/wa0Bh0yGOCXQrv.o/bg2i918tFHo3gSGsk5yu6WDBp/5Bm','Pending',13,3,'2024-07-09 10:06:28'),(22,'Danny','Mwenda','danny.mwenda@vilcom.co.ke','$2y$10$oxnAZ76cPLKiPrUwwnubTecp46cVWYEdSfQPR8RKcwk6xbNOVp5I.','Pending',15,4,'2024-07-09 10:07:52'),(23,'David ','Kihara','david.kihara@vilcom.co.ke','$2y$10$F0t59kjBf3hsxqHKyenJq.hkbrnPnrpivB2IpV5aAu6xHqpIe/F2S','Pending',3,4,'2024-07-09 10:10:57'),(24,'Edward','Tuitoek','edward.tuitoek@vilcom.co.ke','$2y$10$49Zr76XEu/76/d3ouy6EM.xd5fE2Z8aWJtq5x/Ot54bzEwFYWbHyy','Pending',1,1,'2024-07-09 10:13:04'),(25,'Elvis','Chirchir','elvis.chirchir@vilcom.co.ke','$2y$10$z/9rrK03Z63JLdLjE5It7earX8LzpB8G7RWvB.A6Pfeb.aXxQ8ZuS','Pending',12,3,'2024-07-09 10:14:36'),(26,'Emily','Koech','emily.koech@vilcom.co.ke','$2y$10$5aMX/58.hTkrw6aoJjbK0.ZNLtuGM/.52UctOyfIoKsu49UbmBr2y','Pending',5,3,'2024-07-09 10:17:13'),(27,'Eunice','Murugi','eunice.murugi@vilcom.co.ke','$2y$10$ksS4GIYrPBSl1GDadVsTDuMkWFoGRz2jiYZ2ot5XZOH/qfSVy9HM6','Pending',15,4,'2024-07-09 10:19:05'),(28,'Faith','Jemutai','faith.jemutai@vilcom.co.ke','$2y$10$UXoLcExOXBqWVOzqU2upPu3fOCaZimlPrfBl/qKHlfhs7Bsb2nOFa','Pending',4,4,'2024-07-09 10:20:25'),(29,'Faith','Kangogo','faith.kangogo@vilcom.co.ke','$2y$10$GynMjHyO8S.li3gnDGkFwumdpX8psjldgtC99n/QIC/UnHrOq.yMa','Pending',11,4,'2024-07-09 10:22:03'),(30,'Faith','Rono','faith.rono@vilcom.co.ke','$2y$10$.i7VyJpwMmkxIjbAIQs1JuwRGRFto3noMPDhFASdkTo9m7CEllSHa','Pending',8,4,'2024-07-09 10:24:01'),(31,'Fredrick','Otieno','fredrick.otieno@vilcom.co.ke','$2y$10$LIgj0tgNF6dWy0Zj9pB0hO1.7hc2eb4K4gvYeCBaRbL3Ejthmp..W','Approved',8,4,'2024-07-09 11:36:54'),(32,'Fridah','Wanza','fridah.wanza@vilcom.co.ke','$2y$10$oFvf1nYfzvYH5P0sn63aKO9aqZSK.Wh2sS4QSs/8y55yZBTKT1HHq','Pending',7,4,'2024-07-09 11:39:47'),(33,'Hayes','Njogu','hayes.njogu@vilcom.co.ke','$2y$10$xPhouREAE0tDZkmYdVMNTOHMpgByuvrWNcXa/VZs.xeEQK29W6NVC','Pending',17,4,'2024-07-09 11:44:35'),(34,'Robert','Kiprop','robet.kiprop@vilcom.co.ke','$2y$10$hIBstG3cNrN08HresZzpHuQ.E7NCJ/BOFPHV8ucHXDG5sjVsIrNq2','Pending',11,4,'2024-07-09 11:45:29'),(35,'John','Koome','john.koome@vilcom.co.ke','$2y$10$XOB041vJuI680yHJbaC/buGy.xASsJ6nbA2WfJ1qLwW.y74xpm.3u','Pending',11,3,'2024-07-09 11:47:42'),(36,'Kibet','Gilbert','gilbert.kibet@vilcom.co.ke','$2y$10$SkZUO5D.OVlskzdfG5B5AOqjtDhZtpBOjfdlqMujYoCdch.8Pn3oa','Pending',3,4,'2024-07-09 11:49:21'),(37,'Lawrence','Lagat','lawrence.lagat@vilcom.co.ke','$2y$10$.CG6tRaTwfldMA6r1Fql/OtZIU7tJCqbzdOzxZjSnmY0T2ZBJ6Vhi','Pending',3,4,'2024-07-09 12:20:13'),(38,'Leaky','Mwaura','leaky.mwaura@vilcom.co.ke','$2y$10$Pt5FrbC9vs8PCNeu6Z5kDukK7pETFidh0c5wI56caWewhDU8SHMj2','Pending',10,4,'2024-07-09 12:21:31'),(39,'Mark','Muriithi','mark.muriithi@vilcom.co.ke','$2y$10$8zwFR8c4pQmdd9Uc0V.zJOisMec.DieTNQ5eJtAq57YHmUnv411Hi','Pending',12,4,'2024-07-09 12:22:42'),(40,'Mellan','Kiptala','mellan.kiptala@vilcom.co.ke','$2y$10$57h8cJNyGdvNe3elOAIIlexVnW3O9xrE0JZjTqd.WpdZuDc7Ek6eS','Pending',7,4,'2024-07-09 12:23:33'),(41,'Juliet','Vujede','juliet.vujede@vilcom.co.ke','$2y$10$oHr8khFISFSDiE4j0AbbEeyl9WUPTjsNP/fPRMNZm4eVeUEwpGVLa','Pending',18,4,'2024-07-09 12:24:57'),(42,'Miriam','Muratha','miriam.muratha@vilcom.co.ke','$2y$10$aYYqpdCJiXiIwJtiVtfKXupEBGHpo/96mI180dZunD3aqWZcWlrd6','Pending',15,4,'2024-07-09 12:26:35'),(43,'Nancy','Kimetto','nancy.kimetto@vilcom.co.ke','$2y$10$Ll3abAgYDVeJnd1GLm/iXOCtxEnxpes6wgVxpJ8lDqXguZXcgU6iC','Pending',17,4,'2024-07-09 12:28:46'),(44,'Nelson','Yego','nelson.yego@vilcom.co.ke','$2y$10$L3yI5iZMfGPnrEAEN2yXnOD8d5GPus.85LM0r.Yk.sjVROE9pl4Qe','Pending',9,4,'2024-07-09 12:31:14'),(45,'Nicholas','Sang','nicholas.sang@vilcom.co.ke','$2y$10$b1TCi10LKCBrQ8GSE2J9Ku3AXzNxk6kJsovLkF2NV3CaFPIRSudiW','Pending',4,4,'2024-07-09 12:32:27'),(46,'Ordax','Kisangi','ordax.kisangi@vilcom.co.ke','$2y$10$Ebyo/USzLSsgiGVEslo0HeowrTn1lavWCvs7Of1qMLmrZfDHjZEai','Pending',8,4,'2024-07-09 12:34:56'),(47,'Oscar','Bett','oscar.bett@vilcom.co.ke','$2y$10$RHOg.UbpElX/ivx/PkECzeWk345jfoObtOua04rqulA0CdZ/PNzbS','Pending',9,4,'2024-07-09 12:39:06'),(48,'Peace','Njura','peace.njura@vilcom.co.ke','$2y$10$BMbO3sPa1x/aiZy6hw8Et.6YfMzJLRXLHQPT8Xb33qWQ7Zh5kfk0m','Pending',7,3,'2024-07-09 12:39:54'),(49,'Peninah','Mulandi','peninah.mulandi@vilcom.co.ke','$2y$10$1e5sJpDKc35s8ZwbFwb1UeZiTOGcn.FcxxhNRXRWirGtiKknCbs4a','Pending',17,4,'2024-07-09 12:42:07'),(50,'Peter','Kipkoech','peter.kipkoech@vilcom.co.ke','$2y$10$KaaVofL9r.MWUIwlWx/wIeDdTDNx7jUMQRZtr0gwP7GFmueJJ6Jgy','Pending',14,2,'2024-07-09 12:46:30'),(51,'Peterson','Mutegi','peterson.mutegi@vilcom.co.ke','$2y$10$pn6oFikKDEqSpqza1CC.Tucg4.bFa.2UwNyWeKy0O2kx.Us.5eI0.','Pending',6,1,'2024-07-09 13:18:30'),(52,'Rebecca','Bittok','rebecca.bittok@vilcom.co.ke','$2y$10$8hWQgEuX8SrvP/rbwMyciuEPQjiEy/eE1PEUjbf9TRjBa.KOECwoe','Pending',15,4,'2024-07-09 13:20:05'),(53,'Rodgers','Kipkirui','rodgers.kipkirui@vilcom.co.ke','$2y$10$eIQY85rMejqQZmxDwGNwIenL/ROYLhPigNn2DNtFINHtnvOottaqK','Pending',9,4,'2024-07-09 13:36:12'),(54,'Safari','Musyoki','safari.musyoki@vilcom.co.ke','$2y$10$41/WtlpfOLnpK5f86.ZKzuhhpDDF5idHVpE/XX9UHUV4iXWqhA1k6','Pending',15,3,'2024-07-09 13:45:04'),(55,'Everlyne','Njeri','everlyne.njeri@vilcom.co.ke','$2y$10$3eShcjFo66wwSrBNofjmiufooPekkeu9a96///lYxHWJei.gPEZ/C','Pending',11,4,'2024-07-09 15:06:43'),(56,'Gideon','Kipkoech','gideon.kipkoech@vilcom.co.ke','$2y$10$9CZCG2Ao1AyAl2utbNIMCe0RKQJAT0kJYMJPQb6hbxNrr701xMIlm','Pending',9,3,'2024-07-09 15:07:26'),(57,'Sidney','Lesan','sidney.lesan@vilcom.co.ke','$2y$10$wcq/p2EWJk6GUM6tq1FvyeRblFIICd5eraPbaDxQ3kihLHYAdhtY2','Pending',3,3,'2024-07-09 15:23:30'),(58,'Solomon','Mutua','solomon.mutua@vilcom.co.ke','$2y$10$E0YbrOiB30K0h9vc/3DgiOB.2Vlry1jLk/zzhcB3cgkxFCqsTDD.q','Pending',4,2,'2024-07-09 15:25:42'),(59,'Valentine','Jepchumba','valentine.chepchumba@vilcom.co.ke','$2y$10$CGuRW/cN0OTwrBze/ofYXe6VmbY5d.mMG.W0olEh1ZrKWBvqEO.I2','Pending',15,4,'2024-07-09 15:27:03'),(60,'Washington','Gathenya','washington.gathenya@vilcom.co.ke','$2y$10$rrNLmX4233XxhuCyJSZqTOxk7.mARc8d8BEuyGqESm57OYqvWWMaO','Pending',2,3,'2024-07-09 15:27:56'),(61,'Wilson','Rutto','wilson.rutto@vilcom.co.ke','$2y$10$KI2PeKi0tUMLjL0PEc6Gge56H3ntuuOOwlomEguqsjcfXfFZve11S','Pending',15,4,'2024-07-09 15:29:07'),(62,'B21 55 Inch ','TV Screen','B21.Boardroom@vilcom.co.ke','$2y$10$g/fBvvrZL9y5DjmKRqv6ceutDIDFfQFFKnl79/vyMcIf3UmXUOspm','Pending',6,4,'2024-07-10 09:51:46'),(63,'B21 ','CCTV','B21.CCTV@vilcom.co.ke','$2y$10$oFKsHzKc2XPyfXn.4nEdDe1O5rfhmSK8KI42hW.ZgHNfDqg8mevDa','Pending',6,4,'2024-07-10 09:57:34'),(64,'B42 55 Inch ','TV Screen','B42.TVScreencom@vilcom.co.ke','$2y$10$0EmhuESORfQsTdUHNx0uUeDcX/DhpNoFmgXWwp700.Tg9RdwrFBhm','Pending',6,4,'2024-07-10 10:02:14'),(65,'B42',' CCTV','B42.CCTV@vilcom.co.ke','$2y$10$YfYSYg.IcQRixis1If.BYOqWoczwujWFbuvmTe/2N26WnwQv3XPwK','Pending',6,4,'2024-07-10 10:04:28'),(66,'B43 55 Inch TV Screen','TV Screen','B43.TVScreen@vilcom.co.ke','$2y$10$8CToKPf8pjDD3uH4be8kZOa1JYGJPiSxdnApJ/vc/l2ASOTozrO4K','Pending',6,4,'2024-07-10 10:06:49'),(67,'B45','CCTV','B45.CCTV@vilcom.co.ke','$2y$10$5npvorJ/QMSL63mklnpCu.r.eBZoJeVPuVl1tuD5.RLQhADVudfO6','Pending',6,4,'2024-07-10 10:08:51'),(68,'IT','Support','systems@vilcom.co.ke','$2y$10$22icq2VeQMvutJBZF6iIGOYAu7uQoFKvo9R.rEq1uR0AHkx2FVAZO','Pending',6,4,'2024-07-10 10:14:10'),(69,'Cosmas','Ngeno','cosmas.ngeno@vilcom.co.ke','$2y$10$pKKRNVWz4Pp9SqGhwc5rWerGpNiXQ8NtBH6BHExWXwuRE/z8ueZ7a','Pending',18,4,'2024-07-12 08:04:11'),(70,'SOC','Department','serviceoperationcenter@vilcom.co.ke','$2y$10$BNVaHw/RXXaVjxGOU1mr2.01zwlB6T/rkkMVgWBsO2DqzSN6M0RTe','Pending',15,4,'2024-07-12 09:33:05'),(71,'Sila ','Kurui','sila.kurui@vilcom.co.ke','$2y$10$W0V5XWbUGaA9aBRMrbOxauYQewbvLTynzfqx3EouuQFh/cNb5yqLu','Pending',13,4,'2024-07-12 12:14:28'),(72,'Rose','Achieng','rose.achieng@vilcom.co.ke','$2y$10$Ht3VDIq9p4XUwkHJzH4s2u9RRAv24wZNmrE9PuJB8LeSugOs0YtoG','Pending',15,4,'2024-07-31 09:40:49'),(73,'Solomon ','Kipkemboi','solomon.kipkemboi@vilcom.co.ke','$2y$10$LfOh9v4jG3nmdRTPEM4hFeBiKOU1CKu42bzRufvscvik20.iU.Dii','Pending',15,4,'2024-07-31 09:44:04'),(74,'Cynthia','Cherotich','cynthia.cherotich@vilcom.co.ke','$2y$10$hOSwtO/dfq/O1.ziSfbU0u4caO.5EmikqTFCjeOPflUD.O0obbYyK','Approved',15,4,'2024-07-31 09:45:43'),(75,'George','Hondo','george.hondo@vilcom.co.ke','$2y$10$cyBvbKobu2B/uQWwnVatH.MnmseLaufeTLB.v3WsyDNxN7SdVeeqG','Pending',15,4,'2024-07-31 09:46:52'),(76,'Victor','Mwachi','victor.mwachi@vilcom.co.ke','$2y$10$QOlm2kmqZowHJVZofD5AGeIlZjf2RKIfX/ubH5N4oK4Tdf4mdwlJi','Approved',15,4,'2024-07-31 09:49:17'),(77,'Daniel ','Kibet','daniel.kibet@vilcom.co.ke','$2y$10$xEYsx7cpgiiXA0CSH5X5DuX90Hvc4Skc6C9qZ8.U82JNFIVVeru8S','Pending',15,4,'2024-07-31 09:50:46'),(78,'Faith','Cherono','faith.cherono@vilcom.co.ke','$2y$10$f1jcaOggv8q/9TWgbjiBx.xsW4TlLERZPq.Qh2E3QsS4hRl.RRlwG','Pending',15,4,'2024-07-31 09:52:07'),(79,'Mercy ','Chelangat','mercy.chelangat@vilcom.co.ke','$2y$10$R3NVm4N1YvFz62sIhGnJpuLCgV94bcEVodkjdIFAhD1Me5axXqbUy','Pending',15,4,'2024-07-31 09:55:29'),(80,'Naima ','Mohamed','naima.mohamed@vilcom.co.ke','$2y$10$P3kdXvJkRX0UKb/ChxWhyencrCESA.fZ9yguU8zM4rHYE102EnT0G','Pending',15,4,'2024-07-31 09:57:42'),(81,'Janice','Wausi','janice.wausi@vilcom.co.ke','$2y$10$c5WsKPQJKSnGEqi9pXJ3L.jrtH6emBMBnhwFuNE07RyVsbW8.ZhxS','Pending',15,4,'2024-07-31 10:01:46'),(82,'Abigael','Jebet','abigael.jebet@vilcom.co.ke','$2y$10$Ym0V7jm17aIowbrc4gDRhu84iHcybtRpLs.FBN8m/6xUem0qFDyQe','Pending',15,4,'2024-07-31 10:04:17'),(83,'Restoration','Khakaasa','restoration.khakaasa@vilcom.co.ke','$2y$10$TBtsKgLM.3oZiV6ggzTuKOgVw27ZuTnhUWvjeBYc/qVuVZpeJeihG','Pending',15,4,'2024-07-31 10:07:13'),(84,'Susan','Wangechi','susan.wangechi@vilcom.co.ke','$2y$10$hyxnGs04bfRcPn38SwVFMuyEtZDogE8mjibbx27M6yDEk4yGu/n6m','Pending',15,4,'2024-07-31 10:08:43'),(85,'Prudence','Chirchir','prudence.chirchir@vilcom.co.ke','$2y$10$a6esR5xRTL9LJm1msNI.eejAybW/CpS9UYYob3QF/hEdHy3YW98DW','Pending',15,4,'2024-07-31 10:11:51'),(86,'Lennox','Ngeso','lennox.ngeso@vilcom.co.ke','$2y$10$iwHst0QyRsnehEn1Tod45urAz/btgJXZZtF0acVMy.2FASdDkgIsu','Pending',15,4,'2024-07-31 10:13:43'),(87,'Deborah','Kanini','deborah.kanini@vilcom.co.ke','$2y$10$NxS6rtGLjxr4tV/9y8XhQuwNoFYtdnmRrZR8x.2/R.Cq5gOyi3/Y2','Pending',15,4,'2024-07-31 10:15:36'),(88,'Miriam','Muratha','miriam.muratha@vilcom.co.ke','$2y$10$s24i6AqKHrts33p/ChINQ.xR5lx76oSueGzIiKb/Iq/H6OT5zAif6','Pending',15,4,'2024-07-31 10:31:45'),(89,'Debora ','Kanini','debora.kanini@vilcom.co.ke','$2y$10$qyEdF6afy/pskHM05V0o0eUZdWWRlHhtlLUbmJne2UGT9PlbZKOOu','Pending',10,4,'2024-07-31 10:39:06'),(90,'Dennis','Mathenge','dennis.mathenge@vilcom.co.ke','$2y$10$HBCPbo43B1SLM/Ar1GjiA.Y0eq0uegqj9BFfQygB2y4psoF7Jbf9S','Pending',7,4,'2024-10-01 06:59:32'),(91,'Daniel','Kigen','daniel.kigen@vilcom.co.ke','$2y$10$q06QZJT6ryqt1bFh/HpLNuY21ZNkixVZdwaYXYay2uSRjvN4BEK6i','Pending',18,4,'2024-10-01 07:23:07'),(92,'Moses','Kipngetich','moses.kipngetich@vilcom.co.ke','$2y$10$g/XF5yiJemCQL1PAjOLZHO6DGJV7GzsQxPznpChrKNs5FJdLxLtm6','Pending',9,4,'2024-10-01 07:26:04'),(93,'Cosmus','Kipchirchir','cosmus.kimeli@vilcom.co.ke','$2y$10$bQlNYu09Eb9vCFHvBzY3su3z89wMV/J2NvjMlKhaGFmX9tVb2Xkny','Pending',9,4,'2024-10-01 07:29:38'),(94,'Amos','Kemboi','amos.kemboi@vilcom.co.ke','$2y$10$91I8P4baGdarWT21xf4D9eRrvay/6U/Ypi6FteIVn6G2n0J8HGX6.','Pending',3,4,'2024-10-01 07:30:41'),(95,'Ernest','Ngeno','ernest.ngeno@vilcom.co.ke','$2y$10$t4er4wLkL8iOPsUXnXugreE61nQ1nhxWTuXgJoFKyvJrjmr30xWpi','Pending',9,4,'2024-10-01 07:32:04'),(96,'Daniel','Kipchumba','daniel.kipchumba@vilcom.co.ke','$2y$10$/eLfcaqbJESHS4enf.yl2u8761iVJOlgJkCPICLVEGfvWc2qCUM1e','Pending',9,4,'2024-10-01 07:33:30'),(97,'Clement','Njure','clement.njure@vilcom.co.ke','$2y$10$C6QRmjREKxlNfxzko2SGKOtWN2/efRYmbe.phjuK1uzVKnLRJZLnG','Pending',11,4,'2024-10-01 08:37:25'),(98,'Munene','Mwenda','munene.mwenda@vilcom.co.ke','$2y$10$SfI9NPeH4sYbomEgwKyMjuD1tk3ncKm.TYKc1Kwci.lKUZ0hugcIW','Approved',15,4,'2024-10-01 09:15:32'),(99,'Sheilla','Kemboi','sheilla.kemboi@vilcom.co.ke','$2y$10$qV0w/MTF5LrpGLq2bZLlE.6ZePgdpBD3kdDUTo1Ul.rydqnEyXatu','Pending',15,4,'2024-10-01 09:17:21'),(100,'Hilda','Wanza','hilda.wanza@vilcom.co.ke','$2y$10$WhV7CznTrHvu.M0jpBMZsuHR2t2xi.iBVklLhBL5XnuKlihSVVl7W','Pending',15,4,'2024-10-01 09:18:42'),(101,'Patrick','Maingi','patrick.maingi@vilcom.co.ke','$2y$10$7ioD/CQLFLSOwl84SvHaSe3T1rIUdgy6KIQyrg8K.Pvx.Dz25/UYW','Pending',15,4,'2024-10-01 09:19:13'),(102,'Nicholas','Kimutai','nicholas.kimutai@vilcom.co.ke','$2y$10$MLy0/Nla8ldlN.PVAd4WxOjuWdAGHB0dap4SIC6qQscKQ3kOa6Jh6','Pending',12,4,'2024-10-01 09:24:06'),(103,'Nicholas','Kimutai','nicholas.kimutai@vilcom.co.ke','$2y$10$buvyP.ARLqK9./elol89zeid9offbE1LrNBRIofZGtR4TZAzc5Eby','Pending',12,4,'2024-10-01 12:12:47'),(104,'Lillian','Omollo','lillian.omollo@vilcom.co.ke','$2y$10$Iwp.Bktm2JqEqpRC7K2ATu9Wg.z8PHFQL2P8wya8ErtxudtJ8FTdW','Pending',18,4,'2024-10-08 07:36:48'),(105,'Ezekiel','Odhiambo','ezeliel.odhiambo@vilcom.co.ke','$2y$10$SpNtWEB/mPB71qNp4UrndOLvvwsFgRg1IMvzQl.6w6E2yFnaNXA6G','Pending',11,4,'2024-10-08 07:37:09'),(106,'Linus','Omondi','linus.omondi@vilcom.co.ke','$2y$10$fXXDn9XGrW3ziIh1/8aPPetSP/XKkSs9Epyl8eeyQ4KSCLOvrv2Wq','Pending',11,4,'2024-10-08 08:23:08'),(107,'Linus','Omondi','linus.omondi@vilcom.co.ke','$2y$10$qZyxOBTHVu0p9TB3yeIhQe/vC4hif6hlMcbZNOYKZDwPwhdAdQOsm','Pending',11,1,'2024-10-08 09:46:36'),(108,'Elijah','Chumba','elijah.chumba@vilcom.co.ke','$2y$10$Hkipk0zRhbjEeB2msk5jluvtHdtHIttnD.ZcKpDiPU2Iq4yvJ1N2e','Pending',3,4,'2024-10-22 06:05:42'),(109,'Collins','Cherop','collings.cherop@vilcom.co.ke','$2y$10$NeRQ.4QFtpshi22JG7CmKuKWIEFnqC5RIRvRQkQPIr19rsdredRXi','Pending',3,4,'2024-10-22 06:08:11'),(110,'Duncan','Kipruto','duncan.kipruto@vilcom.co.ke','$2y$10$1JBPGDeEleTjNfBZGWIPkO8QDOy5kFuWDSxo0DW/lyHlLo9SNe/t6','Pending',3,4,'2024-10-22 06:12:23'),(111,'Silas','Kirui','silas.kirui@vilcom.co.ke','$2y$10$.eeS173zO5HsgZKaS5dEBuom0A6Gu0slfQvDV8KnsAu.edTFRmWli','Pending',3,4,'2024-10-22 06:13:33'),(112,'Festus','Terer','festus.terer@vilcom.co.ke','$2y$10$RY54QhWSIrhlR2gmBHFiAeolbTu25QslToqk5CQ/jfWLt/h8l./kW','Pending',3,4,'2024-10-22 06:14:22'),(113,'Evans','Kiptanui','evans.kiptanui@vilcom.co.ke','$2y$10$16dNE27xDTy4mgnYS9CD9O.e/ZHlI23lFFUPsVVTSi5AvJSr4Mcl6','Pending',3,4,'2024-10-22 06:14:56'),(114,'Cosmus','Kimeli','cosmus.kimeli@vilcom.co.ke','$2y$10$Gjq1OqfyY7f9iQRa5mwdLunhQ3A/TUjkqChnezrYIIJSip6Ex9dTS','Pending',3,4,'2024-10-22 06:16:01'),(115,'Lawrence','Lagat','lawrence.lagat@vilcom.co.ke','$2y$10$ectOrS3UIrcjRC5GIxjnQe0slPEiYttYeMzZJQ.uswkfv8SOgNPpu','Pending',3,4,'2024-10-22 06:16:24'),(116,'Daniel','Nasoro','daniel.nasoro@vilcom.co.ke','$2y$10$MKWO1lxDueovw.0FgEol4urx.29gjY0dgo/IaREYqgtqg8W94NXea','Pending',3,4,'2024-10-22 06:17:29'),(117,'Hillary','Cheruiyot','hillary.cheruiyot@vilcom.co.ke','$2y$10$pnWJxVFB5c2f7sJC9Qce9.TSQ58Q3.fdpDZ8nzGKu1urVhaMDUQOW','Pending',3,4,'2024-10-22 06:17:59'),(118,'Emmanuel','Kiptoo','emmanuel.kiptoo@vilcom.co.ke','$2y$10$iyqt9cWDoBDxdVza3x86OemTIpNEi4RBjOrspBxebZk7NVrmP5lJK','Pending',3,4,'2024-10-22 06:18:49'),(119,'Jackson','Bett','jackson.bett@vilcom.co.ke','$2y$10$yXWNy.mDkCkeeCq5DF5jzuFuceJMkIV2ukkKf8ZZ8NCN/mk2u4we.','Pending',3,4,'2024-10-22 06:19:34'),(120,'Ken','Cherop','ken.cherop@vilcom.co.ke','$2y$10$mmf8o8j7cf6tqK0FXEAE2Oiic2pwGTOlR.kX1lJktDFBBqU1Gtd.e','Pending',3,4,'2024-10-22 06:20:21'),(121,'James','Maina','james.maina@vilcom.co.ke','$2y$10$v7fEMr4VPELe5ZPi/bWwPOQA31Ko83lNFRNPRw3BolYUvEbmq/OCa','Pending',3,4,'2024-10-22 06:21:15'),(122,'Elvis','Kibet','elvis.kibet@vicom.co.ke','$2y$10$amAI2HVDp33fm5s1P7WdR.RkTcVYaJ6TP2iWwzvaHajFWjCRHNfsy','Pending',3,4,'2024-10-22 06:54:52'),(123,'Emmanuel','Cheruiyot','emmanuel.cheruiyot@vilcom.co.ke','$2y$10$Yu7FZmizPRh62swZfuff8uJ9MO3pmmOD1FnGFCM/et9oqBv1m6cXO','Pending',3,4,'2024-10-22 06:56:47'),(124,'Felix','Kosgei','felix.kosgei@vilcom.co.ke','$2y$10$Dk0x/cnze.eDt98jGn6k8uGCStPOiI6eJds3s4RRKyZ.ExTeJ2z0y','Pending',3,4,'2024-10-22 07:07:27'),(125,'Hillary','Omuga','hillary.omuga@vilcom.co.ke','$2y$10$EwCWRDLzCV1wsDGewDt8z.8SCGL8kZ8JzBWH/PjQKAUrUUnjT89Oe','Pending',3,4,'2024-10-22 07:11:42'),(126,'Hillary','Rutto','hillary.rutto@vilcom.co.ke','$2y$10$CPpuPFDRfb8qpZ6kqXc.uuoxXV3WPoXLfwjQKscr9EGpWivmc9/7W','Pending',3,4,'2024-10-22 07:12:18'),(127,'Isaac','Mukhongo','issac.mukhongo@vilcom.co.ke','$2y$10$avKw99.CzHtd62FB5AyTd.4T5Ol38ZrSPquXzwaBfKjy2.VTLCXjq','Pending',3,4,'2024-10-22 07:14:05'),(128,'James','Kariuki','james.kariuki@vilcom.co.ke','$2y$10$68h7Ybt14OFFZbB7YSSFpevYYyPRYHHl9hMuP03X5XHtin09yqT3e','Pending',3,4,'2024-10-22 07:15:24'),(129,'James','Brown','james.brown@vilcom.co.ke','$2y$10$Gy0.DwE0srzue/.bQqWD2eHpVvHcXmOEOdl6IH/k54X5ACQj9gMnm','Pending',3,4,'2024-10-22 07:16:05'),(130,'Joseph','Cheboi','joseph.cheboi@gmail.com','$2y$10$iu/qBE8OLEeVhoGvklwoOuxV0b816nb/lRyvefksssaRZtIw9p2ly','Pending',3,4,'2024-10-22 07:16:52'),(131,'Joseph','Mwaura','joseph.mwaura@gmail.com','$2y$10$WCx0hHaivl34PyPJUmtNaOzH4ZKu1nInmH6j7hsA9ynRO0Sk3.a4u','Pending',3,4,'2024-10-22 07:17:31'),(132,'Kevin','Kiprono','kevin.kiprono@vilcom.co.ke','$2y$10$IfgfQIcGOuE3pFmxSloc7.4rYNNP6zVvaYZwkBC1s9JMf11ggtd9u','Pending',3,4,'2024-10-22 07:42:32'),(133,'Kevin','Opondo','kevin.opondo@vilcom.co.ke','$2y$10$nW2ZNR4sHFsueqArESTuWe.Ua7PQjyCycc5B4fMImx1fG/072ZqxO','Pending',3,4,'2024-10-22 07:43:21'),(134,'Stephen','Kiptum','stephen.kiptum@vilcom.co.ke','$2y$10$FOLzDQLmPDZ77mmJtQiz5eaCbfQaznoJP6fa.o13YL2FBPZF.pWxe','Pending',3,4,'2024-10-22 07:46:27'),(135,'Moses','Chemjor','moses.chemjor@vilcom.co.ke','$2y$10$OdCoXNQlB.PK3gus9EXc8.T.GRIL6nKrAG2o6XeNzxm/INwxDyTQW','Pending',3,4,'2024-10-22 07:47:51'),(136,'Musa','Kimutai','musa.kimutai@vilcom.co.ke','$2y$10$chU7cvSsv/kdUbi5yQAQ7uEdhaCqkbHpYSSzqMmlX3YZ/cO6tjAZy','Pending',3,4,'2024-10-22 07:48:45'),(137,'Mwanzia','Muteti','mwanzia.muteti@vilcom.co.ke','$2y$10$s.tfKnVbAKJ2Iu/MEFWeLOhX3.SAKWvDFZEV3e0wMOOmHpkutGWRm','Pending',3,4,'2024-10-22 07:49:12'),(138,'Patrick','Wandia','patrick.wandia@vilcom.co.ke','$2y$10$HFZkSN8jYLpXblNYciqV6OOZ73zkm1OLulnZMgycicgLhRAd1rIA2','Pending',3,4,'2024-10-22 07:50:08'),(139,'Ramadhan','Soita','ramadhan.soita@vilcom.co.ke','$2y$10$TajRZm3BJO8gWHMR618i5O0SevG9CzzleCRXVPgbinUVocDklYnDq','Pending',3,4,'2024-10-22 07:51:23'),(140,'Samson','Monali','samson.monali@vilcom.co.ke','$2y$10$wYkgqe8UmEEtLGabPp1fUeWtm62QxPtujuvWHoPIlAUlVfqFv5z.K','Pending',3,4,'2024-10-22 07:53:40'),(141,'Samwel','Wareru','samwel.waweru@vilcom.co.ke','$2y$10$VHXSvMlfCUQ.6J0gVUb98etrb.v16y9XQWl8iZWaWJJ04Qusbuqp.','Pending',3,4,'2024-10-22 07:55:03'),(142,'Shadrack','Koech','shadrack.koech@vilcom.co.ke','$2y$10$bt0Q4Na8sm8yZC8qHNRyIOyZCXmSPjwY7Tn7CNwg2yD8SeOh7PO3i','Pending',3,4,'2024-10-22 07:56:01'),(143,'Thomas','Kamau','thomas.kamau@vilcom.co.ke','$2y$10$7B0NVvENhNR/dYXIWgBnce1WXAvkLznoM/uy6C4Xoc/8fr2ayjGii','Pending',3,4,'2024-10-22 07:56:53'),(144,'Timothy','Kimutai','timothy.kimutai@vilcom.co.ke','$2y$10$dTnUYxwKQGFWi3u1.7RJj.kYYPhIvBTd6ZO7QEYGG1TbfIVP5LtqW','Pending',3,4,'2024-10-22 07:57:48'),(145,'Vincent','Kemboi','vincent.kemboi@vilcom.co.ke','$2y$10$bqufCvu.rPBpjdXdqkCJa.MH0t8t5A5JpQ5q6YK//oF7LTi7ipJ5.','Pending',3,4,'2024-10-22 07:58:24'),(146,'Vincent','Kipkoech','vincent.kipkoech@vilcom.co.ke','$2y$10$HKtl4Vy3o8ftnxt3.XIZB.84lpjYj.rL9jw5o8Wl0yejoUZYoII5.','Pending',3,4,'2024-10-22 07:59:00'),(147,'Edwin','Kangogo','edwin.kangogo@vilcom.co.ke','$2y$10$Qi6UNw3UHE3Mik4XDFv3Ze6xP75ykduXy5M9xTHHSyaYJb.z/huPC','Pending',3,4,'2024-10-22 08:08:12'),(148,'Douglas','Kidake','douglas.kidake@vilcom.co.ke','$2y$10$hMCkfP/fZyINVPBPlRUhguVUIO.aUpCJIWOUNnsrF1J.13QnK6acW','Pending',3,4,'2024-10-22 08:08:37'),(149,'Noah','Kimtai','noah.kimtai@vilcom.co.ke','$2y$10$CqYROW4E8dbMj/53rIwY4uM6kT/lp1IhsRi.zf1e0ETJjA6BAlmXK','Pending',3,4,'2024-10-22 08:09:54'),(150,'Brian','Rono','brian.rono@vilcom.co.le','$2y$10$vCScJ0l9yLU0flzZH4qmx.TCrG1L6mi5qQo2UdZ7GvgCwOcSioQzC','Pending',3,4,'2024-10-22 08:11:03'),(151,'Bevise','Kwena','bevise.kwena@vilcom.co.ke','$2y$10$1y2rkE8XcjzbqjA6QeVpOuCJ8lwA5Ru6R85CU9UroRdLs.x/QBDzK','Pending',3,4,'2024-10-23 09:01:55'),(152,'Brian','Kipkirui','brian.kipkirui@vilcom.co.ke','$2y$10$YkBG9mIwcJjgqm18oxsF0eirVDPXUjaJB8cjK//yjU9d5D5C0tnlq','Pending',3,4,'2024-10-23 14:15:10'),(153,'Certitrust','Audit','info@certitrust.co.ke','$2y$10$QjO6rWvrSq..Aq4BuCi3c.k4bHuvq5LeMp1GSYdPe8Zo7cF7h5FdO','Pending',14,5,'2024-11-18 13:34:40');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'viladmin_vilcom_portal'
--

--
-- Dumping routines for database 'viladmin_vilcom_portal'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-13  9:27:16
