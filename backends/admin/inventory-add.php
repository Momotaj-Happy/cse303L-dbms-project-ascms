<?php

session_start();
try {
    if (!file_exists('../connection-pdo.php' ))
        throw new Exception();
    else
        require_once('../connection-pdo.php' ); 
} catch (Exception $e) {
	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';
	header('location: ../../admin/inventory-list.php');
	exit();
}

if (!isset($_POST['product_id']) || !isset($_POST['farm_id'])) {
	$_SESSION['msg'] = 'Invalid POST variable keys! Refresh the page!';
	header('location: ../../admin/inventory-list.php');
	exit();
}

$product_id = $_POST['product_id'];
$farm_id = $_POST['farm_id'];
$quantity = $_POST['quantity'];
$harvest_date = $_POST['harvest_date'];
$status = $_POST['status'];

$sql = "INSERT INTO inventory(product_id, farm_id, quantity, harvest_date, status) VALUES(?,?,?,?,?)";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$product_id, $farm_id, $quantity, $harvest_date, $status])) {
    $_SESSION['msg'] = 'Batch Added!';
    header('location: ../../admin/inventory-list.php');
} else {
    $_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';
    header('location: ../../admin/inventory-list.php');
}
