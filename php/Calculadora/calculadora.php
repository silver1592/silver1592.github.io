<?php 
    //include operaciones.php;
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="calculadora.css">
    </head>
    <body>
        <h1> Calculadora </h1>
        <!-- Calculadora de un solo dijito, puede ser posfija o normal -->
        <table>
            <thead>
                <th colspan="4" id="resultado">
                    <?php/*
                        if($_GET)
                            analizaCadena($_GET["cad"]);
                        if($_POST)
                            analizaCadena($_POST["cad"]);
                            */
                    ?>
                </th>
            </thead>
            <tbody>
                <tr>
                    <td><button>+</button></td>
                    <td><button>-</button></td>
                    <td><button>*</button></td>
                    <td ><button>/</button></td>
                </tr>
                <tr>
                    <td><button>7</button></td>
                    <td><button>8</button></td>
                    <td><button>9</button></td>
                    <td rowspan="2"><button>AC</button></td>
                </tr>
                <tr>
                    <td><button>4</button></td>
                    <td><button>5</button></td>
                    <td><button>6</button></td>
                </tr>
                <tr>
                    <td><button>1</button></td>
                    <td><button>2</button></td>
                    <td><button>3</button></td>
                    <td rowspan="2"><button>=</button></td>
                </tr>
                <tr>
                    <td colspan="3"><button>0</button></td>
                </tr>
            </tbody>
        </table>

        <script src="calculadora.js"></script>
    </body>
</html>