<?php

// Crea una clase Contacto en un fichero Contacto.php, con las siguientes propiedades privadas: nombre, apellido y número de teléfono.

class Contacto
{

    // Propiedades privadas
    private $nombre;
    private $apellido;
    private $num_telefono;


    // Función de constructor al que le pasamos 3 argumentos y lo iguala en el objeto. 
    function __construct($nombre = "", $apellido = "", $num = "")
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->num_telefono = $num;
    }

    // Métodos de getters y setters
    function set_nombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function get_nombre()
    {
        return $this->nombre;
    }
    function set_apellido($apellido)
    {
        $this->apellido = $apellido;
    }
    function get_apellido()
    {
        return $this->apellido;
    }
    function set_num_telefono($num)
    {
        $this->num_telefono = $num;
    }
    function get_num_telefono()
    {
        return $this->num_telefono;
    }

    // Método muestraInformacion() que imprima los valores de las propiedades.

    function muestraInformacion()
    {
        echo "</br>Información del contacto: ";
        echo "</br>Nombre: {$this->nombre}";
        echo "</br>Apellido: {$this->apellido}" ;
        echo "</br>Número de teléfono: {$this->num_telefono}";
    }
    // Método __destruct() a la clase, que muestra en pantalla el objeto que se está destruyendo.
    function __destruct()
    {
        echo "</br>El contacto {$this->nombre} {$this->apellido} ha sido borrado.";
    }
}
