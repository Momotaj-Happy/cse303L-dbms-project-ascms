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
if (!isset($_REQUEST['id'])) {
	header('location: ../../admin/inventory-list.php');
	exit();
} 
$id = $_REQUEST['id'];
$sql = "DELETE FROM inventory WHERE inventory_id = ?";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$id])) {
    $_SESSION['msg'] = 'Batch Deleted!';
} else {
    $_SESSION['msg'] = 'Error deleting batch!';
}
header('location: ../../admin/inventory-list.php');
