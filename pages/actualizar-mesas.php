<?php
    include "conexion.php";
        $id = $_POST['txtid'];
        $info = $_POST['txtinfo'];
        $mes = $_POST['txtmes'];
        $materia = $_POST['txtmateria'];
        $dia = $_POST['txtdia'];
        $fecha = $_POST['txtfecha'];
        $hora = $_POST['txthora'];
        $query = "UPDATE mesas SET informacion='$info', id_mes='$mes', id_materia='$materia', dia='$dia', horario='$hora'  WHERE id_mesas=$id";
        echo $query;
        $ejecucion= mysqli_query($conectar, $query);

        if ($ejecucion) {
	        echo '<script> alert("se actualizaron los datos");</script>';
	        header("location: abm-mesas.php");
        } else {
	        echo '<script> alert("hubo un herror al remplazar los datos,");</script>';
        }
?>