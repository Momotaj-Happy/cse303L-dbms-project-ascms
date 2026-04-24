<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>

<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Add Farm</h3>
	</div>

    <div class="section center" style="padding: 40px;">

        <form action="../backends/admin/farm-add.php" method="post">

            <?php
            if (isset($_SESSION['msg'])) {
                echo '<div class="row" style="background: red; color: white;">
                <div class="col s12">
                    <h6>'.$_SESSION['msg'].'</h6>
                    </div>
                </div>';
                unset($_SESSION['msg']);
            }
            ?>

            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="farm_name" name="farm_name" type="text" class="validate" style="color: white; width: 70%" required>
                        <label for="farm_name" style="color: white;"><b>Farm Name :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="contact_person" name="contact_person" type="text" class="validate" style="color: white; width: 70%" required>
                        <label for="contact_person" style="color: white;"><b>Contact Person :</b></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="phone" name="phone" type="text" class="validate" style="color: white; width: 70%" required>
                        <label for="phone" style="color: white;"><b>Phone :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="location" name="location" type="text" class="validate" style="color: white; width: 70%" required>
                        <label for="location" style="color: white;"><b>Location :</b></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <div class="section right" style="padding: 15px 10px;">
                        <a href="farm-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Add Farm</button>
                    </div>
                </div>
            </div>

        </form>

    </div>

</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>