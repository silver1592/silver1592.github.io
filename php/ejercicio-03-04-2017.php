<?php 
    

    function BuscaUsuario($usr)
    {   
        $arr=["usr1","usr2","usr3","usr4","usr5","usr6","usr7"];
        $band = false;
        echo "<script>";

        foreach($arr as $s)
            if($s == $usr)
                $band=true;
/*
        if($band)
            echo "alert('Bienvenido $usr');";
        else
            echo "alert('Usuario no registrado');";
*/
        echo "</script>";

        echo "<h1>";
        if($band)
            echo "Bienvenido $usr";
        else
            echo 'Usuario no registrado';
        echo "</h1>";
    }
    
    if($_GET)
        BuscaUsuario($_GET["usr"]);
    else if($_POST)
        BuscaUsuario($_POST["usr"]);
?>

<form method="POST">
    <h1>Dame Usuario</h1>
    <input type="text" name="usr">
    <input type="submit" value="Acceder">
</form>