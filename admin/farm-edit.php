<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>

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
                    </div>
                </div>
            </div>
            <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="section right" style="padding: 15px 10px;">
                        <a href="farm-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Update Farm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>