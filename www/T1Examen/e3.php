<?php

   
    

function imprimirTabla($coches){


    echo "<table>";
    echo " <tr> ";
    echo "<td> Marca </td>";
    echo "<td> Stock </td>";
    echo "<td> Ventas </td>";
    echo "</tr> ";

    foreach($coches as $coche => $value){
     
    
    if(strlen($value["marca"]) > 4 && $value["ventas"]>10 ){
        echo " <tr> ";
        echo "<td>" . $value["marca"] . "</td> ";
        echo "<td>" . $value["stock"] . "</td> ";
        echo "<td>" . $value["ventas"] . "</td> ";
       
        echo "</tr> ";
        
    }
       
        
    }
    echo "</table>";
    

}
?>