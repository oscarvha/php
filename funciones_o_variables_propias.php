<?php

// Solo permite imprimir un valor o variable 
print "Codigo ejemplo<br>";

//Echo puede imprimir varios codios
echo "Codigo ejemplo", "segundo codigo<br>";


#variables OBJETO
$frutas = (object)["fruta1" =>"manzana","fruta 2" =>"pera"];
//como llamarla
echo "Esto es una variable objeto :$frutas->fruta1<br>";

//En php no existe la función .lenght se sustituye para los array y los string por count;
//Ejemplo si semana es un array de 7 count dará como resultado 7.
$semana=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");

//var_dum da toda la información de la varaible
var_dump($semana);

//Da el tamanyo de un array o string equivalente a lenght en php
count($semana);


//Funcion tipica de php por cada por ejemplo puede ser utilizada como condición o para bucles 
each($subtipo);

//Separa un conjunto en pares de clave valor si se trata de un elemento multidimensional.
list($clave,$valor)=($conjunto);



//Funciones in parametro php

function saludo(){
    echo "hola<br>";
}
//LLAMADA
saludo();


//Con parametros
function despedida($adios) {
    echo "$adios.<br>";
}

//LLAMADA
despedida("Hasta luego");

//Funcion con retorno
function get_valor($retornar) {
    
    return $retornar;
}

echo get_valor("devolver");

?>