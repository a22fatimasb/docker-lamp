<?php



include "Figura.php";

class Rectangulo extends Figura{
    private $ancho;
    private $alto;

    public function __construct($ancho, $alto){
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    // Método  para dibujar la figura
    public function dibujar(){
        return "Se dibuja la figura con el ancho " . $this->ancho . " y el alto " . $this->alto;
    }
    
    // Método  para agrandar la figura
    public function agrandar($factor){
        $this->ancho *= $factor;
        $this->alto  *= $factor;
       
    }
    
    // Método  para encoger la figura
     public function encoger($factor){
        $this->ancho /= $factor;
        $this->alto  /= $factor;
     }
}



