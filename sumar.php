<?php

/* uso

php sumar.php 0.112 2.011 .3 55 66 -900

*/

include('funciones.php');

print_ejecutando(__FILE__);

array_shift($argv);
print_con_carro('Estos numeros he recibido: ');

$total = sumar($argv);

//$total = 0;
//ref_sumar($argv,$total);

print_con_carro("La suma es ".$total);

function sumar($lista) {
  print_r($lista);
  $totalq = 0;
  foreach ($lista as $clave => $valor) { 
    //if(3 == $clave) die($valor);
    $totalq += $valor;
  }
  return $totalq;
}

function ref_sumar($lista,&$total) {
  foreach ($lista as $valor) {
    $total += $valor;
  }
}
