<?php

    include "conexion.php";

    $nombre= $_POST['txtnombre'];
    $apellido= $_POST['txtapellido'];
    $correo= $_POST['txtcorreo'];
    $contraseña= $_POST['txtcontraseña'];
  


    $query = "INSERT INTO preceptores (nombre, apellido, correo, contraseña) 
    VALUES ('$nombre', '$apellido', '$correo', '$contraseña')";

    $resultado = mysqli_query( $conectar, $query);

    if ($resultado > 0) {

        echo '<script> alert("Se cargaron los datos.");history.go(-1);</script>';

    }
    else {
        echo '<script> alert("Hubo un herror al cargar los datos."); history.go(-1);</script>';

    }

?>