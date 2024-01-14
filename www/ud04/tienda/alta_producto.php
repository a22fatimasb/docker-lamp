<?php

require "lib/base_datos.php";
require "lib/utilidades.php";
require "lib/funciones.php";

$mensajes = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    if (empty($_POST["name"]) || empty($_POST["descripcion"]) || empty($_POST["precio"]) || empty($_POST['unidades']) || empty($_FILES['imagenes']['name'][0])) {
        $mensajes =  "Falta algún dato obligatorio del formulario </br>";
    } else {
        $nombre = test_input($_POST["name"]);
        $descripcion = test_input($_POST["descripcion"]);
        $precio = test_input($_POST["precio"]);
        $unidades = test_input($_POST["unidades"]);
        $fotos = $_FILES['imagenes'];

        // Recorremos las imágenes
        foreach ($fotos['name'] as $key => $nombreImagen) {
            // Comprobamos la extensión del fichero
            if (!compruebaExtension($nombreImagen)) {
                $mensajes .= "Sólo se permiten imágenes con extensión PNG, JPG, JPEG o GIF.<br>";
                continue;
            }
            // Comprobamos el tamaño del fichero
            if (!compruebaTamanho($fotos['size'][$key])) {
                $mensajes .= "La imagen " . htmlspecialchars($nombreImagen) . " no debe superar 50MB de tamaño.<br>";
                continue;
            }
        }
        if (empty($mensajes)) {
            $conexion = get_conexion();
            seleccionar_bd_tienda($conexion);

            // Array para almacenar las rutas de las imágenes
            $rutasImagenes = [];

            foreach ($fotos['name'] as $key => $nombreImagen) {
                $directorio = "uploads/" . basename($nombreImagen);

                if (move_uploaded_file($fotos['tmp_name'][$key], $directorio)) {
                    // Añadir la ruta al array
                    $rutasImagenes[] = $directorio;
                } else {
                    $mensajes .= "Hubo un error subiendo la imagen " . htmlspecialchars($nombreImagen) . ".<br>";
                }
            }

            if (empty($mensajes)) {
                // Si no hay mensajes de error, dar de alta el producto con las rutas de las imágenes
                dar_alta_producto($conexion, $nombre, $descripcion, $precio, $unidades, $rutasImagenes);
                $mensajes .= "Producto dado de alta correctamente.<br>";
            }

            cerrar_conexion($conexion);
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
    Fotografías: <input type="file" name="imagenes[]" id="foto" multiple accept="image/*" required>
    <br><br>

    <input type="submit" name="submit" value="Guardar producto">
</form>
<?= $mensajes; ?>

<footer>
    <p>
        <a href='index.php'>Página de inicio</a>
    </p>
</footer>
</body>

</html>