<?php 
# Los arreglos se crean utilizando el operador array()
#Pueden contener cualquier tipo de dato
$arreglo = ['cadena',465,3.1416,true,"otro"];

/*
for($i =0;$i < count($arreglo);$i++)
{
    echo $arreglo[$i]."<br>";
}*/
echo "<ul>";
foreach($arreglo as $elem)
{
    echo "<li>".$elem."</li>";
}
echo "</ul>";
?>