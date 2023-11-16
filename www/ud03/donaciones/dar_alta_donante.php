<?php
include("lib/utilidades.php"); // Incluye las definiciones de funciones de validación
include("lib/base_datos.php"); // Incluye las funciones concernientes a la base de datos

$nombre = $apellidos = $edad = $grupo_sanguineo = $codigo_postal = $telefono = "";
$nombreErr = $apellidosErr = $edadErr = $grupoSanguineoErr = $codigoPostalErr = $telefonoErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación de datos
    $nombre = $_POST["name"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $grupo_sanguineo = $_POST["grupo_sanguineo"];
    $codigo_postal = $_POST["codigo_postal"];
    $telefono = $_POST["telefono"];

    if (!validarCampoObligatorio($nombre) || !validarFormatoString($nombre) || !validarLongitudNombre($nombre)) {
        $nombreErr = "Nombre inválido";
    }

    if (!validarCampoObligatorio($apellidos) || !validarFormatoString($apellidos) || !validarLongitudApellidos($apellidos)) {
        $apellidosErr = "Apellidos inválidos";
    }

    if (!validarCampoObligatorio($edad) || !validarEdad($edad)) {
        $edadErr = "Edad inválida";
    }

    if (!validarCampoObligatorio($grupo_sanguineo)) {
        $grupoSanguineoErr = "Grupo sanguíneo inválido";
    }

    if (!validarCampoObligatorio($codigo_postal) || !validarCodigoPostal($codigo_postal)) {
        $codigoPostalErr = "Código Postal inválido";
    }

    if (!validarCampoObligatorio($telefono) || !validarTelefono($telefono)) {
        $telefonoErr = "Número de télefono inválido";
    }

    
    // Si todos los datos son válidos, guardar al nuevo usuario
    if (empty($nombreErr) && empty($apellidosErr) && empty($edadErr) && empty($grupoSanguineoErr) && empty($codigoPostalErr) && empty($telefonoErr)) {

        establecerConexion();
        crearBaseDeDatos();
        seleccionarBaseDeDatos();
        crearTablaDonantes();
        registrarDonantes($nombre, $apellidos, $edad, $grupo_sanguineo, $codigo_postal, $telefono);
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
    <h1>Alta de donante</h1>
    <div>
        Formulario para dar de alta un donante

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name">
            <span class="error"><?php echo $nombreErr; ?></span>
            <br><br>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos">
            <span class="error"><?php echo $apellidosErr; ?></span>
            <br><br>

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad">
            <span class="error"><?php echo $edadErr; ?></span>
            <br><br>

            <label for="grupo_sanguineo">Grupo sanguíneo:</label>
            <?php echo generarSelectGS($grupos_sanguineos); ?>
            <span class="error"><?php echo $grupoSanguineoErr; ?></span>
            <br><br>

            <label for="codigo_postal">Código Postal:</label>
            <input type="text" id="codigo_postal" name="codigo_postal">
            <span class="error"><?php echo $codigoPostalErr; ?></span>
            <br><br>

            <label for="telefono">Télefono:</label>
            <input type="text" id="telefono" name="telefono">
            <span class="error"><?php echo $telefonoErr; ?></span>
            <br><br>

            <input type="submit" name="submit" value="Actualizar">
        </form>
    </div>



    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>