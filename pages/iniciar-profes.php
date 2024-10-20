<?php
    include "conexion.php";


    $nombre = $_POST['txtnombre'];
    $contraseña = $_POST['txtcontraseña'];


    $sql= "SELECT * FROM profesores WHERE profesores.nombre = '$nombre' and profesores.contraseña = '$contraseña'"; 
    $res = mysqli_query( $conectar, $sql); 
    $nro_reg = mysqli_num_rows($res); 

    if ($nro_reg > 0) {  
        $validar= mysqli_fetch_assoc($res);  
        if ($validar['contraseña'] == $contraseña) {  

 	        echo '<script> alert("se valido el usuario");</script>';
 	        header("location: opciones-profes.php"); 
 	        exit();
 	
        }
    }
    else {

        echo '<script> alert("no es un usuario."); history.go(-1); </script>';
    }
?>