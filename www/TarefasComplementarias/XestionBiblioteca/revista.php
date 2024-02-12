<?php

//include "documento.php";

class Revista extends Documento
{

    private $titulo;
    private $num_pax;

    public function __construct($formato, $ano_publicacion, $titulo, $num_pax)
    {
        parent::__construct($formato, $ano_publicacion);
        $this->titulo = $titulo;
        $this->num_pax = $num_pax;
    }

    public function mostrarInfo()
    {
        parent::mostrarInfo();
        echo "Título: $this->titulo.<br/>";
        echo "Número de Páginas: $this->num_pax.<br/>";
    }
}
