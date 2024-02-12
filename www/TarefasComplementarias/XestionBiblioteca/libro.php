<?php

//include "documento.php";

class Libro extends Documento
{
    private $titulo;
    private $nome_autor;
    private $num_pax;

    public function __construct($formato, $ano_publicacion, $titulo, $nome_autor, $num_pax)
    {
        parent::__construct($formato, $ano_publicacion);
        $this->titulo = $titulo;
        $this->nome_autor = $nome_autor;
        $this->num_pax = $num_pax;
    }

    public function mostrarInfo()
    {
        parent::mostrarInfo();
        echo "Título del libro: $this->titulo.<br/>";
        echo "Autor del libro: $this->nome_autor.<br/>";
        echo "Número de Páginas: $this->num_pax.<br/>";
    }
}
