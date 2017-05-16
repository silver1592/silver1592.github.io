<?php
    /*Conexion a MySQL desde PHP

        1)Conectarse a MySQL y seleccionar la BD
            $conexion = new mysqli(<Ubicacion>,<Usuario>,<Contraseña>,<Basedatos>);
            if($conexion->connect_error)
                die($conexion->connect_error);

        2)Construir una cadena de consulta
            $consulta = "select * from usuarios;";

        3)Ejecutar la consulta sobre la conexion que se obtubo del paso 1
            $resultado = $conexion->query($consulta);
            if(!$resultado)
                die($conexion->error);

        4)Obtener los resultados y mostrarlos en la pagina web
            for($i=0;i<$resultado->num_rows;$i++)
            {
                $resultado->data_seek($i);
                $renglon = $resultado->fetch_array(MYSQLI_ASSOC); //MYSQLI_NUM
                echo "id=".renglon["id"]."<br>";
                echo "nombre=".renglon["nombre"]."<br>";
                echo "edad=".renglon["edad"]."<br>";
                echo "<br><br>";
            }

        5)Repetir los pasos 2 a 4 hasta que se temgan todos los datos reqieroitdos

        6)Desconectarse de MySQL
            $resultado->close();
            $conexion->close();        
    */
            $ubicacion ="localhost";
            $usuario="root";
            $contraseña="";
            $basedatos="ejemplo1";
            $i=0;
            $consulta="";
            $resultado="";
            
            $conexion = new mysqli($ubicacion,$usuario,$contraseña,$basedatos);
            if($conexion->connect_error)
                die($conexion->connect_error);

            $consulta = "select * from usuarios;";

            $resultado = $conexion->query($consulta);
            if(!$resultado)
                die($conexion->error);

            for($i=0;$i<$resultado->num_rows;$i++)
            {
                $resultado->data_seek($i);
                $renglon = $resultado->fetch_array(MYSQLI_ASSOC); //MYSQLI_NUM
                echo "id=".$renglon["id"]."<br>";
                echo "nombre=".$renglon["nombre"]."<br>";
                echo "apellido=".$renglon["apellido"]."<br>";
                echo "edad=".$renglon["edad"]."<br>";
                echo "<br><br>";
            }

            $resultado->close();
            $conexion->close();    
    


?>