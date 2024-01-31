<?php
//Cree un Trait llamado CalculosCentroEstudios con las mismas funciones que la interfaz del ejercicio anterior.

trait CalculosCentroEstudios
{
    // Función que devuelve el número de aprobados.
    public function numeroDeAprobados(array $notas)
    {
        $contadorAprobadas = 0;
        foreach ($notas as $nota) {
            if ($nota >= 5) {
                $contadorAprobadas++;
            }
        }
        return $contadorAprobadas;
    }

    // Función que devuelve el número de suspensos.
    public function numeroDeSuspensos(array $notas)
    {
        $contadorSuspensas = 0;
        foreach ($notas as $nota) {
            if ($nota < 5) {
                $contadorSuspensas++;
            }
        }
        return $contadorSuspensas;
    }

    // Función que devuelve la nota media.
    public function notaMedia(array $notas)
    {
        $sumatorio = 0;
        $tamanho = count($notas);
        if ($tamanho > 0) {
            $media = 0;
            foreach ($notas as $nota) {
                $sumatorio += $nota;
            }
            $media = $sumatorio / $tamanho;
            // Devuelvo la nota media redondeada a dos decimales
            return round($media, 2);
        }
        return 0;
    }
}
