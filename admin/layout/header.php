<?php
session_start();
<<<<<<< HEAD


if (!isset($_SESSION['username'])) {
	header('location: index.php');
}

?>

=======
if (!isset($_SESSION['username'])) {
	header('location: index.php');
}
?>
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<<<<<<< HEAD
    <link rel="stylesheet" href="../css/form-style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
    <title>Document</title>
</head>
<body>
=======
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
    <link rel="stylesheet" href="../css/form-style.css?v=<?php echo time(); ?>">
    <title>ASCMS Admin</title>
</head>
<body>
    <div class="row" style="margin-bottom: 0;">
>>>>>>> b727196db2f64df3400ee6bc9bd53720564bb1b2
