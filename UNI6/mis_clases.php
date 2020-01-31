<?php

class clase_comercio {
  /*** 
    Oops! una aparentemente sin "constructor"
    pero en realidad lo tiene de manera implicita
  ***/
  public $nombre = 'El Comercio';
  public $iva = 21;

}

class clase_item {

  // atributos, todos privados y predefinidos
  private $type;
  private $nombre = '';
  private $familia = '';
  private $valor = 0;

  /*** se puede hacer de dos maneras, 
    1. instanciar sin parámetros y poblar via methods
    2. instanciar con parámetros 
  ***/
  public function __construct($params){
    $this->type='item';
    $this->nombre = $params['nombre'];
    $this->familia = $params['familia'];
    $this->valor = $params['valor'];
    return $this;
  }

  public function valor() {
    return $this->valor;
  }

  public function familia() {
    return $this->familia;
  }

  public function detalle() {
    return $this->nombre;
  }

  public function imprimir() {
    print_r([
      'familia'=>$this->familia, 
      'detalle'=>$this->nombre, 
      'valor'=> '$ '.$this->valor
    ]);
  }

}

class clase_lista_items {
  // items, no predefinida
  private $type;

  // array de objetos clase item
  private $items;

  // array con la cabecera
  private $cabecera;
  private $orden = [];

  public function __construct(){
    $this->type='lista_items';
    $this->cabecera = [];
    $this->items = [];
    return $this;
  }

  public function cantidad() {
    /*** ya no necesitamos contabilizar "mostradas"
    como en UNI5, porque este objeto de lista sabe bien
    cuántos items contiene! ***/
    return count($this->items);
  }

  public function orden($cual) {
    if (isset($this->orden[$cual])) {
      return $this->orden[$cual];
    }
    return false;
  }

  public function addCabecera($arr) {
    # recordaremos este array como la cabecera provista

    # iteramos el array
    foreach ($arr as $key => $value) {

      # posicion de la columna de agrupacion
      if ( in_array($value, ['familia','categoria','grupo']) ) {
        $this->orden['familia'] = $key;
        $this->cabecera[1] = 'Familia' ;
      }

      # para detectar columna de nombre
      if ( in_array($value, ['nombre','descripcion','detalle']) ) {
        $this->orden['nombre'] = $key;
        $this->cabecera[2] = 'Detalle' ;
      }

      # para detectar columna de precio o valor
      if ( in_array($value, ['valor','precio']) ) {
        $this->orden['valor'] = $key;
        $this->cabecera[3] = 'Valor' ;
      }

    }  
    ksort($this->cabecera);
  }

  public function showCabecera() {
    /***
      showCabecera()
      en cualquier momento, podemos pedirle al objeto items
      cuáles son sus campos de cabecera
    ***/
    return $this->cabecera;
  }

  public function addItem($item) {
    /***
      la factura agrega un item enviándoselo a su lista de items
      que es un objeto interno
    ***/
    $this->items[] = new clase_item(
      [
        'nombre' => $item[$this->orden('nombre')],
        'familia' => $item[$this->orden('familia')],
        'valor' => $item[$this->orden('valor')]
      ]
    );
  }

  public function mostrar() {
    /*** este mostrar es un poco hippie, porque sale como va
    por un print_r ***/
    foreach ($this->items as $key_item => $item_object) {
      $item_object->imprimir();
    }
  }

  public function mostrar_bonito() {
    /*** en cambio, este es un poco mas dedicado ***/
    $linea_cabecera = '';
    foreach ($this->cabecera as $value) {
      $linea_cabecera .= str_pad($value,20);
    }
    # pone una cabecera y un separador
    print_con_carro($linea_cabecera);
    print_con_carro('---------------------------');

    # e imprime sus item de manera ordenada
    foreach ($this->items as $key_item => $item_object) {
      print_con_carro(
        str_pad($item_object->familia(),20).
        str_pad($item_object->detalle(),20).
        str_pad('$ '.$item_object->valor(),20)
      );      
    }    
  }

  public function promedio() {
    $suma = 0;
    foreach ($this->items as $key_item => $item_object) {
      $suma += $item_object->valor();
    }
    if (!$this->cantidad()) {return 'n/a';}
    return $suma / $this->cantidad();
  }

  public function total() {
    $suma = 0;
    foreach ($this->items as $key_item => $item_object) {
      $suma += $item_object->valor();
    }
    return $suma;
  }

  public function mostrar_familias() {
    /*** 
      hace una lista unica de las familias usadas
      y la imprime ***/
    $familias = [];    
    foreach ($this->items as $key =>$item_object) {
      $familias[$item_object->familia()] = $item_object->familia();
    }    
    
    if (count($familias)) {
      print_con_carro( 'Hemos usado las familias: '. implode(', ', $familias) );      
    } else {
      print_con_carro( 'No especificaste una familia válida');
    }

  }

}

class clase_factura {
  // declaramos atributos vacios
  private $type;
  private $items;
  private $total;
  private $promedio;
  private $filtro;

  // aqui iran los producidos, es un array vacio
  private $salida = [];

  // inicializamos
  public function __construct($un_filtro=''){
    // tipificamos
    $this->type='factura';
    $this->filtro = $un_filtro;
    // prearmamos una lista vacia de items
    $this->items = new clase_lista_items();
    return $this;
  }

  public function agregar_cabecera($arr) {
    /***
      agrega los titulos de la cabecera de los item
    ***/
    $this->items->addCabecera($arr);
  } 

  public function describir_filtro() {
    /***
      una descripcion bien castellana de los filtros
    ***/
    if ($this->filtro) {
      return "filtradas con {$this->filtro}";
    }
    return "No se solicitaron filtros";
  }

  public function agregar_item($arr) {
    /***
      agregar item: la factura ya sabe si debe aplicar un filtro
    ***/
    if (get_class($this->items) == 'clase_lista_items') {

      if ( !$this->filtro OR 
           ( $this->filtro AND 
             $this->filtro == $arr[$this->items->orden('familia')]
           )
         ) {
        // lo agregamos, porque o bien no hemos definido un filtro
        // o el filtro coincide con nuestra categoria (familia)        
        $this->items->addItem($arr);

      }
    }
  }

  public function mostrar_items() { 
    $this->items->mostrar();
    print_con_carro("Fueron en total {$this->items->cantidad()} ({$this->describir_filtro()}) lineas con datos");
  }

  public function mostrar_promedio() { 
    $elpromedio = $this->items->promedio();
    print_con_carro("El promedio de {$this->items->cantidad()} es {$elpromedio} ({$this->describir_filtro()})");
  }

  public function mostrar_total() { 
    $eltotal = $this->items->total();
    print_con_carro("El total de {$this->items->cantidad()} es {$eltotal} ({$this->describir_filtro()})");
  }

  public function mostrar_total_y_familias() { 
    $this->items->mostrar_familias();
    $this->items->mostrar();
    print_con_carro("Fueron en total {$this->items->cantidad()} ({$this->describir_filtro()}) lineas con datos");
  }

  public function mostrar_bonito() {
    $this->items->mostrar_bonito();    
  }

  public function mostrar_ticket() { 
    $comercio = new clase_comercio();
    print_con_carro('---------------------------');
    print_con_carro('Ticket! fecha: '.date('d-m-Y'));
    print_con_carro('---------------------------');
    $this->items->mostrar_familias();
    print_con_carro('---------------------------');
    print_con_carro('Detalle:');
    //$this->items->mostrar();
    $this->items->mostrar_bonito();
    print_con_carro('---------------------------');
    print_con_carro('Subtotal $ '.$this->items->total());
    print_con_carro("Iva $comercio->iva %");
    print_con_carro('Gran total $ '.
      (
        $this->items->total() + ($this->items->total() * $comercio->iva / 100)
      )
    );
    print_con_carro('------------------- SEUO :) ');

  }

}