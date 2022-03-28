<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table th{
            background-color: #555;
            color: white;
        }

        table tr:nth-child(even){
            background-color: #aaa;
        }
        .late{
            color: white;
            background-color: red;
        }
    </style>
</head>
<body>
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
            </tr>
        </thead>
        <tbody>
<?php
    include("conexion.php");
    include("checadas.php");

    if ($conexion -> connect_errno) {
        die('hubo un error en la conexion al servidor');
        //exit();
    }
    else{
        $sql="SELECT `asistencia`.*, `empleado`.*
            FROM `asistencia` 
            LEFT JOIN `empleado` ON `asistencia`.`empleado_idempleado` = `empleado`.`idempleado`
            ORDER BY `asistencia`.`tiempo` ASC";

        $result = $conexion->query($sql);

        if($result->num_rows){
            while ($fila = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>'.$fila['rpe'].'</td>';
                echo '<td>'.$fila['nombre'].'</a></td>';
                echo entrada($fila['Tiempo']);
                //echo salida($fila['hsalida']);
                echo '<td>'.$fila['Dispositivo'].'</td>';
                echo '<td>'.$fila['Punto del evento'].'</td>';
                echo '<td>'.$fila['Verificacion'].'</td>';
                echo '<td>'.$fila['Estado'].'</td>';
                echo '<td>'.$fila['Evento'].'</td>';
                echo '</tr>';
            }
        }
    }
?>
        </tbody>
    </table>
</body>
</html>