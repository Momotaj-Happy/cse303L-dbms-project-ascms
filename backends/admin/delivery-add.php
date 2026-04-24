<?php
session_start();
try {
    if (!file_exists('../connection-pdo.php' )) throw new Exception();
    else require_once('../connection-pdo.php' ); 
} catch (Exception $e) {
	$_SESSION['msg'] = 'Server Error!';
	header('location: ../../admin/delivery-list.php');
	exit();
}
if (!isset($_POST['order_id'])) {
	header('location: ../../admin/delivery-list.php');
	exit();
}
$order_id = $_POST['order_id'];
$vehicle_id = $_POST['vehicle_id'];
$driver_name = $_POST['driver_name'];
$status = $_POST['status'];

$sql = "INSERT INTO delivery(order_id, vehicle_id, driver_name, status) VALUES(?,?,?,?)";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$order_id, $vehicle_id, $driver_name, $status])) {
    $_SESSION['msg'] = 'Delivery Added!';
} else {
    $_SESSION['msg'] = 'Error adding delivery!';
}
header('location: ../../admin/delivery-list.php');
