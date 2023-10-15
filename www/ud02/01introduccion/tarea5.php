<?php
/*1. Escribe un programa que pase de grados Fahrenheit a Celsius. 
Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, 
se multiplica por 5 y se divide entre 9.*/
function pasarFahrenheitCelsius($fahrenheit){
    $celsius = ($fahrenheit- 32) * 5 / 9;
    return $celsius;
}

$fahrenheit = 104;
$celsius = pasarFahrenheitCelsius($fahrenheit);
echo "Ejercicio 1 <br />";
echo "Unos $fahrenheit grados Fahrenheit son $celsius grados Celsius.";

/*2. Crea un programa en PHP que declare e inicialice dos 
variables x e y con los valores 20 y 10 respectivamente y
muestre la suma, la resta, la multiplicación, 
la división y el módulo de ambas variables. */
$x = 20;
$y = 10;
echo "<br /> Ejercicio 2 <br />";

// Sin utilizar variables intermedias.
echo "La suma de $x más $y es ".$x + $y.".<br />";
echo "La resta de $x menos $y es ".$x - $y.".<br />";
echo "La multiplicación de $x y $y es ".$x * $y.".<br />";
echo "La división de $x entre $y es ".$x / $y.".<br />";
echo "El módulo de $x y $y es ".$x % $y.".<br />";

// Con nuevas variables.
$suma = $x + $y;
$resta = $x - $y;
$multiplicacion = $x * $y;
$division = $x / $y;
$modulo = $x % $y;
echo "La suma de $x más $y es $suma.<br />";
echo "La resta de $x menos $y es $resta.<br />";
echo "La multiplicación de $x y $y es $multiplicacion..<br />";
echo "La división de $x entre $y es $division.<br />";
echo "El módulo de $x y $y es $modulo.<br />";

/*3. (Optativo) Escribe un programa que imprima por pantalla los cuadrados de los 
30 primeros números naturales.*/ 
echo "<br /> Ejercicio 3 <br />";
for ($num = 1; $num < 31; $num++) {
    $cuadrado = $num * $num;
    echo "El número cuadrado de $num es $cuadrado<br />";
}
/*4. Hacer un programa php que calcule el área y el perímetro de un rectángulo
 (```área=base*altura``` y (```perímetro=2*base+2*altura```). Debéis declarar 
 las variables base=20 y altura=10. */
 echo "<br /> Ejercicio 4 <br />";
function calcularAreaRectangulo($base, $altura){
    $area = $base * $altura;
    return $area;
}
function calcularPerimetroRectangulo($base, $altura){
    $perimetro = (2 * $base) + (2*$altura);
    return $perimetro;
}
$base = 20;
$altura = 10;
$area = calcularAreaRectangulo($base, $altura);
$perimetro = calcularPerimetroRectangulo($base, $altura);
echo "Contando con un rectángulo con base $base cm y $altura cm: <br>";
echo "Su área es de $area cm² y su perímetro es de $perimetro cm.";
?>