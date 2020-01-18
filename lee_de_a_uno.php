<?php

#saludamos
print ("Ejecutando "."\n");

# declaramos variables
$acumulando = '';
$cuantos = 0;
$alimento = '';


#pedimos algo al usuario
$alimento = readline('Dame un alimento o pedime muchos: ');

# entendamos esto: los IF necesitan expresiones lógicas
if ($alimento != 'muchos') {
  # si no son muchos, mostramos el elegido y terminamos (1)
  print ("El alimento elegido es ".$alimento."\n");
  exit(1);
}
 
# sin dudas, quiere muchos
print('Seguimos pues pediste muchos!'."\n");

#iniciamos un lazo de largo indefinido
while (true) {
  #pedimos otro
  $alimento = readline("Dame alimentos hasta decir 'basta': "."\n");

  if ($alimento == 'basta' or $alimento == 'fin') {    
    # pide terminar, asi que mostramos el resumen y terminamos (2)
    print("dijiste ".$alimento.", por eso termino\n");
    # fijate que debemos convertir (cast) cuantos a un string!!!
    print("Aca la lista de los ".($cuantos)." elegidos: \n".$acumulando);
    exit(2);
  } else {
    # acumulamos dos cosas, 
    # en acumulando el nuevo alimento, 
    $acumulando .= $alimento."\n";
    # en cuantos la cuenta
    $cuantos += 1;
    print (">>> El alimento elegido es ".$alimento."\nSeguimos!");
  }
}