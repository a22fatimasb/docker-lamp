<?php
// Lista de provincias de España
$provincias = array(
    'A Coruña',
    'Álava',
    'Albacete',
    'Alicante',
    'Almería',
    'Asturias',
    'Ávila',
    'Badajoz',
    'Barcelona',
    'Burgos',
    'Cáceres',
    'Cádiz',
    'Cantabria',
    'Castellón',
    'Ciudad Real',
    'Córdoba',
    'Cuenca',
    'Girona',
    'Granada',
    'Guadalajara',
    'Gipuzkoa',
    'Huelva',
    'Huesca',
    'Baleares',
    'Jaén',
    'La Rioja',
    'Las Palmas',
    'León',
    'Lleida',
    'Lugo',
    'Madrid',
    'Málaga',
    'Murcia',
    'Navarra',
    'Ourense',
    'Palencia',
    'Pontevedra',
    'Salamanca',
    'Santa Cruz de Tenerife',
    'Segovia',
    'Sevilla',
    'Soria',
    'Tarragona',
    'Teruel',
    'Toledo',
    'Valencia',
    'Valladolid',
    'Bizkaia',
    'Zamora',
    'Zaragoza'
);

// Función para generar el campo de selección de provincia
function generarSelectProvincias($provincias, $seleccionada = null)
{

    $select = '<select name="provincia">';
    foreach ($provincias as $provincia) {
        $selected = ($seleccionada === $provincia) ? 'selected' : '';
        $select .= "<option value=\"$provincia\" $selected>$provincia</option>";
    }
    $select .= '</select>';
    return $select;
}




// Función de validación de campos Obligatorios
function validarCampoObligatorio($campo)
{
    // Verificar que el campo no esté vacío y que esté definido
    return isset($campo) && !empty($campo);
}

// Función de validación de la longitud permitida en nombre
function validarLongitudNombre($nombre)
{
    // Verificar que el campo sea mayor a 0 y menor o igual a 50 
    return strlen($nombre) <= 50 && strlen($nombre) > 0;
}
// Función de validación de la longitud permitida en apellidos
function validarLongitudApellidos($apellidos)
{
    // Verificar que el campo sea mayor a 0 y menor o igual a 100 
    return strlen($apellidos) <= 100 && strlen($apellidos) > 0;
}

//Validación de Edad:

function validarEdad($edad)
{
    // Verificar que el campo sea mayor a 0 y menor 125 
    return $edad >= 0 && $edad < 125;
}

//Validación de Formato de Datos:
function validarFormatoString($campo)
{

    return preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÜü ]+$/', $campo);
}

// Validación número
function esNumero($num)
{
    return is_numeric($num);
}
