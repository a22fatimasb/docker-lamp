<?php

class Empleado
{

    //PROPIEDADES
    public $nombre;
    public $salario;
    public static $numEmpleados = 0;

    // Función de constructor al que le pasamos 3 argumentos y lo iguala en el objeto. 
    function __construct($nombre = "", $salario = "")
    {
        $this->nombre = $nombre;
        $this->setSalario($salario);
        self::$numEmpleados++;
    }

    //MÉTODOS
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setSalario($salario)
    {
        // El salario no puede superar los 2000 euros
        $this->salario = ($salario <= 2000) ? $salario : 2000;
    }
    public function getSalario()
    {
        return $this->salario;
    }
}
