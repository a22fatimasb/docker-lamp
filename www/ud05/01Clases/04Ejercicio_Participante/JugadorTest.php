<?php

include "Jugador.php";

$jugadora1 = new Jugador("Alexia Putella", 28, "Centrocampista");
$jugadora2 = new Jugador("Jenni Hermoso", 32, "Delantera");

echo "Jugadora 1: " . $jugadora1->get_nombre() . ", Edad: " . $jugadora1->get_edad() . ", Posición: " . $jugadora1->get_posicion() . "<br>";
echo "Jugadora 2: " . $jugadora2->get_nombre() . ", Edad: " . $jugadora2->get_edad() . ", Posición: " . $jugadora2->get_posicion() . "<br>";


$jugadora1->set_nombre("Olga Carmona");
$jugadora1->set_edad(24);
$jugadora1->set_posicion("Centrocampista");

echo "Jugadora 1 (actualizada): " . $jugadora1->get_nombre() . ", Edad: " . $jugadora1->get_edad() . ", Posición: " . $jugadora1->get_posicion() . "<br>";
