<?php

session_start();


// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION["autenticado"]) && $_SESSION["autenticado"] === true) {
    // Bienvenida
    echo "<h2>Bienvenido, {$_SESSION['username']}!</h2>";
} else {
    // Si el usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
    header('Location: index.php');
    exit();
}





// Enlace para cerrar sesión
echo '<p><a href="logout.php">Cerrar sesión</a></p>';
