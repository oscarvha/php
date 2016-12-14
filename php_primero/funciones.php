<?php
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