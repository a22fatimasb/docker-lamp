<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>HTML</title>
</head>

<body>
    <form name="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <select name="opcion">
            <?php

            $datos = [
                "cocacola" => [
                    "nome" => "Coca Cola",
                    "prezo" => 2.1
                ],
                "pepsicola" => [
                    "nome" => "Pepsi Cola",
                    "prezo" => 2.0
                ],
                "fantanaranja" => [
                    "nome" => "Fanta Naranja",
                    "prezo" => 2.5
                ],
                "trinamanzana" => [
                    "nome" => "Trina Manzana",
                    "prezo" => 2.3
                ]
            ];

            foreach( $datos as $id => $item){
               echo '<option value="'. $id . '">'.$item["nome"].' ('.$item["prezo"].'€)</option>';

            }
            ?>
        </select>
        <input type="submit" class="submit" name="enviar" value="Enviar" />
    </form>
</body>

</html>