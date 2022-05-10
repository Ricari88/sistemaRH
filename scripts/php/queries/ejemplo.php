<?php
include("../conexion.php");
$idempleado = $_GET["idempleado"];
/*$fechaInicial = $_GET["fechaInicial"];
$fechaFinal = $_GET["fechaFinal"];

$inicial = date('Y-m-d', strtotime( $fechaInicial ) );
$final = date('Y-m-d', strtotime( $fechaFinal ) );*/

$buscar="SELECT `asistencia`.*, `empleado`.*
FROM `asistencia` 
LEFT JOIN `empleado` ON `asistencia`.`empleado_idempleado` = `empleado`.`idempleado`
WHERE `asistencia`.`empleado_idempleado` = $idempleado

ORDER BY `asistencia`.`Fecha` ASC";

if ($conexion -> connect_errno) {
    die('hubo un error en la conexion al servidor');
    //exit();
}
else{
    $result = mysqli_query($conexion, $buscar);
    if($result){
        echo"<table>
                <thead>
                    <tr>
                        <th>RPE</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>";
        while ($fila = $result->fetch_assoc()) {
            $nombreEmpleado = $fila['nombre'].' '.$fila['apellido'];
            echo '<tr>';
            echo '<td>'.$fila['rpe'].'</td>';
            echo '<td>'.$nombreEmpleado.'</td>';
            echo '<td>'.$fila['Fecha'].'</td>';
            echo '</tr>';
        }

        echo "  </tbody>
             </table>";
    }
    else{
        echo "no se encontro informacion";
    }
}

//echo "<br />".$idempleado."<br />".$fechaInicial."<br />".$fechaFinal;
?>