<?php

include "Animal.php";
include "Perro.php";
include_once "Gato.php";

$perro = new Perro("Scotie", 6);
$gato = new Gato("Xana", 2);

echo $perro->emitirSonido()."<br>";
echo $perro->obtenerNombre()."<br>";
echo $gato->emitirSonido()."<br>";
echo $gato->obtenerNombre()."<br>";
 $gato->set_nombre("Hansi");
 echo "Cambio do nome do gato<br>";
echo $gato->obtenerNombre()."<br>";