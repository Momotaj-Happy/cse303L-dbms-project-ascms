<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<<<<<<< HEAD
<?php require('layout/left-sidebar-short.php'); ?>
=======
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2

<?php
require('../backends/connection-pdo.php');
if (!isset($_GET['id'])) { header('location: order-list.php'); exit(); }
$id = $_GET['id'];
<<<<<<< HEAD
$sql = 'SELECT * FROM orders WHERE order_id = ?';
$query = $pdoconn->prepare($sql);
$query->execute([$id]);
$order = $query->fetch(PDO::FETCH_ASSOC);
=======
$order_q = $pdoconn->prepare('SELECT * FROM orders WHERE order_id = ?');
$order_q->execute([$id]);
$order = $order_q->fetch(PDO::FETCH_ASSOC);
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
if (!$order) { header('location: order-list.php'); exit(); }

$customers = $pdoconn->query('SELECT customer_id, name FROM customer')->fetchAll(PDO::FETCH_ASSOC);
$products = $pdoconn->query('SELECT product_id, name FROM product')->fetchAll(PDO::FETCH_ASSOC);
?>

<<<<<<< HEAD
<div class="section white-text" style="background: #B35458;">
	<div class="section">
		<h3>Edit Order</h3>
	</div>
    <div class="section center" style="padding: 40px;">
        <form action="../backends/admin/order-edit.php" method="post">
            <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
            <div class="row">
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
                        <select name='customer_id' required>
                            <?php foreach ($customers as $c) {
                                $selected = ($c['customer_id'] == $order['customer_id']) ? 'selected' : '';
                                echo '<option value="'.$c['customer_id'].'" '.$selected.'>'.$c['name'].'</option>';
                            } ?>
                        </select>
                        <label style="color: white;">Customer</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
                        <select name='product_id' required>
                            <?php foreach ($products as $p) {
                                $selected = ($p['product_id'] == $order['product_id']) ? 'selected' : '';
                                echo '<option value="'.$p['product_id'].'" '.$selected.'>'.$p['name'].'</option>';
                            } ?>
                        </select>
                        <label style="color: white;">Product</label>
=======
<div class="main-section">
	<div class="section-header">
		<h4>Edit Order #<?php echo $order['order_id']; ?></h4>
	</div>
    <div class="data-card">
        <form action="../backends/admin/order-edit.php" method="post">
            <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='customer_id' required>
                            <?php foreach ($customers as $c) {
                                $sel = ($c['customer_id'] == $order['customer_id']) ? 'selected' : '';
                                echo '<option value="'.$c['customer_id'].'" '.$sel.'>'.$c['name'].'</option>';
                            } ?>
                        </select>
                        <label>Customer</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='product_id' required>
                            <?php foreach ($products as $p) {
                                $sel = ($p['product_id'] == $order['product_id']) ? 'selected' : '';
                                echo '<option value="'.$p['product_id'].'" '.$sel.'>'.$p['name'].'</option>';
                            } ?>
                        </select>
                        <label>Product</label>
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                    </div>
                </div>
            </div>
            <div class="row">
<<<<<<< HEAD
                <div class="col s6">
                    <div class="input-field">
                        <input id="quantity" name="quantity" type="number" step="0.01" value="<?php echo $order['quantity']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="quantity" style="color: white;"><b>Quantity :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="total_price" name="total_price" type="number" step="0.01" value="<?php echo $order['total_price']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="total_price" style="color: white;"><b>Total Price :</b></label>
=======
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="quantity" name="quantity" type="number" step="0.01" value="<?php echo $order['quantity']; ?>" class="validate" required>
                        <label class="active" for="quantity">Quantity</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="total_price" name="total_price" type="number" step="0.01" value="<?php echo $order['total_price']; ?>" class="validate" required>
                        <label class="active" for="total_price">Total Price (BDT)</label>
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                    </div>
                </div>
            </div>
            <div class="row">
<<<<<<< HEAD
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
                        <select name='order_status' required>
                            <?php $statuses = ['Pending', 'Paid', 'Cancelled'];
                            foreach ($statuses as $st) {
                                $selected = ($st == $order['order_status']) ? 'selected' : '';
                                echo '<option value="'.$st.'" '.$selected.'>'.$st.'</option>';
                            } ?>
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
                        <button type="submit" class="waves-effect waves-light btn">Update Order</button>
                    </div>
=======
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='order_status' required>
                            <?php foreach (['Pending', 'Paid', 'Cancelled'] as $st) {
                                $sel = ($st == $order['order_status']) ? 'selected' : '';
                                echo '<option value="'.$st.'" '.$sel.'>'.$st.'</option>';
                            } ?>
                        </select>
                        <label>Order Status</label>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col s12">
                    <button type="submit" class="btn green-btn waves-effect waves-light">
                        <i class="material-icons left">update</i>Update Order
                    </button>
                    <a href="order-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">Cancel</a>
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