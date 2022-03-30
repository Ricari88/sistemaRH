<?php
function datosChecadas(){
    $sql="SELECT `asistencia`.*, `empleado`.*
    FROM `asistencia` 
    LEFT JOIN `empleado` ON `asistencia`.`empleado_idempleado` = `empleado`.`idempleado`
    ORDER BY `asistencia`.`Fecha` ASC";

    return $sql;
}


function busquedaFecha($fechaInicial, $fechaFinal){
    $sql="SELECT `asistencia`.*, `empleado`.*
    FROM `asistencia` 
    LEFT JOIN `empleado` ON `asistencia`.`empleado_idempleado` = `empleado`.`idempleado`
    WHERE `asistencia`.`Fecha` BETWEEN '$fechaInicial' AND '$fechaFinal'
    ORDER BY `asistencia`.`Fecha` ASC";

    return $sql;
}

function buscarRetardos(){
    $sql="SELECT `asistencia`.*, `empleado`.*
    FROM `asistencia` 
    LEFT JOIN `empleado` ON `asistencia`.`empleado_idempleado` = `empleado`.`idempleado`
    WHERE `asistencia`.`` > 07:00:01
    ORDER BY `asistencia`.`Fecha` ASC";

    return $sql;
}

?>