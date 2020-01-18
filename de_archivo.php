<?php

print ("Ejecutando "."\n");

#declaramos variables
$cuenta = 1;
$archivo = 'alimentos.txt';

# ok, pero ¿existe?
if (!file_exists($archivo)) {
  print ("No existe ".$archivo);
  exit(1);
}

# abrimos el archivo que ya sabemos que existe
# un manejador es un "file handle", un recurso del sistema operativo
# negociado con el lenguaje, en este caso, python
$manejador = fopen($archivo,'r');
  # leemos la primera linea
  print ("Leemos las lineas de ".$archivo." una por una:");
  while ($linea = fgets($manejador)) {
    # "mientras" siguen habiendo lineas. Este lazo terminará cuando 
    # se llegue al final de archivo

    # la imprimimos
    print("VIEJO Linea ".($cuenta).": ".$linea);

    # leemos la siguiente y acumulamos
    # linea = manejador.readline()
    $cuenta += 1;
  }

  # tambien podemos leer todas las lineas con un solo comando!
  # primero reseteamos la posicion de lectura del archivo en el manejador
  // no es necesario en php manejador.seek(0)
  
  # y reseteamos nuestro contador
  $cuenta = 1;
  # leemos todo de una sola vez
  $todas_las_lineas = file($archivo,FILE_IGNORE_NEW_LINES);

  # $todas_las_lineas es una LISTA
  print_r($todas_las_lineas);

  $nuevo_contenido = 'Escrito con PHP'."\n";

  # pero, podemos iterar dentro de la lista
  foreach ($todas_las_lineas as $unalinea) {
    print("NUEVO Linea ".($cuenta+10).": ".$unalinea."\n");
    $cuenta += 1;

    # ademas, vamos a producir un nuevo archivo, con el contenido en mayusculas
    $nuevo_contenido .= strtoupper($unalinea)."\n";
  }
 
  $salidor = fopen('SALIDA.txt','w+');
  fwrite($salidor, $nuevo_contenido);
  #print ($nuevo_contenido);  

