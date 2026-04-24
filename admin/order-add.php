<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<?php
require('../backends/connection-pdo.php');
$customers = $pdoconn->query('SELECT customer_id, name FROM customer')->fetchAll(PDO::FETCH_ASSOC);
$products = $pdoconn->query('SELECT product_id, name FROM product')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-section">
	<div class="section-header">
		<h4>Create New Order</h4>
	</div>
    <div class="data-card">
        <form action="../backends/admin/order-add.php" method="post">
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='customer_id' required>
                            <option value="" disabled selected>Choose Customer</option>
                            <?php foreach ($customers as $c) echo '<option value="'.$c['customer_id'].'">'.$c['name'].'</option>'; ?>
                        </select>
                        <label>Customer</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='product_id' required>
                            <option value="" disabled selected>Choose Product</option>
                            <?php foreach ($products as $p) echo '<option value="'.$p['product_id'].'">'.$p['name'].'</option>'; ?>
                        </select>
                        <label>Product</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="quantity" name="quantity" type="number" step="0.01" class="validate" required>
                        <label for="quantity">Quantity</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="total_price" name="total_price" type="number" step="0.01" class="validate" required>
                        <label for="total_price">Total Price (BDT)</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='order_status' required>
                            <option value="Pending">Pending</option>
                            <option value="Paid">Paid</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                        <label>Order Status</label>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col s12">
                    <button type="submit" class="btn green-btn waves-effect waves-light">
                        <i class="material-icons left">add_shopping_cart</i>Place Order
                    </button>
                    <a href="order-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('layout/footer.php'); ?>