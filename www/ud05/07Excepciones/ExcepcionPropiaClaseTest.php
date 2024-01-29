<?php

include "ExcepcionPropiaClase.php";


try {
    echo ExcepcionPropiaClase::testNumber(5);
    echo ExcepcionPropiaClase::testNumber(0);
} catch (ExcepcionPropia $e) {
    // Capturar a excepción
    echo '</br>Excepción capturada: ',  $e->getMessage(), "\n";
}
