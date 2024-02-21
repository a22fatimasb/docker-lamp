<?php
/* Edita el fichero e1.php que sólo va a contener código PHP.
Dado un array unidimensional de elementos cualquiera, por ejemplo:
$arrayCualquiera = (4, 7, 4.5, "hola")
Crea una función isPar a la que se le pasa un array como parámetro y devuelve otro array de
booleanos indicando si cada elemento del array es par o no. Para el caso anterior devolvería:
[true,false,false,false]
Crea una función isImpar que haga justo lo contrario y devuelva también un array:
[false,true,false,false]
Prueba las funciones en un script que se llame e1_test.php donde se vea de forma clara que las
funciones están bien hechas.
*/


function isPar($arrayCualquiera)
{
    $resultadoArray = array();
    foreach ($arrayCualquiera as $elemento) {
        if (is_int($elemento)) {
            if ($elemento % 2 === 0) {
                array_push($resultadoArray, true);
            } else {
                array_push($resultadoArray, false);
            }
        } else {
            array_push($resultadoArray, false);
        }
    }

    return $resultadoArray;
}

function isImpar($arrayCualquiera)
{
    $resultadoArray = array();
    foreach ($arrayCualquiera as $elemento) {
        if (is_int($elemento)) {
            if ($elemento % 2 === 0) {
                array_push($resultadoArray, false);
            } else {
                array_push($resultadoArray, true);
            }
        } else {
            array_push($resultadoArray, true);
        }
    }
    return $resultadoArray;
}