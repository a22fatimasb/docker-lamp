<?php
// Declarar variables como global
global $servername, $username, $password, $conn;
$servername = "db";
$username = "root";
$password = "test";

// Función para establecer la conexión a la base de datos
function establecerConexion()
{
    global $servername, $username, $password, $conn;

    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        throw new Exception("<p>Fallo en conexión: " . $e->getMessage() . "</p>");
    }
}



// Función de cierre de conexión
function cerrarConexion()
{
    global $conn;
    $conn = null;
}


// Función para crear una base de datos si no existe
function crearBaseDeDatos()
{
    try {
        global $conn;
        $sql = "CREATE DATABASE IF NOT EXISTS donacion";
        $conn->exec($sql);
    } catch (PDOException $e) {
        throw new Exception($sql . "<br>" . $e->getMessage());
    }
}

// Función para seleccionar la base de datos
function seleccionarBaseDeDatos()
{
    global $conn;

    try {
        // Seleccionar la base de datos
        $conn->exec('USE donacion');
    } catch (PDOException $e) {
        // Si se produce un error mostrar el mensaje de error
        throw new Exception("Error al seleccionar la base de datos 'donacion': " . $e->getMessage());
    }
}



// Función para crear una tabla donantes
function crearTablaDonantes()
{
    global $conn;

    try {
        $sql = "CREATE TABLE IF NOT EXISTS donantes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(30) NOT NULL,
            apellidos VARCHAR(100) NOT NULL,
            edad INT CHECK (edad > 18) NOT NULL,
            grupo_sanguineo ENUM('O-', 'O+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+') NOT NULL,
            codigo_postal CHAR(5) NOT NULL,
            telefono CHAR(9) NOT NULL
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        throw new Exception("<br>Fallo en la creación de la tabla: " . $e->getMessage());
    }
}
// Función para crear una tabla historico
function crearTablaHistorico()
{
    global $conn;

    try {
        $sql = "CREATE TABLE IF NOT EXISTS historico (
            id INT AUTO_INCREMENT PRIMARY KEY,
            donante INT,
            fechaDonacion DATE,
            fechaProximaDonacion DATE,
            FOREIGN KEY (donante) REFERENCES donantes(id)
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        throw new Exception("<br>Fallo en la creación de la tabla: " . $e->getMessage());
    }
}

// Función crear una tabla administradores

function crearTablaAdministradores()
{
    global $conn;

    try {
        $sql = "CREATE TABLE IF NOT EXISTS administradores (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre_usuario VARCHAR(50) NOT NULL,
            contrasena VARCHAR(200) NOT NULL            
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        throw new Exception("<br>Fallo en la creación de la tabla: " . $e->getMessage());
    }
}

// Función para registrar nuevos donantes.

function registrarDonantes($nombre, $apellidos, $edad, $grupo_sanguineo, $codigo_postal, $telefono)
{
    global $conn;
    try {
        $sql = "INSERT INTO donantes (nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono) 
                VALUES (:nombre, :apellidos, :edad, :grupo_sanguineo, :codigo_postal, :telefono)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo);
        $stmt->bindParam(':codigo_postal', $codigo_postal);
        $stmt->bindParam(':telefono', $telefono);

        $stmt->execute();

        return "<p>Los datos fueron insertados correctamente.</p>";
    } catch (PDOException $e) {
        throw new Exception("<p>Fallo en la inserción de datos: " . $e->getMessage() . "</p>");
    }
}

// Función para mostrar una lista de donantes. Para cada donante, se deben mostrar Registrar donación, Eliminar y Lista de donaciones.
function mostrarListaDonantes()
{
    global $conn;

    try {
        $sql = "SELECT * FROM donantes";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table>";
        echo "<tr><th>Nombre</th><th>Apellidos</th><th>Edad</th><th>Grupo Sanguíneo</th><th>Acciones</th></tr>";

        foreach ($resultados as $row) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellidos'] . "</td>";
            echo "<td>" . $row['edad'] . "</td>";
            echo "<td>" . $row['grupo_sanguineo'] . "</td>";
            echo "<td><a href='donar.php?id=" . $row['id'] . "'>Registrar donación</a> | ";
            echo "<a href='borrar_donante.php?id=" . $row['id'] . "'>Eliminar</a> | ";
            echo "<a href='listar_donaciones.php?id=" . $row['id'] . "'>Lista de donaciones</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        throw new Exception("<br>Error: " . $e->getMessage());
    }
}
// Función para registrar donación
function registrarDonacion($donanteId, $fechaDonacion)
{
    global $conn;
    try {
        $today = date('Y-m-d');  // Solo la fecha actual

        // Verificar que fechaDonacion sea anterior 
        if ($fechaDonacion > $today) {
            return "<p>Error! La fecha de donación no puede ser en el futuro.</p>";
           
        }
        // Verificar que la persona pueda donar
        if (!puedeDonar($donanteId, $fechaDonacion)) {
            return "<p>No ha pasado el tiempo suficiente desde la última donación</p>";
            
        }

        // Calcular la fecha de la próxima donación (4 meses después)
        $fechaProximaDonacion = date('Y-m-d', strtotime($fechaDonacion . ' + 4 months'));

        // Insertar la donación en la tabla de historico
        $sql = "INSERT INTO historico (donante, fechaDonacion, fechaProximaDonacion)
                VALUES (:donanteId, :fechaDonacion, :fechaProximaDonacion)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':donanteId', $donanteId);
        $stmt->bindParam(':fechaDonacion', $fechaDonacion);
        $stmt->bindParam(':fechaProximaDonacion', $fechaProximaDonacion);
        $stmt->execute();

        return "<p>Donación registrada con éxito.</p>";
    } catch (PDOException $e) {
        throw new Exception("<br>Fallo en el registro de la donación: " . $e->getMessage());
    }
}

// Función para registrar nuevos administradores.
function registrarAdministradores($nombre, $contrasena)
{
    global $conn;
    try {
        $sql = "INSERT INTO administradores (nombre_usuario, contrasena) 
                VALUES (:nombre, :contrasena)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':contrasena', $contrasena);

        $stmt->execute();

        return "<p>Los datos fueron insertados correctamente.</p>";
    } catch (PDOException $e) {
        throw new Exception("<p>Fallo en la inserción de datos: " . $e->getMessage() . "</p>");
    }
}

// Función para eliminar un donante y sus donaciones
function eliminarDonante($donanteId)
{
    global $conn;
    try {
        // Iniciar una transacción para garantizar la integridad de los datos
        $conn->beginTransaction();

        // Eliminar las donaciones del donante de la tabla historico
        $sqlEliminarDonaciones = "DELETE FROM historico WHERE donante = :donanteId";
        $stmtEliminarDonaciones = $conn->prepare($sqlEliminarDonaciones);
        $stmtEliminarDonaciones->bindParam(':donanteId', $donanteId);
        $stmtEliminarDonaciones->execute();

        // Eliminar el donante de la tabla donantes
        $sqlEliminarDonante = "DELETE FROM donantes WHERE id = :donanteId";
        $stmtEliminarDonante = $conn->prepare($sqlEliminarDonante);
        $stmtEliminarDonante->bindParam(':donanteId', $donanteId);
        $stmtEliminarDonante->execute();

        // Confirmar la transacción
        $conn->commit();

        return "<p>Donante y sus donaciones eliminados con éxito.</p>";
    } catch (PDOException $e) {
        // En caso de error, revertir la transacción
        $conn->rollBack();

        throw new Exception("<p>Fallo en la eliminación del donante: " . $e->getMessage() . "</p>");
    }
}

// Función para mostrar una lista de donaciones de un donante dado.
// La página debe mostrar un encabezado con nombre, apellido, edad y grupo sanguíneo y todos los datos de sus donaciones ordenadas por fecha decreciente.
function mostrarListaDonacionesDeDonante($donanteId)
{
    global $conn;

    try {
        // Consulta para obtener la información del donante
        $sqlDonante = "SELECT nombre, apellidos, edad, grupo_sanguineo FROM donantes WHERE id = :donanteId";
        $stmtDonante = $conn->prepare($sqlDonante);
        $stmtDonante->bindParam(':donanteId', $donanteId);
        $stmtDonante->execute();

        $donanteInfo = $stmtDonante->fetch(PDO::FETCH_ASSOC);

        if (!$donanteInfo) {
            echo "No se encontró el donante.";
            return;
        }

        echo "<h2>Información del Donante</h2>";
        echo "<strong>Nombre:</strong> " . $donanteInfo['nombre'] . "<br>";
        echo "<strong>Apellidos:</strong> " . $donanteInfo['apellidos'] . "<br>";
        echo "<strong>Edad:</strong> " . $donanteInfo['edad'] . "<br>";
        echo "<strong>Grupo Sanguíneo:</strong> " . $donanteInfo['grupo_sanguineo'] . "<br><br>";

        // Consulta para obtener las donaciones del donante
        $sqlDonaciones = "SELECT fechaDonacion, fechaProximaDonacion FROM historico WHERE donante = :donanteId ORDER BY fechaDonacion DESC";
        $stmtDonaciones = $conn->prepare($sqlDonaciones);
        $stmtDonaciones->bindParam(':donanteId', $donanteId);
        $stmtDonaciones->execute();

        $donaciones = $stmtDonaciones->fetchAll(PDO::FETCH_ASSOC);

        echo "<h2>Lista de Donaciones</h2>";
        if (count($donaciones) > 0) {
            echo "<table>";
            echo "<tr><th>Fecha de Donación</th><th>Fecha de Próxima Donación</th></tr>";

            foreach ($donaciones as $donacion) {
                echo "<tr>";
                echo "<td>" . $donacion['fechaDonacion'] . "</td>";
                echo "<td>" . $donacion['fechaProximaDonacion'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            return "<p>Este donante no tiene donaciones registradas.</p>";
        }
    } catch (PDOException $e) {
        throw new Exception("<br>Error: " . $e->getMessage());
    }
}

function buscarDonantes($codigoPostal, $tipoSangre = null)
{
    global $conn;

    try {
        // Agregamos comodines % al código postal cuando solo se proporciona el código postal
        $codigoPostalLike = "%" . $codigoPostal . "%";


        $sql = "SELECT d.id, d.nombre, d.apellidos, d.edad, d.grupo_sanguineo, MAX(h.fechaDonacion) AS ultimaDonacion
                FROM donantes d
                LEFT JOIN historico h ON d.id = h.donante
                WHERE d.codigo_postal LIKE :codigoPostalLike";


        if ($tipoSangre !== null) {
            $sql .= " AND d.grupo_sanguineo LIKE :tipoSangre";
        }

        $sql .= " GROUP BY d.id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':codigoPostalLike', $codigoPostalLike);

        if ($tipoSangre !== null) {
            $stmt->bindParam(':tipoSangre', $tipoSangre);
        }

        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultados) > 0) {
            echo "<h2>Donantes encontrados</h2>";
            echo "<table>";
            echo "<tr><th>Nombre</th><th>Apellidos</th><th>Edad</th><th>Grupo Sanguíneo</th></tr>";

            foreach ($resultados as $row) {
                $puedeDonar = true; // Inicializamos a true puedeDonar ya que por defecto suponemos que puede


                if ($row['ultimaDonacion'] !== null) {
                    // Calcular la diferencia en meses
                    $fechaUltimaDonacion = new DateTime($row['ultimaDonacion']);
                    $fechaHoy = new DateTime();
                    // Usamo diff para calcular la diferencia entre los dos objetos DateTime (la fecha actual y la fecha de la última donación)
                    $diferencia = $fechaUltimaDonacion->diff($fechaHoy);

                    if ($diferencia->m < 4) {
                        $puedeDonar = false; // No puede donar si no han pasado 4 meses
                    }
                }

                // Mostrar los donantes que cumplen con los criterios
                if ($puedeDonar) {

                    echo "<tr>";
                    echo "<td>" . (isset($row['nombre']) ? $row['nombre'] : '') . "</td>";
                    echo "<td>" . (isset($row['apellidos']) ? $row['apellidos'] : '') . "</td>";
                    echo "<td>" . (isset($row['edad']) ? $row['edad'] : '') . "</td>";
                    echo "<td>" . $row['grupo_sanguineo'] . "</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        } else {
            return "<p>No se encontraron donantes que cumplan con los criterios de búsqueda.</p>";
        }
    } catch (PDOException $e) {
        throw new Exception("<br>Error: " . $e->getMessage());
    }
}

function puedeDonar($donanteId, $fechaDonacion)
{
    global $conn;
    try {
        // Obtener la fecha de la última donación
        $sqlUltimaDonacion = "SELECT MAX(fechaDonacion) AS ultimaDonacion
                              FROM historico
                              WHERE donante = :donanteId";
        $stmtUltimaDonacion = $conn->prepare($sqlUltimaDonacion);
        $stmtUltimaDonacion->bindParam(':donanteId', $donanteId);
        $stmtUltimaDonacion->execute();

        $ultimaDonacion = $stmtUltimaDonacion->fetchAll(PDO::FETCH_ASSOC);

        $ultimaDonacion = $ultimaDonacion[0]['ultimaDonacion'];
        if ($ultimaDonacion !== null) {
            // Verificar si han pasado 4 meses desde la última donación
            $fechaUltimaDonacion = new DateTime($ultimaDonacion);
            $fechaDonacion = new DateTime($fechaDonacion);

            // Calcular la diferencia en días
            $diferencia = $fechaUltimaDonacion->diff($fechaDonacion);
            $diferenciaEnDias = $diferencia->days;

            if ($diferenciaEnDias < 120) { // 4 meses = 120 días
                return false;
            }
        }

        return true;
    } catch (PDOException $e) {
        throw new Exception("<br>Fallo en la consulta de datos: " . $e->getMessage());
    }
}
