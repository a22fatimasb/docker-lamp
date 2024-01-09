<?php

// Verificar si la cookie 'contador' está establecida en el navegador del usuario
if(isset($_COOKIE['contador'])){
    // Si la cookie 'contador' existe, incrementa su valor en 1 y actualiza la cookie
    setcookie('contador', $_COOKIE['contador']+1, time()+365*24*60*60);  // Actualiza la cookie para que dure 1 año más
    echo "Número de visitas: " . $_COOKIE['contador'];  // Muestra el número actualizado de visitas almacenado en la cookie
} else {
    // Si la cookie 'contador' NO existe, crea una nueva cookie con un valor inicial de 1
    setcookie('contador', 1, time()+365*24*60*60);  // Establece una nueva cookie con un tiempo de vida de 1 año
    echo "Bienvenido por primera vez a nuestra página";  // Muestra un mensaje de bienvenida para la primera visita
}
?>
