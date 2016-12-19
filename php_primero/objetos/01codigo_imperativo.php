<?php

///CODIGO IMPERATIVO

$automovil_1 =(object)["marca"=>"ford", "modelo"=>"focus"];
$automovil_2 =(object)["marca"=>"seat", "modelo"=>"ibiza"];


function mostrar_datos($automovil) {
    echo "<p>Hola soy un $automovil->marca modelo $automovil->modelo</p>";
}

mostrar_datos($automovil_1);
mostrar_datos($automovil_2);