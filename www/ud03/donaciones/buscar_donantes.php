<?php
include("lib/utilidades.php"); // Incluye las definiciones de funciones de validación
include("lib/base_datos.php"); // Incluye las funciones concernientes a la base de datos
establecerConexion();
seleccionarBaseDeDatos();
$grupo_sanguineo = null;
$codigo_postal = $resultado  = "";
$codigoPostalErr  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación de datos

    $grupo_sanguineo = $_POST["grupo_sanguineo"];
    $codigo_postal = $_POST["codigo_postal"];


    if (!validarCodigoPostal($codigo_postal)) {
        $codigoPostalErr = "Código Postal inválido";
    }


    // Si todos los datos son válidos, realizar la búsqueda de donantes
    if (validarCodigoPostal($codigo_postal)) {

        if ($grupo_sanguineo === null || $grupo_sanguineo === "") {
            $resultado = buscarDonantes($codigo_postal);
        } else {
            $resultado = buscarDonantes($codigo_postal, $grupo_sanguineo);
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <br>
    <h1>Buscar donantes</h1>
    <div>
        <p>Formulario para buscar donantes</p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="campo">
                <label for="grupo_sanguineo">Introduce el grupo sanguíneo que desees buscar(opcional):</label>
                <?php echo generarSelectGS($grupos_sanguineos); ?>
            </div>
            <div class="campo">
                <label for="codigo_postal">Introduce el Código Postal por el que desees buscar:</label>
                <input type="text" id="codigo_postal" name="codigo_postal" value="<?php echo $codigo_postal ?>">
                <span class="error"><?php echo $codigoPostalErr; ?></span>
            </div>


            <input type="submit" name="submit" value="Buscar">
        </form>
    </div>

    <div class="resultado">
        <?php
        if ($resultado) {
            echo $resultado;
        }
        ?>
    </div>

    <?php require_once('footer.php'); ?>

</body>

</html>

<?php cerrarConexion(); ?>