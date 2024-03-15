<?php

namespace e3;
include "Figura.php";

class Rectangulo extends Figura{
    private $ancho;
    private $alto;

    public function __construct($ancho, $alto){
        $this->ancho = $ancho;
        $this->alto = alto;
    }

    // Método  para dibujar la figura
    public function dibujar(){}
    
    // Método  para agrandar la figura
    public function agrandar($factor){}
    
    // Método  para encoger la figura
     public function encoger($factor){}
}
