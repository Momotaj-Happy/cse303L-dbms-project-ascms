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
if (!isset($_POST['product_id'])) {
	header('location: ../../admin/product-list.php');
	exit();
}
$id = $_POST['product_id'];
$name = $_POST['name'];
$category = $_POST['category'];
$storage_req = $_POST['storage_req'];
$shelf_life = $_POST['shelf_life'];
$packaging = $_POST['packaging'];

$sql = "UPDATE product SET name=?, category=?, storage_req=?, shelf_life_days=?, packaging=? WHERE product_id=?";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$name, $category, $storage_req, $shelf_life, $packaging, $id])) {
    $_SESSION['msg'] = 'Product Updated!';
} else {
    $_SESSION['msg'] = 'Error updating product!';
}
header('location: ../../admin/product-list.php');
