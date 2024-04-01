<?php

function get_all_reservation() {
    $setencia = Flight::db()->prepare("SELECT * FROM reservas");
    $setencia->execute();
    $datos = $setencia->fetchAll();
    Flight::json($datos);
}

function get_reservation_by_id($id) {
    $setencia = Flight::db()->prepare("SELECT * FROM reservas WHERE id = ?");
    $setencia->bindParam(1, $id);
    $setencia->execute();
    $hotel = $setencia->fetch(PDO::FETCH_ASSOC);
    Flight::json($hotel);
}

function add_reservation() {
    $id_cliente = Flight::request()->data->id_cliente;
    $id_hotel = Flight::request()->data->id_hotel;
    $fecha_reserva = Flight::request()->data->fecha_reserva;
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;

    
    $sql = "INSERT INTO reservas(id_cliente, id_hotel, fecha_reserva, fecha_entrada, fecha_salida) VALUES (?, ?, ?, ?, ?)";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id_cliente);
    $sentencia->bindParam(2, $id_hotel);
    $sentencia->bindParam(3, $fecha_reserva);   
    $sentencia->bindParam(4, $fecha_entrada);
    $sentencia->bindParam(5, $fecha_salida);
    $sentencia->execute();
   
    Flight::jsonp(["Reserva agregada correctamente."]);
}
function delete_reservation() {
    $id = Flight::request()->data->id;
   
    $sql = "DELETE FROM reservas WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
   
    Flight::jsonp(["Reserva eliminada con id: $id"]);
}

function update_reservation() {
    $id = Flight::request()->data->id;
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;
   
    $sql = "UPDATE reservas SET fecha_entrada=?, fecha_salida=? WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $fecha_entrada);
    $sentencia->bindParam(2, $fecha_salida);
    $sentencia->bindParam(3, $id);
    $sentencia->execute();
   
    Flight::jsonp(["Reserva actualizada correctamente."]);
}
?>