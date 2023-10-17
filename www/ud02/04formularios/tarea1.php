<html>

<head>
    <meta charset="utf-8">
    <title>HTML</title>
</head>

<body>
    <div>
        <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Nombre: <input type="text" name="name">
            <br><br>
            Apellidos: <input type="text" name="apellidos">
            <br><br>
            <input type="submit" name="submit" value="Enviar">
        </form>
    </div>

    <div>
        <?php

        /**  Cree un formulario que solicite su nombre y apellido. Cuando se reciben los datos, se debe mostrar la siguiente información:
         * Nombre: `xxxxxxxxx`
         *  Apellidos: `xxxxxxxxx`
         * Nombre y apellidos: `xxxxxxxxxxxx xxxxxxxxxxxx`
         * Su nombre tiene caracteres `X`.
         * Los 3 primeros caracteres de tu nombre son: `xxx`
         * La letra A fue encontrada en sus apellidos en la posición: `X`
         * Tu nombre en mayúsculas es: `XXXXXXXXX`
         * Sus apellidos en minúsculas son: `xxxxxx`
         * Su nombre y apellido en mayúsculas: `XXXXXX XXXXXXXXXX`
         * Tu nombre escrito al revés es: `xxxxxx`
         */

        //Aquí el código php que muestra la información solicitada.

        function longitudString($cadena)
        {
            if (is_string($cadena)) {
                $longitud = strlen($cadena);
                return $longitud;
            } else {
                return 0;
            }
        }
        function primerosCaracteres($cadena)
        {
            if (is_string($cadena)) {
                $caracteres = substr($cadena, 0, 3);
                return $caracteres;
            } else {
                return "";
            }
        }
        function pasarStringMaisculas($cadena)
        {
            if (is_string($cadena) === false) {
                return "";
            }
            return strtoupper($cadena);
        }

        function pasarNombreReves($cadena)
        {
            if (is_string($cadena) === false) {
                return "";
            }
            return strrev($cadena);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["name"]) && !empty($_POST["apellidos"])) {

                $nombre = $_POST["name"];
                $apellidos = $_POST["apellidos"];
                echo "Nombre: " . $nombre;
                echo "<br>";
                echo "Apellidos: " . $apellidos;
                echo "<br>";
                echo "Nombre y apellidos: $nombre $apellidos";
                echo "<br>";
                echo "Su nombre tiene caracteres ";
                if (longitudString($nombre) > 0) {
                    echo longitudString($nombre);
                }
                echo "<br>";
                echo "Los tres primeros caracteres de tu nombre son: ";
                echo primerosCaracteres($nombre);
                echo "<br>";
                echo "Su nombre en mayúsculas es: ";
                echo  pasarStringMaisculas($nombre);
                echo "<br>";
                echo "Tu nombre escrito al revés es: ";
                echo pasarNombreReves($nombre);
            }
        }
        ?>
    </div>
</body>

</html>