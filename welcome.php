<?php
    session_start();
    $w = "<h1>Welcome ".$_SESSION['name']."</h1>";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
        <link rel="stylesheet" href="./style/style.css">
    </head>

    <body>
        <div>
            <?php
             echo $w;
            ?>
            <p>Return to <a href="./login.php">Log In</a></p>
        </div>
        
    </body>
</html>