# coding: utf-8
# esto es un comentario, pero la anterior no lo es
# este script es para python 2.7

print ("Ejecutando "+"\n")

#declaramos variables
acumulando = ''
cuantos = 0

#saludamos
print ("Dame un alimento o pedime muchos: ")

# importante, hay diferencia entre python 2.x y 3.x acerca del uso de input
# python 2.7 raw_input, function para recibir datos
# python 3.x o superior, es input
# siempre tener en cuenta la compatibilidad

#pedimos algo al usuario
alimento = raw_input()

# entendamos esto: los IF necesitan expresiones lógicas
if (alimento != 'muchos'):
  # si no son muchos, mostramos el elegido y terminamos (1)
  print ("El alimento elegido es "+alimento)
  exit(1)

#sin dudas, quiere muchos
print('Seguimos pues pediste muchos!')

#iniciamos un lazo de largo indefinido
while (True):
  #pedimos otro
  print ("Dame alimentos hasta decir 'basta': ")
  alimento = raw_input()

  if (alimento == 'basta' or alimento == 'fin'):    
    # pide terminar, asi que mostramos el resumen y terminamos (2)
    print("dijiste "+alimento+", por eso termino")
    # fijate que debemos convertir (cast) cuantos a un string!!!
    print("Aca la lista de los "+str(cuantos)+" elegidos: \n"+acumulando)     
    exit(2)
  else:
    # acumulamos dos cosas, 
    # en acumulando el nuevo alimento, 
    acumulando += alimento+"\n"
    # en cuantos la cuenta
    cuantos += 1
    print (">>> El alimento elegido es "+alimento+"\nSeguimos!")
      

# ahora lo reescribimos tal cual con php, para entender las diferencias      