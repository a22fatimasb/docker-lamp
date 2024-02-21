<?php
include "documento.php";
$triangulo = new Triangulo();
$triangulo->setCor('Verde');
echo "<br>".$triangulo->describe(); // Mostra: "Son un triángulo de cor verde"

$rectangulo = new Rectangulo();
$rectangulo->setCor('Vermello');
echo "<br>".$rectangulo->describe(); // Mostra: "Son un rectángulo de cor vermello"