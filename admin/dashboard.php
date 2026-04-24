<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<<<<<<< HEAD
<?php require('layout/left-sidebar-short.php'); ?>
						
<?php
if (isset($_SESSION['msg'])) {
	echo '<div class="section white-text" style="background: #B35458;">'.$_SESSION['msg'].'</div>';
	unset($_SESSION['msg']);
}
?>

<div class="section white-text center" style="background: #B35458; margin-top: 20px;">

	<h4>Dashboard</h4>
	
	<div class="row" style="padding: 50px;">
		<div class="col s12">

			<a class="dash-btn" href="order-list.php"><div class="sec white white-text" style="margin: 15px; padding: 40px;border: 2px solid white; border-radius: 20px; font-size: 20px; background: linear-gradient(to right, #AF6568, #FA797F);">Orders</div></a>
			<a class="dash-btn" href="product-list.php"><div class="sec white white-text" style="margin: 15px; padding: 40px;border: 2px solid white; border-radius: 20px; font-size: 20px; background: linear-gradient(to right, #AF6568, #FA797F);">Products</div></a>
			<a class="dash-btn" href="farm-list.php"><div class="sec white white-text" style="margin: 15px; padding: 40px;border: 2px solid white; border-radius: 20px; font-size: 20px; background: linear-gradient(to right, #AF6568, #FA797F);">Farms</div></a>
			<a class="dash-btn" href="inventory-list.php"><div class="sec white white-text" style="margin: 15px; padding: 40px;border: 2px solid white; border-radius: 20px; font-size: 20px; background: linear-gradient(to right, #AF6568, #FA797F);">Inventory</div></a>
			
		</div>

	</div>

</div>

<?php require('layout/about-modal.php'); ?>
=======

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

>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
<?php require('layout/footer.php'); ?>