<?php


class Alien
{
    // Atributos
    private $nombre;
    private  static  $numberOfALiens = 0; // atributo estático 

    //Constructor
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        // Cada vez que se crea un nuevo Alien incrementamos uno a numberOfAliens.
        self::$numberOfALiens ++;
    }

    // Método que devuelve la cantidad total de objetos de la clase ALien
    public static function getNumberOfAliens(){
        return self::$numberOfALiens;
    }
}
