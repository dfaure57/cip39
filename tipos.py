# coding: utf-8

print ("Ejecutando "+__file__+"\n")

# tipos de variables

# entero
entero = 9

# punto flotante
flotante = 15.99

# una cadena de caracteres, también conocida como string
cadena1 = 'Soy una cadena de caracteres'

# y otra
cadena2 = "soy otra cadena, definida con doble comilla"
# cadena1 += 'agregado a cadena1'

# este mensaje provoca un error de CASTING
# print ("El entero es "+entero+" y el flotante "+flotante)

# este mensaje se verá correctamente
print ("El entero es "+str(entero)+" y el flotante "+str(flotante))

print ("su producto es "+str(entero*flotante))
print ("su potencia es "+str(entero**flotante))

print ("ejemplo 1 de string: "+cadena1)
print ("ejemplo 2 de string: "+cadena2)

print (cadena1+cadena2)

print ("\n\nFIN desde python.\n\n")