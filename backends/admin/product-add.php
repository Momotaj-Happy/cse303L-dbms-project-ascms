<?php

session_start();
try {
    if (!file_exists('../connection-pdo.php' ))
        throw new Exception();
    else
        require_once('../connection-pdo.php' ); 
} catch (Exception $e) {
	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';
	header('location: ../../admin/product-list.php');
	exit();
}

if (!isset($_POST['name']) || !isset($_POST['category'])) {
	$_SESSION['msg'] = 'Invalid POST variable keys! Refresh the page!';
	header('location: ../../admin/product-list.php');
	exit();
}

$name = $_POST['name'];
$category = $_POST['category'];
$storage_req = $_POST['storage_req'];
$shelf_life = $_POST['shelf_life'];
$packaging = $_POST['packaging'];

$sql = "INSERT INTO product(name, category, storage_req, shelf_life_days, packaging) VALUES(?,?,?,?,?)";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$name, $category, $storage_req, $shelf_life, $packaging])) {
    $_SESSION['msg'] = 'Product Added!';
    header('location: ../../admin/product-list.php');
} else {
    $_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';
    header('location: ../../admin/product-list.php');
}
