<?php
include("lib/utilidades.php"); // Incluye las definiciones de funciones de validación
include("lib/base_datos.php"); // Incluye las funciones concernientes a la base de datos
establecerConexion();
crearBaseDeDatos();
seleccionarBaseDeDatos();
crearTablaAdministradores();
$nombre = $contrasena = "";
$nombreErr = $contrasenaErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación de datos
    $nombre = $_POST["name"];
    $contrasena = $_POST["contrasena"];


    if (!validarCampoObligatorio($nombre) || !validarFormatoString($nombre) || !validarLongitudNombre($nombre)) {
        $nombreErr = "Nombre inválido";
    }

    if (!validarCampoObligatorio($contrasena) || !validarLongitudContraseña($contrasena)) {
        $contraseñnErr = "Contraseña inválida";
    }




    // Si todos los datos son válidos, guardar al nuevo usuario
    if (empty($nombreErr) && empty($contrasenaErr)) {

        registrarAdministradores($nombre, $contrasena);
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
    <h1>Alta de administrador</h1>
    <div>
        <p>Formulario para dar de alta un administrador</p>
        <form method="post" class="formDonacion" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="campo">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name">
                <span class="error"><?php echo $nombreErr; ?></span>
            </div>
            <div class="campo">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena">
                <span class="error"><?php echo $contrasenaErr; ?></span>
            </div>

            <input type="submit" name="submit" value="Actualizar">
        </form>
    </div>

    <?php require_once('footer.php'); ?>

</body>

</html>

<?php cerrarConexion(); ?>