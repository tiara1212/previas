<?php



    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "previas";
    
    try{

        $conexion = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conexion) {
            throw new Exception("Conexión fallida: " . mysqli_connect_error());
        }
        
        
        
    }catch (Exception $error) {
        
        $Error = $error->getMessage();
        
    }

?>