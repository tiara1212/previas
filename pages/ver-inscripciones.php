<?php
    session_start();
    if(isset($_SESSION['DNI'])){
        $dni = $_SESSION['DNI'];
    }
    else{
        echo "
        <script> window.location.href='iniciar-datos.php';</script>";
    }
    include "conexion.php";
    include "functions.php";
    $mis ="SELECT 
            inscripciones.id_inscripciones,
            inscripciones.dni_alumno,
            materia.materia,
            mesas.fecha,
            mesas.horario
        FROM inscripciones
        INNER JOIN materia ON materia.id_materia = inscripciones.id_materia
        INNER JOIN mesas ON mesas.id_mesas = inscripciones.id_mesas
        WHERE inscripciones.dni_alumno = $dni;
    ";


?>

<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mis inscripciones</title>
</head>
<body>
    <a href="opciones-alumnos.php">Atras</a>
    <h1>Información sobre mis inscripciones</h1>
    <table>
        <tr>
        <th>DNI</th>
        <th>Materia</th>
        <th>Fecha</th>
        <th>Hora</th>
        </tr>
        <?php 
            filas($mis,4);
        ?>
    </table>
</body>

</html>