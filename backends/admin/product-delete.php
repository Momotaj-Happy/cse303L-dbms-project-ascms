<?php
session_start();
try {
    if (!file_exists('../connection-pdo.php' )) throw new Exception();
    else require_once('../connection-pdo.php' ); 
} catch (Exception $e) {
	$_SESSION['msg'] = 'Server Error!';
	header('location: ../../admin/product-list.php');
	exit();
}
if (!isset($_REQUEST['id'])) {
	header('location: ../../admin/product-list.php');
	exit();
} 
$id = $_REQUEST['id'];
$sql = "DELETE FROM product WHERE product_id = ?";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$id])) {
    $_SESSION['msg'] = 'Product Deleted!';
} else {
    $_SESSION['msg'] = 'Error deleting product!';
}
header('location: ../../admin/product-list.php');
