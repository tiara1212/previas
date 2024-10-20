<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrpción a previas</title>
</head>
<body>
    <a href="opciones-alumnos.php">Atras</a>
    <h1>Iformación sobre mesas de examen</h1>
    <?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "previas"; 
$conn = new mysqli($host, $user, $pass, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar variable para el nivel seleccionado
$id_año_seleccionado = isset($_POST['nivel']) ? $_POST['nivel'] : '';

// Consulta para obtener los niveles
$sqlNiveles = "SELECT id_nivel, nivel FROM nivel";
$resultNiveles = $conn->query($sqlNiveles);

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
                    mesas.id_materia = ?";
    
    $stmt = $conn->prepare($sqlMesas);
    $stmt->bind_param("i", $id_año_seleccionado);
    $stmt->execute();
    $resultMesas = $stmt->get_result();
    
    // Almacenar resultados en un array
    while ($row = $resultMesas->fetch_assoc()) {
        $datosMesas[] = $row;
    }
    $stmt->close();
}

// Estilos CSS para la tabla
echo '<style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            box-shadow: 0 2px 15px rgba(64,64,64,0.1);
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        table th {
            background-color: #f4f4f4;
            font-weight: bold;
            color: #333;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        h2 {
            text-align: center;
            font-family: Arial, sans-serif;
        }
      </style>';

// Formulario para seleccionar el nivel
echo '<h2>Filtrar Mesas por Nivel</h2>';
echo '<form method="post" action="">';
echo '<label for="nivel">Selecciona un nivel:</label>';
echo '<select name="nivel" id="nivel" onchange="this.form.submit()">';
echo '<option value="">Seleccione un nivel</option>'; // Opción por defecto

// Llenar el dropdown con los niveles
if ($resultNiveles->num_rows > 0) {
    while ($nivel = $resultNiveles->fetch_assoc()) {
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

// Cerrar la conexión
$conn->close();
?>
    <h1>¡Inscribete aquí!</h1>
</body>
</html>