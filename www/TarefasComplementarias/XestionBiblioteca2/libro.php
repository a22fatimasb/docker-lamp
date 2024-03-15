<?php


class Libro extends Documento{
    private $titulo;
    private $nome_autor;
    private $num_paxinas;
    

    public function __construct($formato_documento, $ano_publicacion, $titulo, $nome_autor, $num_paxinas){
        parent::__construct($formato_documento, $ano_publicacion);
        $this->nome_autor = $nome_autor;
        $this->num_paxinas = $num_paxinas;
        $this->titulo = $titulo;
    }

    public function mostrar_datos()
    {
        parent::mostrar_datos();
        echo"Título del libro: $this->titulo";
        echo "Autor del libro: $this->nome_autor.<br/>";
        echo "Número de Páginas: $this->num_paxinas.<br/>";
    }
    
}