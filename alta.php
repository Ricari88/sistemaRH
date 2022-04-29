<?php
error_reporting(0);
include('scripts/php/conexion.php');
include('scripts/php/queries/insert.php');
include('scripts/php/banners/head.php');
include('scripts/php/verificarRegistro.php');
?>

<form action="alta.php" method="post">

<input type="text" placeholder="Cargar documento" autocomplete="off">

<input type="submit" value="Cargar">

</form>

<?php

if ($conexion -> connect_errno) {
  die('hubo un error en la conexion al servidor');
  //exit();
}
else {
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Tiempo = "2022-04-05 06:02:35";
    $empleado_idempleado = "222";
    /*$Nombre = "";
    $Tarjeta = "";*/
    $Dispositivo = "Estudio";
    $Punto_Evento = "Estudios-1";
    $Verificacion = "Solo rostro";

    /*$status = verificarRegistro($entrada);
    if($status == true){

    }*/

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
  }

}



?>