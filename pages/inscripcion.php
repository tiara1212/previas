<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrpción a previas</title>
</head>
<body>
    <h1>¡Inscribete aquí!</h1>
    <h3>Filtar por:</h3>
    <!-- LOS SELECT TODAVIA NO FUNCIONAN PERO SU FINALIDAD SERÁ FILTRAR LOS DATOS DE LAS MESAS DE EXAMEN
    POR AÑO, MATERIA Y TALLERES-->
    <label  id="mes">   Mes de Instancias
                <select class="desplegable" id="mes" name="mes">
                    <option disabled selected value=""> selecione aquí</option>
                    <?php
                        include "conexion.php";
                        $query = "SELECT * from meses";
                        $ejecucion =  mysqli_query($conectar, $query);
                        $row = mysqli_num_rows($ejecucion);
                        if ($row>0) {
                            while ($mes = mysqli_fetch_assoc($ejecucion)) {
                                echo "<option value= ".$mes['id_mes']."> ".$mes['mes']." </option>";
                            }
                        }
                        else{
                            echo "<option value=''>Aún no hay meses cargados.</option>";
                        }
                    ?>
                </select>
            </label>
            <label  id="año">   Año escolar
                <select class="desplegable" id="año" name="año">
                    <option disabled selected value=""> selecione aquí</option>
                    <?php
                        include "conexion.php";
                        $query = "SELECT * from año";
                        $ejecucion =  mysqli_query($conectar, $query);
                        $row = mysqli_num_rows($ejecucion);
                        if ($row>0) {
                            while ($año = mysqli_fetch_assoc($ejecucion)) {
                                echo "<option value= ".$año['id_año']."> ".$año['año']." </option>";
                            }
                        }
                        else{
                            echo "<option value=''>Aún no hay años cargados.</option>";
                        }
                    ?>
                </select>
                <input type="reset" value="Cancelar"/>
            </label>
            <h3>Accede al formulario de inscripción:</h3>
            <!-- TABLA DE INFORMACIOON SOBRE LAS MESAS-->
             <?php 
                include "conexion.php";
                $query="SELECT * FROM mesas";
                $resultado= mysqli_query($conectar, $query);
                echo "<table border='1'>";
                echo "<th>Mes</th>";
                echo "<th>Materia</th>";
                echo "<th>Día</th>";
                echo "<th>Fecha</th>";
                echo "<th>Horario</th>";
                echo "<th>Acciones</th>";

                while($fila = mysqli_fetch_assoc($resultado)){
                    echo "<tr>";
                        echo "<td>".$fila['id_mes']."</td>";
                        echo "<td>".$fila['id_materia']."</td>";
                        echo "<td>".$fila['dia']."</td>";
                        echo "<td>".$fila['fecha']."</td>";
                        echo "<td>".$fila['horario']."</td>";
                        echo "<td><a href='formulario-insripcion.php?id=".$fila["id_mesas"]."'>INSCRIBIRME</a></td>";
                    echo "</tr>";
                }
             ?>
</body>
</html>