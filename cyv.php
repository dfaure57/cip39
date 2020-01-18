<?php

// dos maneras de definir constantes.

// 1 la tradicional
define('cte1','nuestros ejemplos');

// 2 mas novedosa
const cte2 = 'mis ejemplos';

// __FILE__ es una de las constantes predefinidas en PHP
// https://www.php.net/manual/es/language.constants.predefined.php
print "Ejecutando ".__FILE__."\n";

// mostramos nuestras constantes, precediendo un tabulador \t
print "\tconstante cte1 siempre será ".cte1."\n";
print "\tconstante cte2 tampoco cambia de valor ".cte2."\n";

// papa y mama son variables y contienen los nombres de mis padres
$papa = 'Luis';
$mama = 'Lucía';

// este mensaje se verá correctamente
print "\nMi viejo se llama {$papa} y mi vieja {$mama}\n";

// este no funcionará como esperamos, por el mal uso de la comilla simple
print '\nMi viejo se llama {$papa} y mi vieja {$mama}';
// observa que los "caracteres escapeados" no funcionan con comilla simple

print ("\n\n
  FIN desde php. 
  Ejercicio: hacer este mismo programa en python y subirlo al git!
  Buscar cómo se hacen constantes en python\n\n");