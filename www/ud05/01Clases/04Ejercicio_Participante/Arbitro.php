<?php
include "Participante.php";

class Arbitro extends Participante
{
    private $anhos;

    // Método
    function __construct($nombre, $edad, $anhos)
    {
        parent::__construct($nombre, $edad);
        $this->set_anhos($anhos);
    }

    // SETTER  and GETTER
    function set_anhos($anhos)
    {

        $this->anhos = $anhos;
    }

    function get_anhos()
    {
        return $this->anhos;
    }
}
