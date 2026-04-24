<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
    <link rel="stylesheet" href="../css/form-style.css?v=<?php echo time(); ?>">
    <title>ASCMS Admin</title>
</head>
<body>
    <div class="row" style="margin-bottom: 0;">
