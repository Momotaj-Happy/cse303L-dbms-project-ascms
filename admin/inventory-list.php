<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<?php
require('../backends/connection-pdo.php');
$sql = 'SELECT inventory.*, product.name as product_name, farms.farm_name 
        FROM inventory 
        LEFT JOIN product ON inventory.product_id = product.product_id 
        LEFT JOIN farms ON inventory.farm_id = farms.farm_id';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-section">
	<div class="section-header">
		<div class="row">
            <div class="col s8">
                <h4>Inventory Management</h4>
            </div>
            <div class="col s4 right-align" style="padding-top: 15px !important;">
                <a href="inventory-add.php" class="waves-effect waves-light btn white-text">
                    <i class="material-icons left">add_circle</i>New Batch
                </a>
            </div>
        </div>
	</div>

    <div class="data-card">
        <?php
        if (isset($_SESSION['msg'])) {
            echo '<div class="card-panel green white-text" style="margin: 10px 0;">'.$_SESSION['msg'].'</div>';
            unset($_SESSION['msg']);
        }
        ?>

        <table class="centered highlight responsive-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Farm</th>
                <th>Quantity</th>
                <th>Harvest Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($arr_all as $key) { ?>
            <tr>
                <td><?php echo $key['inventory_id']; ?></td>
                <td><strong><?php echo $key['product_name']; ?></strong></td>
                <td><?php echo $key['farm_name']; ?></td>
                <td><?php echo $key['quantity']; ?></td>
                <td><?php echo $key['harvest_date']; ?></td>
                <td><span class="chip <?php echo ($key['status'] == 'Expired') ? 'red white-text' : (($key['status'] == 'Sold') ? 'grey' : 'green white-text'); ?>"><?php echo $key['status']; ?></span></td>
                <td>
                    <a href="inventory-edit.php?id=<?php echo $key['inventory_id']; ?>" class="btn-floating btn-small waves-effect waves-light blue">
                        <i class="material-icons">edit</i>
                    </a>
                    <a href="../backends/admin/inventory-delete.php?id=<?php echo $key['inventory_id']; ?>" class="btn-floating btn-small waves-effect waves-light red">
                        <i class="material-icons">delete</i>
                    </a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require('layout/footer.php'); ?>