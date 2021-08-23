<?php

session_start();

$cusName = $_POST['customerName'];;
$cusId = $_POST['customerId'];
$password = $_POST['pass'];
$infoList = file ('info.txt', FILE_IGNORE_NEW_LINES);

$success = false;

foreach ($infoList as $user) {
    $user_details = explode('|', $user);

    if ($user_details[0] === $cusName && $user_details[1] === $cusId && $user_details[2] === $password) {
        $success = true;
        $cusName = $user_details[0];
        break;
    }
}

if ($success) {
    echo "<br> Welcome <strong>$cusName</strong>  <br>";
    echo '<a href = "new.php" target="_self">New</a>';


} else {
    echo "<br> You have entered the wrong customer name, ID or password. Please try again. <br>";
}

?>
