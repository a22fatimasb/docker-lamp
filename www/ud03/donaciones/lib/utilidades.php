<?php
// Lista de los grupos sanguineos
$grupos_sanguineos = array(null,'O-', 'O+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+');

function generarSelectGS($grupos_sanguineos, $seleccionada = null)
{
    $select = '<select name="grupo_sanguineo">';
    foreach ($grupos_sanguineos as $grupo) {
        $selected = ($seleccionada === $grupo) ? 'selected' : '';
        $select .= "<option value=\"$grupo\" $selected>$grupo</option>";
    }
    $select .= '</select>';
    return $select;
}

/* Función que valide grupo sanguíneo correcto
function validarGrupoSanguineo($campo){
global $grupos_sanguineos;
    foreach($grupos_sanguineos as $grupo){
       if($campo === $grupo){
        return true;
       }
    }
    return false;
}
*/

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

// Función de validación de la longitud permitida en contraseña
function validarLongitudContraseña($contraseña){
    return strlen($contraseña)<=200 && strlen($contraseña)>0;
}
//Validación de Edad:

function validarEdad($edad)
{
    // Verificar que el campo sea mayor a 18 y menor o igual a 65 ya que es la edad en la qu está permitido donar 
    return $edad >= 18 && $edad <= 65;
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


// Función que valide codigo postal

function validarCodigoPostal($campo){
    return preg_match('/^[0-9]{5}$/', $campo);
}

// Función que valide telefono
function validarTelefono($campo){
    return preg_match('/^[0-9]{9}$/', $campo);
}
?>

