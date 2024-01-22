<?php

include "Arbitro.php";


$arbitro1 = new Arbitro("Stephanie Frappart", 38, 10);
$arbitro2 = new Arbitro("Salima Mukansanga", 35, 8);


echo "Árbitro 1: " . $arbitro1->get_nombre() . ", Edad: " . $arbitro1->get_edad() . ", Años Arbitrando: " . $arbitro1->get_anhos() . "<br>";
echo "Árbitro 2: " . $arbitro2->get_nombre() . ", Edad: " . $arbitro2->get_edad() . ", Años Arbitrando: " . $arbitro2->get_anhos() . "<br>";

$arbitro1->set_anhos(12);
$arbitro1->set_edad(40);
$arbitro1->set_nombre("Yoshimi Yamashita");

echo "Árbitro 1 (actualizada): " . $arbitro1->get_nombre() . ", Edad: " . $arbitro1->get_edad() . ", Años Arbitrando: " . $arbitro1->get_anhos() . "<br>";
?>