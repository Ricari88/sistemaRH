<?php
function verificarRegistro($registro){
    include('conexion.php');
    include('queries/busquedas.php');

    //$dia = date('Y-m-d', strtotime( $entrada ) );

    if ($conexion -> connect_errno) {
        die('hubo un error en la conexion al servidor');
        //exit();
    }
    else{
        $sql = busquedaFechaRegistro($registro,'222');
        $result = $conexion->query($sql);
        $estado;
        if($result->num_rows){
            while ($fila = $result->fetch_assoc()) {
                if($fila['Fecha'] < $registro){
                    return $estado = 'Entrada';
                }
                elseif($fila['Fecha'] == $registro){
                    return $estado = 'Salida';
                }
                else{
                    return $estado = 'Salida';
                }
            }
        }
        else{
            while ($fila = $result->fetch_assoc()) {
                return 'false';
            }
        }
    }
}

echo '<p>'.verificarRegistro('2022-04-01 06:52:50')."</p>";
?>