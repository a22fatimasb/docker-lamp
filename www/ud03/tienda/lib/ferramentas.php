<?php

function test_input($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function compruebaExtension($archivo)
{
    $extensionesPermitidas = ['png', 'jpg', 'jpeg', 'gif'];
    $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    return in_array($extension, $extensionesPermitidas);
}

function compruebaTamanho($tamanhoArchivo)
{
    $tamanhoMaximo = 50 * 1024 * 1024;
    return $tamanhoArchivo <= $tamanhoMaximo;
}
function obtenerExtensionArchivo($nombreArchivo)
{
    $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
    $directorio = "uploads/";

    switch ($extension) {
        case 'txt':
            $directorio .= 'texto/';
            break;
        case 'jpg':
        case 'jpeg':
        case 'png':
            $directorio .='imagen/';
            break;
        case 'pdf':
            $directorio .= 'pdf/';
            break;
        default:
            $directorio .= 'otros/';
            break;
    }

    return $directorio;
}
