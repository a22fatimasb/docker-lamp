<?php

$arrayCualquiera = array(4,7,4.5,"hola");
function isImpar($array){

    $arrayBooleanos = array();

    foreach($array as $valor){
        if(is_int($valor)){
            $numero = $valor;
           
            if($numero % 2 != 0){
                array_push($arrayBooleanos, true);
    
            }else{
                array_push($arrayBooleanos, false);
            }
        }else{
            array_push($arrayBooleanos, false);
        }
        
    }

    return $arrayBooleanos;
}

function isPar($array){

    
    $arrayBooleanos = array();

    foreach($array as $valor){
        if(is_int($valor)){
            
             $numero = $valor;
            if($numero % 2 != 0){
                array_push($arrayBooleanos, false);
    
            }else{
                array_push($arrayBooleanos, true);
            }
        }else{
            array_push($arrayBooleanos, false);
        }
        
    }

    return $arrayBooleanos;
}

 
?>