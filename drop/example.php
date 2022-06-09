<?php
$fileRoute = 'uploads/Eventos_2022053007307.txt';

$file = new SplFileObject($fileRoute);
    $arr = [];

    $newArr = [];

	while(!$file->eof())
	  {
		array_push($arr, $file->fgets()."<br />");
	  }

      for ($i=1; $i < count($arr); $i++) { 
          echo $arr[$i];
          array_push($newArr, explode(',',$arr[$i]));
      }

    echo $newArr[0];

	$file = null;
?>