<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>

<?php
require('../backends/connection-pdo.php');
if (!isset($_GET['id'])) { header('location: customer-list.php'); exit(); }
$id = $_GET['id'];
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
                    </div>
                </div>
            </div>
            <div class="row">
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
                </div>
            </div>
        </form>
    </div>
</div>
<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>