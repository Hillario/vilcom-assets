-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2024 at 02:00 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vilcom-assets`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `description`, `updated_at`) VALUES
(1, 'Office Equipment', 'Office related assets such as computers, printers etc', '2024-07-02 08:20:29'),
(2, 'Server Equipment', 'Server related assets such as servers, storage etc', '2024-07-02 08:20:29'),
(3, 'Network Equipment', 'Networking related assets such as routers, switches etc', '2024-07-02 08:23:08'),
(4, 'Software License', 'Software licenses used', '2024-07-02 08:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`, `description`, `updated_at`) VALUES
(1, 'Commercial', 'The department for commercial', '2024-07-02 07:28:15'),
(2, 'SHEQ', 'Safety health environment quality', '2024-07-02 07:28:15'),
(3, 'Fiber Rollout', 'The fiber rollout department', '2024-07-02 07:29:18'),
(4, 'Finance', 'The finance department', '2024-07-02 07:29:18'),
(5, 'Human Resource', 'This is the human resource department', '2024-07-02 07:30:34'),
(6, 'IT and Systems', 'This is the IT and Systems department', '2024-07-02 07:30:34'),
(7, 'Marketing', 'This is the marketing department', '2024-07-02 07:37:38'),
(8, 'Planning and Design', 'This is the planning and design department', '2024-07-02 07:37:38'),
(9, 'Procurement', 'This is the procurement department', '2024-07-02 07:39:00'),
(10, 'Retention', 'This is the retention department', '2024-07-02 07:39:00'),
(11, 'Sales', 'This is the sales department', '2024-07-02 07:40:53'),
(12, 'Special Projects', 'This is the special projects department', '2024-07-02 07:40:53'),
(13, 'Support and Maintenance', 'This is the support and maintenance department', '2024-07-02 07:42:24'),
(14, 'Management', 'This is the top level management', '2024-07-02 07:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_depreciation_log`
--

DROP TABLE IF EXISTS `equipment_depreciation_log`;
CREATE TABLE IF NOT EXISTS `equipment_depreciation_log` (
  `equipment_depreciation_id` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `depreciated_value` decimal(19,2) DEFAULT NULL,
  `equipment_id` int NOT NULL,
  `upated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`equipment_depreciation_id`),
  KEY `equipment_has_equipment_depreciation_log` (`equipment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Keeps a log of depreciation values over time';

-- --------------------------------------------------------

--
-- Table structure for table `equipment_incident`
--

DROP TABLE IF EXISTS `equipment_incident`;
CREATE TABLE IF NOT EXISTS `equipment_incident` (
  `equipment_incident_id` int NOT NULL AUTO_INCREMENT,
  `incident_date` date DEFAULT NULL,
  `type_of_incident` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `source` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `process` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `priority` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `root_cause` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `action_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date_action_completed` date DEFAULT NULL,
  `equipment_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`equipment_incident_id`),
  KEY `equipment_has_equipment_incident` (`equipment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_incident`
--

INSERT INTO `equipment_incident` (`equipment_incident_id`, `incident_date`, `type_of_incident`, `source`, `process`, `priority`, `status`, `description`, `root_cause`, `action_plan`, `date_action_completed`, `equipment_id`, `updated_at`) VALUES
(1, '2024-07-04', 'type_of_incident', 'source', 'process', 'Medium', 'Pending', 'description', 'root_cause', 'action_plan', '2024-07-04', 3, '2024-07-04 05:46:29'),
(2, '2024-07-04', 'Hardware Failure', 'Employee Feedback', 'Business Planning Process', 'Medium', 'Pending', 'Internet connectivity on laptop', 'I might have dropped the laptop accidentally', 'Action plan pending', '2024-07-04', 3, '2024-07-04 07:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_repair`
--

DROP TABLE IF EXISTS `equipment_repair`;
CREATE TABLE IF NOT EXISTS `equipment_repair` (
  `equipment_repair_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `priority` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `equipment_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`equipment_repair_id`),
  KEY `equipment_has_repair` (`equipment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_warranty`
--

DROP TABLE IF EXISTS `equipment_warranty`;
CREATE TABLE IF NOT EXISTS `equipment_warranty` (
  `equipment_warranty_id` int NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `warranty_provider` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'The name of the company or provider offering warranty',
  `warranty_type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Type of warranty(e.g. manufacturer''s warranty, extended warranty)',
  `warranty_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'Details about what is covered under the warranty',
  `warranty_contact` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci COMMENT 'Contact information for the warranty provider, email of phone',
  `equipment_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`equipment_warranty_id`),
  KEY `equipment_has_warranty` (`equipment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int NOT NULL AUTO_INCREMENT,
  `invoice_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `due_date` date DEFAULT NULL,
  `customer_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `customer_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `customer_email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `customer_phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bank_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `account_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `account_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `mpesa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `mpesa_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Paid, unpaid, refund, cancel',
  `tax` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(19,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `user_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`invoice_id`),
  KEY `user_has_invoice` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_number`, `due_date`, `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `bank_name`, `account_name`, `account_number`, `mpesa`, `mpesa_name`, `notes`, `status`, `tax`, `total_amount`, `grand_total`, `user_id`, `updated_at`) VALUES
(5, 'VL59571001', '2024-07-18', 'ABC Company', 'Thika Road, Thika', 'info@abccompany.com', '0707690456', 'Commercial Bank', 'ABC Company', '01124356464785', '0707690456', 'ABC Company', ' All accounts are to be paid within 7 days from receipt of invoice.', 'Unpaid', 230.24, 1439.00, 1669.24, 2, '2024-07-06 14:09:05'),
(6, 'VL59571002', '2024-07-25', 'Geonet Technologies', 'Embakasi', 'info@geonet-tech.co.ke', '01143547465', 'KCB', 'Geonet Technologies', '11233244243535', '01143547465', 'John Doe', 'All accounts are to be paid within 7 days from receipt of invoice.', 'Unpaid', 213584.80, 1334905.00, 1548489.80, 2, '2024-07-06 19:16:33'),
(7, 'VL59571003', '2024-07-11', 'Test 01', 'Nairobi', 'test01@vilcom.co.ke', '0707690456', 'Commercial Bank', '01124356464785', 'Test01', '0707690456', 'Test01', 'Looking forward to working with you', 'Paid', 219.36, 1371.00, 1590.36, 1, '2024-07-08 10:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

DROP TABLE IF EXISTS `invoice_item`;
CREATE TABLE IF NOT EXISTS `invoice_item` (
  `invoice_item_id` int NOT NULL AUTO_INCREMENT,
  `item_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `item_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `quantity` int DEFAULT NULL,
  `unit_price` decimal(19,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `invoice_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`invoice_item_id`),
  KEY `invoice_has_invoice_item` (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_item`
--

INSERT INTO `invoice_item` (`invoice_item_id`, `item_number`, `item_name`, `description`, `quantity`, `unit_price`, `amount`, `invoice_id`, `updated_at`) VALUES
(11, 'VL002', 'Farming IMS', 'Farming information management system', 4, 173.00, 692.00, 5, '2024-07-06 14:53:40'),
(10, 'VL001', 'Health IMS', 'Health Information Management System', 3, 145.00, 435.00, 5, '2024-07-06 14:52:38'),
(12, 'VL003', 'Inventory IMS', 'Inventory Information Management System', 4, 78.00, 312.00, 5, '2024-07-06 15:01:06'),
(13, 'VL001', 'Company Website', 'Development of the main company website', 1, 20435.00, 20435.00, 6, '2024-07-06 19:17:56'),
(14, 'VL002', 'South C Cabinets', 'Rent our cabinets at South C', 4, 34567.00, 138268.00, 6, '2024-07-06 19:19:22'),
(15, 'VL003', 'Health IMS', 'Health Information Management System', 3, 23465.00, 70395.00, 6, '2024-07-06 19:20:03'),
(16, 'VL004', 'Farming IMS', 'Farming information management system', 7, 143652.00, 1005564.00, 6, '2024-07-06 19:20:27'),
(17, 'VL005', 'Sales Tracking App', 'An app that tracks their sales agents', 1, 100243.00, 100243.00, 6, '2024-07-06 19:21:26'),
(18, 'VL001', 'Health IMS', 'Health Information Management System', 3, 457.00, 1371.00, 7, '2024-07-08 10:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `network_depreciaiton_log`
--

DROP TABLE IF EXISTS `network_depreciaiton_log`;
CREATE TABLE IF NOT EXISTS `network_depreciaiton_log` (
  `network_depreciation_id` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `depreciated_value` decimal(19,2) DEFAULT NULL,
  `network_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`network_depreciation_id`),
  KEY `network_has_network_depreciation_log` (`network_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `network_equipment`
--

DROP TABLE IF EXISTS `network_equipment`;
CREATE TABLE IF NOT EXISTS `network_equipment` (
  `network_id` int NOT NULL AUTO_INCREMENT,
  `designation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `system_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `system_manufacturer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `system_model` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `system_sku` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `processor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `baseboard_product` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `installed_ram` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `storage_medium` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `serial_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `charger` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date_issued` date DEFAULT NULL,
  `date_of_purchase` date DEFAULT NULL,
  `purchase_cost` decimal(19,2) DEFAULT NULL,
  `depreciation_rate` decimal(19,2) DEFAULT NULL,
  `current_value` decimal(19,2) DEFAULT NULL,
  `origin` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`network_id`),
  KEY `category_has_network_equipment` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `network_equipment`
--

INSERT INTO `network_equipment` (`network_id`, `designation`, `system_name`, `system_manufacturer`, `system_model`, `system_sku`, `processor`, `baseboard_product`, `installed_ram`, `storage_medium`, `serial_number`, `charger`, `date_issued`, `date_of_purchase`, `purchase_cost`, `depreciation_rate`, `current_value`, `origin`, `category_id`, `updated_at`) VALUES
(1, 'Vilcom-Milimani_DC_BNG\n', 'BNG\n', 'NCA-5520', 'NCA-5520', '5D8EEDAAE973B7DE', 'Intel(R) Xeon 6226R 2.9GHz, 16 Core', 'N/A', '64.0 GB', '1TB HDD', '5D8EEDAAE973B7DE', 'Dual AC PSU', '2021-03-11', '2021-03-11', 800000.00, 0.25, 306639.10, 'Vilcom', 3, '2024-07-08 06:13:25'),
(2, 'Vilcom-Milimani_DC_Switch_01', 'Switch', 'Huawei', 'Huawei', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2102350DLTDMLB000302', 'Single AC PSUSingle AC PSU', '2021-03-11', '2021-03-11', 400000.00, 0.25, 153319.55, 'Vilcom', 3, '2024-07-08 07:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `network_repair`
--

DROP TABLE IF EXISTS `network_repair`;
CREATE TABLE IF NOT EXISTS `network_repair` (
  `network_repair_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `priority` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `network_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`network_repair_id`),
  KEY `network_has_repair` (`network_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `network_warranty`
--

DROP TABLE IF EXISTS `network_warranty`;
CREATE TABLE IF NOT EXISTS `network_warranty` (
  `network_warranty_id` int NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `warranty_provider` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `warranty_type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `warranty_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `warranty_contact` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `network_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`network_warranty_id`),
  KEY `network_has_warranty` (`network_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `office_equipment`
--

DROP TABLE IF EXISTS `office_equipment`;
CREATE TABLE IF NOT EXISTS `office_equipment` (
  `equipment_id` int NOT NULL AUTO_INCREMENT,
  `system_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `system_manufacturer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `system_model` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `system_sku` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `processor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `baseboard_product` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `installed_ram` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `storage_medium` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `serial_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `charger` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `mouse_assigned` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_issued` date DEFAULT NULL,
  `date_of_purchase` date DEFAULT NULL,
  `depreciation_rate` decimal(19,2) DEFAULT NULL,
  `current_value` decimal(19,2) DEFAULT NULL,
  `purchase_cost` decimal(19,2) DEFAULT NULL,
  `origin` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`equipment_id`),
  KEY `user_has_office_equipment` (`user_id`),
  KEY `category_has_office_equipment` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office_equipment`
--

INSERT INTO `office_equipment` (`equipment_id`, `system_name`, `system_manufacturer`, `system_model`, `system_sku`, `processor`, `baseboard_product`, `installed_ram`, `storage_medium`, `serial_number`, `charger`, `mouse_assigned`, `date_issued`, `date_of_purchase`, `depreciation_rate`, `current_value`, `purchase_cost`, `origin`, `user_id`, `category_id`, `updated_at`) VALUES
(2, 'VILCOM-063', 'HP', 'HP EliteBook 830 G5', '3RB38UT#ABA', 'Intel(R) Core(TM) i5-8350U CPU @ 1.70GHz, 1896 Mhz, 4 Core(s), 8 Logical Processor(s)', '83B3', '16.00 GB', '256GB SSD', '5CG92047GX', 'Issued', 'Yes', '2024-04-04', '2024-04-04', 0.25, 51816.08, 55680.00, 'Vilcom', 1, 1, '2024-07-02 09:30:50'),
(3, 'VILCOM-002', 'HP', 'HP ProBook 430 G3', 'Y5W97PA#AB4', 'Intel(R) Core(TM) i7-6500U CPU @ 2.50GHz, 2592 Mhz, 2 Core(s), 4 Logical Processor(s)', '80FF', '8GB', '256GB SSD', '5CD712BRZR', 'Issued', 'Yes', '2024-01-11', '2024-01-11', 0.25, 36373.07, 42000.00, 'Vilcom', 2, 1, '2024-07-03 08:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

DROP TABLE IF EXISTS `quote`;
CREATE TABLE IF NOT EXISTS `quote` (
  `quote_id` int NOT NULL AUTO_INCREMENT,
  `quote_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `quote_date` date DEFAULT NULL,
  `customer_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `customer_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `customer_email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `customer_phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bank_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `account_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `account_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `mpesa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `mpesa_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'pending, approved, rejected, default:pending',
  `tax` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(19,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `user_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`quote_id`),
  KEY `user_has_quote` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`quote_id`, `quote_number`, `quote_date`, `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `bank_name`, `account_name`, `account_number`, `mpesa`, `mpesa_name`, `notes`, `status`, `tax`, `total_amount`, `grand_total`, `user_id`, `updated_at`) VALUES
(1, 'VLQ59571001', '2024-07-07', 'ABC Company', 'Thika Road, Thika', 'info@abccompany.com', '0707690456', 'Commercial Bank', 'ABC Company', '21172374747474', '0707690456', 'ABC Company', 'Looking forward to working with you', 'Pending', 146109.28, 913183.00, 1059292.28, 2, '2024-07-07 07:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `quote_item`
--

DROP TABLE IF EXISTS `quote_item`;
CREATE TABLE IF NOT EXISTS `quote_item` (
  `quote_item_id` int NOT NULL AUTO_INCREMENT,
  `item_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `item_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `quantity` int DEFAULT NULL,
  `unit_price` decimal(19,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `quote_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`quote_item_id`),
  KEY `quote_has_quote_item` (`quote_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quote_item`
--

INSERT INTO `quote_item` (`quote_item_id`, `item_number`, `item_name`, `description`, `quantity`, `unit_price`, `amount`, `quote_id`, `updated_at`) VALUES
(1, 'VL001', 'South C Cabinets', 'Rent our cabinets at South C', 3, 123000.00, 369000.00, 1, '2024-07-07 07:25:03'),
(2, 'VL002', 'Health IMS', 'Health Information Management System', 1, 23445.00, 23445.00, 1, '2024-07-07 07:25:34'),
(3, 'VL003', 'Farming IMS', 'Farming information management system', 1, 456732.00, 456732.00, 1, '2024-07-07 07:26:07'),
(4, 'VL004', 'Company Website', 'Development of the main company website', 2, 32003.00, 64006.00, 1, '2024-07-07 07:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `request_id` int NOT NULL AUTO_INCREMENT,
  `item_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `priority` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_id`),
  KEY `user_has_request` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `item_name`, `description`, `status`, `priority`, `user_id`, `updated_at`) VALUES
(1, 'Mouse', 'I need a mouse for use', 'Pending', 'Medium', 2, '2024-07-03 11:45:16'),
(2, 'Keyboard', 'I need a key board for multitasking', 'Pending', 'Medium', 2, '2024-07-03 11:57:13'),
(3, 'High end PC', 'I need a laptop with a higher graphics processing unit and a more higher RAM and processing for increased processing and execution', 'Approved', 'High', 2, '2024-07-07 16:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`, `description`, `updated_at`) VALUES
(1, 'Admin', 'This is the administrator of the whole web portal', '2024-07-02 07:25:11'),
(2, 'Management', 'This is the top level management', '2024-07-02 07:25:11'),
(3, 'HOD', 'This is the head of department', '2024-07-02 07:26:06'),
(4, 'Staff', 'This is an employee', '2024-07-02 07:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

DROP TABLE IF EXISTS `server`;
CREATE TABLE IF NOT EXISTS `server` (
  `server_id` int NOT NULL AUTO_INCREMENT,
  `designation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `system_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `system_manufacturer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `system_model` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `system_sku` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `processor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `baseboard_product` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `installed_ram` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `storage_medium` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `serial_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `charger` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date_issued` date DEFAULT NULL,
  `date_of_purchase` date DEFAULT NULL,
  `depreciation_rate` decimal(19,2) DEFAULT NULL,
  `current_value` decimal(19,2) DEFAULT NULL,
  `purchase_cost` decimal(19,2) DEFAULT NULL,
  `origin` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`server_id`),
  KEY `category_has_server` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`server_id`, `designation`, `system_name`, `system_manufacturer`, `system_model`, `system_sku`, `processor`, `baseboard_product`, `installed_ram`, `storage_medium`, `serial_number`, `charger`, `date_issued`, `date_of_purchase`, `depreciation_rate`, `current_value`, `purchase_cost`, `origin`, `category_id`, `updated_at`) VALUES
(1, 'Emerald server at Milimani Datacentre', 'VILCOM-AD-FS-2', 'HPE', 'ProLiant DL380e Gen8', '668666-291', 'Intel(R) Xeon(R) CPU E5-2407 0 @ 2.20GHz, 2195 Mhz, 4 Core(s), 4 Logical Processor(s)', 'N/A', '24.0 GB', '2TB HDD', 'CN741100CZ', 'Dual PSU', '2021-02-19', '2021-02-19', 0.25, 59875.06, 160000.00, 'Vilcom', 2, '2024-07-08 07:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `server_depreciaiton_log`
--

DROP TABLE IF EXISTS `server_depreciaiton_log`;
CREATE TABLE IF NOT EXISTS `server_depreciaiton_log` (
  `server_depreciation_id` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `depreciated_value` decimal(19,2) DEFAULT NULL,
  `server_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`server_depreciation_id`),
  KEY `server_has_server_depreciation_log` (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `server_repair`
--

DROP TABLE IF EXISTS `server_repair`;
CREATE TABLE IF NOT EXISTS `server_repair` (
  `server_repair_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `priority` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `server_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`server_repair_id`),
  KEY `server_has_repair` (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `server_warranty`
--

DROP TABLE IF EXISTS `server_warranty`;
CREATE TABLE IF NOT EXISTS `server_warranty` (
  `server_warranty_id` int NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `warranty_provider` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `warranty_type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `warranty_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `warranty_contact` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `server_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`server_warranty_id`),
  KEY `server_has_warranty` (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `software_license`
--

DROP TABLE IF EXISTS `software_license`;
CREATE TABLE IF NOT EXISTS `software_license` (
  `license_id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `license_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `issued_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `purchase_cost` decimal(19,2) DEFAULT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`license_id`),
  KEY `user_has_software_license` (`user_id`),
  KEY `category_has_software_license` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_allocation`
--

DROP TABLE IF EXISTS `temporary_allocation`;
CREATE TABLE IF NOT EXISTS `temporary_allocation` (
  `allocation_id` int NOT NULL AUTO_INCREMENT,
  `first_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `last_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `id_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'allocated, returned, default: allocated',
  `user_id` int NOT NULL,
  `equipment_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`allocation_id`),
  KEY `equipment_has_temporary_allocation` (`equipment_id`),
  KEY `user_has_temporary_allocation` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `last_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department_id` int NOT NULL,
  `role_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  KEY `department_has_user` (`department_id`),
  KEY `role_has_user` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `status`, `department_id`, `role_id`, `updated_at`) VALUES
(1, 'Hillary', 'Chesaro', 'hillary.chesaro@vilcom.co.ke', '$2y$10$ltruDHtYIgrbIoK0WD7ExOlZCsTees.bBXnzNlfF3GlRXUhm5yDo.', 'Pending', 6, 1, '2024-07-02 07:57:56'),
(2, 'Tom', 'Harry', 'tom.harry@vilcom.co.ke', '$2y$10$tmRGVit.ziTMRQanLqtEHuBibJpruOtoMQDsMk7DW2ttSDchKXy8q', 'Approved', 6, 4, '2024-07-02 12:32:20'),
(3, 'John', 'Doe', 'john.doe@vilcom.co.ke', '$2y$10$A1tyDwpF50w/rwFkuF7Rqe2dAU7xI9EjM6vaSFHBGiaHfN6UV7782', 'Pending', 6, 2, '2024-07-08 10:59:56'),
(4, 'Mary', 'Jane', 'mary.jane@vilcom.co.ke', '$2y$10$UjLbFRPT9BKeTb4SgBlcwenrWVdDM1vmZVfh9BS7dPvQc0ht5nLn2', 'Pending', 6, 3, '2024-07-08 11:05:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
