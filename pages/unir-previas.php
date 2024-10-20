<?php
    include "conexion.php"; 
    $dni= $_POST['txtdni'];
    $materia= $_POST['txtmateria'];


    $sql= "INSERT INTO previas ( dni_alumnos, id_materia) VALUES ('$dni', '$materia')";
    $resultado = mysqli_query( $conectar, $sql);
    if ($resultado > 0) {
	    echo '<script> alert("Se cargaron los datos.");history.go(-1);</script>';

    }
    else {
	    echo '<script> alert("Hubo un herror al cargar los datos."); history.go(-1);</script>';

    }
?>