<?php

class Participante
{
    private $nombre;
    private $edad;

    function __construct($nombre = "", $edad = 0)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    function get_nombre(){
        return $this->nombre;
    }
    function set_nombre($nombre){
        $this->nombre = $nombre;
    }

    function get_edad(){
        return $this->edad;
    }
    function set_edad($edad){
        $this->edad = $edad;
    }
}
