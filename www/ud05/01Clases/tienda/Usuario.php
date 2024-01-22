<?php
class Usuario
{
    private $nombre;
    private $apellidos;
    private $edad;
    private $provincia;
    private $contrasenha;

    function __construct($nombre, $apellidos, $edad, $provincia, $contrasenha)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        $this->provincia = $provincia;
        $this->contrasenha = $contrasenha;
    }

    // Métodos get()
    function get_nombre()
    {
        return $this->nombre;
    }
    function get_apellidos()
    {
        return $this->apellidos;
    }
    function get_edad()
    {
        return $this->edad;
    }
    function get_provincia()
    {
        return $this->provincia;
    }

    function get_contrasenha()
    {
        return $this->contrasenha;
    }
}
