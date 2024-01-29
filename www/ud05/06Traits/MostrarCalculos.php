<?php
include "CalculosCentroEstudios.php";

trait MostrarCalculos
{
    // Función de saludo que muestra “Bienvenido al centro de cálculo”
    function saludar()
    {
        echo "</br>Bienvenido al centro de cálculo";
    }
    // Función showCalculusStudyCenter, que recibe el número de aprobados, suspensos y la calificación promedio y los muestra en la pantalla dándoles formato.
    function showCalculusStudyCenter(array $notas)
    {

        // Crear una instancia de la clase CalculosCentroEstudios
        $objetoCalculos = new class
        {
            use CalculosCentroEstudios;
        };

        $aprobados = $objetoCalculos->numeroDeAprobados($notas);
        $suspensos = $objetoCalculos->numeroDeSuspensos($notas);
        $promedio = $objetoCalculos->notaMedia($notas);

        echo "</br> Número de asignaturas aprobadas: " . $aprobados;
        echo "</br> Número de asignaturas suspensas: " .  $suspensos;
        echo "</br> Nota promedia: " . $promedio;
    }
}
