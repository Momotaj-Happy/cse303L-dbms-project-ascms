<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASCMS - Agriculture Supply Chain Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/form-style.css?v=<?php echo time(); ?>">
    <style>
        body {
            background-color: var(--cream);
            color: var(--text-dark);
        }
        .navbar-fixed {
            height: 70px;
        }
        nav {
            background-color: var(--dark-green) !important;
            box-shadow: none;
            height: 70px;
            line-height: 70px;
        }
        nav .brand-logo {
            padding-left: 20px;
            font-weight: 700;
            font-size: 1.8rem;
        }
        nav ul a {
            font-weight: 500;
        }
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://via.placeholder.com/1500x500?text=Agriculture+Background') no-repeat center center/cover;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 30px auto;
        }
        .section-padding {
            padding: 60px 0;
        }
        .section-heading {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 40px;
            text-align: center;
        }
        .feature-card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 30px;
            margin-bottom: 30px;
            text-align: center;
            border: 1px solid var(--border);
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.08);
            border-color: var(--light-green);
        }
        .feature-card i {
            font-size: 60px;
            color: var(--mid-green);
            margin-bottom: 20px;
        }
        .feature-card h5 {
            font-weight: 600;
            color: var(--dark-green);
            margin-bottom: 15px;
        }
        .image-container {
            margin-top: 40px;
            background: var(--white);
            padding: 25px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
        }
        .image-container img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 8px;
            border: 1px solid var(--border);
        }
        .image-container p {
            margin-top: 15px;
            font-size: 0.9rem;
            color: var(--text-light);
            text-align: center;
        }
        footer.page-footer {
            background-color: var(--dark-green) !important;
            padding-top: 20px;
        }
        footer.page-footer .footer-copyright {
            background-color: var(--mid-green) !important;
        }
    </style>
</head>
<body>

    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo">ASCMS</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="admin/" class="white-text">Admin Panel</a></li>
                    <li><a href="#features" class="white-text">Features</a></li>
                    <li><a href="#diagrams" class="white-text">Diagrams</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="hero-section">
        <div class="container">
            <h1>Agriculture Product Supply Chain Management System</h1>
            <p>Streamlining the journey of agricultural produce from farm to consumer, ensuring efficiency, transparency, and quality every step of the way.</p>
            <a href="admin/" class="btn-large waves-effect waves-light white-text green-btn">Go to Admin Panel</a>
        </div>
    </div>

    <div id="features" class="section-padding">
        <div class="container">
            <h2 class="section-heading">Key Features</h2>
            <div class="row">
                <div class="col s12 m4">
                    <div class="feature-card">
                        <i class="material-icons">agriculture</i>
                        <h5>Farm Management</h5>
                        <p>Track farm details, contact persons, locations, and manage multiple agricultural sources efficiently.</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="feature-card">
                        <i class="material-icons">inventory_2</i>
                        <h5>Product Catalog</h5>
                        <p>Maintain a detailed catalog of agricultural products with categories, storage requirements, and shelf life.</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="feature-card">
                        <i class="material-icons">warehouse</i>
                        <h5>Inventory Control</h5>
                        <p>Monitor product batches, quantities, harvest dates, and status from storage to processing.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m4">
                    <div class="feature-card">
                        <i class="material-icons">people</i>
                        <h5>Customer Relations</h5>
                        <p>Manage customer information, addresses, contact details, and categorize by type (retailer, wholesaler).</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="feature-card">
                        <i class="material-icons">shopping_cart</i>
                        <h5>Order Processing</h5>
                        <p>Handle customer orders, track quantities, total prices, order dates, and statuses.</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="feature-card">
                        <i class="material-icons">local_shipping</i>
                        <h5>Delivery Tracking</h5>
                        <p>Monitor deliveries with vehicle IDs, driver names, and real-time telemetry like temperature and humidity.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="diagrams" class="section-padding grey lighten-4">
        <div class="container">
            <h2 class="section-heading">System Diagrams</h2>
            <div class="row">
                <div class="col s12 m6">
                    <div class="image-container">
                        <img src="drawSQL-image-export-2026-04-23.jpg" alt="Entity Relationship Diagram (ERD)">
                        <p>Figure 1: Entity Relationship Diagram (ERD) showing database structure.</p>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="image-container">
                        <img src="DBMS_Diagram.drawio.png" alt="Rich Picture Diagram">
                        <p>Figure 2: Rich Picture Diagram illustrating system context and stakeholders.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">ASCMS</h5>
                    <p class="grey-text text-lighten-4">An efficient solution for managing agriculture product supply chains.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="admin/">Admin Panel</a></li>
                        <li><a class="grey-text text-lighten-3" href="#features">Features</a></li>
                        <li><a class="grey-text text-lighten-3" href="#diagrams">Diagrams</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
            © <?php echo date('Y'); ?> ASCMS. All rights reserved.
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>
</body>
</html>