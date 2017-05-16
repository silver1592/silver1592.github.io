<?php

class Conexion
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

    function ejecutaSQL($query)
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

    function ejecutaDML($query)
    {
        $resultado = $this->conexion->query($query);
        $this->tabla=null;

        if(!$resultado)
            die($this->conexion->error);

        return "Operacion realizada con exito";
    }
}
?>