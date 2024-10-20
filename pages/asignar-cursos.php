<?php

    include "conexion.php";

    $idnivel= $_POST['nivel'];
    $dnialumno= $_POST['txtdni'];

  


    $query = "INSERT INTO cursos (id_nivel, dni_alumno) 
    VALUES ('$idnivel', '$dnialumno')";

    $resultado = mysqli_query( $conectar, $query);

    if ($resultado > 0) {

        echo '<script> alert("Se cargaron los datos.");history.go(-1);</script>';

    }
    else {
        echo '<script> alert("Hubo un herror al cargar los datos."); history.go(-1);</script>';

    }

?>