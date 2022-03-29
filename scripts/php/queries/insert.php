<?php
function insert(...$strings){
    
    $arr = array();

    foreach($strings as $value){
            array_push($arr,$value);
        }

        $tiempo = $arr[0];
        $idempleado = $arr[1];
        //$nombre = $arr[2];
        //$tarjeta = $arr[3];
        $dispositivo = $arr[2];
        $puntoEvento = $arr[3];
        $verificacion = $arr[4];
        $estado = $arr[5];
        $evento = $arr[6];


        $time = date('H:i:s', strtotime( $tiempo ) );


        if($estado == "Entrada"){
            if($time > "07:00:01"){
                $sql = "INSERT INTO `asistencia` 
                (`Tiempo`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                VALUES 
                ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento', 'Retardo')";
        
                return $sql;
            }
            else{
                $sql = "INSERT INTO `asistencia` 
                (`Tiempo`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                    VALUES 
                    ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento')";
        
                return $sql;
            
            }
        }
        elseif($estado=="Salida"){
            if($time < "14:50:01"){
                $sql = "INSERT INTO `asistencia` 
                (`Tiempo`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                VALUES 
                ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento', 'Antes')";
        
                return $sql;
            }
            else{
                $sql = "INSERT INTO `asistencia` 
                (`Tiempo`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
                    VALUES 
                    ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento')";
        
                return $sql;
            
            }
        }
        else{
            $sql = "INSERT INTO `asistencia` 
            (`Tiempo`, `empleado_idempleado`, `Dispositivo`, `Punto del evento`, `Verificacion`, `Estado`, `Evento`, `Notas`) 
            VALUES 
            ('$tiempo', '$idempleado', '$dispositivo', '$puntoEvento', '$verificacion', '$estado', '$evento', 'Antes')";
    
            return $sql;
        }

}

?>