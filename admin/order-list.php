<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<<<<<<< HEAD
<?php require('layout/left-sidebar-short.php'); ?>


<?php

require('../backends/connection-pdo.php');

=======

<?php
require('../backends/connection-pdo.php');
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
$sql = 'SELECT orders.*, customer.name as customer_name, product.name as product_name 
        FROM orders 
        LEFT JOIN customer ON orders.customer_id = customer.customer_id 
        LEFT JOIN product ON orders.product_id = product.product_id';
<<<<<<< HEAD

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
=======
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-section">
	<div class="section-header">
		<div class="row">
            <div class="col s8">
                <h4>Orders Management</h4>
            </div>
            <div class="col s4 right-align">
                <a href="order-add.php" class="btn green-btn waves-effect waves-light white-text">
                    <i class="material-icons left">add_shopping_cart</i>New Order
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
              <th>Customer</th>
              <th>Product</th>
              <th>Qty</th>
              <th>Price</th>
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
          </tr>
        </thead>
<<<<<<< HEAD

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
         
=======
        <tbody>
          <?php foreach ($arr_all as $key) { ?>
          <tr>
	        <td><?php echo $key['order_id']; ?></td>
	        <td><strong><?php echo $key['customer_name']; ?></strong></td>
            <td><?php echo $key['product_name']; ?></td>
            <td><?php echo $key['quantity']; ?></td>
            <td><?php echo $key['total_price']; ?></td>
            <td><small><?php echo $key['order_date']; ?></small></td>
            <td><span class="chip <?php echo ($key['order_status'] == 'Paid') ? 'green white-text' : (($key['order_status'] == 'Cancelled') ? 'red white-text' : 'orange white-text'); ?>"><?php echo $key['order_status']; ?></span></td>
            <td>
                <a href="order-edit.php?id=<?php echo $key['order_id']; ?>" class="btn-floating btn-small waves-effect waves-light blue">
                    <i class="material-icons">edit</i>
                </a>
                <a href="../backends/admin/order-delete.php?id=<?php echo $key['order_id']; ?>" class="btn-floating btn-small waves-effect waves-light red">
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