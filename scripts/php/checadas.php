<?php
function entrada($entrada, $estatus){
    $time = date('H:i:s', strtotime( $entrada ) );
    $dia = date('d-m-Y', strtotime( $entrada ) );

    if($time>"07:00:01"){
        return "<td>".$dia."</td><td class='late'>".$time."</td>";
    }
    else{
        return "<td>".$dia."</td><td>".$time."</td>";
    }

}


function salida($salida,){
    /*verificar salida*/

    if($salida<"14:50:01"){
        return "<td class='late'>".$salida."</td>";
    }
    else{
        return "<td>".$salida."</td>";
    }
}

?>