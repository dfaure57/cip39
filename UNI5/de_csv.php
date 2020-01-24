<?php

# incluimos nuestra libreria
include('../UNI4/funciones.php');

# nos presentamos
print_ejecutando(__FILE__);

#declaramos variables
$cuenta = 1;

# si no paso argumentos, mandamos ayuda
if (count($argv)==1) {
  usage('No encontre suficientes argumentos!
  Esperaba que dijeras un nombre de archivo CSV y una acción: mostrar [n], promedio o total');
}

# el archivo es el primer argumento
$archivo = $argv[1];

# el segundo es una accion
$accion = isset($argv[2])?$argv[2]:'pues nada dijiste';

# limite para algunas acciones
$hasta = isset($argv[3])?$argv[3]:500000;

# posible filtro sobre la columna llamada familia
$filtro = isset($argv[4])?$argv[4]:'';

# otras variables
$total_precio = 0;
$orden_valor = NULL;
$mostradas = 0;

# array o arreglo, o lista, de lo que realmente nos intereso durante la ejecucion
$salida = [];

# ok, pero ¿existe?
if (!file_exists($archivo)) {
  usage("No existe ".$archivo.". El primer argumento debe ser una CSV mas o menos bien escrita");
}

# abrimos el archivo que ya sabemos que existe
# un manejador es un "file handle", un recurso del sistema operativo
# negociado con el lenguaje, en este caso, python
$manejador = fopen($archivo,'r');

# contaremos lineas
$numero_linea = 0;

# primero asignamos la lectura de una linea en un array $alinea
# pero ademas queremos no haber llegado al maximo!
while ( ( ($alinea = fgetcsv($manejador,1000) ) !== FALSE)
  AND $numero_linea <= $hasta ) {   

  # numero de linea "no es cierto", o sea, es cero, solo en la cabecera
  if (!$numero_linea) {

    # cargamos esta cabecera  
    $cabecera = $alinea;
    print_con_carro("los campos son ".implode(' - ', $cabecera));
    
    # iteramos la cabecera 
    foreach ($cabecera as $key => $value) {

      # para detectar columna de precio o valor
      if ($value == 'valor' OR $value == 'precio') {
        # la encontramos!
        $orden_valor = $key;
      }

      # posicion de la columna de familia
      if ($value == 'familia') {
        $orden_familia = $key;
      }
    }  

  } else {

    # procesamos una linea 'normal' de datos

    if ( !$filtro OR 
         ($filtro AND $filtro == $alinea[$orden_familia])
       ) {

      switch (strtolower($accion)) { 
        case 'mostrar':        
          print_r($alinea);
          break;
        case 'promedio':
        case 'total':
          if ($orden_valor) {
            $total_precio += $alinea[$orden_valor]; 
          } else {
            usage("No podemos realizar {$accion} por carecer de columna apropiada de precio o valor");
          }
          break;
        default:
          usage("No supe qué hacer con {$accion}");
          break;
      }
      $salida[$alinea[0]] = implode('-', $alinea); 
      //$salida[] = implode('-', $alinea); 
      $mostradas++;
    }

  }
  # vamos a la siguiente
  $numero_linea++;
}

# cierra el archivo CSV
fclose($manejador);

switch ($accion) {

  case 'mostrar':                  
    print_con_carro("{$accion}: fueron en total {$mostradas}".($filtro?' filtrada con '.$filtro:'')." lineas con datos");
    break;

  case 'promedio':
    print_con_carro("{$accion}: El promedio de {$mostradas} {$cabecera[$orden_valor]} es ".($total_precio/$mostradas)."");
    break;

  case 'total':
    print_con_carro("{$accion}: El total es {$total_precio} de {$mostradas} usando {$cabecera[$orden_valor]}");
    break;
  default:
    break;
}

print_r($salida);

