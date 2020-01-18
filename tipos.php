<?php

print "Ejecutando ".__FILE__."\n";

// tipos de variables, int, float, string, boolean

// entero
$entero = '9';

// punto flotante
$flotante = 15.99;

// una cadena de caracteres, también conocida como string
$cadena1 = 'Soy una cadena de caracteres';

// y otra
$cadena2 = "soy otra cadena, definida con doble comilla";
$cadena1 .= 'agregado a cadena1';

// este mensaje se verá correctamente en php, pero no en python
print "El entero es {$entero} y el flotante {$flotante}\n";
print "su producto es ".($entero*$flotante)."\n";

print ("ejemplo 1 de string: ".$cadena1."\n");
print ("ejemplo 2 de string: ".$cadena2."\n");

# asi como esta salen pegadas, sin espacios!
print ($cadena1.$cadena2."\n");

print ("\n\nFIN desde php.\n\n");