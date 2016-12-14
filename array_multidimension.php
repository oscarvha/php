<?php

//DEFINICION DE ARRAY MULTIDIMENSIONAL
$alimentos = array("fruta" =>array("tropical" =>"kiwi",
								    "citrico" => "naranja",
								    "acido" => "manzana"),

                   "carne" =>array("vacuno" =>"lomo",
                   				   "porcino" =>"jamon"),

                   "leche"=>array("animal" =>"Vaca",
                   	              "vegetal" =>"coco"));

//ACCESO A UN ELEMENTO DE LA SEGUNDA DIMENSION
echo $alimentos["leche"]["animal"];


//RECORRER UN ARRAY MULTIDIMENSIONAL
//Crear listado
//list
//DOS NOMBRE UNO PARA IDENFITICAR LA PRIMERA DIMENSION Y TIPO PARA LSEGUNDA
foreach ($alimentos as $tipo => $subtipo) {
	//primera dimension
  echo "$tipo: <BR>";
  //nombre identifivo //por cada
  		while(list($clave,$valor)=each($subtipo))
  		{
  			echo "$clave = $valor<BR>";
  		}

  echo "<BR>";

}

?>