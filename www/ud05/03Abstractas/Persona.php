<?php
/* clase abstracta Persona en Persona.php:

Con las siguientes propiedades:
$id private (private).
$nombre protegida (protected).
$apellidos protegida (protected).
Tiene como métodos abstractos los getters, los setters y el constructor.
Tiene un método abstracto llamado accion().*/

abstract class Persona
{
    private static $id = 0;
    protected $nombre;
    protected $apellidos;

    public function __construct($nombre, $apellidos)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        self::$id++;
    }

    abstract public function get_nombre();
    abstract public function set_nombre($nombre);
    abstract public function get_apellidos();
    abstract public function set_apellidos($apellidos);
    abstract public function accion();
    public static function getId()
    {
        return self::$id;
    }
}
