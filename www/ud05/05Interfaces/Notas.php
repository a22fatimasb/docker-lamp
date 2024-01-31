<?php

include "CalculosCentroEstudios.php";

// Crea una clase Notas en un fichero independiente

abstract class Notas implements CalculosCentroEstudios
{
    // Tendrá un atributo llamado notas. Este atributo será un array con diferentes notas enteras.
    private $notas;
    // El constructor
    public function __construct(array $notas)
    {
        $this->notas = $notas;
    }
    //Tendrá una función abstracta toString(). Esta función pasará el array a string y lo devolverá. 
    abstract function toString();

    // Getters and setters
    public function get_notas()
    {
        return $this->notas;
    }
    public function set_notas($notas)
    {
        $this->notas = $notas;
    }
    // Función que devuelve el número de aprobados.
    abstract function numeroDeAprobados();
   
    // Función que devuelve el número de suspensos.
    abstract function numeroDeSuspensos();

    // Función que devuelve la nota media.
    abstract function notaMedia();
}
