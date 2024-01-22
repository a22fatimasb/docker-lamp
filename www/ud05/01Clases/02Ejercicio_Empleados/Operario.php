<?php
require "Empleado.php";
class Operario extends Empleado
{
    private $turno;

    // MÉTODO
    public function __construct($nombre, $salario, $turno)
    {
        parent::__construct($nombre, $salario);
        $this->setTurno($turno);
    }
    // SETTER  and GETTER
    public function setTurno($turno)
    {
        // Los valores permitidos para turno son "diurno" o "nocturno"
        if ($turno == "diurno" || $turno == "nocturno") {
            $this->turno = $turno;
        } else {
            $this->turno = "diurno";
        }
    }

    public function getTurno()
    {
        return $this->turno;
    }
}

?>