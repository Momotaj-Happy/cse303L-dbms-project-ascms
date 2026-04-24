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
if (!isset($_POST['delivery_id'])) {
	header('location: ../../admin/delivery-list.php');
	exit();
}
$id = $_POST['delivery_id'];
$order_id = $_POST['order_id'];
$vehicle_id = $_POST['vehicle_id'];
$driver_name = $_POST['driver_name'];
$status = $_POST['status'];
$temp = $_POST['temp_celsius'];
$humidity = $_POST['humidity_pct'];

$sql = "UPDATE delivery SET order_id=?, vehicle_id=?, driver_name=?, status=?, temp_celsius=?, humidity_pct=? WHERE delivery_id=?";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$order_id, $vehicle_id, $driver_name, $status, $temp, $humidity, $id])) {
    $_SESSION['msg'] = 'Delivery Updated!';
} else {
    $_SESSION['msg'] = 'Error updating delivery!';
}
header('location: ../../admin/delivery-list.php');
