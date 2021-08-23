<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User's HTML Files</h1>
    <?php
        echo '<ol>';
        $fileList = glob("users/*");
        foreach($fileList as $filename){
            if(is_file($filename)){
                echo "<li><a href=$filename>" .$filename. '</a></li>';
            
            }   
        }
        echo '</ol>';
    ?>
</body>
</html>