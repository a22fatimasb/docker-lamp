<?php 
    
    include("e1.php");
    
    $resultados1 = isImpar($arrayCualquiera);
    $resultados2 = isPar($arrayCualquiera);
   
    echo "<br>Resultado de la función isImpar: <br>";
    print_r($resultados1) ;
    echo "<br>Resultado de la función isPar: <br>";
    print_r($resultados2);
?>