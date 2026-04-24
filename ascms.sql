-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2026 at 05:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ascms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '12345'),
(2, 'Admin', 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `contact_info` varchar(100) DEFAULT NULL,
  `customer_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `address`, `contact_info`, `customer_type`) VALUES
(1, 'Shwapno Supershop', 'Gulshan-1, Dhaka', 'supply@shwapno.com', 'Retailer'),
(2, 'Meena Bazar', 'Dhanmondi, Dhaka', 'procurement@meenabazar.com', 'Retailer'),
(3, 'Akij Food & Beverage', 'Tejgaon I/A, Dhaka', 'info@akij.net', 'Wholesaler'),
(4, 'Agora', 'Uttara, Dhaka', 'merchandising@agora.com.bd', 'Retailer');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `vehicle_id` varchar(50) DEFAULT NULL,
  `driver_name` varchar(100) DEFAULT NULL,
  `current_lat` decimal(9,6) DEFAULT NULL,
  `current_long` decimal(9,6) DEFAULT NULL,
  `temp_celsius` decimal(5,2) DEFAULT NULL,
  `humidity_pct` decimal(5,2) DEFAULT NULL,
  `status` enum('Scheduled','In-Transit','Delivered') DEFAULT 'Scheduled',
  `doc_url` varchar(255) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `order_id`, `vehicle_id`, `driver_name`, `current_lat`, `current_long`, `temp_celsius`, `humidity_pct`, `status`, `doc_url`, `last_updated`) VALUES
(1, 1, 'DHK-METRO-T-11-2233', 'Md. Rafiq', 23.750900, 90.393500, 11.20, 70.00, 'In-Transit', NULL, '2026-04-23 15:02:02'),
(3, 3, 'DHK-METRO-T-99-8877', 'Md. Jashim', 24.894900, 91.868700, 22.00, 55.00, 'Delivered', NULL, '2026-04-23 15:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `farm_id` int(11) NOT NULL,
  `farm_name` varchar(100) NOT NULL,
  `location` text DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`farm_id`, `farm_name`, `location`, `contact_person`, `phone`) VALUES
(1, 'Rajshahi Mango Orchard', 'Kansat, Chapainawabganj', 'Md. Abdur Rashid', '01711000111'),
(2, 'North Bengal Paddy Hub', 'Sherpur, Bogra', 'Md. Selim Hossain', '01811222333'),
(3, 'Malnicherra Tea Estate', 'Sylhet Sadar', 'Pritom Bhattacharya', '01911333444'),
(4, 'Munshiganj Potato Farm', 'Munshiganj', 'Abul Kashem', '01511444555');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `farm_id` int(11) DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `harvest_date` date DEFAULT NULL,
  `status` enum('In-Storage','Processing','Sold','Expired') DEFAULT 'In-Storage'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `product_id`, `farm_id`, `quantity`, `harvest_date`, `status`) VALUES
(2, 2, 1, 1200.00, '2026-04-20', 'Processing'),
(3, 3, 3, 800.00, '2026-04-01', 'In-Storage'),
(4, 5, 4, 3000.00, '2026-04-10', 'In-Storage');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `total_price` decimal(12,2) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` enum('Pending','Paid','Cancelled') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `product_id`, `quantity`, `total_price`, `order_date`, `order_status`) VALUES
(1, 1, 2, 200.00, 40000.00, '2026-04-23 15:02:02', 'Paid'),
(3, 3, 3, 500.00, 125000.00, '2026-04-23 15:02:02', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `storage_req` text DEFAULT NULL,
  `shelf_life_days` int(11) DEFAULT NULL,
  `packaging` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `category`, `storage_req`, `shelf_life_days`, `packaging`) VALUES
(2, 'Himsagar Mango', 'Fruits', 'Refrigerated at 10-12°C', 12, 'Plastic Crate'),
(3, 'Sylhet Premium Tea', 'Tea', 'Airtight dry storage', 730, '500g Foil Pack'),
(4, 'Bogra Curd (Doi)', 'Dairy', 'Chilled 2-4°C', 7, 'Clay Pot'),
(5, 'Deshi Onion', 'Vegetables', 'Well-ventilated dry area', 60, '40kg Mesh Bag'),
(6, 'Jute Fiber (Tossa)', 'Industrial', 'Dry fire-proof warehouse', 1825, '180kg Bale');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `fk_del_order` (`order_id`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`farm_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `fk_inv_product` (`product_id`),
  ADD KEY `fk_inv_farm` (`farm_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_ord_customer` (`customer_id`),
  ADD KEY `fk_ord_product` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `farm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_del_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `fk_inv_farm` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`farm_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_inv_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_ord_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ord_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
