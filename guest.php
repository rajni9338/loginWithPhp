<?php
session_start();

if($_SESSION['role']!="guest"){
    header("location:home.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<header><button onclick="document.location='logout.php'">Logout</button></header>
<h1>Welcome <?= $_SESSION["customerName"]?> </h1> 

</body>
</html> 