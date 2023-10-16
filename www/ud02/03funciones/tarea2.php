<?php 
/**
 * Crea unha función chamada `comprobar_nif()` que reciba un NIF e devolva:
 *  `true` se o NIF é correcto.
 *  false` se o NIF non é correcto.
 * A letra do DNI é unha letra para comprobar que o número introducido anteriormente é correcto. 
 * Para obter a letra do DNI débense levar a cabo os seguintes pasos:
 * Dividimos o número entre 23.
 * Co resto da división anterior, obtemos a letra corresponde na seguinte táboa: 
 */

 $letras = array('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z','S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E');
 
 function comprobar_nif($nif){
    global $letras;

    if(empty($nif) || is_null($nif) || !preg_match('/^\d{8}[A-Za-z]$/', $nif)){
        return "<br> Error con el NIF proporcionado";
    }
    
    $resto_nif = substr($nif,0, 8);
    $letra_nif= strtoupper(substr($nif, -1));
    $resultadoModulo = $resto_nif % 23;

    foreach($letras as $posicion => $letra){
        if($posicion === $resultadoModulo){
          if($letra === $letra_nif){
            return true;
          }
        } 
    }
    return false;
 }
 $dni = "44824980G";
 $resultado = comprobar_nif($dni);
 if($resultado === "<br> Error con el NIF proporcionado"){
    echo comprobar_nif($dni);
 } elseif($resultado === true){
    echo "El NIF es correcto";
 } elseif($resultado === false){
    echo "El NIF es incorrecto";
 }
?>