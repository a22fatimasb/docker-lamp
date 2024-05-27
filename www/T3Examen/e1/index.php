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

function get_all_customers() {
    $setencia = Flight::db()->prepare("SELECT * FROM customers");
    $setencia->execute();
    $datos = $setencia->fetchAll();
    Flight::json($datos);
}
function get_customers_by_num($customerNumber) {
    $setencia = Flight::db()->prepare("SELECT * FROM customers WHERE customerNumber = ?");
    $setencia->bindParam(1, $customerNumber);
    $setencia->execute();
    $datos = $setencia->fetch(PDO::FETCH_ASSOC);
    Flight::json($datos);
}

function add_customers() {
   
    $customerNumber = Flight::request()->data->customerNumber;
    $customerName = Flight::request()->data->customerName ;
    $contactLastName = Flight::request()->data->contactLastName;
    $contactFirstName = Flight::request()->data->contactFirstName;
    $phone = Flight::request()->data->phone;
    $addressLine1 = Flight::request()->data->addressLine1;
    $addressLine2 = Flight::request()->data->addressLine2;
    $city = Flight::request()->data->city;
    $state = Flight::request()->data->state;
    $postalCode = Flight::request()->data->postalCode ;
    $country = Flight::request()->data->country ;
    $salesRepEmployeeNumber = Flight::request()->data->salesRepEmployeeNumber;
    $creditLimit = Flight::request()->data->creditLimit;
    
    $
    $sql = "INSERT INTO customers(customerNumber, customerName , contactLastName, contactFirstName, phone , addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $sentencia = Flight::db()->prepare($sql);
    
    $sentencia->bindParam(1, $customerNumber);
    $sentencia->bindParam(2, $customerName);
    $sentencia->bindParam(3, $contactLastName);   
    $sentencia->bindParam(4, $contactFirstName);
    $sentencia->bindParam(5, $phone);
    $sentencia->bindParam(6, $addressLine1);
    $sentencia->bindParam(7, $addressLine2);
    $sentencia->bindParam(8, $city);   
    $sentencia->bindParam(9, $state);
    $sentencia->bindParam(10, $postalCode);
    $sentencia->bindParam(11, $country);   
    $sentencia->bindParam(12, $salesRepEmployeeNumber);
    $sentencia->bindParam(13, $creditLimit);
    $sentencia->execute();
   
    Flight::jsonp(["Customer agregado correctamente."]);
}

function delete_customers() {
    $customerNumber = Flight::request()->data->customerNumber;
   
    $sql = "DELETE FROM customers WHERE customerNumber = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $customerNumber);
    $sentencia->execute();
   
    Flight::jsonp(["Customer eliminado con id: $id"]);
}

function update_customers() {
    $customerNumber = Flight::request()->data->customerNumber;
    $phone = Flight::request()->data->phone;
   
    $sql = "UPDATE customers SET phone=? WHERE customerNumber = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $phone);
    $sentencia->bindParam(2, $customerNumber);
    
    $sentencia->execute();
   
    Flight::jsonp(["Customer actualizado correctamente."]);
}

Flight::start();