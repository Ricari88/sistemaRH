<?php

function entrada($entrada){
    include("banners/turnos.php");

    $time = date('H:i', strtotime( $entrada ) );
    $dia = date('d-m-Y', strtotime( $entrada ) );

    switch ($time) {
        case $time > $turnoMatutino && $time < $salidaMatutino:
            return "<td>".$dia."</td><td class='late'>".$time."</td>";
            break;
        case $time > $turnoVespertino && $time < $salidaVespertino:
            return "<td>".$dia."</td><td class='late'>".$time."</td>";
            break;
        case $time > $turnoNocturno:
            return "<td>".$dia."</td><td class='late'>".$time."</td>";
            break;
        default:
            return "<td>".$dia."</td><td>".$time."</td>";
            break;
    }

}


function salida($salida){
    include("banners/turnos.php");

    $time = date('H:i', strtotime( $salida ) );
    $dia = date('d-m-Y', strtotime( $salida ) );

    switch ($time) {
        case $time < $salidaMatutino && $time > $turnoMatutino:
            return "<td>".$dia."</td><td class='late'>".$time."</td>";
            break;
        case $time < $salidaVespertino && $time > $turnoVespertino:
            return "<td>".$dia."</td><td class='late'>".$time."</td>";
            break;
        case $time < $salidaNocturno:
            return "<td>".$dia."</td><td class='late'>".$time."</td>";
            break;
        default:
            return "<td>".$dia."</td><td>".$time."</td>";
        break;
    }
}
?>