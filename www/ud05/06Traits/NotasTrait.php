<?php

include_once "MostrarCalculos.php";

class NotasTrait
{
    use CalculosCentroEstudios, MostrarCalculos;

    private $notas;

    public function __construct(array $notas)
    {
        $this->notas = $notas;
    }

    public function getNotas()
    {
        return $this->notas;
    }
}

// Ejemplo de uso
$notasTrait = new NotasTrait([2, 6, 4, 8, 5, 10]);
$notasTrait->saludar();
$notasTrait->showCalculusStudyCenter($notasTrait->getNotas());
