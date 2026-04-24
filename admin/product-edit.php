<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<?php
require('../backends/connection-pdo.php');
if (!isset($_GET['id'])) { header('location: product-list.php'); exit(); }
$id = $_GET['id'];
$sql = 'SELECT * FROM product WHERE product_id = ?';
$query = $pdoconn->prepare($sql);
$query->execute([$id]);
$product = $query->fetch(PDO::FETCH_ASSOC);
if (!$product) { header('location: product-list.php'); exit(); }
?>

<div class="main-section">
	<div class="section-header">
		<h4>Edit Product: <?php echo $product['name']; ?></h4>
	</div>
    <div class="data-card">
        <form action="../backends/admin/product-edit.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="name" name="name" type="text" value="<?php echo $product['name']; ?>" class="validate" required>
                        <label class="active" for="name">Product Name</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="category" name="category" type="text" value="<?php echo $product['category']; ?>" class="validate" required>
                        <label class="active" for="category">Category</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="shelf_life" name="shelf_life" type="number" value="<?php echo $product['shelf_life_days']; ?>" class="validate" required>
                        <label class="active" for="shelf_life">Shelf Life (Days)</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="packaging" name="packaging" type="text" value="<?php echo $product['packaging']; ?>" class="validate" required>
                        <label class="active" for="packaging">Packaging Type</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <textarea id="storage_req" name="storage_req" class="materialize-textarea"><?php echo $product['storage_req']; ?></textarea>
                        <label class="active" for="storage_req">Storage Requirements</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn waves-effect waves-light">
                        <i class="material-icons left">update</i>Update Product
                    </button>
                    <a href="product-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('layout/footer.php'); ?>