<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Alta de usuario </h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de alta</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name">

        <br>
        <br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos">

        <br> <br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad">

        <br> <br>

        <label for="provincia">Provincia:</label>
        <?php require_once 'lib/utilidades.php';
        echo generarSelectProvincias($provincias); ?>

        <br> <br>
        <input type="submit" name="submit" value="Agregar">
    </form>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>

<?php
//include("lib/utilidades.php"); // Incluye las definiciones de funciones de validación
include("lib/base_datos.php"); // Incluye las funciones concernientes a la base de datos
$nombre = $apellidos = $edad = $provincia = "";
$nombreErr = $apellidosErr = $edadErr = $provinciaErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (validarCampoObligatorio($_POST["name"]) && validarFormatoString($_POST["name"]) && validarLongitudNombre($_POST["name"])) {
        $nombre = $_POST["name"];
    } else {
        $nombreErr = "Nombre inválido";
    }

    if (validarCampoObligatorio($_POST["apellidos"]) && validarFormatoString($_POST["apellidos"]) && validarLongitudApellidos($_POST["apellidos"])) {
        $apellidos = $_POST["apellidos"];
    } else {
        $apellidosErr = "Apellidos inválidos";
    }

    if (validarCampoObligatorio($_POST["edad"]) && validarEdad($_POST["edad"])) {
        $edad = $_POST["edad"];
    } else {
        $edadErr = "Edad inválida";
    }

    if (validarCampoObligatorio($_POST["provincia"])) {
        $provincia = $_POST["provincia"];
    } else {
        $provinciaErr = "Provincia inválida";
    }

    if (validarCampoObligatorio($nombre) && validarCampoObligatorio($apellidos) && validarCampoObligatorio($edad) && validarCampoObligatorio($provincia)) {
        establecerConexion();
        crearBaseDeDatos();
        seleccionarBaseDeDatos();
        crearTablaUsuarios();
        guardarUsuarios($nombre, $apellidos, $edad, $provincia);
        cerrarConexion();
    }
}
?>