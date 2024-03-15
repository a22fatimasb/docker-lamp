<?php



class Perro extends Animal implements Mascota{
    public function emitirSonido(){
        return  "Guau, guau";
    }
}