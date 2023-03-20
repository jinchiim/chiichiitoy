
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1> 세션확인 </h1>
        <?php
        echo "userid: {$_SESSION['userid']} <br>";
        echo"name: {$_SESSION['name']} <br>";
        ?>        
    </body>
</html>