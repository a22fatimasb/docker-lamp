<?php
session_start();
include "lib/base_datos.php";
$conexion = establecerConexion();
seleccionarBaseDeDatos($conexion);
$usuarioErr = $passErr = "";
//Comprobar si se reciben los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    if (verificar_existencia_usuario($conexion, $usuario)) {
        $contrasenhaBD = recuperar_contrasenha_usuario($conexion, $usuario);
        cerrarConexion($conexion);
        // Verifica si la contraseña ingresada coincide con la almacenada en la base de datos
        if (password_verify($pass, $contrasenhaBD)){
            $_SESSION["usuario"] = $usuario;
        } else {
            $passErr = "La contraseña no es correcta. </br>";
        }
    } else {
        $usuarioErr = "El usuario ingresado no es correcto. </br>";
    }

    if (empty($passErr) && empty($usuarioErr)) {
        // Redirigimos a index.php o a la página principal después de la autenticación exitosa
        $_SESSION["autenticado"] = true;
        $_SESSION["name"] = $usuario;
        header('Location: index.php');
        exit();
    }
}
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
        <span style="color: red;"><?php echo $usuarioErr; ?></span><br>
        Contraseña: <input name="pass" id="pass" type="password" required>
        <span style="color: red;"><?php echo $passErr; ?></span><br>
        <input type="submit" value="Iniciar sesión">
    </form>


    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>