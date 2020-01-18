# coding: utf-8

def conjuncion(variable1, variable2):
  if (variable1 and variable2):
    return 'verdad'
  else:  
    return 'falso'          

def disyuncion(variable1, variable2):
  if (variable1 or variable2):
    return 'verdad'
  else:  
    return 'falso'          

def mostrar(variable1):
  if (variable1):
    return 'verdad'
  else:  
    return 'falso'          


# 
# Un poco de lógica
#
# conjunción (símbolos habituales AND, &&)
# proposición 1   operador    proposición 2       RESULTADO
# =============   ========    =============       =========
#     verdad         y           verdad        =>  verdad
#     verdad         y           falso         =>  falso 
#     falso          y           verdad        =>  falso
#     falso          y           falso         =>  falso
#
# disyunción (símbolos habituales OR, ||)
# proposición 1   operador    proposición 2       RESULTADO
# =============   ========    =============       =========
#     verdad         o           verdad        =>  verdad
#     verdad         o           falso         =>  verdad
#     falso          o           verdad        =>  verdad
#     falso          o           falso         =>  falso
#
# Negación (simbolos habituales: not, !)
#
# No verdad = falso
# No falso = verdad
# 
# No (no verdad) = verdad (aka "el si de las niñas")

print ('Ejecutando '+__file__)
print ("ejemplos con lógica\n")

a = True;
b = False;

print ("a es "+mostrar(a))
print ("b es "+mostrar(b))


print ("conjunción 'a y b' es " + conjuncion(a,b))
print ("disyunción 'a o b' es " + disyuncion(a,b))

print ("la negacion de 'a' es " + mostrar(not a))
print ("\fFIN desde python!\n")
