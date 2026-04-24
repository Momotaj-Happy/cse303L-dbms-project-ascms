-- 1. Product Table
-- Defines what kind of items you are handling.
CREATE TABLE `product` (
    `product_id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `category` VARCHAR(50),
    `storage_req` TEXT,
    `shelf_life_days` INT,
    `packaging` VARCHAR(50)
) ENGINE=InnoDB;

-- 2. Farms Table
-- Information about your source/suppliers.
CREATE TABLE `farms` (
    `farm_id` INT AUTO_INCREMENT PRIMARY KEY,
    `farm_name` VARCHAR(100) NOT NULL,
    `location` TEXT,
    `contact_person` VARCHAR(100),
    `phone` VARCHAR(20)
) ENGINE=InnoDB;

-- 3. Inventory Table
-- Tracks batches currently in stock.
CREATE TABLE `inventory` (
    `inventory_id` INT AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT,
    `farm_id` INT,
    `quantity` DECIMAL(10, 2) NOT NULL,
    `harvest_date` DATE,
    `status` ENUM('In-Storage', 'Processing', 'Sold', 'Expired') DEFAULT 'In-Storage',
    CONSTRAINT fk_inv_product FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`) ON DELETE CASCADE,
    CONSTRAINT fk_inv_farm FOREIGN KEY (`farm_id`) REFERENCES `farms`(`farm_id`) ON DELETE SET NULL
) ENGINE=InnoDB;

-- 4. Customer Table
-- Who you are selling to.
CREATE TABLE `customer` (
    `customer_id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `address` TEXT,
    `contact_info` VARCHAR(100),
    `customer_type` VARCHAR(50)
) ENGINE=InnoDB;

-- 5. Orders Table
-- Sales records.
CREATE TABLE `orders` (
    `order_id` INT AUTO_INCREMENT PRIMARY KEY,
    `customer_id` INT,
    `product_id` INT,
    `quantity` DECIMAL(10, 2) NOT NULL,
    `total_price` DECIMAL(12, 2),
    `order_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `order_status` ENUM('Pending', 'Paid', 'Cancelled') DEFAULT 'Pending',
    CONSTRAINT fk_ord_customer FOREIGN KEY (`customer_id`) REFERENCES `customer`(`customer_id`) ON DELETE CASCADE,
    CONSTRAINT fk_ord_product FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 6. Delivery Table
-- Logistics + IoT telemetry monitoring.
CREATE TABLE `delivery` (
    `delivery_id` INT AUTO_INCREMENT PRIMARY KEY,
    `order_id` INT,
    `vehicle_id` VARCHAR(50),
    `driver_name` VARCHAR(100),
    `current_lat` DECIMAL(9, 6),
    `current_long` DECIMAL(9, 6),
    `temp_celsius` DECIMAL(5, 2),
    `humidity_pct` DECIMAL(5, 2),
    `status` ENUM('Scheduled', 'In-Transit', 'Delivered') DEFAULT 'Scheduled',
    `doc_url` VARCHAR(255),
    `last_updated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_del_order FOREIGN KEY (`order_id`) REFERENCES `orders`(`order_id`) ON DELETE CASCADE
) ENGINE=InnoDB;