<?php
//include "documento.php";

class Dvd extends Documento
{

    private $num_unidades;
    private $formato_dvd;
    private $titulo;

    // Método constructor
    
    public function __construct($formato, $ano_publicacion, $titulo, $num_unidades, $formato_dvd)
    {
        parent::__construct($formato, $ano_publicacion);
        $this->titulo = $titulo;
        $this->num_unidades = $num_unidades;
        $this->formato_dvd = $formato_dvd;
    }

    public function mostrarInfo()
    {
        parent::mostrarInfo();
        echo "Titulo: $this->titulo.<br/>";
        echo "Número de DVD's que contiene: $this->num_unidades.<br/>";
        echo "Formato del DVD: $this->formato_dvd.<br/>";
    }
}
