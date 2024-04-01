<?php

function get_all_hotel() {
    $setencia = Flight::db()->prepare("SELECT * FROM hoteles");
    $setencia->execute();
    $datos = $setencia->fetchAll();
    Flight::json($datos);
}

function get_hotel_by_id($id) {
    $setencia = Flight::db()->prepare("SELECT * FROM hoteles WHERE id = ?");
    $setencia->bindParam(1, $id);
    $setencia->execute();
    $hotel = $setencia->fetch(PDO::FETCH_ASSOC);
    Flight::json($hotel);
}

function add_hotel() {
    $hotel = Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;
    
    $sql = "INSERT INTO hoteles(hotel, direccion, email, telefono) VALUES (?, ?, ?, ?)";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $hotel);
    $sentencia->bindParam(2, $direccion);   
    $sentencia->bindParam(3, $email);
    $sentencia->bindParam(4, $telefono);
    $sentencia->execute();
   
    Flight::jsonp(["Hotel agregado correctamente."]);
}
function delete_hotel() {
    $id = Flight::request()->data->id;
   
    $sql = "DELETE FROM hoteles WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
   
    Flight::jsonp(["Hotel eliminado con id: $id"]);
}

function update_hotel() {
    $id = Flight::request()->data->id;
    $direccion = Flight::request()->data->direccion;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;
   
    $sql = "UPDATE hoteles SET direccion=?, email=?, telefono=? WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $direccion);
    $sentencia->bindParam(2, $email);
    $sentencia->bindParam(3, $telefono);
    $sentencia->bindParam(4, $id);
    $sentencia->execute();
   
    Flight::jsonp(["Hotel actualizado correctamente."]);
}
?>