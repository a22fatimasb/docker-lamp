<?php


require 'flight/autoload.php';
require 'utilidadesBD.php'; 

Flight::register('db', 'PDO', array('mysql:host=db;dbname=pruebas','root','test'));

Flight::route('/', function () {
    echo 'Ejercicios tema 6';
});

Flight::route('GET /clientes', 'get_all_clients');
Flight::route('GET /clientes/@id', 'get_client_by_id');
Flight::route('POST /clientes', 'add_client');
Flight::route('DELETE /clientes', 'delete_client');
Flight::route('PUT /clientes', 'update_client');

Flight::start();
?>



