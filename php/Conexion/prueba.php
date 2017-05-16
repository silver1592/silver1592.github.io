<?php 
    if(isset($_COOKIE["tam-fuente"]))
        $tamFuente = $_COOKIE["tam-fuente"];
    else
        $tamFuente ="10px";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        p{
            font-size:<?php echo $tamFuente ?>;
        }
    </style>
</head>
<body>
    <p>Esto es una prueba</p>
    <?php echo "<p>".$_COOKIE["hello_cookie"]."</p>"; ?>
</body>
</html>