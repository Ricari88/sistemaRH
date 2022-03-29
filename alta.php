<?php

include('scripts/php/conexion.php');
include('scripts/php/queries/insert.php');

$Tiempo = "2022-03-29 14:52:00";
$empleado_idempleado = 222;
/*$Nombre = "";
$Tarjeta = "";*/
$Dispositivo = "Estudios";
$Punto_Evento = "Estudios-1";
$Verificacion = "Solo rostro";
$Estado = "Salida";
$Evento = "Apertura con tarjeta de proximidad";

if($Estado==="Entrada"){
    $sql = entrada($Tiempo,$empleado_idempleado,$Dispositivo,$Punto_Evento,$Verificacion,$Estado, $Evento);
}
elseif ($Estado==="Salida") {
    $sql = salida($Tiempo,$empleado_idempleado,$Dispositivo,$Punto_Evento,$Verificacion,$Estado, $Evento);
}


if ($conexion->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }
  
  $conexion->close();

?>