<?php
include("lib/utilidades.php"); // Incluye las definiciones de funciones de validación
include("lib/base_datos.php"); // Incluye las funciones concernientes a la base de datos

$grupo_sanguineo = null;
$codigo_postal  = "";
$grupoSanguineoErr = $codigoPostalErr  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación de datos

    $grupo_sanguineo = $_POST["grupo_sanguineo"];
    $codigo_postal = $_POST["codigo_postal"];



    if (!validarCampoObligatorio($grupo_sanguineo)) {
        $grupoSanguineoErr = "Grupo sanguíneo inválido";
    }

    if (!validarCodigoPostal($codigo_postal)) {
        $codigoPostalErr = "Código Postal inválido";
    }


    // Si todos los datos son válidos, realizar la búsqueda de donantes
    if (validarCodigoPostal($codigo_postal)) {
        establecerConexion();
        seleccionarBaseDeDatos();
        if ($grupo_sanguineo === null || $grupo_sanguineo === "") {
            buscarDonantes($codigo_postal);
        } else {
            buscarDonantes($codigo_postal, $grupo_sanguineo);
        }

        cerrarConexion();
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
    <br>
    <h1>Buscar donantes</h1>
    <div>
        <p>Formulario para buscar donantes</p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">



            <label for="grupo_sanguineo">Introduce el grupo sanguíneo que desees buscar(opcional):</label>
            <?php echo generarSelectGS($grupos_sanguineos); ?>
            <span class="error"><?php echo $grupoSanguineoErr; ?></span>
            <br><br>

            <label for="codigo_postal">Introduce el Código Postal por el que desees buscar:</label>
            <input type="text" id="codigo_postal" name="codigo_postal">
            <span class="error"><?php echo $codigoPostalErr; ?></span>
            <br><br>



            <input type="submit" name="submit" value="Buscar">
        </form>
    </div>

    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>