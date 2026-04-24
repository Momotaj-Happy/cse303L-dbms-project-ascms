# Agriculture Product Supply Chain Management System (ASCMS)

This project has been repurposed from a general DBMS to an **Agriculture Product Supply Chain Management System (ASCMS)**. It provides an administrative panel to manage various aspects of an agricultural supply chain, from products and farms to inventory, customer orders, and deliveries.

## Features

*   **Admin Panel:** A comprehensive dashboard to manage all aspects of the supply chain.
*   **Product Management:** CRUD operations for agricultural products, including details like category, storage requirements, shelf life, and packaging.
*   **Farm Management:** CRUD operations for managing farm information, including contact persons and locations.
*   **Inventory Management:** CRUD operations to track product batches, quantities, harvest dates, and status (In-Storage, Processing, Sold, Expired).
*   **Customer Management:** CRUD operations for managing customer details, contact information, and customer types.
*   **Order Management:** CRUD operations for handling customer orders, including products, quantities, prices, and order status.
*   **Delivery Tracking:** CRUD operations for monitoring deliveries with vehicle details, driver names, and real-time telemetry (temperature, humidity).
*   **Homepage:** A public-facing homepage describing the project, its features, and including visual diagrams (ERD, Rich Picture).
*   **Modern UI/UX:** A clean, modern, and desktop-optimized user interface with a dark green, white, and cream color palette.

## Getting Started

### Prerequisites

*   **XAMPP** (or any other Apache/MySQL/PHP stack) installed on your system.
*   A web browser.

### Installation

1.  **Clone the Repository:**
    If you haven't already, clone this repository to your XAMPP `htdocs` directory (or your web server's document root).
    ```bash
    cd /Applications/XAMPP/xamppfiles/htdocs/ # (or your htdocs path)
    git clone <repository-url> happy_dbms
    ```

2.  **Database Setup:**
    a.  Open your web browser and navigate to `http://localhost/phpmyadmin` (or your phpMyAdmin URL).
    b.  Create a new database named `ascms`.
    c.  Import the `ascms.sql` file located in the project's root directory into the `ascms` database.
    d.  (Optional but Recommended) To populate the database with sample Bangladesh-relevant data for testing, import the `populate_bd_data.sql` file into the `ascms` database. This will also create the `admin` table if it doesn't exist.

3.  **Admin Login:**
    *   **URL:** `http://localhost/happy_dbms/admin/`
    *   **Email:** `admin@gmail.com`
    *   **Password:** `12345`

### Project Structure

```
happy_dbms/
├── admin/                         # Admin panel files (PHP, UI)
│   ├── layout/                    # UI layout components (header, footer, etc.)
│   ├── ... (CRUD files for Products, Farms, etc.)
├── backends/                      # Backend PHP scripts for database operations
│   ├── admin/                     # Admin-specific backend scripts
│   ├── config.php                 # Database connection configuration
│   └── connection-pdo.php         # PDO connection handler
├── css/                           # Custom CSS styles (form-style.css)
├── js/                            # JavaScript files
├── ascms.sql                      # Database schema for ASCMS
├── populate_bd_data.sql           # Dummy data for testing (Bangladesh context)
├── drawSQL-image-export-2026-04-23.jpg # ERD Diagram
├── DBMS_Diagram.drawio.png        # Rich Picture Diagram
├── index.php                      # Public homepage
└── README.md                      # This file
```

## Usage

*   **Public Homepage:** Access the project's homepage at `http://localhost/happy_dbms/`.
*   **Admin Panel:** Log in to the admin panel at `http://localhost/happy_dbms/admin/` to manage your agricultural supply chain data.

## Contributing

Feel free to fork the repository, make improvements, and submit pull requests.

## License

This project is open-source and available under the MIT License.