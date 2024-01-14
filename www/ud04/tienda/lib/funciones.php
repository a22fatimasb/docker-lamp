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
