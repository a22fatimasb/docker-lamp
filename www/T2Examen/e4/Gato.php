<?php



class Gato extends Animal implements Mascota{
    public function emitirSonido(){
        return  "Miau, miau";
    }
}