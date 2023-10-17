<html>

<head>
    <meta charset="utf-8">
    <title>HTML</title>
</head>

<body>
    <div>
        <!-- Aquí va el formulario-->
        <form action="tarea2_optativo.php" method="post">
            <select name="opcion">
                <option value="cocacola">Coca Cola</option>
                <option value="pepsi">Pepsi Cola</option>
                <option value="fanta">Fanta Naranja</option>
                <option value="trina">Trina Manzana</option>
            </select>
            <br><br>
            Cantidad: <input type="text" name="cantidad">
            <br><br>
            <input type="submit" name="submit" value="Solicitar">
        </form>
        <?php
        /*
Crea un formulario para solicitar una de las siguientes bebidas:

    Bebida|PVP
    :-|:-:
    Coca Cola|1 €
    Pepsi Cola|0,80 €
    Fanta Naranja|0,90 €
    Trina Manzana|1,10 €
    
    A mayores, necesitamos un campo adicional con la cantidad de bebidas a comprar y un botón de <kbd>Solicitar</kbd>.
    
    La aplicación mostrará algo como:

    Pediste 3 botellas de Coca Cola. Precio total a pagar: 3 Euros.
    Puedes utilizar sentencias `switch` o `if`.
    */

        //Aquí va el código PHP que muestra la información solicitada.

        function calcularPrecio($precio, $cantidad)
        {
            $dineroTotal = $precio * $cantidad;
            return $dineroTotal;
        }
        function nombreBebida($opcion)
        {
            switch ($opcion) {
                case "cocacola":
                    return $bebida = "Coca Cola";
                    break;
                case "pepsi":
                    return $bebida = "Pepsi Cola";
                    break;
                case "fanta":
                    $bebida = "Fanta Naranja";
                    break;
                default:
                    $bebida = "Trina Manzana";
            }
        }
        function precioBebida($opcion)
        {
            switch ($opcion) {
                case "cocacola":
                    return  $precio = 1;
                    break;
                case "pepsi":
                    return $precio = 0.8;
                    break;
                case "fanta":
                    $bebida = $precio = 0.9;
                    break;
                default:
                    $bebida = $precio = 1.1;
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["opcion"]) && !empty($_POST["cantidad"])) {
                $opcion = $_POST["opcion"];
                if (is_numeric($_POST["cantidad"])) {
                    $cantidad = $_POST["cantidad"];
                }

                $bebida = nombreBebida($opcion);
                $precio = precioBebida($opcion);


                $cantidad_final = calcularPrecio($precio, $cantidad);

                echo "Pediste $cantidad botellas de $bebida. Precio total a pagar: $cantidad_final Euros.";
            }
        }
        ?>
</body>

</html>