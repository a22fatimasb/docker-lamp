<?php
session_start();

// Destruir la sesión correctamente
session_destroy();

$_SESSION = array();
setcookie('usuario', 123, time()-1000);
// Redirigir al formulario de inicio de sesión
header('Location: index.php');
exit();
