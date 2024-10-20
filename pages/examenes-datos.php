<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de examen</title>
</head>
<body>

<h2>Subir archivo</h2>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="archivo" required>
    <button type="submit">Subir</button>
</form>

<h2>Archivos disponibles para descargar</h2>
<ul>
    <?php
        // Listar los archivos subidos
        $directorio = 'uploads/';
        if (is_dir($directorio)) {
            $archivos = scandir($directorio);
            foreach ($archivos as $archivo) {
                if ($archivo != "." && $archivo != "..") {
                    echo "<li><a href='$directorio$archivo' download>$archivo</a></li>";
                }
            }
        }
    ?>
</ul>

    <h1>Cargar datos de examen aquí</h1>
    <form action="guardar-datos-examen.php" method=POST>
        <LAbel for="txtnombre">Nombre del docente</LAbel>
        <input type="text" required name="txtnombre" id="txtnombre" placeholder="NOMBRE"/>
        <LAbel for="txtmateria">Asignatura</LAbel>
        <input type="text" required name="txtmateria" id="txtmateria" placeholder="ASIGNATUTA"/>
        <label id="año"> Año escolar
            <select class="desplegable" id="año" name="año">
                <option disabled selected value=""> selecione aquí</option>
                <?php
                    include "conexion.php";
                    $query = "SELECT * from año";
                    $ejecucion =  mysqli_query($conectar, $query);
                    $row = mysqli_num_rows($ejecucion);
                    if ($row > 0) {
                        while ($año = mysqli_fetch_assoc($ejecucion)) {
                            echo "<option value= " . $año['id_año'] . "> " . $año['año'] . " </option>";
                        }
                    } else {
                        echo "<option value=''>Aún no hay años escolares cargados.</option>";
                    }
                ?>
            </select>
        </label>
        <LAbel for="txttemario">Temario</LAbel>
        <input type="file" required name="txttemario" id="txttemario" placeholder="TEMARIO"/>
        <label id="mesas"> Mesas
            <select class="desplegable" id="mesas" name="mesas">
                <option disabled selected value=""> selecione aquí</option>
                <?php
                    include "conexion.php";
                    $query = "SELECT * from mesas";
                    $ejecucion =  mysqli_query($conectar, $query);
                    $row = mysqli_num_rows($ejecucion);
                    if ($row > 0) {
                        while ($mesas = mysqli_fetch_assoc($ejecucion)) {
                            echo "<option value= " . $mesas['id_mesas'] . "> " . $mesas['fecha'] . " </option>";
                        }
                    } else {
                        echo "<option value=''>Aún no hay mesas de examen cargados.</option>";
                    }
                ?>
            </select>
        </label>
        <input  type="submit" value="GUARDAR"/> 
        <input  type="reset" value="CANCELAR"/>



        
</body>
</html>