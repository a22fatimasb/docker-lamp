<?php
/* En el div de la clase container debe aparecer un triángulo de letras a.
Crea una lista desordenada de html en la que los elementos deben aparecer de la siguiente forma:
a
aa
aaa
aaaa
...
El número de elementos de la lista debe ser aleatorio entre 1 y 30. Puedes utilizar la función
random_int para ello.
Cada vez que recargues la página, el número de elementos generado tiene que ser diferente.*/

function imprimirRadom(){
  $numeroElementos = random_int(1,30);
    echo "<ul>";
    for ($i = 1; $i <= $numeroElementos; $i++) {
        $cadena = str_repeat('a', $i);
        echo "<li>$cadena</li>";
    }
    echo "</ul>";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Post Fácil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <?php
      imprimirRadom();
      ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>