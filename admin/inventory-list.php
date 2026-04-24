<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>


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
						

<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Inventory</h3>
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

	<div class="section right" style="padding: 15px 25px;">
		<a href="inventory-add.php" class="waves-effect waves-light btn">Add New Batch</a>
	</div>
	
	<div class="section center" style="padding: 20px;">
		<table class="centered responsive-table">
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
          <?php

            foreach ($arr_all as $key) {

          ?>
          <tr>
            <td><?php echo $key['inventory_id']; ?></td>
            <td><?php echo $key['product_name']; ?></td>
            <td><?php echo $key['farm_name']; ?></td>
            <td><?php echo $key['quantity']; ?></td>
            <td><?php echo $key['harvest_date']; ?></td>
            <td><?php echo $key['status']; ?></td>
            <td>
                <a href="inventory-edit.php?id=<?php echo $key['inventory_id']; ?>"><span class="new badge blue" data-badge-caption="">Edit</span></a>
                <a href="../backends/admin/inventory-delete.php?id=<?php echo $key['inventory_id']; ?>"><span class="new badge red" data-badge-caption="">Delete</span></a>
            </td>
          </tr>

          <?php } ?>
         
        </tbody>
      </table>
	</div>
</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>