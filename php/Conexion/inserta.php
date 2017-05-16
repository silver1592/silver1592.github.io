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

function validaTexto($cad)
{
    if(strpos($cad, ' or ') === false || strpos($cad, ' OR ') === false || strpos($cad, ' Or ') === false || strpos($cad, ' oR ') === false)
        return false;
    else
        return true;
}
?>

<?php 
    $ubicacion ="localhost";
    $usuario="root";
    $contraseña="";
    $basedatos="ejemplo1";

    function inserta($nombre,$apellido,$edad)
    {
        global $ubicacion;
        global $usuario;
        global $contraseña;
        global $basedatos;

        $consulta = "insert into usuarios (nombre, apellido, edad) values ('".$nombre."','".$apellido."',".$edad.");";
        
        $conexion = new Conexion($ubicacion,$usuario,$contraseña,$basedatos);
        echo "<h1>".$conexion->ejecutaDML($consulta)."</h1>";
    }

    function elimina($nombre)
    {
        global $ubicacion;
        global $usuario;
        global $contraseña;
        global $basedatos;
        
        $consulta = htmlspecialchars("delete from usuarios where nombre = '".$nombre."';");
        
        if(ereg("[^A-Za-z0-9]+",$nombre))
        {
            $conexion = new Conexion($ubicacion,$usuario,$contraseña,$basedatos);
            echo "<h1>".$conexion->ejecutaDML($consulta)."</h1>";
        }
    }

    function modifica($nombre,$nombreNuevo)
    {
        global $ubicacion;
        global $usuario;
        global $contraseña;
        global $basedatos;
        
        $consulta = htmlspecialchars("update usuarios set nombre = '".$nombreNuevo."' where nombre='".$nombre."';");
        
        if(ereg("[^A-Za-z0-9]+",$nombre) and ereg("[^A-Za-z0-9]+",$nombreNuevo))
        {
            $conexion = new Conexion($ubicacion,$usuario,$contraseña,$basedatos);
            echo "<h1>".$conexion->ejecutaDML($consulta)."</h1>";
        }
    }

    function consulta()
    {
        global $ubicacion;
        global $usuario;
        global $contraseña;
        global $basedatos;

        $consulta = "select * from usuarios;";
        
        $conexion = new Conexion($ubicacion,$usuario,$contraseña,$basedatos);
        $tabla = $conexion->ejecutaSQL($consulta);
        $conexion->muestra();
    }

    if($_POST)
    {
        if($_POST["operacion"] == "Guardar")
            inserta($_POST["nombre"],$_POST["apellido"],$_POST["edad"]);
        if($_POST["operacion"] == "Eliminar")
            elimina($_POST["nombre"]);
        if($_POST["operacion"] == "Modificar")
            modifica($_POST["nombre"],$_POST["nombreNuevo"]);
    }
?>
<form method="POST" style="border:1px black solid; border-radius:5px; padding: 10px;">
    <h1>Nuevo Usuario</h1>
    <input type="text" name="nombre" placeholder ="Nombre">
    <input type="text" name="apellido" placeholder ="Apellido">
    <input type="number" name="edad" min="1" max ="125" placeholder ="Edad">
    <input type="submit" name="operacion" value="Guardar">
</form>
<form method="POST" style="border:1px black solid; border-radius:5px; padding: 10px;">
    <h1>Eliminar Usuario</h1>
    <input type="text" name="nombre" placeholder ="Nombre">
    <input type="submit" name="operacion" value="Eliminar">
</form>
<form method="POST" style="border:1px black solid; border-radius:5px; padding: 10px;">
    <h1>Modificar Usuario</h1>
    <input type="text" name="nombre" placeholder ="Nombre">
    <input type="text" name="nombreNuevo" placeholder ="Nombre Nuevo">
    <input type="submit" name="operacion" value="Modificar">
</form>
<form method="POST" style="border:1px black solid; border-radius:5px; padding: 10px;">
    <h1>Modificar Usuario</h1>
    <input type="text" name="nombre" placeholder ="Nombre">
    <input type="text" name="nombreNuevo" placeholder ="Nombre Nuevo">
    <input type="submit" name="operacion" value="Modificar">
</form>
<form method="POST" style="border:1px black solid; border-radius:5px; padding: 10px;">
    <h1>Consultas</h1>
    <input type="submit" name="operacion" value="consulta">
    <?php 
        if($_POST && $_POST["operacion"]=="consulta" )
            consulta();
    ?>
</form>