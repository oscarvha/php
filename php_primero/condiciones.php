<?php

$a= 10;
$b= 15;

//Sentencia IF
if($a >$b)
{
    echo "a es mayor que b<br>";
}else if($a==$b)
{
    echo "a es igual que b<br>";
}else{
    echo "a es menor que b<br>";
}

//Switch 

$dia = "viernes";

switch ($dia) {
    case "sabado":
    echo "dia de descanso<br>";
        
        break;
    case "viernes":
    echo "Ir a trabajar pero hasta las 3<br> ";
        
        break;
    default:
        echo "Es un dia de trabajo normal<br>";
        
        break;
}

$n = 0;
//While

while($n<5)
{
   echo "N vale en el while $n <br>";
   $n++;
}

echo "<br><br>";
//Do while

$p = 0;

do{
     echo "P vale en el do while $p <br>";
    $p++;
  
}while ($p<5);

echo "<br><br>";

for($i=0; $i<5; $i++){
       echo "I vale en el for $i <br>";
}