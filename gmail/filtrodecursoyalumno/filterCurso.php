<?php
header('Content-Type: application/json');
    include "functions.php";

    $curso = $_GET['curso'];

    $sql = "SELECT `dni`, `nombre`, `apellido`, `correo`
    FROM `alumnos` 
    INNER JOIN cursos ON cursos.dni_alumno = alumnos.dni AND cursos.id_cursos = $curso";
    $result = QueryAndGetData($sql);

    $nombres = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nombres[] = $row;
        }
    }

    echo json_encode($nombres);

?>
