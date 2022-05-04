<?php
function verificarRegistro($registro, $idempleado){
    include('conexion.php');
    include('queries/busquedas.php');
    include('banners/turnos.php');

    $diaRegistroActual = date('Y-m-d', strtotime( $registro ) );//dia-mes-anio de la checada del dia de hoy
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

                    case $diaRegistroAnterior == $diaRegistroActual:
                        if($horaRegistroActual < '12:00:00' && $horaRegistroActual > $turnoMatutino){
                            return 'Entrada';
                            break;
                        }
                        elseif ($horaRegistroActual < '18:00:00' && $horaRegistroActual > $turnoVespertino) {
                            return 'Entrada';
                            break;
                        }
                        else{
                            return 'Salida';
                            break;
                        }
                        
                    
                    case $diaRegistroAnterior < $diaRegistroActual:
                        if($fila['Estado'] == 'Entrada'){
                            return 'Salida';
                            break;
                        }
                        elseif ($fila['Estado'] == 'Salida') {
                            return 'Entrada';
                            break;
                        }
                        else{
                            return 'Entrada';
                            break;
                        }
                    
                    default:
                        break;
                }
            }
        }
        else{
            return 'Entrada';
        }
    }
}


//echo verificarRegistro('2022-05-04 15:05:00', '222');
//echo 'hi';
?>