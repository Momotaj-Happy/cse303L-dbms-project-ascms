<?php
session_start();
try {
    if (!file_exists('../connection-pdo.php' )) throw new Exception();
    else require_once('../connection-pdo.php' ); 
} catch (Exception $e) {
	$_SESSION['msg'] = 'Server Error!';
	header('location: ../../admin/farm-list.php');
	exit();
}
if (!isset($_POST['farm_id'])) {
	header('location: ../../admin/farm-list.php');
	exit();
}
$id = $_POST['farm_id'];
$farm_name = $_POST['farm_name'];
$location = $_POST['location'];
$contact_person = $_POST['contact_person'];
$phone = $_POST['phone'];

$sql = "UPDATE farms SET farm_name=?, location=?, contact_person=?, phone=? WHERE farm_id=?";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$farm_name, $location, $contact_person, $phone, $id])) {
    $_SESSION['msg'] = 'Farm Updated!';
} else {
    $_SESSION['msg'] = 'Error updating farm!';
}
header('location: ../../admin/farm-list.php');
