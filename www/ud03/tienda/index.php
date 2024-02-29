<?php
// Iniciar sesión 
session_start();
require "lib/base_datos.php";
require "lib/utilidades.php";
require "lib/ferramentas.php";
$mensaje = "";

if (isset($_COOKIE['contador'])) {
    setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
    $mensaje = "Número de visitas: " . $_COOKIE['contador'];
} else {
    setcookie('contador', 1, time() + 365 * 24 * 60 * 60);
    $mensaje = "Bienvenido por primera vez a nuestra página";
}


// Verificar si el usuario está autenticado
if (isset($_SESSION["autenticado"]) && $_SESSION["autenticado"] === true) {
    echo "</br>¡Bienvenido " . $_SESSION['name'] . "! Has iniciado sesión correctamente.";
} else {
    echo "</br>No estás autenticado.";
}

$conexion = establecerConexion();
crearBaseDeDatos($conexion);
seleccionarBaseDeDatos($conexion);
crearTablaProductos($conexion);
crearTablaUsuarios($conexion);
cerrarConexion($conexion);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="lib/estilos.css">
</head>

<body>

    <?php echo $mensaje; ?>
    <h1>Tienda IES San Clemente</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Por favor, inicia sesión si tienes un usuario:</p>
    <p><a href="login.php">Login</a></p>
    <p>Cerrar sesión:</p>
    <p><a href="logout.php">Cerrar sesión</a></p>
    <p>
        <a class="btn btn-primary" href="dar_de_alta.php" role="button"> Alta usuarios</a>
        <a class="btn btn-primary" href="listar.php" role="button"> Listar usuarios</a>
        <a class="btn btn-primary" href="alta_producto.php" role="button"> Alta producto</a>
    </p>

    <?php require_once('footer.php'); ?>
</body>

</html>