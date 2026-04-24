<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="col s12 m2 left-sidebar" id="left-sidebar">
    <div class="brand-logo center-align">
        <h4 class="heading-name">ASCMS</h4>
    </div>
    <ul class="nav-sidebar">
        <li class="list-group-item <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
            <a href="dashboard.php"><i class="material-icons left">dashboard</i>Dashboard</a>
        </li>
        <li class="list-group-item <?php echo (strpos($current_page, 'product') !== false) ? 'active' : ''; ?>">
            <a href="product-list.php"><i class="material-icons left">inventory_2</i>Products</a>
        </li>
        <li class="list-group-item <?php echo (strpos($current_page, 'farm') !== false) ? 'active' : ''; ?>">
            <a href="farm-list.php"><i class="material-icons left">agriculture</i>Farms</a>
        </li>
        <li class="list-group-item <?php echo (strpos($current_page, 'inventory') !== false) ? 'active' : ''; ?>">
            <a href="inventory-list.php"><i class="material-icons left">warehouse</i>Inventory</a>
        </li>
        <li class="list-group-item <?php echo (strpos($current_page, 'customer') !== false) ? 'active' : ''; ?>">
            <a href="customer-list.php"><i class="material-icons left">people</i>Customers</a>
        </li>
        <li class="list-group-item <?php echo (strpos($current_page, 'order') !== false) ? 'active' : ''; ?>">
            <a href="order-list.php"><i class="material-icons left">shopping_cart</i>Orders</a>
        </li>
        <li class="list-group-item <?php echo (strpos($current_page, 'delivery') !== false) ? 'active' : ''; ?>">
            <a href="delivery-list.php"><i class="material-icons left">local_shipping</i>Deliveries</a>
        </li>
        <li class="list-group-item modal-trigger" data-target="modal1">
            <a href="#"><i class="material-icons left">info</i>About</a>
        </li>
    </ul>
</div>
<div class="col s12 m10 main-content-wrapper" style="padding: 0 !important;">
