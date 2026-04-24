<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

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
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
          </tr>
        </thead>
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
        </tbody>
      </table>
	</div>
</div>

<?php require('layout/footer.php'); ?>