<?php
include "Administrador.php";

$administrador1 = new Administrador("Noelia", "Sánchez Blanco");
$administrador2 = new Administrador("Félix", "Queiruga Balado");
echo $administrador1->accion();
echo $administrador2->accion();