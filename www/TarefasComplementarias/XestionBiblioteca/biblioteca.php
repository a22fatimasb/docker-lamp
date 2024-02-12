<?php

//include "documento.php";

class Biblioteca
{
    // Propiedades
    private $nome;
    private $direccion;
    private $num_tel;
    private $documentos;

    private static $num_bibliotecas = 0;

    // Función de constructor
    function __construct($nome, $direccion, $num_tel)
    {
        $this->nome = $nome;
        $this->direccion = $direccion;
        $this->num_tel = $num_tel;
        self::$num_bibliotecas++;
    }

    // Método destructor
    public function __destruct()
    {
        self::$num_bibliotecas--;
    }

    // Método para dar de alta un documento
    public function darAlta($documento)
    {
        $this->documentos[] = $documento;
    }

    // Método que lista los documentos de una biblioteca
    public function listarDocumentos($formato = "*")
    {
        foreach ($this->documentos as $documento) {
            if ($formato == '*' || ($documento->getFormato() == $formato)) {
                echo $documento->mostrarInfo();
                echo "<br>";
            }
        }
    }

    //Método que dea de baja un documento de una biblioteca por id
    public function darBaja($id)
    {
        foreach ($this->documentos as $clave => $valor) {
            if ($valor->getId() == $id) {
                unset($this->documentos[$clave]);
            }
        }
    }

    // Método para mostrar información de la biblioteca
    public function mostrarInfo()
    {
        echo "Información de la Biblioteca: <br />";
        echo "Nombre: " . self::get_nome() . ".<br />";
        echo "Dirección: " . self::get_direccion() . ".<br />";
        echo "Teléfono: " . self::get_num_tel() . ".<br />";
    }
    // Métodos
    function set_nome($nome)
    {
        $this->nome = $nome;
    }

    function get_nome()
    {
        return $this->nome;
    }

    function set_direccion($direccion)
    {
        $this->direccion = $direccion;
    }

    function get_direccion()
    {
        return $this->direccion;
    }

    function  set_num_tel($num)
    {
        $this->num_tel = $num;
    }

    function get_num_tel()
    {
        return $this->num_tel;
    }

    public static function get_num_bibliotecas()
    {
        return  self::$num_bibliotecas;
    }
}
