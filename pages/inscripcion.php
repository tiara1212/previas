<?php
    session_start();
    if(isset($_SESSION['DNI'])){
        $dni = $_SESSION['DNI'];
    }
    else{
        echo "
        <script> window.location.href='iniciar-datos.php';</script>";
    }
    include "conexion.php";
    include "functions.php";

 // Inicializar variable para el nivel seleccionado
    $id_año_seleccionado = isset($_POST['nivel']) ? $_POST['nivel'] : '';

    // Consulta para obtener los niveles
    $sqlNiveles = "SELECT id_nivel, nivel FROM nivel";
    $resultNiveles = mysqli_query($conectar, $sqlNiveles);

    // Consulta para obtener los datos de la tabla mesas si hay un nivel seleccionado
    $datosMesas = [];
    if ($id_año_seleccionado) {
        $sqlMesas = "SELECT 
                        mesas.id_mesas,
                        (SELECT materia.materia FROM materia WHERE materia.id_materia = mesas.id_materia) AS materia,
                        mesas.fecha,
                        mesas.horario
                    FROM 
                        mesas
                    WHERE 
                        mesas.id_materia = $id_año_seleccionado";
        
        $stmt = mysqli_query($conectar, $sqlMesas);

        // Almacenar resultados en un array
        while ($row = mysqli_fetch_assoc($stmt)) {
            $datosMesas[] = $row;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscrpción a previas</title>
</head>
<body>
    <a href="opciones-alumnos.php">Atras</a>
    <h1>Iformación sobre mesas de examen</h1>

    <?php
        echo '<h2>Filtrar Mesas por Nivel</h2>';
        echo '<form method="post" action="">';
        echo '<label for="nivel">Selecciona un nivel:</label>';
        echo '<select name="nivel" id="nivel" onchange="this.form.submit()">';
        echo '<option value="">Seleccione un nivel</option>'; // Opción por defecto

        // Llenar el dropdown con los niveles
        if (mysqli_num_rows($resultNiveles) > 0) {
            while ($nivel = mysqli_fetch_assoc($resultNiveles)) {
                $selected = ($id_año_seleccionado == $nivel['id_nivel']) ? 'selected' : '';
                echo '<option value="' . $nivel['id_nivel'] . '" ' . $selected . '>' . $nivel['nivel'] . '</option>';
            }
        }
        echo '</select>';
        echo '</form>';

        // Crear la tabla para mostrar los resultados
        if (!empty($datosMesas)) {
            echo "<h2>Mesas Filtradas</h2>";
            echo "<table>";
            echo "<tr><th>ID Mesa</th><th>Materia</th><th>Fecha</th><th>Horario</th></tr>";

            // Recorrer los resultados y mostrarlos en la tabla
            foreach ($datosMesas as $mesa) {
                echo "<tr>";
                echo "<td>" . $mesa["id_mesas"] . "</td>";
                echo "<td>" . $mesa["materia"] . "</td>";
                echo "<td>" . $mesa["fecha"] . "</td>";
                echo "<td>" . $mesa["horario"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else if ($id_año_seleccionado) {
            echo "<h3>No se encontraron mesas para el nivel seleccionado.</h3>";
        }
    ?>
    <h1>¡Inscribete aquí!</h1>

    <form method="post" action="alumnoInscripcion.php">
        <input type="hidden" name='dni' value="<?php echo $dni; ?>">
        <label for="anio">Elije el año</label>
        <select name="anio" id="anio" onchange="filtrarA('anio', 'anio', 'materia', 'anioPost')" required>
            <?php
                options($sqlNiveles);
            ?>
        </select>
        <label for="materia">Elije la materia</label>
        <select name="materia" id="materia" onchange="filtrarM('materia', 'materia', 'mesa', 'matPost')" required>

        </select>
        <label for="mesa">Elije la mesa</label>
        <select name="mesa" id="mesa" disabled required>

        </select>
        <input type="submit" name="inscribirme">
    </form>
</body>
    <script>
        function filtrarA(id, str, idres, php) {
            const cajaid = document.getElementById(id).value;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `filter.php?${php}=${cajaid}`, true);
            xhr.onload = function() {
                if (this.status === 200) {
                    const datos = JSON.parse(this.responseText);
                    const select = document.getElementById(idres);
                    select.disabled = false;
                    select.innerHTML = '<option value="" disabled selected>Seleccione un '+str+'</option>'; // Limpiar y restablecer

                    datos.forEach(dato => {
                        const option = document.createElement('option');
                        option.value = dato.id_materia; // Asigna el correo como valor
                        option.textContent = `${dato.id_materia} (${dato.materia})`; // Muestra el nombre y el correo
                        select.appendChild(option);
                    });
                }
            };
            xhr.send();
        }   

        function filtrarM(id, str, idres, php) {
            const cajaid = document.getElementById(id).value;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `filter.php?${php}=${cajaid}`, true);
            xhr.onload = function() {
                if (this.status === 200) {
                    const datos = JSON.parse(this.responseText);
                    const select = document.getElementById(idres);
                    select.disabled = false;
                    select.innerHTML = '<option value="" disabled selected>Seleccione un '+str+'</option>'; // Limpiar y restablecer

                    datos.forEach(dato => {
                        const option = document.createElement('option');
                        option.value = dato.id_mesas; // Asigna el correo como valor
                        option.textContent = `${dato.fecha} (${dato.horario})`; // Muestra el nombre y el correo
                        select.appendChild(option);
                    });
                }
            };
            xhr.send();
        } 
    </script> 
</html>