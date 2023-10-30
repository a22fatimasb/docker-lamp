<?php
/* 
Utilizando mysql orientado a objetos o procedimental. 
Presento unha aplicación web que nos permita administrar una tabla con usuarios que se conectan a unha tenda de libros.

*/

// Declarar la variable de conexión como global
global $conexion;

//1. Crear la conexión 
function conectarBBDD()
{
    global $conexion;
    $conexion = new mysqli('db', 'root', 'test', 'dbname');
    //2. Comprobar la conexión
    $error = $conexion->connect_errno;
    if ($error != null) {
        die("Fallo en la conexión: " . $conexion->connect_error . "Con numero" . $error);
    }
    echo "Conexión correcta";
}

//3. Cerrar la conexión
function cerarConexionBBDD()
{
    global $conexion;
    $conexion->close();
}

function crearBBDD()
{
    // Crear una base de datos que se llame tienda. Sólo una vez, en el caso de que ya esté creada no volver a crearla.
    global $conexion;
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    if ($conexion->query($sql)) {
        echo "Base de datos creada correctamente";
    } else {
        echo "Error creando la base de datos" . $conexion->error;
    }
}

function seleccionarBBDD()
{
    global $conexion;
    $conexion->select_db('tienda');
    echo "Cambio de base de datos";
}



//Crea una nueva tabla llamada usuarios. Sólo una vez, en el caso de que ya esté creada no volver a crearla. 

function crearTabla()
{
    global $conexion;


    //4. Crear una tabla
    $sql = "CREATE TABLE IF NOT EXISTS usuarios(
        id INT(6) AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(30) NOT NULL, 
        apellidos VARCHAR(100) NOT NULL,
        edad INT NOT NULL,
        provincia VARCHAR(50) NOT NULL
    )";

    if ($conexion->query($sql)) {
        echo "Tabla creada correctamente";
    } else {
        echo "Error creando la tabla" . $conexion->error;
    }
}
