<?php
/* La clase tiene dos propiedades:
$base
$altura
La clase tiene dos métodos:
area(): devolve la (base * altura) / 2 .*/

$obj = new class($base = 0, $altura = 0)
{
    private $base;
    private $altura;

    public function __construct($base, $altura)
    {
        $this->base = $base;
        $this->altura = $altura;
    }
    public function area()
    {
        return $this->base * $this->altura / 2;
    }
};


$triangulo1 = clone $obj;
$triangulo1->__construct(3, 4);
echo "</br>Área de triangulo 1: " . $triangulo1->area();

$triangulo2 = clone $obj;
$triangulo2->__construct(8, 10);
echo "</br>Área de triangulo 2: " . $triangulo2->area();
