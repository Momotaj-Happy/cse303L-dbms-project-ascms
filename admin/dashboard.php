<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<div class="main-section">
	<?php
	if (isset($_SESSION['msg'])) {
		echo '<div class="card-panel green white-text" style="margin-bottom: 30px; border-radius: 8px;">'.$_SESSION['msg'].'</div>';
		unset($_SESSION['msg']);
	}
	?>

	<div class="section-header">
		<h4>Dashboard Overview</h4>
	</div>
	
	<div class="row">
		<div class="col s12 m6 l3">
			<a class="dash-card" href="order-list.php">
				<i class="material-icons" style="color: #35845f;">shopping_cart</i>
				<div class="card-title">Orders</div>
			</a>
		</div>
		<div class="col s12 m6 l3">
			<a class="dash-card" href="product-list.php">
				<i class="material-icons" style="color: #35845f;">inventory_2</i>
				<div class="card-title">Products</div>
			</a>
		</div>
		<div class="col s12 m6 l3">
			<a class="dash-card" href="farm-list.php">
				<i class="material-icons" style="color: #35845f;">agriculture</i>
				<div class="card-title">Farms</div>
			</a>
		</div>
		<div class="col s12 m6 l3">
			<a class="dash-card" href="inventory-list.php">
				<i class="material-icons" style="color: #35845f;">warehouse</i>
				<div class="card-title">Inventory</div>
			</a>
		</div>
	</div>

	<div class="row" style="margin-top: 20px;">
		<div class="col s12 m6 l3">
			<a class="dash-card" href="customer-list.php">
				<i class="material-icons" style="color: #35845f;">people</i>
				<div class="card-title">Customers</div>
			</a>
		</div>
		<div class="col s12 m6 l3">
			<a class="dash-card" href="delivery-list.php">
				<i class="material-icons" style="color: #35845f;">local_shipping</i>
				<div class="card-title">Deliveries</div>
			</a>
		</div>
	</div>
</div>

<?php require('layout/footer.php'); ?>