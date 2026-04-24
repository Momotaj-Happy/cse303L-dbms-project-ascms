<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
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
         
        </tbody>
      </table>
	</div>
</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>