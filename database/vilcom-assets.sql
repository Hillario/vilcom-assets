-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 06:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`, `description`, `updated_at`) VALUES
(1, 'Commercial', 'The department for commercial', '2024-05-24 06:01:00'),
(2, 'SHEQ', 'Safety health environment quality', '2024-05-24 06:01:00'),
(3, 'Fiber Rollout', 'The fiber rollout department', '2024-05-24 06:11:56'),
(4, 'Finance', 'The finance department', '2024-05-24 06:11:56'),
(5, 'Human Resource', 'This is the human resource department', '2024-05-24 06:12:40'),
(6, 'IT and Systems', 'This is the IT and Systems department', '2024-05-24 06:12:40'),
(7, 'Marketing', 'This is the marketing department', '2024-05-24 06:13:45'),
(8, 'Planning and Design', 'This is the planning and design department', '2024-05-24 06:13:45'),
(9, 'Procurement', 'This is the procurement department', '2024-05-24 06:22:33'),
(10, 'Retention', 'This is the retention department', '2024-05-24 06:22:33'),
(11, 'Sales', 'This is the sales department', '2024-05-24 06:23:43'),
(12, 'Special Projects', 'This is the special projects department\r\n', '2024-05-24 06:23:43'),
(13, 'Support and Maintenance', 'This is the support and maintenance department', '2024-05-24 06:24:43'),
(14, 'Management', 'This is the top level management', '2024-05-24 06:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_incident`
--

CREATE TABLE `equipment_incident` (
  `equipment_incident_id` int(11) NOT NULL,
  `incident_date` date DEFAULT NULL,
  `type_of_incident` varchar(50) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `process` varchar(50) DEFAULT NULL,
  `priority` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `root_cause` text DEFAULT NULL,
  `action_plan` text DEFAULT NULL,
  `date_action_completed` date DEFAULT NULL,
  `equipment_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_repair`
--

CREATE TABLE `equipment_repair` (
  `equipment_repair_id` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `priority` varchar(30) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `equipment_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_warranty`
--

CREATE TABLE `equipment_warranty` (
  `equipment_warranty_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `warranty_provider` text DEFAULT NULL COMMENT 'The name of the company or provider offering warranty',
  `warranty_type` varchar(30) DEFAULT NULL COMMENT 'Type of warranty(e.g. manufacturer''s warranty, extended warranty)',
  `warranty_details` text DEFAULT NULL COMMENT 'Details about what is covered under the warranty',
  `warranty_contact` text DEFAULT NULL COMMENT 'Contact information for the warranty provider, email of phone',
  `equipment_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` text DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `customer_name` text DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `customer_email` text DEFAULT NULL,
  `customer_phone` varchar(50) DEFAULT NULL,
  `VAT` decimal(19,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(19,2) DEFAULT NULL,
  `total_price` decimal(19,2) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `network_equipment`
--

CREATE TABLE `network_equipment` (
  `network_id` int(11) NOT NULL,
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
  `purchase_cost` decimal(19,2) DEFAULT NULL,
  `origin` varchar(30) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `network_repair`
--

CREATE TABLE `network_repair` (
  `network_repair_id` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `priority` varchar(30) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `network_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `network_warranty`
--

CREATE TABLE `network_warranty` (
  `network_warranty_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `warranty_provider` text DEFAULT NULL,
  `warranty_type` varchar(30) DEFAULT NULL,
  `warranty_details` text DEFAULT NULL,
  `warranty_contact` text DEFAULT NULL,
  `network_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `office_equipment`
--

CREATE TABLE `office_equipment` (
  `equipment_id` int(11) NOT NULL,
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
  `purchase_cost` decimal(19,2) DEFAULT NULL,
  `origin` varchar(30) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office_equipment`
--

INSERT INTO `office_equipment` (`equipment_id`, `system_name`, `system_manufacturer`, `system_model`, `system_sku`, `processor`, `baseboard_product`, `installed_ram`, `storage_medium`, `serial_number`, `charger`, `mouse_assigned`, `date_issued`, `purchase_cost`, `origin`, `user_id`, `updated_at`) VALUES
(1, 'system_name', 'system_manufacturer', 'system_model', 'system_sku', 'processor', 'baseboard_product', 'installed_ram', 'storage_medium', 'serial_number', 'charger', 'No', '2024-05-28', 3003.33, 'Vilcom', 1, '2024-05-28 09:04:54'),
(2, 'VILCOM-002', 'HP', 'HP ProBook 430 G3', 'Y5W97PA#AB4', 'Intel(R) Core(TM) i7-6500U CPU @ 2.50GHz, 2592 Mhz, 2 Core(s), 4 Logical Processor(s)', '80FF', '8GB', '256GB SSD', '5CD712BRZR', 'Issued', 'Yes', '2024-05-28', 35000.00, 'Vilcom', 4, '2024-05-28 09:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `item_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `priority` varchar(30) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`, `description`, `updated_at`) VALUES
(1, 'Staff', 'This an employee of Vilcom', '2024-05-24 05:58:17'),
(2, 'HOD ', 'This is a head of department at Vilcom Networks', '2024-05-24 05:58:17'),
(3, 'Management', 'This is the top level management at Vilcom Networks', '2024-05-24 05:59:35'),
(4, 'Admin', 'This is the administrator of the whole Vilcom Staff Portal', '2024-05-24 05:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE `server` (
  `server_id` int(11) NOT NULL,
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
  `purchase_cost` decimal(19,2) DEFAULT NULL,
  `origin` varchar(30) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `server_repair`
--

CREATE TABLE `server_repair` (
  `server_repair_id` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `priority` varchar(30) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `server_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `server_warranty`
--

CREATE TABLE `server_warranty` (
  `server_warranty_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `warranty_provider` text DEFAULT NULL,
  `warranty_type` varchar(30) DEFAULT NULL,
  `warranty_details` text DEFAULT NULL,
  `warranty_contact` text DEFAULT NULL,
  `server_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `status`, `department_id`, `role_id`, `updated_at`) VALUES
(1, 'Hillary', 'Chesaro', 'hillary.chesaro@vilcom.co.ke', '$2y$10$Eqd5qGPzFUsI4XdEZr1y9u55BFvltFxOb1brteIW/9a92u/mcsDIy', 'Pending', 6, 4, '2024-05-24 06:33:04'),
(2, 'John', 'Doe', 'john.doe@vilcom.co.ke', '$2y$10$iTfcp68llPA5ROTK6BlTIuwctUmxv37BdhDa/SfV/sxoo/OyNMnJ.', 'Pending', 6, 2, '2024-05-24 06:39:31'),
(3, 'Mary', 'Jane', 'mary.jane@vilcom.co.ke', '$2y$10$a4m2BQ3ybZQjCvuBE63qAePDD.KmvuWocNRtk8IkKvSyKygqjMPJ.', 'Pending', 14, 3, '2024-05-24 06:41:19'),
(4, 'Tom', 'Harry', 'tom.harry@vilcom.co.ke', '$2y$10$YqHlHmPXO.4Heb/7bUhEv.Kb0SExZ/B9oQXweAhC5WjNc5BYSBIW6', 'Pending', 6, 1, '2024-05-24 06:47:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `equipment_incident`
--
ALTER TABLE `equipment_incident`
  ADD PRIMARY KEY (`equipment_incident_id`),
  ADD KEY `equipment_has_equipment_incident` (`equipment_id`);

--
-- Indexes for table `equipment_repair`
--
ALTER TABLE `equipment_repair`
  ADD PRIMARY KEY (`equipment_repair_id`),
  ADD KEY `equipment_has_repair` (`equipment_id`);

--
-- Indexes for table `equipment_warranty`
--
ALTER TABLE `equipment_warranty`
  ADD PRIMARY KEY (`equipment_warranty_id`),
  ADD KEY `equipment_has_warranty` (`equipment_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `user_has_invoice` (`user_id`);

--
-- Indexes for table `network_equipment`
--
ALTER TABLE `network_equipment`
  ADD PRIMARY KEY (`network_id`);

--
-- Indexes for table `network_repair`
--
ALTER TABLE `network_repair`
  ADD PRIMARY KEY (`network_repair_id`),
  ADD KEY `network_has_repair` (`network_id`);

--
-- Indexes for table `network_warranty`
--
ALTER TABLE `network_warranty`
  ADD PRIMARY KEY (`network_warranty_id`),
  ADD KEY `network_has_warranty` (`network_id`);

--
-- Indexes for table `office_equipment`
--
ALTER TABLE `office_equipment`
  ADD PRIMARY KEY (`equipment_id`),
  ADD KEY `user_has_office_equipment` (`user_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_has_request` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `server`
--
ALTER TABLE `server`
  ADD PRIMARY KEY (`server_id`);

--
-- Indexes for table `server_repair`
--
ALTER TABLE `server_repair`
  ADD PRIMARY KEY (`server_repair_id`),
  ADD KEY `server_has_repair` (`server_id`);

--
-- Indexes for table `server_warranty`
--
ALTER TABLE `server_warranty`
  ADD PRIMARY KEY (`server_warranty_id`),
  ADD KEY `server_has_warranty` (`server_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `department_has_user` (`department_id`),
  ADD KEY `role_has_user` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `equipment_incident`
--
ALTER TABLE `equipment_incident`
  MODIFY `equipment_incident_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment_repair`
--
ALTER TABLE `equipment_repair`
  MODIFY `equipment_repair_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment_warranty`
--
ALTER TABLE `equipment_warranty`
  MODIFY `equipment_warranty_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `network_equipment`
--
ALTER TABLE `network_equipment`
  MODIFY `network_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `network_repair`
--
ALTER TABLE `network_repair`
  MODIFY `network_repair_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `network_warranty`
--
ALTER TABLE `network_warranty`
  MODIFY `network_warranty_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `office_equipment`
--
ALTER TABLE `office_equipment`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `server`
--
ALTER TABLE `server`
  MODIFY `server_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `server_repair`
--
ALTER TABLE `server_repair`
  MODIFY `server_repair_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `server_warranty`
--
ALTER TABLE `server_warranty`
  MODIFY `server_warranty_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment_incident`
--
ALTER TABLE `equipment_incident`
  ADD CONSTRAINT `equipment_has_equipment_incident` FOREIGN KEY (`equipment_id`) REFERENCES `office_equipment` (`equipment_id`);

--
-- Constraints for table `equipment_repair`
--
ALTER TABLE `equipment_repair`
  ADD CONSTRAINT `equipment_has_repair` FOREIGN KEY (`equipment_id`) REFERENCES `office_equipment` (`equipment_id`);

--
-- Constraints for table `equipment_warranty`
--
ALTER TABLE `equipment_warranty`
  ADD CONSTRAINT `equipment_has_warranty` FOREIGN KEY (`equipment_id`) REFERENCES `office_equipment` (`equipment_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `user_has_invoice` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `network_repair`
--
ALTER TABLE `network_repair`
  ADD CONSTRAINT `network_has_repair` FOREIGN KEY (`network_id`) REFERENCES `network_equipment` (`network_id`);

--
-- Constraints for table `network_warranty`
--
ALTER TABLE `network_warranty`
  ADD CONSTRAINT `network_has_warranty` FOREIGN KEY (`network_id`) REFERENCES `network_equipment` (`network_id`);

--
-- Constraints for table `office_equipment`
--
ALTER TABLE `office_equipment`
  ADD CONSTRAINT `user_has_office_equipment` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `user_has_request` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `server_repair`
--
ALTER TABLE `server_repair`
  ADD CONSTRAINT `server_has_repair` FOREIGN KEY (`server_id`) REFERENCES `server` (`server_id`);

--
-- Constraints for table `server_warranty`
--
ALTER TABLE `server_warranty`
  ADD CONSTRAINT `server_has_warranty` FOREIGN KEY (`server_id`) REFERENCES `server` (`server_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `department_has_user` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `role_has_user` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
