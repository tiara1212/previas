<?php
    session_start();

    include "conexion.php";
    $nombre = $_POST['txtusuario'];
    $contraseña = $_POST['txtcontraseña'];


    $sql= "SELECT * FROM alumnos WHERE alumnos.dni = '$nombre' and alumnos.contraseña = '$contraseña'"; 
    $res = mysqli_query( $conectar, $sql); 
    $nro_reg = mysqli_num_rows($res); 

    if ($nro_reg > 0) {  
        $validar= mysqli_fetch_assoc($res);  
        if ($validar['contraseña'] == $contraseña) {  
            $_SESSION['DNI'] = $validar['dni'];
            echo '<script> alert("se valido el usuario");</script>';
            header("location: opciones-alumnos.php"); 
            exit();
        }
    }
    else {
        echo '<script> alert("no es un usuario."); history.go(-1); </script>';
    }
?>