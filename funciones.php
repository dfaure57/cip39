<?php

/** mi primera libreria de funciones!
**/

function print_con_carro($deci_esto='') {
  // imprime un mensaje con salto de carro
  print ($deci_esto.chr(10));
}

function print_ejecutando_1($archivo) {
  $lista = explode('/', $archivo);

  //print_con_carro($archivo);
  //die(print_r($lista));

  print("Ejecutando ".$lista[ count($lista)-1 ].chr(10));
}

function print_ejecutando($archivo) {
  // borrar pantalla
  system('clear');

  // desarmar la ruta completa de $achivo en partes
  $lista = explode('/', $archivo);

  // imprimir el último elemento usando otra function nuestra
  return print_con_carro("Ejecutando ".$lista[ count($lista)-1 ]);
}