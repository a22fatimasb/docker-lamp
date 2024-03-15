<?php

/**
 * Sesiones (1) 01 - sesiones-1-01-2.php
 *
 * @author Escriba aquí su nombre
 *
 */

session_start();
$texto_imprimir = "";
// Verificar si hay texto guardado en la sesión
if (isset($_SESSION['texto'])) {
  $texto = $_SESSION['texto'];
  $texto_imprimir = "<h2>Texto ingresado:</h2><p>$texto</p>";
} else {
  $texto_imprimir = "<h2>No se ha ingresado ningún texto.</h2>";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Formulario Texto 1 (Resultado).
    Sesiones (1). Sesiones.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>

<body>
  <h1>Formulario Texto 1 (Resultado)</h1>

  <?php

  echo $texto_imprimir;

  ?>

  <p><a href="sesiones-1-01-1.php">Volver a la primera página.</a></p>

  <footer>
    <p>Escriba aquí su nombre</p>
  </footer>
</body>

</html>