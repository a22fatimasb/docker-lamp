<?php


class Revista extends Documento{

    private $titulo;
    private $num_pax;
    
    public function __construct($formato_documento, $ano_publicacion, $titulo, $num_pax) {
        parent::__construct($formato_documento, $ano_publicacion);
        $this->titulo= $titulo;
        $this->num_pax = $num_pax;
       
    }

    public function mostrar_datos()
    {
        parent::mostrar_datos();
        echo"Título de la revista: $this->titulo";
        echo "Número de Páginas: $this->num_pax.<br/>";
    }
}