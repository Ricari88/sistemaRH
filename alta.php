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
    $tiempo = "2022-11-06 06:51:00";
    $empleado_idempleado = "222";
    $dispositivo = "Estudios";
    $puntoEvento = "Estudios-1";
    $verificacion = "Rostro";


    /*
    TODO agregar funcion para convertir xls a csv, 
    TODO obtener datos de Tiempo, idempleado, Dispositivo, Punto del evento
    TODO Verificacion, Estado, Evento y Notas
    */

    /*
    * funcion verificarRegistro viene del archivo "scripts/php/verificarRegistro.php 
    * donde se define el estado "Entrada/Salida

    */
    $estado = verificarRegistro($tiempo,$empleado_idempleado);


    
    $evento = "Apertura con tarjeta de proximidad";
    
    if($estado=="Entrada"){
      /*
      *la funcion entrada viene desde el archivo "scripts/php/insert.php, 
      *donde se realiza el registro de entrada
      */
        $sql = entrada($tiempo,$empleado_idempleado,$dispositivo,$puntoEvento,$verificacion,$estado, $evento);
    }
    elseif ($Estado=="Salida") {
      /*
      *la funcion salida viene desde el archivo "scripts/php/insert.php, 
      *donde se realiza el registro de salida
      */
        $sql = salida($tiempo,$empleado_idempleado,$dispositivo,$puntoEvento,$verificacion,$estado, $evento);
    }
    else{
      /*
      *la funcion nuevoRegistro viene desde el archivo "scripts/php/insert.php, 
      *donde se realiza el registro nuevo en caso de no haber algun registro
      *anterior de la persona.
      */
        $sql = nuevoRegistro($tiempo,$empleado_idempleado,$dispositivo,$puntoEvento,$verificacion,$estado, $evento);
    }
    
    echo $tiempo.' '.$estado;
    
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