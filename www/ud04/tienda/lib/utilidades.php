<?php

function test_input($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

$idiomas = array('Gallego', 'Castellano', 'Inglés', 'Portugués');

// Función para generar el campo de selección de idioma
function generarSelectIdiomas($seleccionada = null)
{
    global $idiomas;
    $select = '<select name="idioma">';
    foreach ($idiomas as $idioma) {
        $selected = ($seleccionada === $idioma) ? 'selected' : '';
        $select .= "<option value=\"$idioma\" $selected>$idioma</option>";
    }
    $select .= '</select>';
    return $select;
}

// Definir el mensaje de bienvenida según el idioma actual
function definirMensajeBienvenida($idioma)
{
    $mensaje = '';
    if ($idioma) {
        switch ($idioma) {
            case 'Gallego':
                $mensaje = "Benvido a miña páxina!";
                break;
            case 'Castellano':
                $mensaje = "Bienvenido a mi página!";
                break;
            case 'Inglés':
                $mensaje = "Welcome to my page!";
                break;
            case 'Portugués':
                $mensaje = "Bemvindo à minha página!";
                break;
            default:
                $mensaje = "Seleccione un idioma válido.";
                break;
        }
    }
    return $mensaje;
}
