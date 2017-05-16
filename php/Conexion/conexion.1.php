<?php

class Ejemplo1
{
    private $conexion;
    private $tabla;

    function __construct($server,$usuario,$contrasenia,$basedatos) 
    {
        $this->conexion = new mysqli($server,$usuario,$contrasenia,$basedatos);

        if($this->conexion->connect_error)
            die($this->conexion->connect_error);
    }

    function __destruct ()
    {
        $this->conexion->close();
    }

    function ejecuta($query)
    {
        $resultado = $this->conexion->query($query);
        $this->tabla=null;

        if(!$resultado)
            die($this->conexion->error);
        else
        {
            $this->tabla[0] = array_keys($resultado->fetch_array(MYSQLI_ASSOC));
            
            for($i=0;$i<$resultado->num_rows;$i++)
            {
                $resultado->data_seek($i);
                $this->tabla[$i+1]= $resultado->fetch_array(MYSQLI_NUM);
            }
        }

        $resultado->close();

        return $this->tabla;
    }

    function muestra()
    {
        echo "<table>";
        echo "<thead>";
        for($i=0;$i<count($this->tabla);$i++)
        {
            echo "<tr>";
            for($ii=0;$ii<count($this->tabla[$i]);$ii++)
                echo "<td>".$this->tabla[$i][$ii]."</td>";
            echo "</tr>";
            if($i==0)
                echo"</thead><tbody>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}
?>

<?php
    $ubicacion ="localhost";
    $usuario="root";
    $contraseña="";
    $basedatos="ejemplo1";

    $consulta = "select * from usuarios;";
    
    $conexion = new Ejemplo1($ubicacion,$usuario,$contraseña,$basedatos);
    $tabla = $conexion->ejecuta($consulta);
    $conexion->muestra();

?>