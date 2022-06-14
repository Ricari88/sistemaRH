<?php

$file = file('uploads/Eventos_2022053007307.txt'); // * crea un array con el contenido del archivo de texto

$file_string = implode(',',$file); // * crea un string con salto de linea y separa por comas el array $file

$array_from_string = explode(",",$file_string);

//print_r($array_from_string);

for($i = 0; $i < count($array_from_string); $i++){
  $line = explode(' ',$array_from_string[$i]);


  print_r($line);

}
/*
for ($j=0; $j < count($line); $j++) { 
  echo '<br />'.$j.'-'.$line[$j].'<br />';
}
*/
/*
echo $line[0]; // * Tiempo
echo $line[1]; // * hora y ID de Usuario !separar para hora y ID
echo $line[34];// * Dispositivo
echo $line[41];// * Punto del evento
echo $line[51].' '.$line[52].' '.$line[53];// * Verificacion --- !separar el [53] para estado
echo $line[57].' '.$line[58].' '.$line[59].' '.$line[60].' '.$line[61];// * Evento
*/


?>