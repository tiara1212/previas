<?php

    if(isset($_POST['inscribirme'])){
        include "functions.php";

        $materia = $_POST['materia'];
        $mesa = $_POST['mesa'];
        $dni = $_POST['dni'];

        $sql = "INSERT INTO `inscripciones`(`dni_alumno`, `id_materia`, `id_mesas`) VALUES ('$dni','$materia','$mesa')";

        if(Query($sql)){
            echo "<script>
            
                alert('alumno inscripto :)');
                window.location.href='inscripcion.php';
            </script>";
        }
    }


?>