<?php 

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
function comprobarDigito($caracter){
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
function longitudString($cadena){
    if(is_string($cadena)){
    $longitud = strlen($cadena);
    return $longitud;
    } else{
        return 0;
    }
}
$cadena = 1;
if(longitudString($cadena) > 0){
    echo "<br> La longitud es ".longitudString($cadena);
}


// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
function elevarNumero($a, $b){
    $numero_elevado = pow($a, $b);
    return $numero_elevado;
}
$a = 2;
$b = 6;
$resultado = elevarNumero($a, $b);
echo "<br>El resultado de elevar $a a la potencia $b es: $resultado";
// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
function comprobarVocal($caracter){
    $vocales = "AEIOUaeiou";
    return strpos($vocales, $caracter) !== false;
}
$c="l";

if(comprobarVocal($c)){
echo "<br>La letra $c es una vocal.";
} else{
    echo "<br>La letra $c no es una vocal.";
}
// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/
?>