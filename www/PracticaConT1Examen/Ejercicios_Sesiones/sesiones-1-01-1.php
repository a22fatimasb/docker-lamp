<?php
/**
 * Sesiones (1) 01 - sesiones-1-01-1.php
 *
 * @author Escriba aquí su nombre
 *
 */

session_start();


// Verificar si hay algún texto guardado en la sesión
$texto_previo = isset($_SESSION['texto']) ? $_SESSION['texto'] : '';

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['texto'])) {
  
  $_SESSION['texto'] = $_POST['texto'];
  $texto_previo = $_SESSION['texto'] ;
  
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Formulario Texto 1 (Formulario).
    Sesiones (1). Sesiones.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>

<body>
  <h1>Formulario Texto 1 (Formulario)</h1>

<?php

echo $texto_previo ;

?>

  <form action="sesiones-1-01-1.php" method="post">
    <p>
      <label>
        Escriba texto:
        <input type="text" name="texto" size="20" maxlength="20">
      </label>
    </p>

    <p>
      <input type="submit" value="Guardar">
      <input type="reset" value="Borrar">
    </p>
  </form>

  <a href="sesiones-1-01-2.php">Página 2 </a>
  <footer>
    <p>Escriba aquí su nombre</p>
  </footer>
</body>
</html>
