<?php 

//1. Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea utilizando los valores contenidos en el array.
$num=0;
$contador = 0;
$numerosPares = array();

while ($contador<10) {
    if($num%2==0){
        $numerosPares[]= $num;
        $contador++;
    }
    $num++;
}
foreach($numerosPares as $numero){
    echo $numero."<br>";
}
/* 2. Imprime los valores del array asociativo siguiente usando un foreach:*/
$v[1]=90;
$v[10] = 200;
$v['hola']=43;
$v[9]='e';
echo "<br> Ejercicio 2 <br>";
foreach($v as $key => $value){
    echo $key." = ".$value."<br>";
}
?>