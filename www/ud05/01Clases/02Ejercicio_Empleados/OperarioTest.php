<?php

require "Operario.php";
$operario1 = new Operario("María", 1570, "nocturno");
$operario2 = new Operario("Laura", 2300, "diurno");
$operario3 = new Operario("Raquel", 1300, "diurno");

echo "Número total de empleados: " . Empleado::$numEmpleados . "</br>";
echo "Nombre del operario 1: " . $operario1->getNombre() . "</br>";
echo "Salario del operario 1: " . $operario1->getSalario() . "</br>";
echo "Turno del operario 1: " . $operario1->getTurno() . "</br>";
echo "</br>Nombre del operario 2: " . $operario2->getNombre() . "</br>";
echo "Salario del operario 2: " . $operario2->getSalario() . "</br>";
echo "Turno del operario 2: " . $operario2->getTurno() . "</br>";
?>