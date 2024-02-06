<?php
class Documento
{

    private $formato;
    private $id;
    private $ano_publicacion;

    private static $contadorDocumentos = 0;

    // Método constructor
    public function __construct($formato, $ano_publicacion)
    {
        $this->formato = self::setFormato($formato);
        $this->ano_publicacion = $ano_publicacion;
        $this->id = self::$contadorDocumentos++;
    }

    // Método destructor
    public function __destruct()
    {
        echo "Documento destruido <br/>";
    }

    public function getFormato()
    {
        return $this->formato;
    }
    public function setFormato($formato)
    {
        $formatoIntroducido = strtolower($formato);
        $formatosPermitidos = array("libro", "revista", "dvd");
        foreach ($formatosPermitidos as $tipoFormato) {
            if ($formatoIntroducido == $tipoFormato) {
                $this->formato = $formatoIntroducido;
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAnoPublicacion()
    {
        return $this->ano_publicacion;
    }

    public function modificarAnoPublicacion($ano){
        $this->ano_publicacion = $ano;
    }
}
