<?php
error_reporting(0);
include('scripts/php/conexion.php');
include('scripts/php/queries/insert.php');

$Tiempo = "2022-04-04 06:48:50";
$empleado_idempleado = "222";
/*$Nombre = "";
$Tarjeta = "";*/
$Dispositivo = "Obras";
$Punto_Evento = "Obras-2";
$Verificacion = "Solo rostro";
$Estado = "Entrada";
$Evento = "Apertura con tarjeta de proximidad";

if($Estado=="Entrada"){
    $sql = entrada($Tiempo,$empleado_idempleado,$Dispositivo,$Punto_Evento,$Verificacion,$Estado, $Evento);
}
elseif ($Estado=="Salida") {
    $sql = salida($Tiempo,$empleado_idempleado,$Dispositivo,$Punto_Evento,$Verificacion,$Estado, $Evento);
}


if ($conexion->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }
  
  $conexion->close();

?>