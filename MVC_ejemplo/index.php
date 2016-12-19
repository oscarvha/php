<?php
//archivos requeridos
// require() establece que el código del archivo es necesario para el funcionamiento del programa, por el ello si el archivos no se encuentra saltara un error 
// y el programa se dentendrá

//require_once() funcionan de la misma forma salvo que once, se impide la carga más de una vez .

//Si usamos requiere corremos el riesgo de redeclaraciones de funciones o variables.


 require_once "controllers/controller.php";
  require_once "models/model.php";
$mvc = new MvcController();
$mvc ->plantilla();

