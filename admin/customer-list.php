<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<<<<<<< HEAD
<?php require('layout/left-sidebar-short.php'); ?>


<?php

require('../backends/connection-pdo.php');

$sql = 'SELECT * FROM customer';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

?>
						

<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Customers</h3>
	</div>

	<div class="section right" style="padding: 15px 25px;">
		<a href="customer-add.php" class="waves-effect waves-light btn">Add New</a>
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
              <th>Name</th>
              <th>Address</th>
              <th>Contact Info</th>
              <th>Type</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php

            foreach ($arr_all as $key) {

          ?>
          <tr>
            <td><?php echo $key['customer_id']; ?></td>
            <td><?php echo $key['name']; ?></td>
            <td><?php echo $key['address']; ?></td>
            <td><?php echo $key['contact_info']; ?></td>
            <td><?php echo $key['customer_type']; ?></td>
            <td>
                <a href="customer-edit.php?id=<?php echo $key['customer_id']; ?>"><span class="new badge blue" data-badge-caption="">Edit</span></a>
                <a href="../backends/admin/customer-delete.php?id=<?php echo $key['customer_id']; ?>"><span class="new badge red" data-badge-caption="">Delete</span></a>
            </td>
          </tr>

          <?php } ?>
         
        </tbody>
      </table>
	</div>
</div>

<?php require('layout/about-modal.php'); ?>
=======

<?php
require('../backends/connection-pdo.php');
$sql = 'SELECT * FROM customer';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-section">
	<div class="section-header">
		<div class="row">
            <div class="col s8">
                <h4>Customers Management</h4>
            </div>
            <div class="col s4 right-align" style="padding-top: 15px !important;">
                <a href="customer-add.php" class="waves-effect waves-light btn green-btn white-text">
                    <i class="material-icons left">person_add</i>Add New
                </a>
            </div>
        </div>
	</div>

    <div class="data-card">
        <?php
        if (isset($_SESSION['msg'])) {
            echo '<div class="card-panel green white-text" style="margin: 10px 0;">'.$_SESSION['msg'].'</div>';
            unset($_SESSION['msg']);
        }
        ?>

        <table class="centered highlight responsive-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Info</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($arr_all as $key) { ?>
            <tr>
                <td><?php echo $key['customer_id']; ?></td>
                <td><strong><?php echo $key['name']; ?></strong></td>
                <td><?php echo $key['address']; ?></td>
                <td><?php echo $key['contact_info']; ?></td>
                <td><span class="chip"><?php echo $key['customer_type']; ?></span></td>
                <td>
                    <a href="customer-edit.php?id=<?php echo $key['customer_id']; ?>" class="btn-floating btn-small waves-effect waves-light blue">
                        <i class="material-icons">edit</i>
                    </a>
                    <a href="../backends/admin/customer-delete.php?id=<?php echo $key['customer_id']; ?>" class="btn-floating btn-small waves-effect waves-light red">
                        <i class="material-icons">delete</i>
                    </a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
<?php require('layout/footer.php'); ?>