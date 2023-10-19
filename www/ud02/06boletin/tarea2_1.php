<?php
/*
Tarea 2.1. Expresiones.
1.¿Cuál es el resultado de las siguientes expresiones?. Comprueba el resultado.

70 * 10 – 5 % 3 * 4 + “9”
(( 5 + 3) / 2 * 3) / 2 - (int) 28.75 / 4 + 29 % 3 * 4
$r =’C’ – (double) 5 / 2 + 3.5 + 0.4 (Nota ‘C’ é o ascii: 67)
*/

$operacion = 70 * 10 - 5 % 3 * 4 + "9";
echo $operacion;
echo '<br>';
// El resultado es 701. Realiza la multiplicación de 70 * 10 = 700. Despues el módulo de 5 % 3 = 2 y por último la multiplicación 2 * 4 = 8.
// El "9" lo interpreta como número. Así que al final la operación es 700 - 8 + 9 = 701.

$operacion = ((5 + 3) / 2 * 3) / 2 - (int) 28.75 / 4 + 29 % 3 * 4;
echo $operacion;
echo '<br>';
// El resultado es 7. Primero se hacen las operaciones dentro del paréntesis. (( 5 + 3) / 2 * 3) que dá 12. 12 dividimolo por 2 = 6.
//(int) 28.75 / 4 = 7 ya que pasarlo a int hace redondearlo a 7. Despues ya seria la multiplicación de 2 * 4 = 8. Todo esto hace que la operación final 
// sería 6 - 7 + 8 = 7.

//$r ='C' - (double) 5 / 2 + 3.5 + 0.4;
//secho $r;
echo '<br>';
// Dá error porque 'C' se interpreta como una cadena y no como el ascii: 67. 1.4


/*
2. Indica cuál sería la salida del siguiente programa:
    - $m = 99;
    - $n = ++$m;
    - echo “m = $m, n = $n\n”;
    - $n = $m++;
    - echo “m = $m, n = $n\n”;
    - printf(“m = %d \n”, $m++); // printf é unha func. de C para imprimir que se pode empregar en PHP.
    - printf(“m = %d \n”,++$m);
*/
$m = 99;
$n = ++$m;
echo "m = $m, n = $n\n";
echo '<br>';
$n = $m++;
echo "m = $m, n = $n\n";
echo '<br>';
printf("m = %d \n", $m++); // printf é unha func. de C para imprimir que se pode empregar en PHP.
echo '<br>';
printf("m = %d \n", ++$m);

/*
Los resultados son:
En el primer caso cuando asignamos a $n $m, se le hace un incremento previo a la asignación con ++$m.  
Como resultado, $m se convierte en 100, y $n también se establece en 100.
m = 100, n = 100

Aquí $m se asigna a $n antes de incrementarse. $n toma el valor actual de $m (100), y luego $m se incrementa en 1. 
m = 101, n = 100
Imprime el valor actual de $m (101) y despues se le incrementa 1 a $m.
m = 101 
Por último, utilizando ++$m, $m se incrementa en 1 antes de imprimirse por pantalla por lo que obtenemos el siguiente resultado:
m = 103 

*/

/* 
3. Indica cuál sería la salida del siguiente programa:
$n = 5;
$t = ++$n * --$n;
echo “n = $n, t = $t\n”;
printf(“%d %d %d”, ++$n, ++$n, ++$n);
*/
$n = 5;
$t = ++$n * --$n; // $t = 6 * 5 = 30
echo "<br>n = $n, t = $t\n<br>"; // imprime $n = 5 (ya que se incremento en 1 y despues se reduce outra vez en 1) y $t = 30
printf("%d %d %d", ++$n, ++$n, ++$n); // imprime 6 7 8 porque va incrementando uno antes de imprimirlo por pantalla.

//4. Escribe un programa que calcule el factorial de un número.

function calcularFactorial($numero)
{
    if (is_numeric($numero) && $numero >= 0) {
        if ($numero === 0) {
            return 1;
        } else {
            $factorial = 1;
            for ($n = 1; $n <= $numero; $n++) {
                $factorial *= $n;
            }
            return $factorial;
        }
    } else {
        return -1;
    }
}

$numero = 1;
$resultado = calcularFactorial($numero);
if ($resultado === -1) {
    echo "<br> Error! Ingrese un número positivo";
} elseif ($resultado >= 1) {
    echo "<br>El factorial de $numero es $resultado.";
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>HTML</title>
</head>

<body>
    <h1>Ejercicio 5</h1>
    <div>
        <!-- Aquí va el formulario-->
        <form action="tarea2_1.php" method="post">
            <label>
                Ingrese los segundos: <input type="number" name="segundos" min="0">
            </label>
            <br><br>
            <input type="submit" name="submit" value="Enviar">
        </form>
        <?php

        //5. Escribir una página web que dados unos segundos (recogidos en un formulario) exprese su equivalente en semanas, días, horas, minutos y segundos.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["segundos"])) {

                $tiempo = $_POST["segundos"];

                $segundos = $tiempo % 60;
                $minutos = floor($tiempo / 60);
                $horas = floor($minutos / 60);
                $minutos = $minutos % 60;
                $dias = floor($horas / 24);
                $horas = $horas % 24;
                $semanas = floor($dias / 7);
                $dias = $dias % 7;


                echo "<br> El equivalente de $tiempo segundos es:";
                echo "<ul>";
                if ($semanas > 0)
                    echo "<li> Semanas: $semanas</li>";
                if ($dias > 0)
                    echo "<li> Días: $dias</li>";
                if ($horas > 0)
                    echo "<li> Horas: $horas</li>";
                if ($minutos > 0)
                    echo "<li> Minutos: $minutos</li>";
                echo "<li> Segundos: $segundos</li>";
                echo "<ul>";
            }
        }
        ?>
</body>

</html>

<html>

<head>
    <meta charset="utf-8">
    <title>HTML</title>
</head>

<body>
    <h1>Ejercicio 6</h1>
    <div>
        <!-- Aquí va el formulario-->
        <form action="tarea2_1.php" method="post">
            <label>
                Ingrese el año: <input type="number" name="anho" min="0">
            </label>
            <br><br>
            <input type="submit" name="submit" value="Enviar">
        </form>
        <?php

        /*
6. El domingo de pascua es el primer domingo después de la primera luna llena posterior al equinoccio de primavera y se determina mediante el siguiente cálculo sencillo:
A = anho mod 19 B = anho mod 4 C = anho mod 7 D = (19 * A + 24) mod 30 E = (2 * B + 4 * C + 6 * D + 5) mod 7 N = (22 + D + E)

Donde N indica el número de día del mes de marzo (si N es igual o menor que 31) o abril (si es mayor que 31).
Contruir un programa que determina las fechas de domingos de pascua dado el año. Nota: Emplea únicamente las variables anho, d y n.
*/
        function calcularDomingoPascua($anho)
        {
            $A = $anho % 19;
            $B = $anho % 4;
            $C = $anho % 7;
            $D = (19 * $A + 24) % 30;
            $E = (2 * $B + 4 * $C + 6 * $D + 5) % 7;
            $N = (22 + $D + $E);
            if ($N <= 31) {
                $mes = "marzo";
                $dia = $N;
            } else {
                $mes = "abril";
                $dia = $N - 31;
            }


            return "Domingo de Pascua en $anho: $dia de $mes";
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["anho"])) {

                $anho = $_POST["anho"];
                echo calcularDomingoPascua($anho);
            }
        }
        ?>
</body>

</html>