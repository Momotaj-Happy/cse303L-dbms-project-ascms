<?php
session_start();
try {
    if (!file_exists('../connection-pdo.php' )) throw new Exception();
    else require_once('../connection-pdo.php' ); 
} catch (Exception $e) {
	$_SESSION['msg'] = 'Server Error!';
	header('location: ../../admin/inventory-list.php');
	exit();
}
if (!isset($_POST['inventory_id'])) {
	header('location: ../../admin/inventory-list.php');
	exit();
}
$id = $_POST['inventory_id'];
$product_id = $_POST['product_id'];
$farm_id = $_POST['farm_id'];
$quantity = $_POST['quantity'];
$harvest_date = $_POST['harvest_date'];
$status = $_POST['status'];

$sql = "UPDATE inventory SET product_id=?, farm_id=?, quantity=?, harvest_date=?, status=? WHERE inventory_id=?";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$product_id, $farm_id, $quantity, $harvest_date, $status, $id])) {
    $_SESSION['msg'] = 'Batch Updated!';
} else {
    $_SESSION['msg'] = 'Error updating batch!';
}
header('location: ../../admin/inventory-list.php');
