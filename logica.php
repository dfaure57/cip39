<?php

print "\nEjecutando ".__FILE__."\n";

function conjuncion($variable1,$variable2) {
  return mostrar($variable1 AND $variable2);         
}
function disyuncion($variable1,$variable2) {
  return mostrar($variable1 OR $variable2);         
}
function mostrar($variable1) {  
  return (($variable1)?'verdad':'falso')."\n";
}

/* 
Un poco de lógica
 
conjunción (símbolos habituales AND, &&)

proposición 1   operador    proposición 2       RESULTADO
=============   ========    =============       =========
    verdad         y           verdad        =>  verdad
    verdad         y           falso         =>  falso 
    falso          y           verdad        =>  falso
    falso          y           falso         =>  falso


disyunción (símbolos habituales OR, ||)

proposición 1   operador    proposición 2       RESULTADO
=============   ========    =============       =========
    verdad         o           verdad        =>  verdad
    verdad         o           falso         =>  verdad
    falso          o           verdad        =>  verdad
    falso          o           falso         =>  falso

Negación (simbolos habituales: not, !)

*/

$a = true;
$b = false;

print ("a es ".mostrar($a));
print ("b es ".mostrar($b));

print ("conjunción 'a y b' es ".conjuncion($a,$b));
print ("disyunción 'a o b' es ".disyuncion($a,$b));

print ("la negación de 'a' es ".mostrar(!$a));

print ("\n\nFIN desde php!\n\n");