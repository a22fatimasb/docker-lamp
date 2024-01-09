<?php
// Iniciar la sesión
session_start();

include('utilidades.php');

$mensaje = '';

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idioma'])) {
    // Obtener el idioma seleccionado
    $_SESSION['idioma'] = $_POST['idioma'];

    $mensaje = definirMensajeBienvenida($_POST['idioma']);
    
}

// Determinar el idioma actual basado en la sesión
$idiomaActual = isset($_SESSION['idioma']) ? $_SESSION['idioma'] : null;



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Selección de Idioma con Sesión</title>
</head>

<body>

    <h2>Selecciona tu idioma:</h2>

    <!-- Formulario para seleccionar el idioma -->
    <form action="" method="post">
        <label for="idioma">Idioma:</label>
        <?php echo generarSelectIdiomas($idiomaActual); ?> 
        <input type="submit" name="submit" value="Aceptar">
    </form>


    <p><?php echo $mensaje; ?></p>


</body>

</html>