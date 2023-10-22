<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Calculadora</title>
    <style>
        label {
            width: 4em;
            float: left;
            text-align: right;
            margin-right: 0.5em;
            display: block;
        }

        .submit input {
            margin-left: 4.5em;
        }

        input {
            color: #781351;
            background: #fee3ad;
            border: 1px solid #781351;
            width: 40px;
        }

        input.submit {
            color: #000;
            background: #ffa20f;
            border: 2px outset #d7b9c9;
            width: 90px;
        }

        fieldset {
            border: 1px solid #781351;
            width: 20em
        }

        legend {
            color: #fff;
            background: #ffa20c;
            border: 1px solid #781351;
            padding: 2px 6px;
        }
    </style>
</head>

<body>
    <form name="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <legend>Calculadora</legend>
            <p><label for="campo1">Núm 1:</label><input name="campo1" value="" /></p>
            <p><label for="campo2">Núm 2:</label><input name="campo2" value="" /></p>
            <p><label for="campo3">Núm 3:</label><input name="campo3" value="" /></p>
            <p><label for="campo4">Núm 4:</label><input name="campo4" value="" /></p>
            <input type="submit" class="submit" name="enviar" value="Calcular" />
        </fieldset>
    </form>
</body>

</html>

<?php

// define variables and set to empty values
$num1 = $num2 = $num3 = $num4 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (test_input($_POST["campo1"]) === -1 || test_input($_POST["campo2"]) === -1 || test_input($_POST["campo3"]) === -1 || test_input($_POST["campo4"]) === -1) {
        echo "<br>Error! Hay que introducir un valor númerico<br>";
    } else {
        $num1 = test_input($_POST["campo1"]);
        $num2 = test_input($_POST["campo2"]);
        $num3 = test_input($_POST["campo3"]);
        $num4 = test_input($_POST["campo4"]);

        // Operaciones aritmeticas
        $suma = $num1 + $num2 + $num3 + $num4;
        $multiplicacion = $num1 * $num2 * $num3 * $num4;
        $division = $num1 / $num3;
        $resto = $num1 % $num2;
        echo "<br>Números recibidos por método POST: $num1, $num2, $num3, $num4 <br>";
        echo "<br>Suma total de los números: " . number_format($suma, 2, ',', '.') . "<br>";
        echo "<br>Multiplicación de lo números: ". number_format($multiplicacion, 2, ',', '.' )."<br>";
        echo "<br>Division entre el primer y tercer número: " . number_format($division, 2) . "<br>";
        echo "<br>Resto entre $num1 y $num2: $resto <br>";
        $resultado = obtenerNumeroMayor($num1, $num2);
        echo "<br>¿El primer número es mayor que el tercero? $resultado <br>";
    }
}
function obtenerNumeroMayor($numero1, $numero2)
{
    if ($numero1 > $numero2) {
        return "Sí";
    }
    return "No";
}
function test_input($campo)
{
    if (empty($campo) || !is_numeric($campo) || !isset($campo)) {
        return -1;
    }
    return $campo;
}
?>