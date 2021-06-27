# Clase Nodo
class Nodo:
  def __init__(self, info):
      self.Info = info
      self.sig = None


# Clase Lista
class Lista:
  def __init__(self, *elem):
      self.__primero = None
      self.__ultimo = None
      self.__ant_actual = None
      self.__n = 0
      self.__pos = 0

      for i in elem:
          self.insertar_ultimo(i)

  def insertar_inicio(self, *elem):
      for i in elem:
          nodo = Nodo(i)
          if (self.__primero != None):
              nodo.sig = self.__primero
          else:
              self.__ultimo = nodo

          self.__primero = nodo

  def insertar_ultimo(self, *elem):
      for i in elem:
          nodo = Nodo(i)
          if (self.__ultimo != None):
              self.__ultimo.sig = nodo
              self.__ant_actual = self.__ultimo
          else:
              self.__primero = nodo

          self.__ultimo = nodo

  def elimina_primero():
      if (self.__primero == None):
          return

      nodo = self.__primero
      self.__primero = nodo.sig
      del nodo

  def __add__(self, list2):
      list3 = Lista()

      nodo = self.__primero
      while (nodo != None):
          list3.insertar_ultimo(nodo.Info)
          nodo = nodo.sig

      if (type(elem) == int):
          list3.insertar_ultimo(elem)
          return list3

      nodo = list2.__primero
      while (nodo != None):
          list3.insertar_ultimo(nodo.Info)
          nodo = nodo.sig

      return list3

  def info_anterior(self):
      if (self.__primero == None or self.__ant_actual == None):
          return

      return self.__ant_actual.Info

  def eliminar_elem(self, elem):
      while (self.__primero != None and self.__primero.Info == elem):
          temp = self.__primero
          self.__primero = temp.sig
          del temp

      nodo = self.__primero
      while (nodo != None):
          while (nodo.sig != None and nodo.sig.Info == elem):
              temp = nodo.sig
              if (temp == self.__ultimo):
                  self.__ultimo = nodo
              nodo.sig = temp.sig
              del temp
          nodo = nodo.sig

  def sig(self):
      if (self.__primero == None):
          return
      if (self.__ant_actual == None):
          self.__ant_actual = self.__primero
          return
      actual = self.__ant_actual.sig
      if (actual.sig != None):
          self.__ant_actual = actual

  def elimina_actual(self):
      if (self.__primero == None):
          return
      if (self.__ant_actual == None):
          temp = self.__primero
          self.__primero = temp.sig
          del temp
      else:
          temp = self.__ant_actual.sig
          self.__ant_actual.sig = temp.sig
          del temp

  def cons(self):
      if (self.__primero == None):
          return
      if (self.__ant_actual == None):
          return self.__primero.Info
      return self.__ant_actual.sig.Info

  def inicio(self):
      self.__ant_actual = None

  def actual_es_ultimo(self):
      if (self.__ant_actual != None):
          if (self.__ant_actual.sig == self.__ultimo):
              return True
      return False

  def mostrar(self):
      nodo = self.__primero
      while (nodo != None):
          print (nodo.Info)
          nodo = nodo.sig
      print

  def menor(self):
      nodo = self.__primero

      #  [120 - 50 - 75 - 50]
      val1 = int(nodo.Info[1]) # nodo.Info[1] ---> cantidad del producto ---->5
      val2 = int(nodo.sig.Info[1])                                     # ---->10
      while (nodo != None):
          
          #val1 = int(nodo.Info[1]) # nodo.Info[1] ---> cantidad del producto ---->5
          #val2 = int(nodo.sig.Info[1])                                     # ---->10
          #print(nodo.Info)
          #print(nodo.sig.Info)
          #print(val1,val2)
          #print(nodo.sig.Info[1])
          if val1 < val2:
              #print('mayor1',val2)
              #print('menor',menor)
              print("el producto menos vendido1 es:",val2)
              
              val2 = int(nodo.Info[1]) 
              val1 = int(nodo.sig.Info[1])
              nodo = nodo.sig

          elif val1 > val2:
              
              #print('mayor2',val1)
              #print('menor',menor)
              print("el producto menos vendido2 es:",val1)
              
              val1 = int(nodo.Info[1]) 
              val2 = int(nodo.sig.Info[1])
              #print(nodo.Info)
              nodo = nodo.sig
              
        
      
      #print(men)
      print


  def min_max(self):      # 12->11->5->20
      nodo = self.__primero
      #print(nodo.Info[1])
      '''valor_actual = int(nodo.Info[1]) #---> 12
      valor_sig = int(nodo.sig.Info[1]) #---> 12
      print(valor_actual,valor_sig)'''
      valor_actual = int(nodo.Info[1]) #---> 12
      valor_sig = int(nodo.sig.Info[1]) #---> 12
      while(nodo.sig != None):
          #valor_actual = int(nodo.Info[1]) #---> 12
          #valor_sig = int(nodo.sig.Info[1]) #---> 12
          #print("valor actual es   : ", valor_actual)
          #print("valor siguiente es: ",valor_sig)
          if valor_actual < valor_sig:
              #print(">>>>>>>> ",valor_sig)
              nodo = nodo.sig   
              valor_actual = valor_sig
              #print("valor actual es   : ", valor_actual)
              #print("valor siguiente es: ",valor_sig)
                     
              valor_sig = int(nodo.Info[1])
          if valor_actual > valor_sig:
              #print(">>>>>>>>",valor_actual)        
              nodo = nodo.sig
              valor_sig = int(nodo.Info[1])
              #print("valor actual es   : ", valor_actual)
              #print("valor siguiente es: ",valor_sig)
      return valor_actual
      #return nodo.Info[valor_actual]
              

  def stock_total(self):      # 12->11->5->20
      nodo = self.__primero
      stock_total = 0
      valor_actual = int(nodo.Info[1]) #---> 12
      while (nodo != None):
          stock_total = stock_total + int(nodo.Info[1])
          nodo = nodo.sig
      print
      return stock_total
    
  def pos_actual (self,pos):

		  nodo  = self.__primero #asignamos la posicion del primer elemento al var nodo
		  cont = 0              #creamos la variable cont que nos servira para poder aumentar la posicion
		  while (nodo != None) : # si el nodo es vacio, la lista esta vacia
			
		  	if (cont == pos):    # si contador es igual a la posicion, entonces encontro la posicion a buscar
		  	  self.__actual=nodo # swe asigna el valor del nodo al actual
		  	  self.__pos=cont    # se asgina el valor del contador al de la posicion
		  	  return self.__actual.Info # returnamos el valor actual del nodo
			
		  	nodo = nodo.sig # el valor del nodo se aginas con valor del puntero del siguiente nodo
		  	cont=cont+1     # el contador aumentar hasta poder llegar al posicion a buscar
		  return
'''
obj=Lista()
obj.mostrar()
obj.insertar_inicio(2)
obj.insertar_inicio(21)
obj.insertar_ultimo(44)
obj.mostrar()
print()
print("la posicion actual a buscar es:")
print(obj.pos_actual(2))#deseamo buscar el contenido de la posicion 2
'''