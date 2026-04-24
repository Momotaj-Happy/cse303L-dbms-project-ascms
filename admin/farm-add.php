<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<div class="main-section">
	<div class="section-header">
		<h4>Add New Farm</h4>
	</div>
    <div class="data-card">
        <form action="../backends/admin/farm-add.php" method="post">
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="farm_name" name="farm_name" type="text" class="validate" required>
                        <label for="farm_name">Farm Name</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="contact_person" name="contact_person" type="text" class="validate" required>
                        <label for="contact_person">Contact Person</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="phone" name="phone" type="text" class="validate" required>
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="location" name="location" type="text" class="validate" required>
                        <label for="location">Location</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn waves-effect waves-light">
                        <i class="material-icons left">save</i>Save Farm
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