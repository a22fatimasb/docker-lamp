<?php
include("lib/utilidades.php");
include("lib/base_datos.php");

$conexion = establecerConexion();
seleccionarBaseDeDatos($conexion);

$nombre = $apellidos = $edad = $provincia = $resultado = "";
$nombreErr = $apellidosErr = $edadErr = $provinciaErr = "";

if (esNumero($_GET["id"]) && validarCampoObligatorio($_GET["id"])) {
    $id = $_GET["id"];
    //Recuperamos la información inicial del usuario
    $datosUsuario = consultarDatosUsuario($conexion,$id);
    $nombre = $datosUsuario['nombre'];
    $apellidos = $datosUsuario['apellidos'];
    $edad = $datosUsuario['edad'];
    $provincia = $datosUsuario['provincia'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validación de datos
        $nombre = $_POST["name"];
        $apellidos = $_POST["apellidos"];
        $edad = $_POST["edad"];
        $provincia = $_POST["provincia"];

        if (!validarCampoObligatorio($nombre) || !validarFormatoString($nombre) || !validarLongitudNombre($nombre)) {
            $nombreErr = "Nombre inválido";
        }

        if (!validarCampoObligatorio($apellidos) || !validarFormatoString($apellidos) || !validarLongitudApellidos($apellidos)) {
            $apellidosErr = "Apellidos inválidos";
        }

        if (!validarCampoObligatorio($edad) || !validarEdad($edad)) {
            $edadErr = "Edad inválida";
        }

        if (!validarCampoObligatorio($provincia)) {
            $provinciaErr = "Provincia inválida";
        }

        // Si todos los datos son válidos, realizar la actualización
        if (empty($nombreErr) && empty($apellidosErr) && empty($edadErr) && empty($provinciaErr)) {

            $resultado = modificarUsuario($conexion, $id, $nombre, $apellidos, $edad, $provincia);
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link rel="stylesheet" href="lib/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Modificar Usuario </h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $id); ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="<?php echo $nombre; ?>">
        <span class="error"><?php echo $nombreErr; ?></span>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>">
        <span class="error"><?php echo $apellidosErr; ?></span>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="<?php echo $edad; ?>">
        <span class="error"><?php echo $edadErr; ?></span>

        <label for="provincia">Provincia:</label>
        <?php require_once 'lib/utilidades.php';
        echo generarSelectProvincias($provincias, $provincia);
        ?>
        <span class="error"><?php echo $provinciaErr; ?></span>

        <input type="submit" name="submit" value="Actualizar">
    </form>
    <div class="resultado">
        <?php
        if ($resultado) {
            echo $resultado;
        }
        ?>
    </div>
    <?php require_once('footer.php'); ?>
</body>

</html><?php  cerrarConexion($conexion); ?>