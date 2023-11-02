<?php
// Declarar la variable de conexión como global
global $conexion;

// Función para establecer la conexión a la base de datos
function establecerConexion()
{
    global $conexion;
    $conexion = new mysqli('db', 'root', 'test', 'dbname');

    // Comprobar la conexión
    if ($conexion->connect_errno) {
        die("Fallo en la conexión: " . $conexion->connect_error);
    }
    echo "<br>Conexión a la base de datos establecida correctamente";
}

// Función para cerrar la conexión a la base de datos
function cerrarConexion()
{
    global $conexion;
    if ($conexion) {
        $conexion->close();
        echo "<br>Conexión a la base de datos cerrada";
    }
}

// Función para crear una base de datos si no existe
function crearBaseDeDatos()
{
    global $conexion;
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    if ($conexion->query($sql)) {
        echo "<br>Base de datos 'tienda' creada correctamente";
    } else {
        echo "<br>Error creando la base de datos 'tienda': " . $conexion->error;
    }
}

// Función para seleccionar la base de datos
function seleccionarBaseDeDatos()
{
    global $conexion;
    if ($conexion->select_db('tienda')) {
        echo "<br>Base de datos 'tienda' seleccionada correctamente";
    } else {
        echo "<br>Error al seleccionar la base de datos 'tienda': " . $conexion->error;
    }
}

// Función para crear una tabla si no existe
function crearTablaUsuarios()
{
    global $conexion;
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(6) AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(50) NOT NULL, 
        apellidos VARCHAR(100) NOT NULL,
        edad INT NOT NULL,
        provincia VARCHAR(50) NOT NULL
    )";
    if ($conexion->query($sql)) {
        echo "<br>Tabla 'usuarios' creada correctamente";
    } else {
        echo "<br>Error creando la tabla 'usuarios': " . $conexion->error;
    }
}

// Función para guardar los datos en la tabla de base de datos.
function guardarUsuarios($nombre, $apellidos, $edad, $provincia)
{
    global $conexion;

    // Preparar la consulta
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, edad, provincia) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("<br>Error en la consulta preparada: " . $conexion->error);
    }
    $stmt->bind_param("ssis", $nombre, $apellidos, $edad, $provincia);
    $stmt->execute();

    echo "<br>Nuevos registros creados correctamente";

    $stmt->close();
}

// Función para listar los usuarios.
function listarUsuarios()
{

    global $conexion;
    //Configuramos una consulta SQL que selecciona las columnas id, nombre y apellido de la tabla Cliente. 
    $sql = "SELECT * FROM usuarios";
    // La siguiente línea de código ejecuta la consulta y coloca los datos resultantes en una variable llamada $resultado.
    $resultados = $conexion->query($sql);

    if ($resultados === false) {
        // La consulta no se ejecutó correctamente, muestra un mensaje de error.
        echo "Error en la consulta: " . mysqli_error($conexion);
    } else if ($resultados->num_rows > 0) {
        //Si se devuelven más de cero filas, la función fetch_assoc()coloca todos los resultados en una matriz asociativa que podemos recorrer. El bucle while() recorre el conjunto de resultados y genera los datos de las columnas id, nombre, apellidos, edad y provincia.
        while ($row = $resultados->fetch_assoc()) {
            echo " <tr> ";
            echo "<td>" . $row['id'] . "</td> ";
            echo "<td>" . $row['nombre'] . "</td> ";
            echo "<td>" . $row['apellidos'] . "</td> ";
            echo "<td>" . $row['edad'] . "</td> ";
            echo "<td>" . $row['provincia'] . "</td> ";
            echo "<td> <a class='btn btn-primary' href=editar.php?id=" . $row['id'] . ">Editar</a> </td>";
            echo "<td> <a class='btn btn-primary' href=borrar.php?id=" . $row['id'] . ">Eliminar</a> </td>";
            echo "</tr> ";
        }
    } else {
        echo "<br>No hay resultados";
    }
}
// Función para modificaciones de usuario.
function modificarUsuario($id, $nombre, $apellidos, $edad, $provincia)
{
    global $conexion;

    // Preparar la consulta
    $stmt = $conexion->prepare("UPDATE usuarios SET nombre=?, apellidos=?, edad=?, provincia=? WHERE id=?");
    $stmt->bind_param("ssisi", $nombre, $apellidos, $edad, $provincia, $id);

    if ($stmt->execute()) {
        echo "<br>Usuario modificado correctamente";
    } else {
        echo "<br>Error modificando el usuario: " . $conexion->error;
    }

    $stmt->close();
}
// Función para eliminar usuario por ID.
function eliminarUsuario($id_usuario)
{
    global $conexion;
    // Preparar la consulta
    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id=?");
    $stmt->bind_param("i", $id_usuario);

    if ($stmt->execute()) {
        echo "<br>Usuario eliminado correctamente";
    } else {
        echo "<br>Error eliminando el usuario: " . $conexion->error;
    }

    $stmt->close();
}
