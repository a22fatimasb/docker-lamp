<?php

// Función para establecer la conexión a la base de datos
function establecerConexion()
{

    $conexion = new mysqli('db', 'root', 'test');

    if ($conexion->connect_errno != null) {
        die("Fallo en la conexión: " . $conexion->connect_error . "Con numero" . $conexion->connect_errno);
    }

    return $conexion;
}

// Función para cerrar la conexión a la base de datos
function cerrarConexion($conexion)
{
    if ($conexion) {
        $conexion->close();
        //echo "<br>Conexión a la base de datos cerrada";
    }
}


// Función para crear una base de datos si no existe
function crearBaseDeDatos($conexion)
{

    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    if ($conexion->query($sql)) {
        // echo "<br>Base de datos 'tienda' creada correctamente";
    } else {
        echo "<br>Error creando la base de datos 'tienda': " . $conexion->error;
    }
}

// Función para seleccionar la base de datos
function seleccionarBaseDeDatos($conexion)
{
    global $conexion;
    if ($conexion->select_db('tienda')) {
        //echo "<br>Base de datos 'tienda' seleccionada correctamente";
    } else {
        echo "<br>Error al seleccionar la base de datos 'tienda': " . $conexion->error;
    }
}

// Función para crear una tabla llamada productos.
function crearTablaProductos($conexion)
{
    $sql = "CREATE TABLE IF NOT EXISTS productos(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        descripcion	VARCHAR(100) NOT NULL,
        precio FLOAT NOT NULL,
        unidades FLOAT NOT NULL,
        foto BLOB NOT NULL
    )";

    if (!$conexion->query($sql)) {
        echo "<br>Error creando la tabla 'productos': " . $conexion->error;
    }
}

// Función para dar alta producto
function altaProducto($conexion, $nombre, $descripcion, $precio, $unidades, $foto)
{
    $sql = "INSERT INTO productos (nombre, descripcion, precio, unidades, foto) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die("<br>Error en la consulta preparada: " . $conexion->error);
    }
    $stmt->bind_param("ssdds", $nombre, $descripcion, $precio, $unidades, $foto);
    if ($stmt->execute()) {
        $stmt->close(); // Cerrar el statement después de ejecutar la consulta
        return "<p>Producto registrado correctamente</p>";
    } else {
        return "<p>Error al registrar el producto</p>";
    }
}


// Función para crear una tabla si no existe
function crearTablaUsuarios($conexion)
{
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(6) AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(50) NOT NULL, 
        contrasenha	VARCHAR(255) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        edad INT NOT NULL,
        provincia VARCHAR(50) NOT NULL
    )";
    if ($conexion->query($sql)) {
        // echo "<br>Tabla 'usuarios' creada correctamente";
    } else {
        echo "<br>Error creando la tabla 'usuarios': " . $conexion->error;
    }
}

// Función para guardar los datos en la tabla de base de datos.
function guardarUsuarios($conexion, $nombre, $contrasenha, $apellidos, $edad, $provincia)
{

    // Preparar la consulta
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, contrasenha, apellidos, edad, provincia) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("<br>Error en la consulta preparada: " . $conexion->error);
    }
    $stmt->bind_param("sssis", $nombre, $contrasenha, $apellidos, $edad, $provincia);
    $stmt->execute();
    $stmt->close();
    return "<p>Usuario registrado correctamente</p>";
}

// Función para listar los usuarios.
function listarUsuarios($conexion)
{

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
        echo "<p>No hay resultados</p>";
    }
}
// Función para modificaciones de usuario.
function modificarUsuario($conexion, $id, $nombre, $apellidos, $edad, $provincia)
{

    // Preparar la consulta
    $stmt = $conexion->prepare("UPDATE usuarios SET nombre=?, apellidos=?, edad=?, provincia=? WHERE id=?");
    $stmt->bind_param("ssisi", $nombre, $apellidos, $edad, $provincia, $id);

    if ($stmt->execute()) {
        return "<p>Usuario modificado correctamente</p>";
    } else {
        return "<br>Error modificando el usuario: " . $conexion->error;
    }

    $stmt->close();
}
// Función para eliminar usuario por ID.
function eliminarUsuario($conexion, $id_usuario)
{
    // Preparar la consulta
    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id=?");
    $stmt->bind_param("i", $id_usuario);

    if ($stmt->execute()) {
        return "<p>Usuario eliminado correctamente</p>";
    } else {
        return "<br>Error eliminando el usuario: " . $conexion->error;
    }

    $stmt->close();
}

// Función para consultar usuario por ID
function consultarDatosUsuario($conexion, $id_usuario)
{


    // Preparar la consulta
    $sql = "SELECT * FROM usuarios WHERE id=?";
    $stm = $conexion->prepare($sql);
    $stm->bind_param("i", $id_usuario);

    // Ejecutar la consulta preparada
    $stm->execute();

    // Obtener los resultados
    $resultados = $stm->get_result();

    if ($resultados === false) {
        // La consulta no se ejecutó correctamente, muestra un mensaje de error.
        echo "Error en la consulta: " . mysqli_error($conexion);
    } else if ($resultados->num_rows > 0) {
        // Si se devuelven más de cero filas, retornamos los resultados.
        return  $datosUsuario = mysqli_fetch_assoc($resultados);
    }
}

function verificar_existencia_usuario($conexion, $usuario) {
    $sql = $conexion->prepare("SELECT nombre FROM usuarios WHERE NOMBRE = ?");
    $sql->bind_param("s", $usuario);
    $sql->execute() or die($conexion->error);

    $resultado = $sql->get_result();
    $fila = $resultado->fetch_assoc();
    if($fila == null){
        return false;
    }
    return ($fila['nombre'] == $usuario);
}

function recuperar_contrasenha_usuario($conexion, $usuario) {
    $sql = "SELECT contrasenha FROM usuarios WHERE nombre=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();

    // Verificar si la consulta fue exitosa
    if (!$stmt) {
        throw new Exception("Error al ejecutar la consulta: " . $conexion->error);
    }

    $resultadosConsulta = $stmt->get_result();

    // Verificar si se encontró al usuario y recuperar su contraseña
    if ($resultadosConsulta->num_rows > 0) {
        $usuarioEncontrado = $resultadosConsulta->fetch_assoc();
        return $usuarioEncontrado['contrasenha'];
    } else {
        return false;
    }
}

