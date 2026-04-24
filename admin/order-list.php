<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>


<?php

require('../backends/connection-pdo.php');

$sql = 'SELECT orders.*, customer.name as customer_name, product.name as product_name 
        FROM orders 
        LEFT JOIN customer ON orders.customer_id = customer.customer_id 
        LEFT JOIN product ON orders.product_id = product.product_id';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

?>
						

<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>All Orders</h3>
	</div>

	<div class="section right" style="padding: 15px 25px;">
		<a href="order-add.php" class="waves-effect waves-light btn">Add New</a>
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
              <th>Customer</th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php

            foreach ($arr_all as $key) {

          ?>
          <tr>
	    <td><?php echo $key['order_id']; ?></td>
	    <td><?php echo $key['customer_name']; ?></td>
            <td><?php echo $key['product_name']; ?></td>
            <td><?php echo $key['quantity']; ?></td>
            <td><?php echo $key['total_price']; ?></td>
            <td><?php echo $key['order_date']; ?></td>
            <td><?php echo $key['order_status']; ?></td>
            <td>
                <a href="order-edit.php?id=<?php echo $key['order_id']; ?>"><span class="new badge blue" data-badge-caption="">Edit</span></a>
                <a href="../backends/admin/order-delete.php?id=<?php echo $key['order_id']; ?>"><span class="new badge red" data-badge-caption="">Delete</span></a>
            </td>
          </tr>

          <?php } ?>
         
        </tbody>
      </table>
	</div>
</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>