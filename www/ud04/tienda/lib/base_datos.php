<?php

function get_conexion()
{
    $conexion = new mysqli('db', 'root', 'test');

    if ($conexion->connect_errno != null) {
        die("Fallo en la conexión: " . $conexion->connect_error . "Con numero" . $conexion->connect_errno);
    }

    return $conexion;
}

function seleccionar_bd_tienda($conexion)
{
    return $conexion->select_db("tienda");
}

function ejecutar_consulta($conexion, $sql)
{
    $resultado = $conexion->query($sql);

    if ($resultado == false) {
        die($conexion->error);
    }

    return $resultado;
}

function crear_bd_tienda($conexion)
{
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    ejecutar_consulta($conexion, $sql);
}

function crear_tabla_usuarios($conexion)
{

    $sql = "CREATE TABLE IF NOT EXISTS usuarios(
          id INT(6) AUTO_INCREMENT PRIMARY KEY , 
          nombre VARCHAR(50) NOT NULL , 
          password VARCHAR(50) NOT NULL,
          apellidos VARCHAR(100) NOT NULL ,
          edad INT (3) NOT NULL ,
          provincia VARCHAR(50) NOT NULL)";

    ejecutar_consulta($conexion, $sql);
}

function crear_tabla_productos($conexion)
{

    $sql = "CREATE TABLE IF NOT EXISTS productos(
        id INT(6) AUTO_INCREMENT PRIMARY KEY ,
        nombre VARCHAR(50) NOT NULL , 
        descripcion	VARCHAR(100) NOT NULL ,
        precio FLOAT NOT NULL ,
        unidades FLOAT NOT NULL)";
    ejecutar_consulta($conexion, $sql);
}

function crear_tabla_imagenes_producto($conexion){
    $sql = "CREATE TABLE IF NOT EXISTS imagenes_producto(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        id_producto INT(6) NOT NULL,
        imagen BLOB NOT NULL,
        FOREIGN KEY (id_producto) REFERENCES productos(id)
    )";
    ejecutar_consulta($conexion, $sql);
}

function listar_usuarios($conexion)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}

function get_usuario($conexion, $id)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios
            WHERE id=$id";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}

function editar_usuario($conexion, $id, $nombre, $apellidos, $edad, $provincia)
{
    $sql = "UPDATE usuarios
            SET nombre='$nombre' ,apellidos='$apellidos' ,edad='$edad',provincia='$provincia'
            WHERE id=$id;";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}


function dar_alta_usuario($conexion, $nombre, $apellidos, $edad, $provincia)
{
    $sql = $conexion->prepare("INSERT INTO usuarios (nombre,apellidos,edad,provincia) VALUES (?,?,?,?)");
    $sql->bind_param("ssss", $nombre, $apellidos, $edad, $provincia);
    return $sql->execute() or die($conexion->error);
}

function dar_alta_producto($conexion, $nombre, $descripcion, $precio, $unidades, $imagenes)
{
    // Insertar datos del producto en la tabla productos
    $sql = $conexion->prepare("INSERT INTO productos (nombre, descripcion, precio, unidades) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssdd", $nombre, $descripcion, $precio, $unidades);
    $sql->execute() or die($conexion->error);

    // Obtener el ID del producto 
    $producto_id = $sql->insert_id;

    // Insertar las imágenes en la tabla imagenes_producto
    foreach ($imagenes as $imagen) {
        $sql = $conexion->prepare("INSERT INTO imagenes_producto (id_producto, imagen) VALUES (?, ?)");
        $sql->bind_param("ib", $producto_id, $imagen);
        $sql->send_long_data(1, $imagen);
        $sql->execute() or die($conexion->error);
    }
}

function borrar_usuario($conexion, $id)
{
    $sql = "DELETE FROM usuarios
            WHERE id=$id";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}

function cerrar_conexion($conexion)
{
    $conexion->close();
}
