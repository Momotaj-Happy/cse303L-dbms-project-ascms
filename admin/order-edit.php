<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>

<?php
require('../backends/connection-pdo.php');
if (!isset($_GET['id'])) { header('location: order-list.php'); exit(); }
$id = $_GET['id'];
$sql = 'SELECT * FROM orders WHERE order_id = ?';
$query = $pdoconn->prepare($sql);
$query->execute([$id]);
$order = $query->fetch(PDO::FETCH_ASSOC);
if (!$order) { header('location: order-list.php'); exit(); }

$customers = $pdoconn->query('SELECT customer_id, name FROM customer')->fetchAll(PDO::FETCH_ASSOC);
$products = $pdoconn->query('SELECT product_id, name FROM product')->fetchAll(PDO::FETCH_ASSOC);
?>

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
                    </div>
                </div>
            </div>
            <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row">
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
                </div>
            </div>
        </form>
    </div>
</div>
<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>