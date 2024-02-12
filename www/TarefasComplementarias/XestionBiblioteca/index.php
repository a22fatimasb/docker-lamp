<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herencia en PHP</title>
</head>

<body>
    <?php
    include_once("biblioteca.php");
    include_once("documento.php");
    include_once("libro.php");
    include_once("revista.php");
    include_once("dvd.php");

    $biblioteca1 = new Biblioteca("Fonseca", "Rua Fonseca s/n", 981525878);
    echo "Número de bibliotecas creadas:" . biblioteca::get_num_bibliotecas() . "<br/>";

    $biblioteca1->mostrarInfo();

    // ($formato,$aniopub,$titulo,$autor,$numpaginas)
    $libro = new Libro("libro", 2012, "Ajax in Action", "Marcelino", 520);
    $biblioteca1->darAlta($libro);
    $libro = new Libro("libro", 2010, "jQuery para novatos", "Pepe Perez", 150);
    $biblioteca1->darAlta($libro);
    $libro = new Libro("libro", 2011, "PHP5 OO", "Arturo", 99);
    $biblioteca1->darAlta($libro);

    // ($formato,$aniopub,$numdvds,$formatodvd)
    $dvd = new Dvd("dvd", 2005, "Debian 6.0", 1, "ISO");
    $biblioteca1->darAlta($dvd);

    $dvd = new Dvd("dvd", 2006, "Mecano", 1, "mp3");
    $biblioteca1->darAlta($dvd);

    // ($formato,$aniopub,$titulo,$numpaginas)
    $revista = new Revista("revista", 2004, "Hola", 56);
    $biblioteca1->darAlta($revista);
    $biblioteca1->listarDocumentos();


    $biblioteca2 = new Biblioteca("Fonseca II", "Rua Fonseca s/n", 981525878);
    echo "Número de bibliotecas creadas:" . biblioteca::get_num_bibliotecas() . "<br/>";

    $biblioteca1->darBaja(2);
    $biblioteca1->listarDocumentos();
    $biblioteca1->listarDocumentos("dvd");

    print_r(get_class_methods($biblioteca1)); // Métodos de CLASE.
    echo "<hr/>";

    print_r(get_class_vars('biblioteca')); // Variables de CLASE.
    echo "<hr/>";

    unset($biblioteca2);
    echo "Número de bibliotecas creadas:" . biblioteca::get_num_bibliotecas() . "<br/>";
    ?>
    
</body>

</html>