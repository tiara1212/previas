<?php

    include "functions.php";

    $curso = $_GET['curso'];

    $sql = "SELECT nombre, correo FROM alumnos WHERE id_año = $curso";
    $result = QueryAndGetData($sql);

    $nombres = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nombres[] = $row;
        }
    }

    echo json_encode($nombres);

?>
