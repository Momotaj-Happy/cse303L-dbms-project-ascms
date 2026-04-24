<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<<<<<<< HEAD
<?php require('layout/left-sidebar-short.php'); ?>


<?php

require('../backends/connection-pdo.php');

$sql = 'SELECT delivery.*, orders.order_id as oid 
        FROM delivery 
        LEFT JOIN orders ON delivery.order_id = orders.order_id';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

?>
						

<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Deliveries</h3>
	</div>

	<div class="section right" style="padding: 15px 25px;">
		<a href="delivery-add.php" class="waves-effect waves-light btn">Add New</a>
	</div>

  <?php

    if (isset($_SESSION['msg'])) {
        echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
        <div class="col s12">
            <h6>'.$_SESSION['msg'].'</h6>
            </div>
        </div></div>';
        unset($_SESSION['msg']);
    }

    ?>
	
	<div class="section center" style="padding: 20px;">
		<table class="centered responsive-table">
        <thead>
          <tr>
	      <th>ID</th>
              <th>Order ID</th>
              <th>Vehicle ID</th>
              <th>Driver Name</th>
              <th>Status</th>
              <th>Temp (°C)</th>
              <th>Humidity (%)</th>
              <th>Last Updated</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php

            foreach ($arr_all as $key) {

          ?>
          <tr>
	    <td><?php echo $key['delivery_id']; ?></td>
	    <td><?php echo $key['order_id']; ?></td>
            <td><?php echo $key['vehicle_id']; ?></td>
            <td><?php echo $key['driver_name']; ?></td>
            <td><?php echo $key['status']; ?></td>
            <td><?php echo $key['temp_celsius']; ?> °C</td>
            <td><?php echo $key['humidity_pct']; ?> %</td>
            <td><?php echo $key['last_updated']; ?></td>
            <td>
                <a href="delivery-edit.php?id=<?php echo $key['delivery_id']; ?>"><span class="new badge blue" data-badge-caption="">Edit</span></a>
                <a href="../backends/admin/delivery-delete.php?id=<?php echo $key['delivery_id']; ?>"><span class="new badge red" data-badge-caption="">Delete</span></a>
            </td>
          </tr>

          <?php } ?>
         
=======

<?php
require('../backends/connection-pdo.php');
$sql = 'SELECT delivery.*, orders.order_id as oid 
        FROM delivery 
        LEFT JOIN orders ON delivery.order_id = orders.order_id';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-section">
	<div class="section-header">
		<div class="row">
            <div class="col s8">
                <h4>Deliveries Tracking</h4>
            </div>
            <div class="col s4 right-align">
                <a href="delivery-add.php" class="btn green-btn waves-effect waves-light white-text">
                    <i class="material-icons left">local_shipping</i>New Delivery
                </a>
            </div>
        </div>
	</div>

  <?php
    if (isset($_SESSION['msg'])) {
        echo '<div class="card-panel green white-text" style="margin-bottom: 20px; border-radius: 8px;">'.$_SESSION['msg'].'</div>';
        unset($_SESSION['msg']);
    }
    ?>
	
	<div class="data-card">
		<table class="centered highlight responsive-table">
        <thead>
          <tr>
	          <th>ID</th>
              <th>Order ID</th>
              <th>Vehicle</th>
              <th>Driver</th>
              <th>Status</th>
              <th>Temp/Hum</th>
              <th>Updated</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($arr_all as $key) { ?>
          <tr>
	        <td><?php echo $key['delivery_id']; ?></td>
	        <td>#<?php echo $key['order_id']; ?></td>
            <td><span class="chip"><?php echo $key['vehicle_id']; ?></span></td>
            <td><strong><?php echo $key['driver_name']; ?></strong></td>
            <td><span class="chip <?php echo ($key['status'] == 'Delivered') ? 'green white-text' : (($key['status'] == 'In-Transit') ? 'blue white-text' : 'grey white-text'); ?>"><?php echo $key['status']; ?></span></td>
            <td><small><?php echo $key['temp_celsius']; ?>°C / <?php echo $key['humidity_pct']; ?>%</small></td>
            <td><small><?php echo $key['last_updated']; ?></small></td>
            <td>
                <a href="delivery-edit.php?id=<?php echo $key['delivery_id']; ?>" class="btn-floating btn-small waves-effect waves-light blue">
                    <i class="material-icons">edit</i>
                </a>
                <a href="../backends/admin/delivery-delete.php?id=<?php echo $key['delivery_id']; ?>" class="btn-floating btn-small waves-effect waves-light red">
                    <i class="material-icons">delete</i>
                </a>
            </td>
          </tr>
          <?php } ?>
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
        </tbody>
      </table>
	</div>
</div>

<<<<<<< HEAD
<?php require('layout/about-modal.php'); ?>
=======
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
<?php require('layout/footer.php'); ?>