<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>

<div class="main-section">
	<div class="section-header">
		<h4>Add New Customer</h4>
	</div>
    <div class="data-card">
        <form action="../backends/admin/customer-add.php" method="post">
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="name" name="name" type="text" class="validate" required>
                        <label for="name">Customer Name</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="customer_type" name="customer_type" type="text" class="validate" required>
                        <label for="customer_type">Customer Type</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="contact_info" name="contact_info" type="text" class="validate" required>
                        <label for="contact_info">Contact Info</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input id="address" name="address" type="text" class="validate" required>
                        <label for="address">Address</label>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col s12">
                    <button type="submit" class="btn green-btn waves-effect waves-light">
                        <i class="material-icons left">person_add</i>Save Customer
                    </button>
                    <a href="customer-list.php" class="btn grey waves-effect waves-light" style="margin-left: 10px;">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('layout/footer.php'); ?>