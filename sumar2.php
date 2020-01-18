<?php

include('funciones.php');
print_ejecutando(__FILE__);

//die (print_r($argv));

print_con_carro('la suma es :'.sumar($argv[1],$argv[2])); 

function sumar($a, $b) {
  return $a+$b;
}

function sumar_otra_version($a, $b) {
  $total = 0;
  $total += $a;
  $total = $total + $b;
  return $total;
}