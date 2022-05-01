<?php

function entrada(...$strings){
    //include("../banners/turnos.php");
    $turnoMatutino = "07:00";
    $salidaMatutino = "14:50";
    $turnoVespertino = "15:00";
    $salidaVespertino = "22:50";
    $turnoNocturno = "23:00";
    $salidaNocturno = "06:50";
    
    $arr = array();

    foreach($strings as $value){
            array_push($arr,$value);
        }

        $tiempo = $arr[0];
        $idempleado = $arr[1];
        $dispositivo = $arr[2];
        $puntoEvento = $arr[3];
        $verificacion = $arr[4];
        $estado = $arr[5];
        $evento = $arr[6];


        $time = date('H:i', strtotime( $tiempo ) );
        //$dia = date('Y-m-d', strtotime( $tiempo ) );
        switch ($time) {
            case $time > $turnoMatutino && $time < $salidaMatutino:
                $sql = "INSERT INTO `asistencia` 
                    (`Fecha`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                    VALUES 
                    ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento', 'Retardo M')";
            
                    return $sql;
                break;
            case $time > $turnoVespertino && $time < $salidaVespertino:
                $sql = "INSERT INTO `asistencia` 
                        (`Fecha`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                        VALUES 
                        ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento', 'Retardo V')";
            
                    return $sql;
                break;
            case $time > $turnoNocturno:
                $sql = "INSERT INTO `asistencia` 
                        (`Fecha`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                        VALUES 
                        ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento', 'Retardo N')";
    
                    return $sql;
                break;
            default:
                $sql = "INSERT INTO `asistencia` 
                        (`Fecha`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                        VALUES 
                        ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento', 'OK')";
    
                    return $sql;
                break;
        }

}



function salida(...$strings){
    //include("../banners/turnos.php");
    $turnoMatutino = "07:00";
    $salidaMatutino = "14:50";
    $turnoVespertino = "15:00";
    $salidaVespertino = "22:50";
    $turnoNocturno = "23:00";
    $salidaNocturno = "06:50";
    $arr = array();

    foreach($strings as $value){
            array_push($arr,$value);
        }

        $tiempo = $arr[0];
        $idempleado = $arr[1];
        $dispositivo = $arr[2];
        $puntoEvento = $arr[3];
        $verificacion = $arr[4];
        $estado = $arr[5];
        $evento = $arr[6];


        $time = date('H:i', strtotime( $tiempo ) );

        switch ($time) {
            case $time < $salidaMatutino && $time > $turnoMatutino:
                $sql = "INSERT INTO `asistencia` 
                    (`Fecha`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                    VALUES 
                    ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento', 'Adelantado M')";
            
                    return $sql;
                break;
            case $time < $salidaVespertino && $time > $turnoVespertino:
                $sql = "INSERT INTO `asistencia` 
                        (`Fecha`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                        VALUES 
                        ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento', 'Adelantado V')";
            
                    return $sql;
                break;
            case $time < $salidaNocturno:
                $sql = "INSERT INTO `asistencia` 
                        (`Fecha`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                        VALUES 
                        ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento', 'Adelantado N')";
    
                    return $sql;
                break;
            default:
                $sql = "INSERT INTO `asistencia` 
                        (`Fecha`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                        VALUES 
                        ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento', 'OK')";
    
                    return $sql;
                break;
        }
}



function nuevoRegistro(...$strings){

    $arr = array();

    foreach($strings as $value){
        array_push($arr,$value);
    }

    $tiempo = $arr[0];
    $idempleado = $arr[1];
    $dispositivo = $arr[2];
    $puntoEvento = $arr[3];
    $verificacion = $arr[4];
    $estado = $arr[5];
    $evento = $arr[6];


    $time = date('H:i', strtotime( $tiempo ) );

    $sql = "INSERT INTO `asistencia` 
                        (`Fecha`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                        VALUES 
                        ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento', 'OK')";
    return $sql;
}

?>