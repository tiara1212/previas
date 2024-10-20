<?php

////////////////////////////////////////////////////////////////////////

include "conexion.php";

// Recibir los datos del formulario
$subjects = $_POST['subject'];
$exam_dates = $_POST['exam_date'];
$exam_times = $_POST['exam_time']; // Recibir los horarios
$mes = $_POST['mes'];
$anio = $_POST['anio'];


        $query = "INSERT INTO instancia (id_meses, anio) 
        VALUES ($mes, $anio)";
    
        $resultado = mysqli_query( $conectar, $query);


// Recorrer los datos y guardarlos en la base de datos
for ($i = 0; $i < count($subjects); $i++) {
    $subject = $subjects[$i];
    $exam_date = $exam_dates[$i];
    $exam_time = $exam_times[$i]; // Guardar el horario

    $query2 = "INSERT INTO mesas (id_materia, fecha, horario, id_instancia) VALUES ($subject, '$exam_date', '$exam_time', (SELECT id_instancia FROM instancia ORDER BY id_instancia DESC LIMIT 1
))";
    $resultado2 = mysqli_query( $conectar, $query2);
}

if ($resultado > 0) {
        
    echo '<script> alert("Se cargaron los datos.");history.go(-1);</script>';

}
else {
    echo '<script> alert("Hubo un herror al cargar los datos."); history.go(-1);</script>';

}



?>