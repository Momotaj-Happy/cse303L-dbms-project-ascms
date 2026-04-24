<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<?php
require('../backends/connection-pdo.php');
if (!isset($_GET['id'])) { header('location: delivery-list.php'); exit(); }
$id = $_GET['id'];
$delivery_q = $pdoconn->prepare('SELECT * FROM delivery WHERE delivery_id = ?');
$delivery_q->execute([$id]);
$deliv = $delivery_q->fetch(PDO::FETCH_ASSOC);
if (!$deliv) { header('location: delivery-list.php'); exit(); }

$orders = $pdoconn->query('SELECT order_id FROM orders')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-section">
	<div class="section-header">
		<h4>Edit Delivery #<?php echo $deliv['delivery_id']; ?></h4>
	</div>
    <div class="data-card">
        <form action="../backends/admin/delivery-edit.php" method="post">
            <input type="hidden" name="delivery_id" value="<?php echo $deliv['delivery_id']; ?>">
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='order_id' required>
                            <?php foreach ($orders as $o) {
                                $sel = ($o['order_id'] == $deliv['order_id']) ? 'selected' : '';
                                echo '<option value="'.$o['order_id'].'" '.$sel.'>Order #'.$o['order_id'].'</option>';
                            } ?>
                        </select>
                        <label>Order ID</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="vehicle_id" name="vehicle_id" type="text" value="<?php echo $deliv['vehicle_id']; ?>" class="validate" required>
                        <label class="active" for="vehicle_id">Vehicle Registration</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="driver_name" name="driver_name" type="text" value="<?php echo $deliv['driver_name']; ?>" class="validate" required>
                        <label class="active" for="driver_name">Driver Name</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='status' required>
                            <?php foreach (['Scheduled', 'In-Transit', 'Delivered'] as $st) {
                                $sel = ($st == $deliv['status']) ? 'selected' : '';
                                echo '<option value="'.$st.'" '.$sel.'>'.$st.'</option>';
                            } ?>
                        </select>
                        <label>Delivery Status</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="temp" name="temp_celsius" type="number" step="0.01" value="<?php echo $deliv['temp_celsius']; ?>" class="validate">
                        <label class="active" for="temp">Temp (°C)</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="humidity" name="humidity_pct" type="number" step="0.01" value="<?php echo $deliv['humidity_pct']; ?>" class="validate">
                        <label class="active" for="humidity">Humidity (%)</label>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col s12">
                    <button type="submit" class="btn green-btn waves-effect waves-light">
                        <i class="material-icons left">update</i>Update Delivery
                    </button>
                    <a href="delivery-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('layout/footer.php'); ?>