<?php
class Documento
{

    protected $formato;
    private $id;
    private $ano_publicacion;

    private static $contadorDocumentos = 0;

    // Método constructor
    public function __construct($formato, $ano_publicacion)
    {
        $this->formato = $formato;
        $this->ano_publicacion = $ano_publicacion;
        $this->id = self::$contadorDocumentos++;
    }

    // Método destructor
    public function __destruct()
    {
        echo "Documento destruido <br/>";
    }

    public function mostrarInfo()
    {
        echo "Información del documento con id: $this->id.<br/>";
        echo "Formato: $this->formato.<br/>";
        echo "Año publicación: $this->ano_publicacion.<br/>";
    }

    
    public function getId()
    {
        return $this->id;
    }

    public function getAnoPublicacion()
    {
        return $this->ano_publicacion;
    }

    public function modificarAnoPublicacion($ano)
    {
        $this->ano_publicacion = $ano;
    }

    public function getFormato(){
        return $this->formato;
    }
}
