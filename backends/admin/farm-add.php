<?php

session_start();
try {
    if (!file_exists('../connection-pdo.php' ))
        throw new Exception();
    else
        require_once('../connection-pdo.php' ); 
} catch (Exception $e) {
	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';
	header('location: ../../admin/farm-list.php');
	exit();
}

if (!isset($_POST['farm_name']) || !isset($_POST['contact_person'])) {
	$_SESSION['msg'] = 'Invalid POST variable keys! Refresh the page!';
	header('location: ../../admin/farm-list.php');
	exit();
}

$farm_name = $_POST['farm_name'];
$location = $_POST['location'];
$contact_person = $_POST['contact_person'];
$phone = $_POST['phone'];

$sql = "INSERT INTO farms(farm_name, location, contact_person, phone) VALUES(?,?,?,?)";
$query  = $pdoconn->prepare($sql);
if ($query->execute([$farm_name, $location, $contact_person, $phone])) {
    $_SESSION['msg'] = 'Farm Added!';
    header('location: ../../admin/farm-list.php');
} else {
    $_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';
    header('location: ../../admin/farm-list.php');
}
