<?php

/* 
A clase ten dúas propiedades:
$x
$y
A clase ten dous métodos:
multiplicar(): devolve $x por $y.
exponencial(): devolve $x elevado a $y.
*/

$obj = new class(2, 8){
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    public function multiplicar(){
        return $this->x * $this->y;

    }

    public function exponencial(){
        return pow($this->x, $this->y);
      
    }
};

echo $obj->multiplicar();
echo "<br>";
echo $obj->exponencial();