<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <?php 
            $arreglo = [['cadena',465],[3.1416,true,"otro"]];

            foreach($arreglo as $elem){
                echo "<tr>";
                foreach($elem as $i)
                    echo "<td>".$i."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>