<?php
    if(isset($_GET['anioPost'])){
        include "functions.php";

        $anio = $_GET['anioPost'];
    
        $sql = "SELECT `id_materia`, `materia` FROM `materia` WHERE `id_año` = $anio";
        $result = QueryAndGetData($sql);
    
        $anioN = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $anioN[] = $row;
            }
        }
    
        echo json_encode($anioN);
    }

    if(isset($_GET['matPost'])){
        include "functions.php";

        $materia = $_GET['matPost'];
    
        $sql = "SELECT `id_mesas`, `id_materia`, `fecha`, `horario`, `id_instancia` FROM `mesas` WHERE id_materia = $materia";
        $result = QueryAndGetData($sql);
    
        $anioN = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $anioN[] = $row;
            }
        }
    
        echo json_encode($anioN);
    }
    

?>