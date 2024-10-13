<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar mesas de examen</title>
</head>
<body>
    <header class="header">
    <a class="enlace1" href="abm-mesas.php">Volver</a>
        <h1 class="h1">Modificar lista de mesas de examen</h1>
    </header>
    <?php
        $id=$_GET['id'];
        try{
            include "conexion.php";
            $query= "SELECT * FROM mesas WHERE id_mesas = $id";
            $ejecucion = mysqli_query($conectar, $query);
            $row = mysqli_fetch_array($ejecucion);
        } catch(exception $error){
            echo $sql;
        }
    ?>
    <form action="actualizar-mesas.php" method="POST">
    <label class="label" for="txtid">id</label>
    <input class="input-material" type="number" name="txtid" value="<?php echo $id?>" id="txtid" placeholder=""/>
        <label for="txtinfo">Información</label>
        <input type="text" name="txtinfo" value="<?php echo $row['informacion']?>" id="txtinfo" placeholder="Ingrese información"/>
        <label for="txtmes">Mes</label>
        <input type="text" name="txtmes" value="<?php echo $row['id_mes']?>" id="txtmes" placeholder="Ingrese el mes"/>
        <label for="txtmateria">Materia</label>
        <input type="text" name="txtmateria" value="<?php echo $row['id_materia']?>" id="txtmateria" placeholder="Ingrese la nateria"/>
        <label for="txtdia">Día</label>
        <input type="text" name="txtdia" value="<?php echo $row['dia']?>" id="txtdia" placeholder="Ingrese el día"/>
        <label for="txtfecha">Fecha</label>
        <input type="date" name="txtfecha" value="<?php echo $row['fecha']?>" id="txtfecha" placeholder=""/>
        <label for="txthora">Hora</label>
        <input type="time" name="txthora" value="<?php echo $row['horario']?>" id="txthora" placeholder=""/>
        <input class="actualizar-estado" type="submit" value="GUARDAR"/> 
        <input class="cancelar-estado" type="reset" value="CANCELAR"/>
    </form>
</body>
</html>