<?php
//error_reporting(0);
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
    $Tiempo = "2022-06-06 14:51:00";
    $empleado_idempleado = "222";
    $Dispositivo = "Estudios";
    $Punto_Evento = "Estudios-1";
    $Verificacion = "Rostro";


    /*
    TODO agregar funcion para convertir xls a csv, 
    TODO obtener datos de Tiempo, idempleado, Dispositivo, Punto del evento
    TODO Verificacion, Estado, Evento y Notas
    */

    /*
    * funcion verificarRegistro viene del archivo "scripts/php/verificarRegistro.php 
    * donde se define el estado "Entrada/Salida

    */
    $Estado = verificarRegistro($Tiempo,$empleado_idempleado);


    
    $Evento = "Apertura con tarjeta de proximidad";
    
    if($Estado=="Entrada"){
      /*
      *la funcion entrada viene desde el archivo "scripts/php/insert.php, 
      *donde se realiza el registro de entrada
      */
        $sql = entrada($Tiempo,$empleado_idempleado,$Dispositivo,$Punto_Evento,$Verificacion,$Estado, $Evento);
    }
    elseif ($Estado=="Salida") {
      /*
      *la funcion salida viene desde el archivo "scripts/php/insert.php, 
      *donde se realiza el registro de salida
      */
        $sql = salida($Tiempo,$empleado_idempleado,$Dispositivo,$Punto_Evento,$Verificacion,$Estado, $Evento);
    }
    else{
      /*
      *la funcion nuevoRegistro viene desde el archivo "scripts/php/insert.php, 
      *donde se realiza el registro nuevo en caso de no haber algun registro
      *anterior de la persona.
      */
        $sql = nuevoRegistro($Tiempo, $empleado_idempleado, $Dispositivo, $Punto_Evento, $Verificacion, $Estado, $Evento);
    }
    
    echo $Tiempo.' '.$Estado;
    
    if ($conexion->query($sql) === TRUE) {
        echo "New record created successfully";
      }
    else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
      }
      
      $conexion->close();
  }

}

?>