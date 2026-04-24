<?php
session_start();
try {
    if (!file_exists('../connection-pdo.php' )) throw new Exception();
    else require_once('../connection-pdo.php' ); 
} catch (Exception $e) {
	$_SESSION['msg'] = 'Server Error!';
	header('location: ../../admin/customer-list.php');
	exit();
}
if (!isset($_POST['customer_id'])) {
	header('location: ../../admin/customer-list.php');
	exit();
}
$id = $_POST['customer_id'];
$name = $_POST['name'];
$address = $_POST['address'];
$contact_info = $_POST['contact_info'];
$customer_type = $_POST['customer_type'];

$sql = "UPDATE customer SET name=?, address=?, contact_info=?, customer_type=? WHERE customer_id=?";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$name, $address, $contact_info, $customer_type, $id])) {
    $_SESSION['msg'] = 'Customer Updated!';
} else {
    $_SESSION['msg'] = 'Error updating customer!';
}
header('location: ../../admin/customer-list.php');
