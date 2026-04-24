<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<?php
require('../backends/connection-pdo.php');
$sql = 'SELECT * FROM product';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-section">

	<div class="section-header">
		<div class="row">
            <div class="col s8">
                <h4>Products Management</h4>
            </div>
            <div class="col s4 right-align" style="padding-top: 15px !important;">
                <a href="product-add.php" class="waves-effect waves-light btn white-text">
                    <i class="material-icons left">add</i>Add New
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
                <th>Name</th>
                <th>Category</th>
                <th>Storage Req</th>
                <th>Shelf Life (Days)</th>
                <th>Packaging</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($arr_all as $key) { ?>
            <tr>
                <td><?php echo $key['product_id']; ?></td>
                <td><strong><?php echo $key['name']; ?></strong></td>
                <td><span class="chip"><?php echo $key['category']; ?></span></td>
                <td><?php echo $key['storage_req']; ?></td>
                <td><?php echo $key['shelf_life_days']; ?></td>
                <td><?php echo $key['packaging']; ?></td>
                <td>
                    <a href="product-edit.php?id=<?php echo $key['product_id']; ?>" class="btn-floating btn-small waves-effect waves-light blue">
                        <i class="material-icons">edit</i>
                    </a>
                    <a href="../backends/admin/product-delete.php?id=<?php echo $key['product_id']; ?>" class="btn-floating btn-small waves-effect waves-light red">
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