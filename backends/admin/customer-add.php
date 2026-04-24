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
if (!isset($_POST['name'])) {
	header('location: ../../admin/customer-list.php');
	exit();
}
$name = $_POST['name'];
$address = $_POST['address'];
$contact_info = $_POST['contact_info'];
$customer_type = $_POST['customer_type'];

$sql = "INSERT INTO customer(name, address, contact_info, customer_type) VALUES(?,?,?,?)";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$name, $address, $contact_info, $customer_type])) {
    $_SESSION['msg'] = 'Customer Added!';
} else {
    $_SESSION['msg'] = 'Error adding customer!';
}
header('location: ../../admin/customer-list.php');
