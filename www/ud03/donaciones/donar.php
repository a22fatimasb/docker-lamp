<?php
include("lib/utilidades.php");
require_once ('lib/base_datos.php');
establecerConexion();
seleccionarBaseDeDatos();
crearTablaHistorico();
// Obtener el valor de id de la URL
$id = isset($_GET["id"]) ? $_GET["id"] : null;
$fechaDonacion = isset($_POST["fechaDonacion"]) ? $_POST["fechaDonacion"] : null;

$fechaDonacionErr = "";

// Validar si es un número y si es un campo obligatorio
if ($id !== null && esNumero($id)) {
    // Resto del código
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

        if (!validarCampoObligatorio($fechaDonacion)) {
            $fechaDonacionErr = "Nombre inválido";
        }
        if (empty($fechaDonacionErr)) {

            registrarDonacion($id, $fechaDonacion);
            
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link rel="stylesheet" href="lib/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <br>
    <h1>Alta de donación</h1>
    <div>
        <p>Formulario para dar de alta una donación</p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $id); ?>">

            <label for="fechaDonacion">Seleccione la fecha de la donación:</label>
            <input type="date" id="fechaDonacion" name="fechaDonacion">
            <span class="error"><?php echo isset($fechaDonacionErr) ? $fechaDonacionErr : ''; ?></span>
            <br><br>

            <input type="submit" value="Registrar Donación">
        </form>
    </div>

    <?php require_once('footer.php'); ?>

</body>

</html>

<?php cerrarConexion(); ?>