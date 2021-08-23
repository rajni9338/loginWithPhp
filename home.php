<?php

session_start();

if(isset($_POST['login'])){

//$cusName = $_POST['customerName'];
$cusId = $_POST['customerId'];
$password = $_POST['pass'];
$infoList = file('info.txt', FILE_IGNORE_NEW_LINES);

$success = false;

foreach ($infoList as $user) {
    $user_details = explode('|', $user);

    if (/*$user_details[0] === $cusName && */$user_details[1] === $cusId && $user_details[2] === $password) {
        $success = true;
        //$cusName = $user_details[0];
        break;
    }
}


session_regenerate_id();
$_SESSION['customerName'] = $user_details[0];
$_SESSION['customerId'] = $user_details[1];
$_SESSION['customerEmail'] = $user_details[3];
$_SESSION['role'] = $user_details[4];
session_write_close();
 
if ($success && $user_details[4]=="guest" && $user_details[5]=="active") {
    header("location:guest.php");
    echo "<br> Welcome <strong>$cusName</strong>  <br>";
    echo '<a href = "new.php" target="_self">New</a>';


} 
else if($success && $user_details[4]=="admin" && $user_details[5]=="active"){
    header("location:admin.php");
    #header("location:http://localhost/wordpress/users/");
    echo "<br> Welcome <strong>$cusName</strong>  <br>";
    echo '<a href = "new.php" target="_self">New</a>';
}

else if($user_details[5]=="inactive"){
    echo "<br> This user is not active. <br>";
}

else {
    echo "<br> You have entered the wrong customer name, ID or password. Please try again. <br>";
}


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <h1>LOGIN FORM</h1>
            
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <!-- <label>Customer Name<span>*</span></label><br>
                <select id="value" name="customerName">
                    <option selected value="base">Select</option>
                <?php 
                /* $infoList = file('info.txt', FILE_IGNORE_NEW_LINES);
                foreach($infoList as $user){
                        $user_details = explode('|', $user);
                        echo "<option value='".$user_details[0]."'>$user_details[0]</option>";
                    }
                    */
                    ?> 
            
                </select> <br> -->
               <!-- <label>Customer ID<span>*</span></label> <br> -->
                <input type="text" name="customerId" placeholder="Customer ID"> <br>
               <!-- <label>Password <span>*</span></label> <br> -->
                <input type="password" placeholder="Password" name="pass"required> <br><br>
                <input id="login-button" type="submit" name="login" value="LOGIN"></submit>
            </form>
        </div>
    </div>  
 
</body>
</html>