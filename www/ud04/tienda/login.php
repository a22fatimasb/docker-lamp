<?php
session_start();
include "lib/base_datos.php";
$conexion = get_conexion();
seleccionar_bd_tienda($conexion);

function comporbar_usuario($conexion, $nombre, $pass)
{
    if (verificar_existencia_usuario($conexion, $nombre)) {
        $contrasenhaBD = recuperar_contrasenha_usuario($conexion, $nombre);
        // Verifica si la contraseña ingresada coincide con la almacenada en la base de datos
        if (password_verify($pass, $contrasenhaBD)) {
            $_SESSION["usuario"] = $nombre; 
            return $nombre; 
        } else {
            echo "Error de usuario";
        }
    }
    return null; 
}

// Comprobar si se reciben los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
    $user = comporbar_usuario($conexion, $usuario, $pass);
    if (!$user) {
        $error = true;
        echo "Error de autenticación";
    } else {
        // Redirigimos a index.php o a la página principal después de la autenticación exitosa
        header('Location: index.php');
        exit();
    }
}

cerrar_conexion($conexion);
?>


<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        Usuario: <input name="usuario" id="usuario" type="text" required>
        Contraseña:<input name="pass" id="pass" type="password" required>
        <input type="submit" value="Iniciar sesión">
    </form>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>