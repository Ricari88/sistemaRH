<?php
include("../conexion.php");
include("../checadas.php");
$idempleado = $_GET["idempleado"];
$fechaInicial = $_GET["fechaInicial"];
$fechaFinal = $_GET["fechaFinal"];

/*$inicial = date('Y-m-d', strtotime( $fechaInicial ) );
$final = date('Y-m-d', strtotime( $fechaFinal ) );*/

$buscar="SELECT `asistencia`.*, `empleado`.*
FROM `asistencia` 
INNER JOIN `empleado` ON `asistencia`.`empleado_idempleado` = `empleado`.`idempleado`
WHERE `empleado`.`rpe` = '$idempleado' AND `asistencia`.`Fecha` BETWEEN '$fechaInicial' AND '$fechaFinal'
ORDER BY `asistencia`.`Fecha` ASC";

if ($conexion -> connect_errno) {
    die('hubo un error en la conexion al servidor');
    //exit();
}
else{
    $result = mysqli_query($conexion, $buscar);
    if($result){
        echo'
        <table class="resultado">
            <thead class="text-center header">
                <tr>
                    <th>RPE</th>
                    <th id="nombre">Nombre</th>
                    <th>Fecha</th>
                    <th>Hora del registro</th>
                    <th>Estado</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody class="container">';
        while ($fila = $result->fetch_assoc()) {
                $nombreEmpleado = $fila['nombre'].' '.$fila['apellido'];
                echo '<tr>';
                    echo '<td class="text-center">'.$fila['rpe'].'</td>';
                    echo '<td>'.$nombreEmpleado.'</a></td>';
                    echo ($fila['Estado']=="Entrada") ? entrada($fila['Fecha']) : salida($fila['Fecha']);
                    //echo '<td class="text-center">'.$fila['Dispositivo'].'</td>';
                    //echo '<td>'.$fila['Punto del evento'].'</td>';
                    //echo '<td>'.$fila['Verificacion'].'</td>';
                    echo '<td class="text-center">'.$fila['Estado'].'</td>';
                    //echo '<td>'.$fila['Evento'].'</td>';
                    echo '<td class="text-center">'.$fila['Notas'].'</td>';
                echo '</tr>';
        }

        echo '</tbody>
        </table>';
    }
    else{
        echo "no se encontro informacion";
    }
}

//echo "<br />".$idempleado."<br />".$fechaInicial."<br />".$fechaFinal;
?>