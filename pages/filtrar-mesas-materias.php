<?php
include "conexion.php";
    $anio = $_GET['year'];

    // Consulta para obtener las materias correspondientes al año seleccionado
    $sql = "SELECT id_materia, materia FROM materia WHERE id_año = $anio";

    $resultado = mysqli_query( $conectar, $sql);

    $materias = array();
    while ($row = mysqli_fetch_array($resultado)) {
        // Usamos solo las claves asociativas (nombre de las columnas) para construir el array
        $materias[] = [
            'id_materia' => $row['id_materia'],
            'materia' => $row['materia']
        ];
    }

header('Content-Type: application/json');
echo json_encode($materias);

?>