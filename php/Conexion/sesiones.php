<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();

        if(isset($_SESSION["id"]))
            echo "<h1>".$_SESSION["id"]."</h1>";

        if($_POST)
            $_SESSION["id"]=$_POST["name"];
    ?>

    <form method="post">
        <input type="text" name="name">
        <input type="submit">
    </form>
</body>
</html>