<?php

/* 
Crea dos subclases cada una en el fichero adecuado:

Usuario
Administrador
Implementa el método accion() que muestre el nombre y los apellidos de la persona, así como una frase identificando si es un usuario o un administrador.

Genera los objetos que nos permitan identificar un buen funcionamiento de la aplicación en los ficheros adecuados.
*/


include "Persona.php";
class Administrador extends Persona
{
   
    public function accion(){
        echo "Administrador: " . $this->nombre . " " . $this->apellidos . "</br>";
    }
}