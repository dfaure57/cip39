<?php

# incluimos nuestra libreria
include('../UNI4/funciones.php');

# la novedad, incluimos nuestras 'clases'
include('mis_clases.php');

# nos presentamos
print_ejecutando('**********'.__FILE__);

# si no paso argumentos, mandamos ayuda
if (count($argv)==1) {
  usage('No encontre suficientes argumentos!
  Esperaba que dijeras un nombre de archivo CSV y una acción: 
    mostrar
    promedio
    total
    mostrar_full
    listar
    y ticket

  Si no decis nada, yo entenderé listar ');
}

# el archivo es el primer argumento
$archivo = $argv[1];

# el segundo es una accion
$accion = isset($argv[2])?$argv[2]:'pues nada dijiste';

# limite para algunas acciones
$hasta = isset($argv[3])?$argv[3]:500000;

# posible filtro sobre la columna llamada familia
$filtro = isset($argv[4])?$argv[4]:'';

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

$factura = new clase_factura($filtro);

// vayamos viendo qué contiene la variable print_r($factura);

while ( ( ($alinea = fgetcsv($manejador,1000) ) !== FALSE)
  AND $numero_linea <= $hasta ) {   

  # numero de linea "no es cierto", o sea, es cero, solo en la cabecera
  if (!$numero_linea) {

    $factura->agregar_cabecera($alinea);

  } else {

    $factura->agregar_item($alinea);

  }
  # vamos a la siguiente
  $numero_linea++;
}

# cierra el archivo CSV
fclose($manejador);

switch ($accion) {

  case 'mostrar':                  
    $factura->mostrar_items();
    break;

  case 'promedio':
    $factura->mostrar_promedio();
    break;

  case 'total':
    $factura->mostrar_total();
    //print_con_carro("{$accion}: El total es {$total_precio} de {$mostradas} usando {$cabecera[$orden_valor]}");
    break;

  case 'mostrar_full':                  
    $factura->mostrar_total_y_familias();
    break;

  case 'ticket':                  
    $factura->mostrar_ticket();
    break;

  default:
  case 'listar':                  
    $factura->mostrar_bonito();
    break;
}

//print_r($salida);
