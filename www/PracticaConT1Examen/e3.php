<?php
/*
Dado un array multidimensional, que representa nombres de marcas de coches, su stock y las ventas,
como este:
$coches = array (
array("Volvo",22,18),
array("BMW",15,13),
array("Saab",5,2),
array("Land Rover",17,15)
);
Crea una función imprimirTabla que recibe como parámetro un array como el anterior e imprime en
forma de tabla (en html) todos los campos de los subelementos si el nombre del coche tiene más de
cuatro letras y sus ventas son mayores que 10.
Prueba la función en la página e3_test.php. El código HTML generado debe aparecer en el div de la
clase container.

*/

function imprimirTabla($coches)
{
    echo "<table border='1'>
    <tr>
        <th>Marca</th>
        <th>Stock</th>
        <th>Ventas</th>
    </tr>";


    foreach ($coches as $coche) {
        $marca = $coche[0];
        $stock = $coche[1];
        $ventas = $coche[2];

        if (strlen($marca) > 4 && $ventas > 10) {
            echo "<tr>";
            echo "<td>$marca</td>";
            echo "<td>$stock</td>";
            echo "<td>$ventas</td>";
            echo "</tr>";
        }
    }

    echo "</table>";
}
