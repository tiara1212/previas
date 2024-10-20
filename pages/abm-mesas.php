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
    <form id="examTablesForm" method="POST" action="procesar_mesas.php">
    <label for="mes"> Mes
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
        
        <label for="anio">Año:</label>
        <input type="number" id="anio" name="anio" required><br><br>

        <label for="year">Seleccionar Año:</label>
        <select id="year" required>
            <option value="">Seleccione un año</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select><br><br>

        <div>
            <label for="subject">Materia:</label>
            <select id="subject" name="subject" required>
                <option value="">Seleccione una materia</option>
                <!-- Aquí se agregarán dinámicamente las materias -->
            </select>

            <label for="exam_date">Fecha de mesa:</label>
            <input type="date" id="exam_date">


            <label for="horario">Horario</label>
            <input type="time" id="horario" name="horario">
        </div>
        
        <button type="button" onclick="addExamTable()">Agregar Mesa</button><br><br>

        <h3>Mesas Agregadas</h3>
        <table id="examTableList" border="1">
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Fecha de Mesa</th>
                    <th>Horario</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se agregarán las filas dinámicamente -->
            </tbody>
        </table><br>

        <button type="submit">Guardar Mesas</button>
    </form>
    <script>
        // Arrays para almacenar materias y fechas de examen
        let subjects = [];
        let examDates = [];
        let examTimes = [];

        // Cuando se seleccione un año, se llamará esta función
        document.getElementById('year').addEventListener('change', function() {
            const selectedYear = this.value;
            if (selectedYear) {
                fetchMaterias(selectedYear);
            } else {
                clearMaterias();
            }
        });

        // Función para obtener las materias según el año seleccionado
        function fetchMaterias(year) {
            fetch(`filtrar-mesas-materias.php?year=${year}`)
                .then(response => response.json())
                .then(data => {
                    const subjectSelect = document.getElementById('subject');
                    subjectSelect.innerHTML = ''; // Limpiar el select actual
                    data.forEach(materia => {
                        const option = document.createElement('option');
                        option.value = materia.id_materia; // Supongo que devuelves el id de la materia
                        option.textContent = materia.materia;
                        subjectSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error al obtener materias:', error);
                });
        }

        // Función para limpiar las opciones del select de materias
        function clearMaterias() {
            const subjectSelect = document.getElementById('subject');
            subjectSelect.innerHTML = '<option value="">Seleccione una materia</option>';
        }

        function addExamTable() {
            const subjectSelect = document.getElementById('subject');
            const subjectText = subjectSelect.options[subjectSelect.selectedIndex].text;
            const examDateInput = document.getElementById('exam_date');
            const examTimeInput = document.getElementById('horario');

            const subjectValue = subjectSelect.value;
            const examDate = examDateInput.value;
            const examTime = examTimeInput.value;

            if (subjectValue === "" || examDate === "" || examTime === "") {
                alert("Por favor, seleccione una materia y una fecha.");
                return;
            }

            subjects.push(subjectValue);
            examDates.push(examDate);
            examTimes.push(examTime);

            // Limpiar los campos
            examDateInput.value = "";
            examTimeInput.value = "";

            const tableBody = document.getElementById('examTableList').getElementsByTagName('tbody')[0];
            const newRow = tableBody.insertRow();
            const subjectCell = newRow.insertCell(0);
            const dateCell = newRow.insertCell(1);
            const timeCell = newRow.insertCell(2); // Nueva celda para el horario

            subjectCell.textContent = subjectText;
            dateCell.textContent = examDate;
            timeCell.textContent = examTime;

            // Crear campos ocultos para enviar al servidor
            const form = document.getElementById('examTablesForm');

            const hiddenSubject = document.createElement('input');
            hiddenSubject.type = 'hidden';
            hiddenSubject.name = 'subject[]';
            hiddenSubject.value = subjectValue;
            form.appendChild(hiddenSubject);

            const hiddenDate = document.createElement('input');
            hiddenDate.type = 'hidden';
            hiddenDate.name = 'exam_date[]';
            hiddenDate.value = examDate;
            form.appendChild(hiddenDate);
            
            const hiddenTime = document.createElement('input');
            hiddenTime.type = 'hidden';
            hiddenTime.name = 'exam_time[]';
            hiddenTime.value = examTime;
            form.appendChild(hiddenTime);
        }
    </script>
</body>

</html>