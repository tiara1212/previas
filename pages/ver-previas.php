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
            previas.id_previas,
            previas.dni_alumnos,
            materia.materia
        FROM previas
        INNER JOIN materia ON materia.id_materia = previas.id_materia
        WHERE previas.dni_alumnos = 46787355;
    ";


?>

<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mis previas</title>
</head>
<body>
    <a href="opciones-alumnos.php">Atras</a>
    <h1>Información sobre mis previas</h1>
    <table>
        <tr>
        <th>DNI</th>
        <th>Materia</th>
        </tr>
        <?php 
            filas($mis,2);
        ?>
    </table>
</body>

</html>