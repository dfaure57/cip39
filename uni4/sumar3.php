<?php

include('funciones.php');
print_ejecutando(__FILE__);

$total = sumar($argv[1],$argv[2],$argv[3]);
print_con_carro("La suma de tres elementos es ".$total);

function sumar($a, $b, $c) {
  return $a+$b+$c;
}
