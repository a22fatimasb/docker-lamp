<?php

function compruebaExtension($nombreArchivo)
{
    $extensionesPermitidas = ['png', 'jpg', 'jpeg', 'gif'];
    $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
    return in_array($extension, $extensionesPermitidas);
}

function compruebaTamanho($tamanhoArchivo)
{
    $tamanhoMaximo = 50 * 1024 * 1024;
    return $tamanhoArchivo <= $tamanhoMaximo;
}
function compruebaExistenciaAnterior($nombreArchivo)
{
    return file_exists(($nombreArchivo));
}

function obtenerExtensionArchivo($nombreArchivo)
{
    // Directorio según el tipo de archivo
    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    $directorio = "uploads/";

    switch ($extension) {
        case 'txt':
            $directorio .= 'texto/';
            break;
        case 'jpg':
        case 'jpeg':
        case 'png':
            $directorio .= 'imagen/';
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
