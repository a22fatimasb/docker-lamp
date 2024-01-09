<html>

<head>
    <meta charset="utf-8">
    <title>HTML</title>
</head>

<body>
    <h1>Convertir Hora de 24 a 12 horas</h1>
    <div>
        <!-- Aquí va el formulario-->
        <form action="tarea2_2.php" method="post">
            <label>
                Ingrese la hora en formato de 24h: <input type="text" name="hora" pattern="^\d{1,2}:\d{2}$" placeholder="12:00" required>
            </label>
            <br><br>
            <input type="submit" name="submit" value="Enviar">
        </form>

        <?php
        /*Escribir un programa que lea la entrada de la hora de un día en notación 14 horas y muestre la respuesta en notación de 12 horas. 
        Por ejemplo, si introducimos 18:05 debe proporcionar como salida 06:05 PM.
        */
        function convertirHora($tiempo)
        {

            // Dividir los dos componentes de la hora en un array
            $hora = explode(":", $tiempo);
            $horas = $hora[0];
            $minutos = $hora[1];

            // Establecer la abreviatura
            $abreviatura = ($horas >= 12) ? "PM" : "AM";

            // Convertir la hora según el formato de 12 horas
            // A partir de la primera hora del día (0:00 / medianoche a 0:59), añade 12 horas y AM a la hora:
            if ($horas == 0) {
                $horas = 12;
            }

            //Para las horas entre las 13:00 y las 23:59, reste 12 horas y añade PM a la hora:
            if ($horas > 12) {
                $horas -= 12;
            }
            // Devolver la hora en el formato de 12 horas
            return $horas . ":" . $minutos . " " . $abreviatura;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["hora"])) {

                $hora = $_POST["hora"];


                echo "<br>La hora $hora en formato de 12 horas: " .convertirHora($hora);
            }
        }

        ?>
</body>

</html>