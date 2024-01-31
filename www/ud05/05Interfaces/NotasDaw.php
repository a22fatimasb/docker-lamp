<?php

include "Notas.php";

class NotasDaw extends Notas implements CalculosCentroEstudios
{
    public function __construct(array $notas)
    {
        parent::__construct($notas);
    }

    // Función que pasa el array a string y lo devuelve. 
    public function toString()
    {
        $listaDeNotas = implode(', ', $this->get_notas());
        return "NotasDaw: $listaDeNotas";
    }
    // Función que devuelve el número de aprobados.
    public function numeroDeAprobados()
    {
        $contadorAprobadas = 0;
        foreach ($this->get_notas() as $nota) {
            if ($nota >= 5) {
                $contadorAprobadas++;
            }
        }
        return $contadorAprobadas;
    }
    // Función que devuelve el número de suspensos.
    public function numeroDeSuspensos()
    {
        $contadorSuspensas = 0;
        foreach ($this->get_notas() as $nota) {
            if ($nota < 5) {
                $contadorSuspensas++;
            }
        }
        return $contadorSuspensas;
    }

    // Función que devuelve la nota media.
    public function notaMedia()
    {
        $sumatorio = 0;
        $tamanho = count($this->get_notas());
        if ($tamanho > 0) {
            $media = 0;
            foreach ($this->get_notas() as $nota) {
                $sumatorio += $nota;
            }
            $media = $sumatorio / $tamanho;
            //Devuelvo la nota media redondeada a dos decimales
            return round($media, 2);;
        }
        return 0;
    }
}
