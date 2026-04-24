<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<<<<<<< HEAD
<?php require('layout/left-sidebar-short.php'); ?>

<?php
require('../backends/connection-pdo.php');

$sql_products = 'SELECT product_id, name FROM product';
$query_products = $pdoconn->prepare($sql_products);
$query_products->execute();
$products = $query_products->fetchAll(PDO::FETCH_ASSOC);

$sql_farms = 'SELECT farm_id, farm_name FROM farms';
$query_farms = $pdoconn->prepare($sql_farms);
$query_farms->execute();
$farms = $query_farms->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Add Inventory Batch</h3>
	</div>

    <div class="section center" style="padding: 40px;">

        <form action="../backends/admin/inventory-add.php" method="post">

            <?php
            if (isset($_SESSION['msg'])) {
                echo '<div class="row" style="background: red; color: white;">
                <div class="col s12">
                    <h6>'.$_SESSION['msg'].'</h6>
                    </div>
                </div>';
                unset($_SESSION['msg']);
            }
            ?>

            <div class="row">
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
                        <select name='product_id' required>
                            <option value="" disabled selected>Choose Product</option>
                            <?php 
                                foreach ($products as $p) {
                                    echo '<option value="'.$p['product_id'].'">'.$p['name'].'</option>';
                                }
                            ?>
                        </select>
                        <label style="color: white;">Product</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
                        <select name='farm_id' required>
                            <option value="" disabled selected>Choose Farm</option>
                            <?php 
                                foreach ($farms as $f) {
                                    echo '<option value="'.$f['farm_id'].'">'.$f['farm_name'].'</option>';
                                }
                            ?>
                        </select>
                        <label style="color: white;">Farm</label>
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
                        <input id="harvest_date" name="harvest_date" type="date" class="validate" style="color: white; width: 70%" required>
                        <label for="harvest_date" style="color: white;"><b>Harvest Date :</b></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
=======

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
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                        <select name='status' required>
                            <option value="In-Storage">In-Storage</option>
                            <option value="Processing">Processing</option>
                            <option value="Sold">Sold</option>
                            <option value="Expired">Expired</option>
                        </select>
<<<<<<< HEAD
                        <label style="color: white;">Status</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <div class="section right" style="padding: 15px 10px;">
                        <a href="inventory-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Add Batch</button>
                    </div>
                </div>
            </div>

        </form>

    </div>

</div>

<?php require('layout/about-modal.php'); ?>
=======
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

>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
<?php require('layout/footer.php'); ?>