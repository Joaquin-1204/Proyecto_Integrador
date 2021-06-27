from urllib import request
import json
from listasenlazadas import *

obj=Lista()
def cargar_datos(ruta):
    with open(ruta) as contenido:
        facturas = json.load(contenido)
        
        for fac in facturas:
            data = fac['title'],fac['cantidad']
            #print(nombre)        
            obj.insertar_ultimo(data)
 
if __name__ == '__main__':
    ruta = 'public/books.json'
    cargar_datos(ruta)
    obj.mostrar()
    print("El mayor stock que tiene el inventario",obj.min_max())
    print("El stock total disponible",obj.stock_total())