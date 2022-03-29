<?php include('scripts/php/banners/head.php');?>
    <table>
        <thead>
            <tr>
                <th>RPE</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora del registro</th>
                <th>Dispositivo</th>
                <th>Punto de checada</th>
                <th>Tipo de verificación</th>
                <th>Estado</th>
                <th>Evento</th>
                <th>Notas</th>
            </tr>
        </thead>
        <tbody>
<?php
    include("scripts/php/conexion.php");
    include("scripts/php/checadas.php");
    include("scripts/php/queries/busquedas.php");

    if ($conexion -> connect_errno) {
        die('hubo un error en la conexion al servidor');
        //exit();
    }
    else{
        $sql = datosChecadas();
        $result = $conexion->query($sql);

        if($result->num_rows){
            while ($fila = $result->fetch_assoc()) {
                $nombreEmpleado = $fila['nombre'].' '.$fila['apellido'];
                echo '<tr>';
                echo '<td>'.$fila['rpe'].'</td>';
                echo '<td>'.$nombreEmpleado.'</a></td>';
                echo entrada($fila['Tiempo'],$fila['Evento']);
                //echo salida($fila['hsalida']);
                echo '<td>'.$fila['Dispositivo'].'</td>';
                echo '<td>'.$fila['Punto del evento'].'</td>';
                echo '<td>'.$fila['Verificacion'].'</td>';
                echo '<td>'.$fila['Estado'].'</td>';
                echo '<td>'.$fila['Evento'].'</td>';
                echo '<td>'.$fila['Notas'].'</td>';
                echo '</tr>';
            }
        }
    }
?>
        </tbody>
    </table>
<?php include('scripts/php/banners/foot.php');?>