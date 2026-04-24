<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<?php
require('../backends/connection-pdo.php');
if (!isset($_GET['id'])) { header('location: order-list.php'); exit(); }
$id = $_GET['id'];
$order_q = $pdoconn->prepare('SELECT * FROM orders WHERE order_id = ?');
$order_q->execute([$id]);
$order = $order_q->fetch(PDO::FETCH_ASSOC);
if (!$order) { header('location: order-list.php'); exit(); }

$customers = $pdoconn->query('SELECT customer_id, name FROM customer')->fetchAll(PDO::FETCH_ASSOC);
$products = $pdoconn->query('SELECT product_id, name FROM product')->fetchAll(PDO::FETCH_ASSOC);
?>

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
                    </div>
                </div>
            </div>
            <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row">
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
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('layout/footer.php'); ?>