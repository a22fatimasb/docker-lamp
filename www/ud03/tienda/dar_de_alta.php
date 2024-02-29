<?php
include("lib/utilidades.php"); // Incluye las definiciones de funciones de validación
include("lib/base_datos.php"); // Incluye las funciones concernientes a la base de datos
$conexion = establecerConexion();
crearBaseDeDatos($conexion);
seleccionarBaseDeDatos($conexion);
$nombre = $apellidos = $edad = $provincia = $resultado = $contrasenha = $contrasenhaTecleada = "";
$nombreErr = $apellidosErr = $edadErr = $provinciaErr = $contrasenhaErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación de datos
    $nombre = $_POST["name"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $provincia = $_POST["provincia"];

    if ($_POST["contrasenha"] == $_POST["verificar-contrasenha"]) {
        $contrasenhaTecleada = $_POST["contrasenha"];
        $contrasenha = password_hash($contrasenhaTecleada, PASSWORD_DEFAULT);
    } else{
        $contrasenhaErr = "Ten que ingresar unha contraseña válida.";

    }


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
   
    // Si todos los datos son válidos, guardar al nuevo usuario
    if (empty($nombreErr) && empty($apellidosErr) && empty($edadErr) && empty($provinciaErr) && empty($contrasenhaErr)) {

        $resultado = guardarUsuarios($conexion, $nombre, $contrasenha, $apellidos, $edad, $provincia);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="lib/estilos.css">
</head>

<body>
    <h1>Alta de usuario </h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de alta</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name">
        <span class="error"><?php echo $nombreErr; ?></span>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos">
        <span class="error"><?php echo $apellidosErr; ?></span>

        <label for="contrasenha">Contraseña:</label>
        <input type="password" id="contrasenha" name="contrasenha">
        <span class="error"><?php echo $contrasenhaErr; ?></span>

        <label for="verificar-contrasenha">Repita a contraseña:</label>
        <input type="password" id="verificar-contrasenha" name="verificar-contrasenha">

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad">
        <span class="error"><?php echo $edadErr; ?></span>

        <label for="provincia">Provincia:</label>
        <?php require_once 'lib/utilidades.php';
        echo generarSelectProvincias($provincias);
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

</html>
<?php cerrarConexion($conexion); ?>