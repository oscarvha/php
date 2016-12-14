<?php
	//array no indexado
$array_pred = array("elemento 1", 2, "element 3");
//acceso
echo "Array sin clave". $array_pred[0];
	//array indexado con clave numerica entero
	//si lo hacemos asi para acceder no nos vale las posiciones;
$array_clave_valor = array(
	 1 => "elemento 1",
	 2 => "elemento 2",
	 3 => "elemento 3",
	);

echo "<BR>Array clave valor con entero ". $array_clave_valor[1];

//array asociativo clave valor con clave palabra
$array_clave_valor_palabra = array(
	 "elemento 1" => "valor 1",
	 "elemento 2" => "valor 2",
	 "elemento 3" => "valor 3",
	); 
//AGREGAR UN ELEMENTO A UN ARRAY ASOCIATIVO

echo "<BR>El array asociativo tiene ". count($array_clave_valor_palabra). " elementos " ;

echo "<BR>Añadimos un elemento más";
$array_clave_valor_palabra["elemento 4"] = "valor 4";

echo "<BR>El array asociativo tiene ". count($array_clave_valor_palabra). " elementos " ;


echo "<BR>Array clave valor con entero ". $array_clave_valor_palabra["elemento 1"];

//OTRA FORMA DE DEFINIRLOS

$array_def_dos[0] = "elemento 1";
$array_def_dos[1] = "elemento 2";
$array_def_dos[2] = "elemento 3";


echo "<BR>Array con definicion directa ". $array_def_dos[1];

echo "<BR>Recorrido via for de array clave valor entero";

for($i = 1; $i<=count($array_clave_valor); $i++)
{
 	echo "<BR>". $array_clave_valor[$i];
}

$no_array = 2;
//Para saber si es un array
	echo "<BR>Es el array con definicion correcta un array" .is_array($array_def_dos);
	//Devolvera True si es array o False si no lo es.

	if(is_array($no_array)==false)
	{
 		echo "<BR>Una variable definida como no_array=2; no es un array";
	}
	
//RECORRER UN ARRAY CON CLAVE STRING

	 echo "<BR> Recorrer un array con clave string ";
 // la variable clave y valor el nombre es personalizado.
foreach ($array_clave_valor_palabra as $clave => $valor) {
	 echo "<BR> Primer elmento ". $clave . " su valor es ". $valor;
}



//ORDENAR ARRAYS DIAS SEMANA

$semana = array ("Lunes","Martes","Miércoles", "Jueves");

echo "<BR>Mostramos los dias de la semana en un array indexado";

for($i=0; $i<count($semana); $i++)
{
	echo "<BR>". $semana[$i];

}

echo "<BR> Ahora ordenamos los dias de la semana por orden alfabetico";
  sort($semana);

  for($i=0; $i<count($semana); $i++)
{
	echo "<BR>". $semana[$i];

}




//Errores en el for que recorro el array de preguntas en el questionario debería haber empezado por 1, es decir, $i = 1; ya que el definí el array como asocitativo y al hacerlo asi no púedo acceder de forma indexada por posición y como la clave empezaba por 1, la primera posición daria error. O podría haberlo implementado con un bucle foreach así hubiera sido más sencillo la lectura de esos arrays
/*

*/

?>

