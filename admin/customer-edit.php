<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<<<<<<< HEAD
<?php require('layout/left-sidebar-short.php'); ?>
=======
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2

<?php
require('../backends/connection-pdo.php');
if (!isset($_GET['id'])) { header('location: customer-list.php'); exit(); }
$id = $_GET['id'];
<<<<<<< HEAD
$sql = 'SELECT * FROM customer WHERE customer_id = ?';
$query = $pdoconn->prepare($sql);
$query->execute([$id]);
$customer = $query->fetch(PDO::FETCH_ASSOC);
if (!$customer) { header('location: customer-list.php'); exit(); }
?>

<div class="section white-text" style="background: #B35458;">
	<div class="section">
		<h3>Edit Customer</h3>
	</div>
    <div class="section center" style="padding: 40px;">
        <form action="../backends/admin/customer-edit.php" method="post">
            <input type="hidden" name="customer_id" value="<?php echo $customer['customer_id']; ?>">
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="name" name="name" type="text" value="<?php echo $customer['name']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="name" style="color: white;"><b>Customer Name :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="customer_type" name="customer_type" type="text" value="<?php echo $customer['customer_type']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="customer_type" style="color: white;"><b>Customer Type :</b></label>
=======
$customer = $pdoconn->prepare('SELECT * FROM customer WHERE customer_id = ?');
$customer->execute([$id]);
$cust = $customer->fetch(PDO::FETCH_ASSOC);
if (!$cust) { header('location: customer-list.php'); exit(); }
?>

<div class="main-section">
	<div class="section-header">
		<h4>Edit Customer: <?php echo $cust['name']; ?></h4>
	</div>
    <div class="data-card">
        <form action="../backends/admin/customer-edit.php" method="post">
            <input type="hidden" name="customer_id" value="<?php echo $cust['customer_id']; ?>">
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="name" name="name" type="text" value="<?php echo $cust['name']; ?>" class="validate" required>
                        <label class="active" for="name">Customer Name</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="customer_type" name="customer_type" type="text" value="<?php echo $cust['customer_type']; ?>" class="validate" required>
                        <label class="active" for="customer_type">Customer Type</label>
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                    </div>
                </div>
            </div>
            <div class="row">
<<<<<<< HEAD
                <div class="col s6">
                    <div class="input-field">
                        <input id="contact_info" name="contact_info" type="text" value="<?php echo $customer['contact_info']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="contact_info" style="color: white;"><b>Contact Info :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="address" name="address" type="text" value="<?php echo $customer['address']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="address" style="color: white;"><b>Address :</b></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="section right" style="padding: 15px 10px;">
                        <a href="customer-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Update Customer</button>
                    </div>
=======
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="contact_info" name="contact_info" type="text" value="<?php echo $cust['contact_info']; ?>" class="validate" required>
                        <label class="active" for="contact_info">Contact Info</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="address" name="address" type="text" value="<?php echo $cust['address']; ?>" class="validate" required>
                        <label class="active" for="address">Address</label>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col s12">
                    <button type="submit" class="btn green-btn waves-effect waves-light">
                        <i class="material-icons left">update</i>Update Customer
                    </button>
                    <a href="customer-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">Cancel</a>
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                </div>
            </div>
        </form>
    </div>
</div>
<<<<<<< HEAD
<?php require('layout/about-modal.php'); ?>
=======

>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
<?php require('layout/footer.php'); ?>