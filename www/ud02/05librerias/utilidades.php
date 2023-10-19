<?php

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
function comprobarDigito($caracter)
{
    
    $longitud = strlen($caracter);
    if ($longitud === 1 && ctype_digit($caracter)) {
        return "<br>Es un dígito.";
    } else {
        return "<br>No es un dígito válido.";
    }
}


// 2. Crea una función que reciba un string e devolva a súa lonxitude.
function longitudString($cadena)
{
    if (is_string($cadena)) {
        $longitud = strlen($cadena);
        return $longitud;
    } else {
        return 0;
    }
}


// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
function elevarNumero($a, $b)
{
    $numero_elevado = pow($a, $b);
    return $numero_elevado;
}

// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
function comprobarVocal($caracter)
{
    $vocales = "AEIOUaeiou";
    return strpos($vocales, $caracter) !== false;
}

// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
function comprobarParImpar($numero)
{
    if (is_numeric($numero) === false) {
        return "<br> No es un número válido";
    }
    if ($numero % 2 == 0) {
        return "<br> Es un número par";
    } else {
        return "<br> Es un número impar";
    }
}


// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
function pasarStringMaisculas($cadenaTexto)
{

    return strtoupper($cadenaTexto);
}



// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
function imprimirZonaHorariaPorDefecto()
{
    $zonaHorariaPorDefecto = date_default_timezone_get();
    echo "<br>La zona horaria por defecto utilizada en PHP es $zonaHorariaPorDefecto";
}


/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/
function informacionHoraria()
{

    $latitud = ini_get("date.default_latitude"); 
    $longitud = ini_get("date.default_longitude"); 
    $zenit = ini_get("date.sunset_zenith"); 
    $gmt= 1; 

    echo date("D M d Y") . ', hora de la salida del sol : ' . date_sunrise(time(), SUNFUNCS_RET_STRING, $latitud, $longitud, $zenit, $gmt);
    echo "<br>";
    echo date("D M d Y") . ', hora de la puesta de sol : ' . date_sunset(time(), SUNFUNCS_RET_STRING, $latitud, $longitud, $zenit, $gmt);
}

/*2. Escribe la diferencia entre `include`, `include_once`, `require` y `require_once`.

include: inclúe e interpreta o contido do ficheiro. Se o arquivo non se atopa, sae por pantalla unha advertencia pero o script segue executandose. 
Desta maneira podese incluir o mesmo arquivo varias veces nun script.
require: o mesmo que o anterior, pero a maiores produce un error fatal no caso de fallo e detense a execución do script.
include_once: igual que o primeiro, pero funciona como "if exist" de SQL: se xa se incluiu o ficheiro anteriormente, non se volve a incluir. 
Evita así a duplicación de código.
require_once: igual que o require e a maiores se xa se incluiu o ficheiro dado non se volve a incluir.

*/
?>