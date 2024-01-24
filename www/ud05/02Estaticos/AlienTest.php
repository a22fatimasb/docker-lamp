<?php
include "Alien.php";

$alien1 = new Alien("Asari");
$alien2 = new Alien("Klingon");
$alien3 = new Alien("Greys");

echo "El número total de aliens contabilizados es: " . Alien::getNumberOfAliens();
