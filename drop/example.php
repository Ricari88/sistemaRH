<?php
$fileRoute = 'uploads/Eventos_2022053007307.txt';

$file = new SplFileObject($fileRoute);

header('Content-Type: application/json');
$json_data = file_get_contents($fileRoute);
//separar archivo por saltos de linea \n
$json_data = preg_split("/\n/", $json_data);
//para cada elemento
for ($i = 0; $i < count($json_data); $i++) { 
  //se separa por tabulador
  $dupla = preg_split("/\t/", $json_data[$i], -1, PREG_SPLIT_NO_EMPTY);
  //sustituir el elemento por un array asociativo similar
  $json_data[$i] = array(
    "Fecha: " => $dupla[0]
  );
}

echo json_decode($json_data);

/*
$arr = [];

$newArr = [];

while(!$file->eof())
  {
	array_push($arr, $file->fgets());
  }

  for ($i=1; $i < count($arr); $i++) { 
    echo $arr[$i];
    array_push($newArr, explode(',',$arr[$i]));
  }
*/
?>