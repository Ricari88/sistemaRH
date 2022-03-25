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
                <th>Hora de entrada</th>
                <th>Hora de salida</th>
                <th>Observaciones</th>
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
        $sql="SELECT * FROM asistencia ORDER BY id ASC";

        $result = $conexion->query($sql);

        if($result->num_rows){
            while ($fila = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td class="text-center">'.$fila['rpe'].'</td>';
                echo '<td>'.$fila['nombre'].'</a></td>';
                echo entrada($fila['hentrada']);
                echo salida($fila['hsalida']);
                echo '<td>'.$fila['estatus'].'</td>';
                echo '<td>'.$fila['observaciones'].'</td>';
                echo '</tr>';
            }
        }
    }
?>
        </tbody>
    </table>
</body>
</html>