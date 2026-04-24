<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>

<?php
require('../backends/connection-pdo.php');
$sql_customers = 'SELECT customer_id, name FROM customer';
$customers = $pdoconn->query($sql_customers)->fetchAll(PDO::FETCH_ASSOC);

$sql_products = 'SELECT product_id, name FROM product';
$products = $pdoconn->query($sql_products)->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="section white-text" style="background: #B35458;">
	<div class="section">
		<h3>Add Order</h3>
	</div>
    <div class="section center" style="padding: 40px;">
        <form action="../backends/admin/order-add.php" method="post">
            <?php
            if (isset($_SESSION['msg'])) {
                echo '<div class="row" style="background: red; color: white;"><div class="col s12"><h6>'.$_SESSION['msg'].'</h6></div></div>';
                unset($_SESSION['msg']);
            }
            ?>
            <div class="row">
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
                        <select name='customer_id' required>
                            <option value="" disabled selected>Choose Customer</option>
                            <?php foreach ($customers as $c) echo '<option value="'.$c['customer_id'].'">'.$c['name'].'</option>'; ?>
                        </select>
                        <label style="color: white;">Customer</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
                        <select name='product_id' required>
                            <option value="" disabled selected>Choose Product</option>
                            <?php foreach ($products as $p) echo '<option value="'.$p['product_id'].'">'.$p['name'].'</option>'; ?>
                        </select>
                        <label style="color: white;">Product</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="quantity" name="quantity" type="number" step="0.01" class="validate" style="color: white; width: 70%" required>
                        <label for="quantity" style="color: white;"><b>Quantity :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="total_price" name="total_price" type="number" step="0.01" class="validate" style="color: white; width: 70%" required>
                        <label for="total_price" style="color: white;"><b>Total Price :</b></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
                        <select name='order_status' required>
                            <option value="Pending">Pending</option>
                            <option value="Paid">Paid</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                        <label style="color: white;">Status</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="section right" style="padding: 15px 10px;">
                        <a href="order-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Add Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>