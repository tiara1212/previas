<?php

    include"conexion.php";

    $info= $_POST['txtinfo'];
    $mes= $_POST['mes'];
    $materia= $_POST['materia'];
    $dia= $_POST['txtdia'];
    $fecha= $_POST['txtfecha'];
    $hora= $_POST['txthora'];

    $query = "INSERT INTO mesas (informacion, id_mes, id_materia, dia, fecha, horario) 
    VALUES ('$info', '$mes', '$materia', '$dia', '$fecha', '$hora')";

    $resultado = mysqli_query( $conectar, $query);

    if ($resultado > 0) {

        echo '<script> alert("Se cargaron los datos.");history.go(-1);</script>';

    }
    else {
        echo '<script> alert("Hubo un herror al cargar los datos."); history.go(-1);</script>';

    }

?>