<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>

<?php
require('../backends/connection-pdo.php');
if (!isset($_GET['id'])) { header('location: inventory-list.php'); exit(); }
$id = $_GET['id'];
$sql = 'SELECT * FROM inventory WHERE inventory_id = ?';
$query = $pdoconn->prepare($sql);
$query->execute([$id]);
$inventory = $query->fetch(PDO::FETCH_ASSOC);
if (!$inventory) { header('location: inventory-list.php'); exit(); }

$products = $pdoconn->query('SELECT product_id, name FROM product')->fetchAll(PDO::FETCH_ASSOC);
$farms = $pdoconn->query('SELECT farm_id, farm_name FROM farms')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="section white-text" style="background: #B35458;">
	<div class="section">
		<h3>Edit Inventory Batch</h3>
	</div>
    <div class="section center" style="padding: 40px;">
        <form action="../backends/admin/inventory-edit.php" method="post">
            <input type="hidden" name="inventory_id" value="<?php echo $inventory['inventory_id']; ?>">
            <div class="row">
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
                        <select name='product_id' required>
                            <?php foreach ($products as $p) {
                                $selected = ($p['product_id'] == $inventory['product_id']) ? 'selected' : '';
                                echo '<option value="'.$p['product_id'].'" '.$selected.'>'.$p['name'].'</option>';
                            } ?>
                        </select>
                        <label style="color: white;">Product</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
                        <select name='farm_id' required>
                            <?php foreach ($farms as $f) {
                                $selected = ($f['farm_id'] == $inventory['farm_id']) ? 'selected' : '';
                                echo '<option value="'.$f['farm_id'].'" '.$selected.'>'.$f['farm_name'].'</option>';
                            } ?>
                        </select>
                        <label style="color: white;">Farm</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="quantity" name="quantity" type="number" step="0.01" value="<?php echo $inventory['quantity']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="quantity" style="color: white;"><b>Quantity :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="harvest_date" name="harvest_date" type="date" value="<?php echo $inventory['harvest_date']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="harvest_date" style="color: white;"><b>Harvest Date :</b></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field" style="color: white !important;">
                        <select name='status' required>
                            <?php $statuses = ['In-Storage', 'Processing', 'Sold', 'Expired'];
                            foreach ($statuses as $st) {
                                $selected = ($st == $inventory['status']) ? 'selected' : '';
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
                        <a href="inventory-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Update Batch</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>