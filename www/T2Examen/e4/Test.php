<?php

include "Animal.php";
include "Perro.php";
include_once "Gato.php";

$perro = new Perro("Scotie", 6);
$gato = new Gato("Xana", 2);

echo "El perro dice: <br>";
echo $perro->emitirSonido()."<br>";
echo "El nombre del perro es ";
echo $perro->obtenerNombre().".<br>";
echo "La edad del perro es " . $perro->get_edad()."<br>";
echo "El gato dice: <br>";
echo $gato->emitirSonido()."<br>";
echo "El nombre del gato es ";
echo $gato->obtenerNombre()."<br>";
 $gato->set_nombre("Hansi");
 echo "Cambio del nombre del gato<br>";
 echo "Ahora el gato se llama ";
echo $gato->obtenerNombre()."<br>";
echo "La edad del gato es " . $gato->get_edad()."<br>";
$gato->set_edad(15);
echo "Hemos cambiado la edad del gato a ". $gato->get_edad();