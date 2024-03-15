<?php
class Biblioteca{
    private $nome;
    private $direccion;
    private $num_telefono;
    private $documentos;
    private static $contador_bibliotecas = 0;

    public function __construct($nome, $direccion, $num_telefono)
    {
        $this->nome = $nome;
        $this->direccion = $direccion;
        $this->num_telefono = $num_telefono;
        self::$contador_bibliotecas++;
    }

    
}