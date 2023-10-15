<table>
    <tr>
        <th>Ciudad</th>
        <th>País</th>
        <th>Continente</th>
    </tr>
<?php

$informacion = "Tokyo,Japan,Asia;Mexico City,Mexico,North America;New York City,USA,North America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,South America;Cairo,Egypt,Africa;London,UK,Europe";

// Dividimos la cadena información en grupos de ciudades.
$ciudades = explode(";", $informacion);

// Dividimos la información de cada ciudad
foreach($ciudades as $ciudad){
    $datos = explode(",", $ciudad);
    // Imprimimos las filas de la tabla
    echo "<tr>";
    foreach ($datos as $c){
        echo "<td>$c</td>";
    }
    echo "</tr>";
}
?>
</table>