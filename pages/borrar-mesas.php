<?php
	include "conexion.php";
	try{
		$id=$_GET['id'];
		$query = "DELETE from mesas where id_mesas = $id";
		$ejecucion = mysqli_query($conectar, $query);
		if($ejecucion){
			echo '<script> alert("se borraron los datos");</script>';
			header("location: abm-mesas.php");
		} else{
			echo 'Error' . mysqli_error($conectar);
		}
		mysqli_close($conectar);
	}catch(exception $error){
		echo $sql;
	}
?>