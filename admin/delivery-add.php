<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<?php
require('../backends/connection-pdo.php');
$orders = $pdoconn->query('SELECT order_id FROM orders')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-section">
	<div class="section-header">
		<h4>Schedule New Delivery</h4>
	</div>
    <div class="data-card">
        <form action="../backends/admin/delivery-add.php" method="post">
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='order_id' required>
                            <option value="" disabled selected>Choose Order</option>
                            <?php foreach ($orders as $o) echo '<option value="'.$o['order_id'].'">Order #'.$o['order_id'].'</option>'; ?>
                        </select>
                        <label>Order ID</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="vehicle_id" name="vehicle_id" type="text" class="validate" required>
                        <label for="vehicle_id">Vehicle Registration</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="driver_name" name="driver_name" type="text" class="validate" required>
                        <label for="driver_name">Driver Name</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='status' required>
                            <option value="Scheduled">Scheduled</option>
                            <option value="In-Transit">In-Transit</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                        <label>Delivery Status</label>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col s12">
                    <button type="submit" class="btn green-btn waves-effect waves-light">
                        <i class="material-icons left">local_shipping</i>Create Delivery
                    </button>
                    <a href="delivery-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('layout/footer.php'); ?>