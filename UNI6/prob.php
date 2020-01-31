<?php

# incluimos nuestra libreria
include('../UNI4/funciones.php');

# la novedad, incluimos nuestras 'clases'
include('mis_clases.php');

# nos presentamos
print_ejecutando('**********'.__FILE__);

$entero = 9;
$dinero = 10.44;
$string = 'caracteres';

print_r([
  'entero'=>$entero, 
  'dinero'=>$dinero, 
  'string'=>$string 
]);

$o = new prueba($entero); # ahora $o lo contiene todo!
$o->mostrar(); # notemos el operador de clase, '->'
print_con_carro($o->nueva);

class prueba {
  // definicion de variables, llamadas ATRIBUTOS
  public $entero; # a definir en el constructor
  public $dinero = 10.44;
  public $nueva = 'Esta no estaba antes';
  public $string = 'caracteres';  

  // a parte ejecutable
  public function __construct($entra=0){
    $this->entero = $entra;
    $this->dinxentero();
    $this->al2();
    return $this;
  }

  private function al2() {
    $this->entero = $this->entero ** 2;
  }

  private function dinxentero() {
    $this->dinero = $this->entero * $this->dinero;
  }

  public function mostrar() {
    global $entero;
    print_r([
      'entero'=>$this->entero, 
      'eldeafuera'=>$entero,
      'dinero'=>$this->dinero, 
      'string'=>$this->string,
      'otra'=>$this->nueva,
      'objeto'=>$this 
    ]);
  }

}