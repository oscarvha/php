<?php

/* 
 CLASE 
 * MISMO: Estado, comportamiento e identidad
 */

class Automovil{
    //PROPIEDADES
    //Acceso desde todos los lugares PUBLIC , Private solo dentro de la clase
     public $marca;
     public $modelo;
     
     
     //MOTODO
     public function mostrar() {
         echo "<p>Hola soy un $this->marca modelo $this->modelo</p>";
     }
}

//Declarar el objeto
$automovil_1 = new Automovil();
$automovil_1 ->marca = "ford";
$automovil_1 ->modelo = "focus";
$automovil_1->mostrar();