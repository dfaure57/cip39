# coding: utf-8
# esto es un comentario, pero la anterior no lo es
# este script es para python 2.7

# necesitaremos este modulo para leer el archivo
import os.path

print ("Ejecutando "+"\n")

#declaramos variables
cuenta = 1
archivo = 'alimentos.txt'

# ok, pero ¿existe?
if (not os.path.isfile(archivo)):
  print ("No existe "+archivo)
  exit(1)

# abrimos el archivo que ya sabemos que existe
# un manejador es un "file handle", un recurso del sistema operativo
# negociado con el lenguaje, en este caso, python
with open(archivo) as manejador:
  # leemos la primera linea
  linea = manejador.readline()
  print ("Leemos las lineas de "+archivo+" una por una:")
  while linea:
    # "mientras" siguen habiendo lineas. Este lazo terminará cuando 
    # se llegue al final de archivo

    # la imprimimos
    print("Linea "+str(cuenta)+": "+linea.strip())
    # otra manera de imprimirla
    # print("Linea {}: {}".format(cuenta, linea.strip()))

    # leemos la siguiente y acumulamos
    linea = manejador.readline()
    cuenta += 1

  # tambien podemos leer todas las lineas con un solo comando!

  # primero reseteamos la posicion de lectura del archivo en el manejador
  manejador.seek(0)
  
  # y reseteamos nuestro contador
  cuenta = 1
  # leemos todo de una sola vez
  todas_las_lineas = manejador.readlines()

  # todas_las_lineas es una LISTA
  print (todas_las_lineas)

  nuevo_contenido = ''

  # pero, podemos iterar dentro de la lista
  for unalinea in todas_las_lineas:
    print("Linea "+str(cuenta)+": "+unalinea.strip())
    cuenta += 1

    # ademas, vamos a producir un nuevo archivo, con el contenido en mayusculas
    nuevo_contenido += unalinea.upper()
 
  with open('SALIDA.txt','w+') as salidor:
    salidor.write(nuevo_contenido)
    # print (nuevo_contenido)  

