<?php
include("../conexion.php");
$idempleado = $_GET["idempleado"];
$fechaInicial = $_GET["fechaInicial"];
$fechaFinal = $_GET["fechaFinal"];

$inicial = date('Y-m-d', strtotime( $fechaInicial ) );
$final = date('Y-m-d', strtotime( $fechaFinal ) );

$sql="SELECT `asistencia`.*, `empleado`.*
FROM `asistencia` 
LEFT JOIN `empleado` ON `asistencia`.`empleado_idempleado` = `empleado`.`idempleado`
WHERE `asistencia`.`empleado_idempleado` = $idempleado
AND `asistencia`.`Fecha` BETWEEN '%$inicial%' AND '%$final%'
ORDER BY `asistencia`.`Fecha` ASC";

if ($conexion -> connect_errno) {
    die('hubo un error en la conexion al servidor');
    //exit();
}
else{
    $result = $conexion -> query($sql);
    if($result -> num_rows){
        echo"<table>
                <thead>
                    <tr>
                        <th>RPE</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>";
        while ($fila = $result->fetch_assoc()) {
            $nombreEmpleado = $fila['nombre'].' '.$fila['apellido'];
            echo '<tr>';
            echo '<td>'.$fila['rpe'].'</td>';
            echo '<td>'.$nombreEmpleado.'</td>';
            echo '</tr>';
        }

        echo "  </tbody>
             </table>";
    }
    else{
        echo "no se encontro informacion";
    }
}

echo "<br />".$idempleado."<br />".$fechaInicial."<br />".$fechaFinal;
?>