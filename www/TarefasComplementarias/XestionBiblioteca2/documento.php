<?php
class Documento {
    private $id;
    private $formato_documento;
    private $ano_publicacion;

    private static $contador_documentos = 0;

    public function __construct($formato_documento, $ano_publicacion){
        $this->formato_documento = $formato_documento;

        $this->ano_publicacion = $ano_publicacion;
        self::$contador_documentos++;
        $this->id =self::$contador_documentos;
    }

    public function __destruct()
    {
        echo "¡¡ Se ha eliminado el documento!!<br/>";
    }

    public function modificar_ano_publicacion($ano_actualizado){
        $this->ano_publicacion = $ano_actualizado;
    }

    public function mostrar_datos(){
        echo "Información del documento con id: $this->id.<br/>";
        echo "Formato: $this->formato_documento.<br/>";
        echo "Año publicación: $this->ano_publicacion.<br/>";
    }

    public function get_formato(){
        return $this->formato_documento;
    }
    public function get_id(){
        return $this->id;
    }
}