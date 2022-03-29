<?php

include('scripts/php/conexion.php');
include('scripts/php/queries/insert.php');

$Tiempo = "2022-03-30 07:00:03";
$empleado_idempleado = 222;
/*$Nombre = "";
$Tarjeta = "";*/
$Dispositivo = "Estudios";
$Punto_Evento = "Estudios-1";
$Verificacion = "Solo rostro";
$Estado = "Entrada";
$Evento = "Apertura con tarjeta de proximidad";

$sql = insert($Tiempo,$empleado_idempleado,$Dispositivo,$Punto_Evento,$Verificacion,$Estado, $Evento);


if ($conexion->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }
  
  $conexion->close();

?>