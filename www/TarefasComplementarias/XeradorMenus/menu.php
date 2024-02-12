<?php

class Menu
{
    protected $opciones = array();
    private $tipo;

    public function __construct($dir)
    {

        $tipo = strtolower($dir);
        if ($tipo == "horizontal" || $tipo == "vertical") {
            $this->tipo = $tipo;
        }
    }

    public function insertar($opcion)
    {
        $this->opciones[] = $opcion;
    }

    public function debuxar()
    {
        foreach ($this->opciones as $opcion) {
            $opcion->debuxar();
            if ($this->tipo == "vertical") {
                echo "<br/>";
            } else {
                echo " ";
            }
        }
    }
}



class Opcion
{

    private $titulo;
    private $enlace;
    private $corFondo;

    public function __construct($titulo, $enlace, $cor_fondo)
    {
        $this->titulo = $titulo;
        $this->enlace = $enlace;
        $this->corFondo = $cor_fondo;
    }

    public function debuxar()
    {
        echo '<a style="background-color:' . $this->corFondo . '" href="' . $this->enlace . '">' . $this->titulo . '</a>';
    }
}
