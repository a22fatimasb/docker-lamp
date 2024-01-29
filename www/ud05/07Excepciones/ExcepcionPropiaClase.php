<?php

// Crea una clase llamada ExcepcionPropiaClase, con un método estático testNumber que recibe un número. 
// Si el número es cero lanza una excepción del tipo ExcepcionPropia. La excepción no se atrapa dentro de esta clase.


include "ExcepcionPropia.php";

class ExcepcionPropiaClase extends ExcepcionPropia
{
    public static function testNumber($numero)
    {
        if ($numero == 0) {
            throw new ExcepcionPropia('</br>Número igual a cero.');
        }
        return 'Éxito: Número no es cero.';
    }
}
