<?php
    include "conexion.php";


    $dni = $_POST['txtdni'];
    $contraseña = $_POST['txtcontraseña'];


    $sql= "SELECT * FROM preceptores WHERE preceptores.dni = '$dni' and preceptores.contraseña = '$contraseña'"; 
    $res = mysqli_query( $conectar, $sql); 
    $nro_reg = mysqli_num_rows($res); 

    if ($nro_reg > 0) {  
        $validar= mysqli_fetch_assoc($res);  
        if ($validar['dni'] == $dni) {  

 	        echo '<script> alert("se valido el usuario");</script>';
 	        header("location: opciones-preceptores.php"); 
 	        exit();
 	
        }
    }
    else {

        echo '<script> alert("no es un usuario."); history.go(-1); </script>';
    }
?>