<?php
function entrada($entrada){
    /*verificar entrada*/
    if($entrada>"07:00:01"){
        return "<td class='late'>".$entrada."</td>";
    }
    else{
        return "<td>".$entrada."</td>";
    }

}


function salida($salida){
    /*verificar salida*/

    if($salida<"14:50:01"){
        return "<td class='late'>".$salida."</td>";
    }
    else{
        return "<td>".$salida."</td>";
    }
}

?>