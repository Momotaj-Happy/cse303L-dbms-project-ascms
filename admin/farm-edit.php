<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

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
                    </div>
                </div>
            </div>
            <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn waves-effect waves-light">
                        <i class="material-icons left">update</i>Update Farm
                    </button>
                    <a href="farm-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('layout/footer.php'); ?>