<?php
function verificarRegistro($registro, $idempleado){
    include('conexion.php');
    include('queries/busquedas.php');

    $registroActual = date('Y-m-d', strtotime( $registro ) );//dia-mes-anio de la checada del dia de hoy
    $horaRegistroActual = date('H:m', strtotime( $registro));//hora-minuto de la checada del dia de hoy

    if ($conexion -> connect_errno) {
        die('hubo un error en la conexion al servidor');
        //exit();
    }
    else{
        //$idempleado = '222';
        $sql = busquedaFechaRegistro($idempleado);//busca el registro de checada mas reciente en la bd
        $result = $conexion->query($sql);
        
        if($result->num_rows){
            while ($fila = $result->fetch_assoc()) {

                $diaRegistroAnterior = date('Y-m-d', strtotime( $fila['Fecha'] ) ); //toma fecha de checada anterior de la BD para tener punto de comparacion de fecha de checada
                $horaRegistroAnterior = date('H:m', strtotime( $fila['Fecha'] ) );//hora-minuto del registro anterior de checada almacenado en la bd

                switch ($diaRegistroAnterior){

                    case $diaRegistroAnterior == $registroActual:
                        if($horaRegistroAnterior < $horaRegistroActual){
                            return 'Salida';
                            break;
                        }
                        break;
                    
                    case $diaRegistroAnterior < $registroActual:
                        return 'Entrada';
                        break;
                    
                    case $diaRegistroAnterior == $registroActual:
                        if($horaRegistroAnterior < $horaRegistroActual){
                            return 'Entrada';
                            break;
                        }
                        break;
                    
                    default:
                        break;
                }
            }
        }
        else{
            return 'false '.$fila['Fecha'].' 123';
        }
    }
}
?>