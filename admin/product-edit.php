<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<<<<<<< HEAD
<?php require('layout/left-sidebar-short.php'); ?>
=======
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2

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

<<<<<<< HEAD
<div class="section white-text" style="background: #B35458;">
	<div class="section">
		<h3>Edit Product</h3>
	</div>
    <div class="section center" style="padding: 40px;">
        <form action="../backends/admin/product-edit.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="name" name="name" type="text" value="<?php echo $product['name']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="name" style="color: white;"><b>Product Name :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="category" name="category" type="text" value="<?php echo $product['category']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="category" style="color: white;"><b>Category :</b></label>
=======
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
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                    </div>
                </div>
            </div>
            <div class="row">
<<<<<<< HEAD
                <div class="col s6">
                    <div class="input-field">
                        <input id="shelf_life" name="shelf_life" type="number" value="<?php echo $product['shelf_life_days']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="shelf_life" style="color: white;"><b>Shelf Life (Days) :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="packaging" name="packaging" type="text" value="<?php echo $product['packaging']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="packaging" style="color: white;"><b>Packaging :</b></label>
=======
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
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
<<<<<<< HEAD
                        <textarea id="storage_req" name="storage_req" class="materialize-textarea" style="color: white; width: 85%"><?php echo $product['storage_req']; ?></textarea>
                        <label class="active" for="storage_req" style="color: white;"><b>Storage Requirements :</b></label>
=======
                        <textarea id="storage_req" name="storage_req" class="materialize-textarea"><?php echo $product['storage_req']; ?></textarea>
                        <label class="active" for="storage_req">Storage Requirements</label>
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
<<<<<<< HEAD
                    <div class="section right" style="padding: 15px 10px;">
                        <a href="product-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Update Product</button>
                    </div>
=======
                    <button type="submit" class="btn waves-effect waves-light">
                        <i class="material-icons left">update</i>Update Product
                    </button>
                    <a href="product-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">
                        Cancel
                    </a>
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