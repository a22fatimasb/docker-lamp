<?php

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre y el contenido de la nota desde el formulario
    $nombre = $_POST['nombre'] ?? '';
    $contenido = $_POST['contenido'] ?? '';

    $directorio_notas= "notas/".$nombre.".txt";
    //Guardar la nota en un archivo
    $mifichero = fopen($directorio_notas, "w") or die("Unable to open file!");
   
    fwrite($mifichero, $contenido);
    fclose($mifichero);

    echo "La nota se ha guardado correctamente en el archivo: $directorio_notas";
} else {
    // Si no se han enviado los datos del formulario, redirigir al formulario
    header('Location: formulario.html');
    exit();
}
