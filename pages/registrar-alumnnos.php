<?php
include "conexion.php"; 
$dni= $_POST['txtdni'];
$nombre= $_POST['txtnombre'];
$apellido= $_POST['txtapellido'];
$correo= $_POST['txtcorreo'];
$año= $_POST['año'];
$contraseña= $_POST['txtcontraseña'];

$sql= "INSERT INTO alumnos ( dni, nombre, apellido, correo, id_año, contraseña ) VALUES ('$dni', '$nombre', '$apellido', '$correo', '$año','$contraseña')";
$resultado = mysqli_query( $conectar, $sql);
if ($resultado > 0) {
	 echo '<script> alert("Se cargaron los datos.");history.go(-1);</script>';
}
else {
	 echo '<script> alert("Hubo un herror al cargar los datos."); history.go(-1);</script>';

}



?>