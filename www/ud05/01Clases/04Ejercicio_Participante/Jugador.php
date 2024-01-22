<?php
include "Participante.php";
class Jugador extends Participante
{
    private $posicion;
    // Método
    function __construct($nombre, $edad, $posicion)
    {
        parent::__construct($nombre, $edad);
        $this->set_posicion($posicion);
    }

    // SETTER  and GETTER
    function set_posicion($posicion)
    {
        $this->posicion= $posicion;
    }

    function get_posicion()
    {
        return $this->posicion;
    }
}
