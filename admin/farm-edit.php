<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<<<<<<< HEAD
<?php require('layout/left-sidebar-short.php'); ?>
=======
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2

<?php
require('../backends/connection-pdo.php');
if (!isset($_GET['id'])) { header('location: farm-list.php'); exit(); }
$id = $_GET['id'];
$sql = 'SELECT * FROM farms WHERE farm_id = ?';
$query = $pdoconn->prepare($sql);
$query->execute([$id]);
$farm = $query->fetch(PDO::FETCH_ASSOC);
if (!$farm) { header('location: farm-list.php'); exit(); }
?>

<<<<<<< HEAD
<div class="section white-text" style="background: #B35458;">
	<div class="section">
		<h3>Edit Farm</h3>
	</div>
    <div class="section center" style="padding: 40px;">
        <form action="../backends/admin/farm-edit.php" method="post">
            <input type="hidden" name="farm_id" value="<?php echo $farm['farm_id']; ?>">
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="farm_name" name="farm_name" type="text" value="<?php echo $farm['farm_name']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="farm_name" style="color: white;"><b>Farm Name :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="contact_person" name="contact_person" type="text" value="<?php echo $farm['contact_person']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="contact_person" style="color: white;"><b>Contact Person :</b></label>
=======
<div class="main-section">
	<div class="section-header">
		<h4>Edit Farm: <?php echo $farm['farm_name']; ?></h4>
	</div>
    <div class="data-card">
        <form action="../backends/admin/farm-edit.php" method="post">
            <input type="hidden" name="farm_id" value="<?php echo $farm['farm_id']; ?>">
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="farm_name" name="farm_name" type="text" value="<?php echo $farm['farm_name']; ?>" class="validate" required>
                        <label class="active" for="farm_name">Farm Name</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="contact_person" name="contact_person" type="text" value="<?php echo $farm['contact_person']; ?>" class="validate" required>
                        <label class="active" for="contact_person">Contact Person</label>
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                    </div>
                </div>
            </div>
            <div class="row">
<<<<<<< HEAD
                <div class="col s6">
                    <div class="input-field">
                        <input id="phone" name="phone" type="text" value="<?php echo $farm['phone']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="phone" style="color: white;"><b>Phone :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="location" name="location" type="text" value="<?php echo $farm['location']; ?>" class="validate" style="color: white; width: 70%" required>
                        <label class="active" for="location" style="color: white;"><b>Location :</b></label>
=======
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="phone" name="phone" type="text" value="<?php echo $farm['phone']; ?>" class="validate" required>
                        <label class="active" for="phone">Phone</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="location" name="location" type="text" value="<?php echo $farm['location']; ?>" class="validate" required>
                        <label class="active" for="location">Location</label>
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
<<<<<<< HEAD
                    <div class="section right" style="padding: 15px 10px;">
                        <a href="farm-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Update Farm</button>
                    </div>
=======
                    <button type="submit" class="btn waves-effect waves-light">
                        <i class="material-icons left">update</i>Update Farm
                    </button>
                    <a href="farm-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">
                        Cancel
                    </a>
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