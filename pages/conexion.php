<?php

$conectar = mysqli_connect("localhost","root","","previas");

if(!$conectar){
    echo 'Error al conectar!!!';
    exit;
}

?>