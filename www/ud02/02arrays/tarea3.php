<?php 

/*
1. Crea una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive).
Uso de la función [rand](https://www.php.net/manual/es/function.rand.php). 
Imprima la matriz creada anteriormente.
*/ 
$matriz = array();
$matrizposicion= 30;

while($matrizposicion!=0){
    $matriz[$matrizposicion]=  rand(0, 20);
    $matrizposicion--;
}
foreach($matriz as $numero){
    echo "<br> $numero";
}
/* 
2. (Optativo) Cree una matriz con los siguientes datos: 
`Batman`, `Superman`, `Krusty`, `Bob`, `Mel` y `Barney`.
    - Elimine la última posición de la matriz. 
    - Imprima la posición donde se encuentra la cadena 'Superman'. 
    - Agregue los siguientes elementos al final de la matriz: `Carl`, `Lenny`, `Burns` y `Lisa`. 
    - Ordene los elementos de la matriz e imprima la matriz ordenada. 
    - Agregue los siguientes elementos al comienzo de la matriz: `Apple`, `Melon`, `Watermelon`.
*/
echo "<br> Ejercicio 2 <br>";
$personajes = ["Batman", "Superman", "Krusty", "Bob", "Mel", "Barney"];

 // Elimine la última posición de la matriz. 
    array_pop($personajes);
 // Imprima la posición donde se encuentra la cadena 'Superman'. 
    $key = array_search("Superman", $personajes);
    if($key !== false){
        $position = $key +1;
    echo "La posición de Superman en el array es: ".$position;
    }else{
        echo "Superman no se encontró en el array";
    }
 // Agregue los siguientes elementos al final de la matriz: `Carl`, `Lenny`, `Burns` y `Lisa`. 
    array_push($personajes, "Carl", "Lenny", "Burns","Lisa");
 // Ordene los elementos de la matriz e imprima la matriz ordenada. 
    sort($personajes);
    echo"<br> Matriz ordenada:";
    foreach($personajes as $personaje){
        echo "<br> $personaje";
    }
 // Agregue los siguientes elementos al comienzo de la matriz: `Apple`, `Melon`, `Watermelon`.
    array_unshift($personajes, "Apple", "Melon", "Watermelon");
    echo "<br> Matriz con elementos agregados al inicio:";
    foreach($personajes as $personaje){
        echo "<br> $personaje";
    }
/*3. (Optativo) Cree una copia de la matriz con el nombre `copia` con elementos del 3 al 5.
    - Agregue el elemento 'Pera' al final de la matriz. */ 
    $copia = array_slice($personajes, 2 , 3);
    $copia[]= "Pera";
    echo "<br>Copia de la matriz con elementos del 3 al 5.";
    foreach($copia as $value){
        echo "<br> $value";
    }

?>