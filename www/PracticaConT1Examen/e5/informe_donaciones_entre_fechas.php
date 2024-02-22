<?php

include "lib/base_datos.php";
include "lib/utilidades.php";
include "lib/donaciones.php";

$conexion = get_conexion();
seleccionar_bd_donacion($conexion);

$mensajes = array();
$fecha_inicio = "";
$fecha_fin = "";
$donaciones = "";

if (isset($_POST['submit'])) {
    
    if (!empty($_POST['fecha_inicio']) && !empty($_POST['fecha_fin'])) {
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        if ($fecha_inicio <= $fecha_fin) {

            $donaciones = consulta_donaciones_entre_fechas($conexion, $fecha_inicio, $fecha_fin);
        } else {
            $mensajes[] = array("error", "La fecha de inicio no puede ser posterior a la fecha de fin.");
        }
    } else {
        $mensajes[] = array("error", "Error con las fechas introducidas.");
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>


    <?= get_mensajes_html_format($mensajes); ?>

    <div class="form-group">
        <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="fecha_inicio">Fecha de inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio"><br><br>

            <label for="fecha_fin">Fecha de fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin"><br><br>

            <input type="submit" name="submit" value="Generar Informe">
        </form>
    </div>
    <h2>Listado donaciones</h2>
    <table>
        <tr>
            <th>ID donante</th>
            <th>Fecha donacion</th>
        </tr>
        <?php
         imprimir_lista_donaciones($donaciones);
        ?>
    </table>

        <footer>
            <p><a href='index.php'>Página de inicio</a></p>
        </footer>

        <?php cerrar_conexion($conexion); ?>

</body>

</html>