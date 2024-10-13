<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesas de examen</title>
</head>

<body>
    <a href="opciones-preceptores.php">Atrás</a>
    <h1>Mesas de examen</h1>
    <h3>Cargar datos</h3>
    <form action="cargar-mesas.php" method="POST">
        <label for="txtinfo">Infomación</label>
        <input type="text" required name="txtinfo" id="txtinfo" placeholder="Información" />
        <label id="mes"> Mes
            <select class="desplegable" id="mes" name="mes">
                <option disabled selected value=""> selecione aquí</option>
                <?php
                include "conexion.php";
                $query = "SELECT * from meses";
                $ejecucion =  mysqli_query($conectar, $query);
                $row = mysqli_num_rows($ejecucion);
                if ($row > 0) {
                    while ($mes = mysqli_fetch_assoc($ejecucion)) {
                        echo "<option value= " . $mes['id_mes'] . "> " . $mes['mes'] . " </option>";
                    }
                } else {
                    echo "<option value=''>Aún no hay meses cargados.</option>";
                }
                ?>
            </select>
        </label>
        <label id="materia"> Materia
            <select class="desplegable" id="materia" name="materia">
                <option disabled selected value=""> selecione aquí</option>
                <?php
                include "conexion.php";
                $query = "SELECT * from materia";
                $ejecucion =  mysqli_query($conectar, $query);
                $row = mysqli_num_rows($ejecucion);
                if ($row > 0) {
                    while ($materia = mysqli_fetch_assoc($ejecucion)) {
                        echo "<option value= " . $materia['id_materia'] . "> " . $materia['materia'] . " </option>";
                    }
                } else {
                    echo "<option value=''>Aún no hay materias cargadas.</option>";
                }
                ?>
            </select>
        </label>
        <label for="txtdia">Día</label>
        <input type="text" required name="txtdia" id="txtdia" placeholder="Día" />
        <label for="txtfecha">Fecha</label>
        <input type="date" required name="txtfecha" id="txtfecha" placeholder="Fecha"/>
        <label for="txthora">Hora</label>
        <input type="time" required name="txthora" id="txthora" placeholder="Hora"/>
        <input type="submit" name="enviar"/>
        <input type="reset" value="Cancelar"/>
    </form>
    <h3>filtrar por:</h3>
    <!-- EL FILTRADO DE DATOS AUN NO FUNCIONA-->
    <label id="mes"> Mes de Instancia
        <select class="desplegable" id="mes" name="mes">
            <option disabled selected value=""> selecione aquí</option>
            <?php
            include "conexion.php";
            $query = "SELECT * from meses";
            $ejecucion =  mysqli_query($conectar, $query);
            $row = mysqli_num_rows($ejecucion);
            if ($row > 0) {
                while ($mes = mysqli_fetch_assoc($ejecucion)) {
                    echo "<option value= " . $mes['id_mes'] . "> " . $mes['mes'] . " </option>";
                }
            } else {
                echo "<option value=''>Aún no hay meses cargados.</option>";
            }
            ?>
        </select>
    </label>
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
    <!-- TABLA DE INFORMACIOON SOBRE LAS MESAS-->
    <H2>información de las mesas de examen</H2>
    <?php
    include "conexion.php";
    $query = "SELECT * FROM mesas";
    $resultado = mysqli_query($conectar, $query);
    echo "<table border='1'>";
    echo "<th>Mes</th>";
    echo "<th>Materia</th>";
    echo "<th>Día</th>";
    echo "<th>Fecha</th>";
    echo "<th>Horario</th>";
    echo "<th>Acciones</th>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['id_mes'] . "</td>";
        echo "<td>" . $fila['id_materia'] . "</td>";
        echo "<td>" . $fila['dia'] . "</td>";
        echo "<td>" . $fila['fecha'] . "</td>";
        echo "<td>" . $fila['horario'] . "</td>";
        echo "<td><a href='editar-mesas.php?id=" . $fila["id_mesas"] . "'>EDITAR</a></td>";
        echo "<td><a href='borrar-mesas.php?id=" . $fila["id_mesas"] . "'>BORRAR</a></td>";
        echo "</tr>";
    }
    ?>
</body>

</html>