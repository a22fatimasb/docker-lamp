<?php
require "Empleado.php";
$empleado1 = new Empleado("Fátima", 1700);
$empleado2 = new Empleado("Dani", 2100);
$empleado3 = new Empleado("Lola", 1100);

echo "Número de empleados: " . Empleado::$numEmpleados . "</br>";
echo "Nombre del empleado 1: " . $empleado1->getNombre() . "</br>";
echo "Salario del empleado 1: " . $empleado1->getSalario() . "</br>";
echo "Nombre del empleado 2: " . $empleado2->getNombre() . "</br>";
echo "Salario del empleado 2: " . $empleado2->getSalario() . "</br>";