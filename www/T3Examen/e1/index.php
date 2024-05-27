<?php

/*
Dada la base de datos adjunta "classicmodels", se debe crear una API REST que cumpla las siguientes
especificaciones:
Tabla customers con la ruta /customers:
● GET: Al acceder a esta ruta se debe mostar todos los datos de la tabla. Debes mostrar la
información de un único customer a través de su identificador.
● POST: Se debe poder insertar un customer en la base de datos.
● DELETE: Dado un id se debe poder eliminar un customer.
● PUT: Se podrá modificar de un customer su campo phone.
Haz commit del ejercicio. También puedes hacer push a tu repositorio
*/


require 'flight/autoload.php';

Flight::register('db', 'PDO', array('mysql:host=db;dbname=classicmodels','root','test'));

Flight::route('/', function () {
    echo 'Ejercicio e1 de T3Examen';
});


// customers
Flight::route('GET /customers', 'get_all_customers');
Flight::route('GET /customers/@customerNumber', 'get_customers_by_num');
Flight::route('POST /customers', 'add_customers');
Flight::route('DELETE /customers', 'delete_customers');
Flight::route('PUT /customers', 'update_customers');

function get_all_clients() {
    $setencia = Flight::db()->prepare("SELECT * FROM customers");
    $setencia->execute();
    $datos = $setencia->fetchAll();
    Flight::json($datos);
}
function get_client_by_num($customerNumber) {
    $setencia = Flight::db()->prepare("SELECT * FROM customers WHERE customerNumber = ?");
    $setencia->bindParam(1, $customerNumber);
    $setencia->execute();
    $datos = $setencia->fetch(PDO::FETCH_ASSOC);
    Flight::json($datos);
}

function add_customers() {
   
    $nombre = Flight::request()->data->nombre;
    $apellido = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;
    
    $sql = "INSERT INTO clientes(nombre, apellidos, edad, email, telefono) VALUES (?, ?, ?, ?, ?)";
    $sentencia = Flight::db()->prepare($sql);
    
    $sentencia->bindParam(1, $nombre);
    $sentencia->bindParam(2, $apellido);
    $sentencia->bindParam(3, $edad);   
    $sentencia->bindParam(4, $email);
    $sentencia->bindParam(5, $telefono);
    $sentencia->execute();
   
    Flight::jsonp(["Cliente agregado correctamente."]);
}