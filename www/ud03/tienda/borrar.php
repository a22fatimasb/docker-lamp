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
    <h1>Eliminar Usuario </h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <?php
    include("lib/utilidades.php"); // Incluye las definiciones de funciones de validación
    require_once('lib/base_datos.php');
    $conexion = establecerConexion();
    seleccionarBaseDeDatos($conexion);
    $resultado = "";
    // Validar si es un número
    if (esNumero($_GET["id"]) && validarCampoObligatorio($_GET["id"])) {
        $id = $_GET["id"];
        $resultado = eliminarUsuario($conexion,$id);
    }
    ?>

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