<?php
    include "conexion.php";


    $usuario = $_POST['txtusuario'];
    $contraseña = $_POST['txtcontraseña'];


    $sql= "SELECT * FROM administrador WHERE administrador.usuario = '$usuario' and administrador.contraseña = '$contraseña'"; 
    $res = mysqli_query( $conectar, $sql); 
    $nro_reg = mysqli_num_rows($res); 

    if ($nro_reg > 0) {  
        $validar= mysqli_fetch_assoc($res);  
        if ($validar['contraseña'] == $contraseña) {  

 	        echo '<script> alert("se valido el usuario");</script>';
 	        header("location: opciones-admin.php"); 
 	        exit();
 	
        }
    }
    else {

        echo '<script> alert("no es administrador."); history.go(-1); </script>';
    }
?>