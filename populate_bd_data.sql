-- Bangladesh Contextual Dummy Data for ASCMS

-- Disable foreign key checks to truncate tables
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE `delivery`;
TRUNCATE TABLE `orders`;
TRUNCATE TABLE `inventory`;
TRUNCATE TABLE `customer`;
TRUNCATE TABLE `farms`;
TRUNCATE TABLE `product`;
-- TRUNCATE TABLE `admin`; -- Keep admin for login consistency
SET FOREIGN_KEY_CHECKS = 1;

-- 1. Products (Bangladesh Specialties)
INSERT INTO `product` (`name`, `category`, `storage_req`, `shelf_life_days`, `packaging`) VALUES
('Miniket Rice', 'Grains', 'Dry and cool warehouse', 365, '50kg Burlap Sack'),
('Himsagar Mango', 'Fruits', 'Refrigerated at 10-12°C', 12, 'Plastic Crate'),
('Sylhet Premium Tea', 'Tea', 'Airtight dry storage', 730, '500g Foil Pack'),
('Bogra Curd (Doi)', 'Dairy', 'Chilled 2-4°C', 7, 'Clay Pot'),
('Deshi Onion', 'Vegetables', 'Well-ventilated dry area', 60, '40kg Mesh Bag'),
('Jute Fiber (Tossa)', 'Industrial', 'Dry fire-proof warehouse', 1825, '180kg Bale');

-- 2. Farms (Bangladesh Regions)
INSERT INTO `farms` (`farm_name`, `location`, `contact_person`, `phone`) VALUES
('Rajshahi Mango Orchard', 'Kansat, Chapainawabganj', 'Md. Abdur Rashid', '01711000111'),
('North Bengal Paddy Hub', 'Sherpur, Bogra', 'Md. Selim Hossain', '01811222333'),
('Malnicherra Tea Estate', 'Sylhet Sadar', 'Pritom Bhattacharya', '01911333444'),
('Munshiganj Potato Farm', 'Munshiganj', 'Abul Kashem', '01511444555');

-- 3. Inventory
INSERT INTO `inventory` (`product_id`, `farm_id`, `quantity`, `harvest_date`, `status`) VALUES
(1, 2, 5000.00, '2026-03-15', 'In-Storage'),
(2, 1, 1200.00, '2026-04-20', 'Processing'),
(3, 3, 800.00, '2026-04-01', 'In-Storage'),
(5, 4, 3000.00, '2026-04-10', 'In-Storage');

-- 4. Customers (Local Superstores/Groups)
INSERT INTO `customer` (`name`, `address`, `contact_info`, `customer_type`) VALUES
('Shwapno Supershop', 'Gulshan-1, Dhaka', 'supply@shwapno.com', 'Retailer'),
('Meena Bazar', 'Dhanmondi, Dhaka', 'procurement@meenabazar.com', 'Retailer'),
('Akij Food & Beverage', 'Tejgaon I/A, Dhaka', 'info@akij.net', 'Wholesaler'),
('Agora', 'Uttara, Dhaka', 'merchandising@agora.com.bd', 'Retailer');

-- 5. Orders
INSERT INTO `orders` (`customer_id`, `product_id`, `quantity`, `total_price`, `order_status`) VALUES
(1, 2, 200.00, 40000.00, 'Paid'),
(2, 1, 1000.00, 65000.00, 'Pending'),
(3, 3, 500.00, 125000.00, 'Paid');

-- 6. Delivery (Local Logistics)
INSERT INTO `delivery` (`order_id`, `vehicle_id`, `driver_name`, `current_lat`, `current_long`, `temp_celsius`, `humidity_pct`, `status`) VALUES
(1, 'DHK-METRO-T-11-2233', 'Md. Rafiq', 23.7509, 90.3935, 11.20, 70.00, 'In-Transit'),
(2, 'DHK-METRO-H-44-5566', 'Md. Sumon', 24.3636, 88.6241, 28.50, 45.00, 'Scheduled'),
(3, 'DHK-METRO-T-99-8877', 'Md. Jashim', 24.8949, 91.8687, 22.00, 55.00, 'Delivered');
