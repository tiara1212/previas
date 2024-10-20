<?php
include "conexion.php";

$dni =$_GET['filter_info'];

$query= "SELECT * FROM alumnos WHERE dni=$dni";
$ejecucion = mysqli_query($conectar, $query);
$alumno = mysqli_fetch_array($ejecucion);

try {
    $rows = "";
        $rows .= "
                <tr>
                    <td>{$alumno['dni']}</td>
                    <td>{$alumno['nombre']}</td>
                    <td>{$alumno['apellido']}</td>
                    <td>{$alumno['correo']}</td>

                
               
                </tr>";
                echo $rows; 
    }
    
    catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}