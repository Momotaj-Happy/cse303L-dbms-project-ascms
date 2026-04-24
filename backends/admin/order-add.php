<?php
session_start();
try {
    if (!file_exists('../connection-pdo.php' )) throw new Exception();
    else require_once('../connection-pdo.php' ); 
} catch (Exception $e) {
	$_SESSION['msg'] = 'Server Error!';
	header('location: ../../admin/order-list.php');
	exit();
}
if (!isset($_POST['customer_id'])) {
	header('location: ../../admin/order-list.php');
	exit();
}
$customer_id = $_POST['customer_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$total_price = $_POST['total_price'];
$order_status = $_POST['order_status'];

$sql = "INSERT INTO orders(customer_id, product_id, quantity, total_price, order_status) VALUES(?,?,?,?,?)";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$customer_id, $product_id, $quantity, $total_price, $order_status])) {
    $_SESSION['msg'] = 'Order Added!';
} else {
    $_SESSION['msg'] = 'Error adding order!';
}
header('location: ../../admin/order-list.php');
