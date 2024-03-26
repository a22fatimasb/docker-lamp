<?php


require 'flight/autoload.php';
require 'funcionesBDClientes.php';
require 'funcionesBDHoteles.php'; 

Flight::register('db', 'PDO', array('mysql:host=db;dbname=pruebas','root','test'));

Flight::route('/', function () {
    echo 'Ejercicios tema 6';
});

// Clientes
Flight::route('GET /clientes', 'get_all_clients');
Flight::route('GET /clientes/@id', 'get_client_by_id');
Flight::route('POST /clientes', 'add_client');
Flight::route('DELETE /clientes', 'delete_client');
Flight::route('PUT /clientes', 'update_client');

// Hoteles
/*

POST: Se debe poder insertar un hotel en la base de datos.
DELETE: Dado un id se debe poder eliminar un hotel.
PUT: Se podrá modificar de un hotel sus direccion, email y teléfono.
*/
Flight::route('GET /hoteles', 'get_all_hotel');
Flight::route('GET /hoteles/@id', 'get_hotel_by_id');
Flight::route('POST /hoteles', 'add_hotel');
Flight::route('DELETE /hoteles', 'delete_hotel');
Flight::route('PUT /hoteles', 'update_hotel');

Flight::start();
?>



