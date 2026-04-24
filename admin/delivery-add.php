<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<<<<<<< HEAD
<?php require('layout/left-sidebar-short.php'); ?>

<?php
require('../backends/connection-pdo.php');
$sql_orders = 'SELECT order_id FROM orders';
$orders = $pdoconn->query($sql_orders)->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="section white-text" style="background: #B35458;">
	<div class="section">
		<h3>Add Delivery</h3>
	</div>
    <div class="section center" style="padding: 40px;">
        <form action="../backends/admin/delivery-add.php" method="post">
            <?php
            if (isset($_SESSION['msg'])) {
                echo '<div class="row" style="background: red; color: white;"><div class="col s12"><h6>'.$_SESSION['msg'].'</h6></div></div>';
                unset($_SESSION['msg']);
            }
            ?>
            <div class="row">
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
=======

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
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                        <select name='order_id' required>
                            <option value="" disabled selected>Choose Order</option>
                            <?php foreach ($orders as $o) echo '<option value="'.$o['order_id'].'">Order #'.$o['order_id'].'</option>'; ?>
                        </select>
<<<<<<< HEAD
                        <label style="color: white;">Order ID</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="vehicle_id" name="vehicle_id" type="text" class="validate" style="color: white; width: 70%" required>
                        <label for="vehicle_id" style="color: white;"><b>Vehicle ID :</b></label>
=======
                        <label>Order ID</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="vehicle_id" name="vehicle_id" type="text" class="validate" required>
                        <label for="vehicle_id">Vehicle Registration</label>
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                    </div>
                </div>
            </div>
            <div class="row">
<<<<<<< HEAD
                <div class="col s6">
                    <div class="input-field">
                        <input id="driver_name" name="driver_name" type="text" class="validate" style="color: white; width: 70%" required>
                        <label for="driver_name" style="color: white;"><b>Driver Name :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
=======
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="driver_name" name="driver_name" type="text" class="validate" required>
                        <label for="driver_name">Driver Name</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                        <select name='status' required>
                            <option value="Scheduled">Scheduled</option>
                            <option value="In-Transit">In-Transit</option>
                            <option value="Delivered">Delivered</option>
                        </select>
<<<<<<< HEAD
                        <label style="color: white;">Status</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="section right" style="padding: 15px 10px;">
                        <a href="delivery-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Add Delivery</button>
                    </div>
=======
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
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                </div>
            </div>
        </form>
    </div>
</div>
<<<<<<< HEAD
<?php require('layout/about-modal.php'); ?>
=======

>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
<?php require('layout/footer.php'); ?>