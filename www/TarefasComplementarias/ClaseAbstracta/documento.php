<?php

abstract class Forma {
    abstract protected function getCor();
    abstract protected function setCor($cor);
    public function describe(){
        return "Son un " . get_class($this) . " de cor " . $this->getCor() ;
    }
}

class Triangulo extends Forma{
    private $cor;

    public function getCor(){
        return $this->cor;
    }
    public function setCor($cor){
        $this->cor = $cor;
    }
}

class Rectangulo extends Forma{
    private $cor;

    public function getCor(){
        return $this->cor;
    }
    public function setCor($cor){
        $this->cor = $cor;
    }
}