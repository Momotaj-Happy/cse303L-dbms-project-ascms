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
if (!isset($_REQUEST['id'])) {
	header('location: ../../admin/delivery-list.php');
	exit();
} 
$id = $_REQUEST['id'];
$sql = "DELETE FROM delivery WHERE delivery_id = ?";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$id])) {
    $_SESSION['msg'] = 'Delivery Deleted!';
} else {
    $_SESSION['msg'] = 'Error deleting delivery!';
}
header('location: ../../admin/delivery-list.php');
