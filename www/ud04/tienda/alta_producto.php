<?php

require "lib/base_datos.php";
require "lib/utilidades.php";
require "lib/funciones.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Alta de producto</h1>

    <?php

    $mensajes = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        if (empty($_POST["name"]) || empty($_POST["descripcion"]) || empty($_POST["precio"]) || empty($_POST['unidades']) || empty($_FILES['foto']['name'])) {
            $mensajes =  "Falta algún dato obligatorio del formulario </br>";
        } else {
            $nombre = test_input($_POST["name"]);
            $descripcion = test_input($_POST["descripcion"]);
            $precio = test_input($_POST["precio"]);
            $unidades = test_input($_POST["unidades"]);
            $foto = $_FILES['foto'];

            // Comprobamos la extensión del fichero
            if (!compruebaExtension($foto['name'])) {
                $mensajes .= "Solo se permiten imágenes con extensión PNG, JPG, JPEG o GIF.<br>";
            }

            // Comprobamos el tamaño del fichero
            if (!compruebaTamanho($foto['size'])) {
                $mensajes .= "La imagen no debe superar 50MB de tamaño.<br>";
            }


            if (empty($mensajes)) {
                $nombreArchivo = basename($foto["name"]);
                $directorio = "uploads/" . $nombreArchivo;
                // Comprobamos si el fichero ya existe
                if (compruebaExistenciaAnterior($directorio)) {
                    echo  "El fichero ya existe.<br>";
                } else {
                    if (move_uploaded_file($foto["tmp_name"], $directorio)) {
                        echo "El fichero " . htmlspecialchars(basename($foto["name"])) . " ha sido subido.<br>";
                        $conexion = get_conexion();
                        seleccionar_bd_tienda($conexion);
                        dar_alta_producto($conexion, $nombre, $descripcion, $precio, $unidades, $directorio);
                        $mensajes = "Producto dado de alta correctamente.<br>";
                        cerrar_conexion($conexion);
                    } else {
                        echo "Hubo un error subiendo el fichero.<br>";
                    }
                }
            }
        }
    }



    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <?= $mensajes; ?>

    <p>Formulario de alta de producto</p>
    <form action="alta_producto.php" method="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="name" required>
        <br><br>
        Descripcion: <textarea name="descripcion" rows="4" cols="50" required></textarea>
        <br><br>
        Precio: <input type="number" name="precio" step="0.01" required>
        <br><br>
        Unidades: <input type="number" name="unidades" required>
        <br><br>
        Foto: <input type="file" name="foto" id="foto" required>
        <br><br>

        <input type="submit" name="submit" value="Guardar producto">
    </form>

    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>