<?php

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
function comprobarDigito($caracter)
{
    $caracter = strval($caracter);
    $longitud = strlen($caracter);
    if ($longitud === 1 && ctype_digit($caracter)) {
        return true;
    } else {
        return false;
    }
}

$caracter = "4";
$resultado = comprobarDigito($caracter);

if ($resultado) {
    echo "Es un dígito.";
} else {
    echo "No es un dígito válido.";
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
$cadena = 1;
if (longitudString($cadena) > 0) {
    echo "<br> La longitud es " . longitudString($cadena);
}


// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
function elevarNumero($a, $b)
{
    $numero_elevado = pow($a, $b);
    return $numero_elevado;
}
$a = 2;
$b = 6;
$resultado = elevarNumero($a, $b);
echo "<br>El resultado de elevar $a a la potencia $b es: $resultado";
// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
function comprobarVocal($caracter)
{
    $vocales = "AEIOUaeiou";
    return strpos($vocales, $caracter) !== false;
}
$c = "l";

if (comprobarVocal($c)) {
    echo "<br>La letra $c es una vocal.";
} else {
    echo "<br>La letra $c no es una vocal.";
}
// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
function comprobarParImpar($numero)
{
    if (is_numeric($numero) === false) {
        return "<br> No es un número válido";
    }
    if ($numero % 2 == 0) {
        return true;
    } else {
        return false;
    }
}
$num = "5";
$result = comprobarParImpar($num);
echo "<br>";

if ($result === "<br> No es un número válido") {
    echo comprobarParImpar($num) . "<br>";
} elseif (!comprobarParImpar($num)) {
    echo "El número $num es impar.<br>";
} else {
    echo "El número $num es par.<br>";
}

// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
function pasarStringMaisculas($cadenaTexto)
{
    if (is_string($cadenaTexto) === false) {
        return "<br> No es un string válido";
    }
    return strtoupper($cadenaTexto);
}

$t = "noelia";
$r = pasarStringMaisculas($t);
if ($r === "<br> No es un string válido") {
    echo pasarStringMaisculas($t) . "<br>";
} else {
    echo "<br> El resultado de pasar $t a mayúsculas es $r.";
}

// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
function imprimirZonaHorariaPorDefecto(){
    $zonaHorariaPorDefecto = date_default_timezone_get();
    echo "<br>La zona horaria por defecto utilizada en PHP es $zonaHorariaPorDefecto";
}
imprimirZonaHorariaPorDefecto();

/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/
function informacionHoraria(){
    echo "<br> Información sobre la ciudad de Santiago de Compostela <br>";
    echo date("D M d Y"). ', hora de la salida del sol : ' .date_sunrise(time(), SUNFUNCS_RET_STRING, 42.88, -8.54, 90, 2);
    echo "<br>";
    echo date("D M d Y"). ', hora de la puesta de sol : ' .date_sunset(time(), SUNFUNCS_RET_STRING, 42.88, -8.54, 90, 2);
}

echo informacionHoraria();

?>