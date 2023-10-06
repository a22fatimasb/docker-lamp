<?php
/**Busca en la documentación de PHP las funciones de [manejo de variables](http://www.php.net/manual/es/funcref.php)

Comprueba el resultado devuelto por los siguientes fragmentos de código y analiza el resultado:
*/
 $a = "true"; // Comproba se unha variable é de tipo booleano. Se é verdadeiro devolve un 1 se é falso un 0 (o cal non se amosa por pantalla);
 echo is_bool($a);
 $c = "false"; // Devolve o tipo da variable, neste caso un String.
 echo gettype($c);
 
 $d = ""; // devolve un 1 polo tanto está a decirnos que está vacío.
 echo empty($d);
 
 $e = 0.0; // considerao vacío así que devolve 1
 echo empty($e);
 
 $f = 0; // considerao vacío así que devolve 1
 echo empty($f);
 $g = false; // considerao vacío así que devolve 1
 echo empty($g);
 
 $h; // devolve 1 dado que non o considera vacío
 echo empty($h);

 $i = 0; // considerao vacio así que devolve 1
 echo empty($i);
  
 $j = "0.0"; // devolve 0 dado que non o considera vacío 
 echo empty($j);

 $k = true; //  determina se a variable está definida e non é null. Imprime por pantalla 1 dado que é verdadeiro.
 echo isset($k);

 $l = false; // Imprime por pantalla 1 dado que é verdadeiro.
 echo isset($l);
 
 $m = true; //  determina se é un número ou un string numérico. Neste caso devolve 0 porque non o é, non se imprime por pantalla.
 echo is_numeric($m);

 $n = ""; //  Neste caso devolve 0 porque non o é, non se imprime por pantalla.
 echo is_numeric($n);

?>