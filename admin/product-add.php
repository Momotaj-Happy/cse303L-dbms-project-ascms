<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<<<<<<< HEAD
<?php require('layout/left-sidebar-short.php'); ?>

<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Add Product</h3>
	</div>

    <div class="section center" style="padding: 40px;">

        <form action="../backends/admin/product-add.php" method="post">

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
                    <div class="input-field">
                        <input id="name" name="name" type="text" class="validate" style="color: white; width: 70%" required>
                        <label for="name" style="color: white;"><b>Product Name :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="category" name="category" type="text" class="validate" style="color: white; width: 70%" required>
                        <label for="category" style="color: white;"><b>Category :</b></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="shelf_life" name="shelf_life" type="number" class="validate" style="color: white; width: 70%" required>
                        <label for="shelf_life" style="color: white;"><b>Shelf Life (Days) :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="packaging" name="packaging" type="text" class="validate" style="color: white; width: 70%" required>
                        <label for="packaging" style="color: white;"><b>Packaging :</b></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <textarea id="storage_req" name="storage_req" class="materialize-textarea" style="color: white; width: 85%"></textarea>
                        <label for="storage_req" style="color: white;"><b>Storage Requirements :</b></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <div class="section right" style="padding: 15px 10px;">
                        <a href="product-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Add Product</button>
                    </div>
                </div>
            </div>

        </form>

    </div>

</div>

<?php require('layout/about-modal.php'); ?>
=======

<div class="main-section">
	<div class="section-header">
		<h4>Add New Product</h4>
	</div>

    <div class="data-card">
        <form action="../backends/admin/product-add.php" method="post">
            <?php
            if (isset($_SESSION['msg'])) {
                echo '<div class="card-panel red white-text">'.$_SESSION['msg'].'</div>';
                unset($_SESSION['msg']);
            }
            ?>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="name" name="name" type="text" class="validate" required>
                        <label for="name">Product Name</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="category" name="category" type="text" class="validate" required>
                        <label for="category">Category</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="shelf_life" name="shelf_life" type="number" class="validate" required>
                        <label for="shelf_life">Shelf Life (Days)</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="packaging" name="packaging" type="text" class="validate" required>
                        <label for="packaging">Packaging Type</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <textarea id="storage_req" name="storage_req" class="materialize-textarea"></textarea>
                        <label for="storage_req">Storage Requirements</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn waves-effect waves-light">
                        <i class="material-icons left">save</i>Save Product
                    </button>
                    <a href="product-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
<?php require('layout/footer.php'); ?>