<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<?php
require('../backends/connection-pdo.php');
if (!isset($_GET['id'])) { header('location: inventory-list.php'); exit(); }
$id = $_GET['id'];
$inventory = $pdoconn->prepare('SELECT * FROM inventory WHERE inventory_id = ?');
$inventory->execute([$id]);
$item = $inventory->fetch(PDO::FETCH_ASSOC);
if (!$item) { header('location: inventory-list.php'); exit(); }

$products = $pdoconn->query('SELECT product_id, name FROM product')->fetchAll(PDO::FETCH_ASSOC);
$farms = $pdoconn->query('SELECT farm_id, farm_name FROM farms')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-section">
	<div class="section-header">
		<h4>Edit Inventory Batch #<?php echo $item['inventory_id']; ?></h4>
	</div>
    <div class="data-card">
        <form action="../backends/admin/inventory-edit.php" method="post">
            <input type="hidden" name="inventory_id" value="<?php echo $item['inventory_id']; ?>">
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='product_id' required>
                            <?php foreach ($products as $p) {
                                $sel = ($p['product_id'] == $item['product_id']) ? 'selected' : '';
                                echo '<option value="'.$p['product_id'].'" '.$sel.'>'.$p['name'].'</option>';
                            } ?>
                        </select>
                        <label>Product</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='farm_id' required>
                            <?php foreach ($farms as $f) {
                                $sel = ($f['farm_id'] == $item['farm_id']) ? 'selected' : '';
                                echo '<option value="'.$f['farm_id'].'" '.$sel.'>'.$f['farm_name'].'</option>';
                            } ?>
                        </select>
                        <label>Farm</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="quantity" name="quantity" type="number" step="0.01" value="<?php echo $item['quantity']; ?>" class="validate" required>
                        <label class="active" for="quantity">Quantity</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="harvest_date" name="harvest_date" type="date" value="<?php echo $item['harvest_date']; ?>" class="validate" required>
                        <label class="active" for="harvest_date">Harvest Date</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='status' required>
                            <?php foreach (['In-Storage', 'Processing', 'Sold', 'Expired'] as $st) {
                                $sel = ($st == $item['status']) ? 'selected' : '';
                                echo '<option value="'.$st.'" '.$sel.'>'.$st.'</option>';
                            } ?>
                        </select>
                        <label>Status</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn waves-effect waves-light">
                        <i class="material-icons left">update</i>Update Batch
                    </button>
                    <a href="inventory-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('layout/footer.php'); ?>