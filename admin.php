<?php
session_start();
   
if($_SESSION['role']!="admin"){
    header("location:home.php");
   # echo "<script>window.location.href='http://localhost/wordpress/';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <button onclick="document.location='logout.php'">Logout</button>
        <button onclick="document.location='shareCredential.php'">Share Credentials with guests</button>
    </header>
   <h1>Welcome <?= $_SESSION["customerName"]?> </h1> 

   <p><?php 

    $filename = $_SESSION["customerId"];
      $dir = scandir("./users/".$filename."");
      $files = array_diff($dir, array('.', '..'));
     
      function listFolderFiles($dir){
            $ffs = scandir($dir);
        
            unset($ffs[array_search('.', $ffs, true)]);
            unset($ffs[array_search('..', $ffs, true)]);
        
            // prevent empty ordered elements
            if (count($ffs) < 1)
                return;
        
            echo '<ol>';
            foreach($ffs as $ff){
                echo '<li>';
                echo '<a href=" '.$dir.'/'.$ff.' " >'.$ff;
                if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
                echo '</li>';
            }
            echo '</ol>';
        }
    
    listFolderFiles("users/".$filename."");
    ?></p>
</body>
</html>