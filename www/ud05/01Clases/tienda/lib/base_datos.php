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
          contrasenha VARCHAR(255) NOT NULL,
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

function crear_tabla_imagenes_producto($conexion)
{
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


function dar_alta_usuario($conexion, $usuario)
{
    // Obtener los valores de las propiedades del usuario
    $nombre = $usuario->get_nombre();
    $apellidos = $usuario->get_apellidos();
    $edad = $usuario->get_edad();
    $provincia = $usuario->get_provincia();
    $contrasenha = $usuario->get_contrasenha();

    $sql = $conexion->prepare("INSERT INTO usuarios (nombre, contrasenha, apellidos, edad, provincia) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sssis", $nombre, $contrasenha, $apellidos, $edad, $provincia);
    $resultado = $sql->execute() or die($conexion->error);
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

function verificar_existencia_usuario($conexion, $usuario)
{
    $sql = $conexion->prepare("SELECT nombre FROM usuarios WHERE NOMBRE = ?");
    $sql->bind_param("s", $usuario);
    $sql->execute() or die($conexion->error);

    $resultado = $sql->get_result();
    $fila = $resultado->fetch_assoc();
    if ($fila == null) {
        return false;
    }
    return ($fila['nombre'] == $usuario);
}

function recuperar_contrasenha_usuario($conexion, $usuario)
{
    $sql = "SELECT contrasenha FROM usuarios WHERE nombre = '$usuario'";
    $resultado = ejecutar_consulta($conexion, $sql);

    return $resultado->fetch_assoc()['contrasenha'];
}


function cerrar_conexion($conexion)
{
    $conexion->close();
}
