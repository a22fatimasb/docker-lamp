<?php
session_start();
require "lib/base_datos.php";
require "lib/utilidades.php";

// Verificar si la cookie 'contador' está establecida en el navegador del usuario
if(isset($_COOKIE['contador'])){
    // Si la cookie 'contador' existe, incrementa su valor en 1 y actualiza la cookie
    setcookie('contador', $_COOKIE['contador']+1, time()+365*24*60*60);  // Actualiza la cookie para que dure 1 año más
    echo "Número de visitas: " . $_COOKIE['contador'];  // Muestra el número actualizado de visitas almacenado en la cookie
} else {
    // Si la cookie 'contador' NO existe, crea una nueva cookie con un valor inicial de 1
    setcookie('contador', 1, time()+365*24*60*60);  // Establece una nueva cookie con un tiempo de vida de 1 año
    echo "Bienvenido por primera vez a nuestra página";  // Muestra un mensaje de bienvenida para la primera visita
}

// Verificar si el usuario está autenticado
if (isset($_SESSION["autenticado"]) && $_SESSION["autenticado"] === true) {
    echo "</br>¡Bienvenido " . $_SESSION['name'] . "! Has iniciado sesión correctamente.";
} else {
    echo "</br>No estás autenticado.";
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Tienda IES San Clemente</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <?php
    $conexion = get_conexion();
    crear_bd_tienda($conexion);
    seleccionar_bd_tienda($conexion);
    crear_tabla_usuarios($conexion);
    crear_tabla_productos($conexion);
    crear_tabla_imagenes_producto($conexion);
    cerrar_conexion($conexion);
    ?>

    <p>Por favor, inicia sesión si tienes un usuario:</p>
    <p><a href="login.php">Login</a></p>
    <p>Cerrar sesión:</p>
    <p><a href="logout.php">Cerrar sesión</a></p>

    <p>

        <a class="btn btn-primary" href="dar_de_alta.php" role="button"> Alta usuarios</a>
        <a class="btn btn-primary" href="listar.php" role="button"> Listar usuarios</a>
        <a class="btn btn-primary" href="alta_producto.php" role="button"> Alta productos</a>
    </p>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>