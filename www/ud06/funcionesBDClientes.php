<?php

function get_all_clients() {
    $setencia = Flight::db()->prepare("SELECT * FROM clientes");
    $setencia->execute();
    $datos = $setencia->fetchAll();
    Flight::json($datos);
}

function get_client_by_id($id) {
    $setencia = Flight::db()->prepare("SELECT * FROM clientes WHERE id = ?");
    $setencia->bindParam(1, $id);
    $setencia->execute();
    $cliente = $setencia->fetch(PDO::FETCH_ASSOC);
    Flight::json($cliente);
}

function add_client() {
    $id = Flight::request()->data->id;
    $nombre = Flight::request()->data->nombre;
    $apellido = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;
    
    $sql = "INSERT INTO clientes(id, nombre, apellidos, edad, email, telefono) VALUES (?, ?, ?, ?, ?, ?)";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->bindParam(2, $nombre);
    $sentencia->bindParam(3, $apellido);
    $sentencia->bindParam(4, $edad);   
    $sentencia->bindParam(5, $email);
    $sentencia->bindParam(6, $telefono);
    $sentencia->execute();
   
    Flight::jsonp(["Cliente agregado correctamente."]);
}

function delete_client() {
    $id = Flight::request()->data->id;
   
    $sql = "DELETE FROM clientes WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
   
    Flight::jsonp(["Cliente eliminado con id: $id"]);
}

function update_client() {
    $id = Flight::request()->data->id;
    $apellido = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;
   
    $sql = "UPDATE clientes SET apellidos=?, edad=?, email=?, telefono=? WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $apellido);
    $sentencia->bindParam(2, $edad);
    $sentencia->bindParam(3, $email);
    $sentencia->bindParam(4, $telefono);
    $sentencia->bindParam(5, $id);
    $sentencia->execute();
   
    Flight::jsonp(["Cliente actualizado correctamente."]);
}
?>
