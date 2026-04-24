<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<?php
require('../backends/connection-pdo.php');
$products = $pdoconn->query('SELECT product_id, name FROM product')->fetchAll(PDO::FETCH_ASSOC);
$farms = $pdoconn->query('SELECT farm_id, farm_name FROM farms')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-section">
	<div class="section-header">
		<h4>Add Inventory Batch</h4>
	</div>
    <div class="data-card">
        <form action="../backends/admin/inventory-add.php" method="post">
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='product_id' required>
                            <option value="" disabled selected>Choose Product</option>
                            <?php foreach ($products as $p) echo '<option value="'.$p['product_id'].'">'.$p['name'].'</option>'; ?>
                        </select>
                        <label>Product</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='farm_id' required>
                            <option value="" disabled selected>Choose Farm</option>
                            <?php foreach ($farms as $f) echo '<option value="'.$f['farm_id'].'">'.$f['farm_name'].'</option>'; ?>
                        </select>
                        <label>Farm</label>
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
                        <input id="harvest_date" name="harvest_date" type="date" class="validate" required>
                        <label class="active" for="harvest_date">Harvest Date</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <select name='status' required>
                            <option value="In-Storage">In-Storage</option>
                            <option value="Processing">Processing</option>
                            <option value="Sold">Sold</option>
                            <option value="Expired">Expired</option>
                        </select>
                        <label>Status</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn waves-effect waves-light">
                        <i class="material-icons left">save</i>Save Batch
                    </button>
                    <a href="inventory-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('layout/footer.php'); ?>