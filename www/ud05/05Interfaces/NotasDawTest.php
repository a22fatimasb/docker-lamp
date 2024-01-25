<?php
include "NotasDaw.php";

$notasAlumna01 = new NotasDaw(array(5, 6, 3, 6, 3, 7, 3, 7, 2));

echo $notasAlumna01->toString();
echo "</br> Número de asignaturas aprobadas: " . $notasAlumna01->numeroDeAprobados();
echo "</br> Número de asignaturas suspensas: " . $notasAlumna01->numeroDeSuspensos();
echo "</br> Nota media: " . $notasAlumna01->notaMedia();
