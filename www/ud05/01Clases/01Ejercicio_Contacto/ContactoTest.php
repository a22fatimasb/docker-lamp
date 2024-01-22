<?php

require "Contacto.php";

// Crea 3 objetos de la clase Contacto asigna valores a todas sus propiedades 
$contacto1 = new Contacto();
$contacto1->set_nombre("Fátima");
$contacto1->set_apellido("Sánchez Blanco");
$contacto1->set_num_telefono(661165173);
$contacto2 = new Contacto();
$contacto2->set_nombre("Noelia");
$contacto2->set_apellido("Sánchez Blanco");
$contacto2->set_num_telefono(651165173);
$contacto3 = new Contacto("Félix", "Queiruga Balado", 611456987);


// Crear un array de objetos de la clase Contacto
$contactos = array($contacto1, $contacto2, $contacto3);


// Acceder y mostrar la información de cada contacto con los métodos get()
echo "</br>Utilizando los métodos get()";
foreach ($contactos as $contacto) {
    
    echo "</br>Información del contacto:";
    echo "</br>Nombre: " . $contacto->get_nombre();
    echo "</br>Apellido: " . $contacto->get_apellido();
    echo "</br>Número de teléfono: " . $contacto->get_num_telefono();
}

echo "</br>Utilizando el método muestraInformacion()";
// Acceder y mostrar la información de cada contacto con el método muestraInformacion()
foreach ($contactos as $contacto) {
    $contacto->muestraInformacion();
}
