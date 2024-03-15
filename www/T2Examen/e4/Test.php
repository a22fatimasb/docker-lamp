<?php

include "Animal.php";
include "Perro.php";
include_once "Gato.php";

$perro = new Perro("Scotie", 6);
$gato = new Gato("Xana", 2);

echo $perro->emitirSonido()."<br>";
echo $perro->obtenerNombre()."<br>";
echo "La edad del perro es " . $perro->get_edad()."<br>";
echo $gato->emitirSonido()."<br>";
echo $gato->obtenerNombre()."<br>";
 $gato->set_nombre("Hansi");
 echo "Cambio del nombre del gato<br>";
echo $gato->obtenerNombre()."<br>";
echo "La edad del gato es " . $gato->get_edad()."<br>";