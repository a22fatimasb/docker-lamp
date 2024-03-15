<?php

include "Rectangulo.php";

$rectanguloPrueba = new Rectangulo(4, 8);
echo "Rectangulo inicial: <br>";
echo $rectanguloPrueba->dibujar()."<br>";
$rectanguloPrueba->agrandar(2);
echo "Rectangulo agrandado por 2 <br>";
echo $rectanguloPrueba->dibujar()."<br>";
$rectanguloPrueba->encoger(4);
echo "Rectangulo encogido por 4 <br>";
echo $rectanguloPrueba->dibujar()."<br>";
