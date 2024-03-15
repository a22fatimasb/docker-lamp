<?php

include "Mascota.php";

class Animal implements Mascota{

    protected $nombre;
    protected $edad;

    public function __construct($nombre, $edad){
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    // Getters and Setters
    function set_nombre($nombre){
        $this->nombre = $nombre;
    }

    function get_nombre(){
        return $this->nombre;
    }
    function set_edad($edad){
        $this->edad = $edad;
    }
    function get_edad(){
        return $edad;
    }

    
    public function obtenerNombre(){
        return $this->nombre;
    }

     public function emitirSonido(){}
}