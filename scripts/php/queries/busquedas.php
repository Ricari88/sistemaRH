<?php
/*busca  todos los registros ordenado del mas antiguo al mas reciente*/
function datosChecadas(){
    $sql="SELECT `asistencia`.*, `empleado`.*
    FROM `asistencia` 
    LEFT JOIN `empleado` ON `asistencia`.`empleado_idempleado` = `empleado`.`idempleado`
    ORDER BY `asistencia`.`Fecha` ASC";

    return $sql;
}

/* Buscar por fecha y por id empleado*/
function busquedaFecha($fechaInicial, $fechaFinal, $idempleado){
    $sql="SELECT `asistencia`.*, `empleado`.*
    FROM `asistencia` 
    LEFT JOIN `empleado` ON `asistencia`.`empleado_idempleado` = `empleado`.`idempleado`
    WHERE `asistencia`.`Fecha` BETWEEN '$fechaInicial' AND '$fechaFinal' AND `empleado`.`idempleado` = '$idempleado'
    ORDER BY `asistencia`.`Fecha` ASC";

    return $sql;
}

function buscarRetardos(){
    $sql="SELECT `asistencia`.*, `empleado`.*
    FROM `asistencia` 
    LEFT JOIN `empleado` ON `asistencia`.`empleado_idempleado` = `empleado`.`idempleado`
    WHERE `asistencia`.`` > 07:00:59
    ORDER BY `asistencia`.`Fecha` ASC";

    return $sql;
}


//busqueda de registros por fecha para comparacion e identificar turnos
function busquedaFechaRegistro($empleado){
    $sql="SELECT *
    FROM `asistencia`
    LEFT JOIN `empleado` ON `asistencia`.`empleado_idempleado` = `empleado`.`idempleado`
    WHERE `asistencia`.`empleado_idempleado` = '$empleado' /* cambiar por RPE de empleado*/
    ORDER BY `asistencia`.`Fecha` DESC
    LIMIT 1;";

    return $sql;
}

?>