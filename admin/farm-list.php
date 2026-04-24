<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<?php
require('../backends/connection-pdo.php');
$sql = 'SELECT * FROM farms';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-section">
	<div class="section-header">
		<div class="row">
            <div class="col s8">
                <h4>Farms Management</h4>
            </div>
            <div class="col s4 right-align" style="padding-top: 15px !important;">
                <a href="farm-add.php" class="waves-effect waves-light btn white-text">
                    <i class="material-icons left">add</i>Add New
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
                <th>Farm Name</th>
                <th>Location</th>
                <th>Contact Person</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($arr_all as $key) { ?>
            <tr>
                <td><?php echo $key['farm_id']; ?></td>
                <td><strong><?php echo $key['farm_name']; ?></strong></td>
                <td><?php echo $key['location']; ?></td>
                <td><?php echo $key['contact_person']; ?></td>
                <td><?php echo $key['phone']; ?></td>
                <td>
                    <a href="farm-edit.php?id=<?php echo $key['farm_id']; ?>" class="btn-floating btn-small waves-effect waves-light blue">
                        <i class="material-icons">edit</i>
                    </a>
                    <a href="../backends/admin/farm-delete.php?id=<?php echo $key['farm_id']; ?>" class="btn-floating btn-small waves-effect waves-light red">
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