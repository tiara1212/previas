<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Previas</h1>
    <h2>Buscar alumnos</h2>
</head>
<style>
        /* Estilos para el modal */
        .modal {
            display: none; /* Oculto por defecto */
            position: fixed; 
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
        }
        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: red;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover, .close:focus {
            color: #000;
            cursor: pointer;
        }
    </style>
<body>

   <div class="container" style="margin-top: 50px; display: grid; place-content:center;">
    <div class="columns">
        <div class="column">
        </div>
        <div class="field column">

        </div>
        <div class="field has-addons column">
            <div class="control">
                <input class="input" required id="filterInfo" type="text" placeholder="Buscar alumno por DNI">
            </div>
            <div class="control">
                <button class="button is-info" id="searchButton">Buscar</button>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <td>DNI</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Correo</td>
                <td colspan="2"></td>
            </tr>
        </thead>
        <tbody id="reservationsTableBody">
        </tbody>
    </table>

</div>
<script>

    //Filtro

    document.getElementById("searchButton").addEventListener("click", function(event) {
        const filterInfo = document.getElementById('filterInfo').value;
        fetch(
                `getcargar.php?filter_info=${encodeURIComponent(
      filterInfo
    )}`
            )
            .then((response) => response.text())
            .then((data) => {
                document.getElementById("reservationsTableBody").innerHTML = data;
            })
            .catch((error) => console.error("Error:", error));
    });
</script>
<h1>Cargar previas</h1>
<form action="unir-previas.php" method="POST">
    <label for="txtdni">DNI</label>
    <input type="number" required name="txtdni" id="txtdni" placeholder="DNI">
    <label for="txtmateria"> ID MATERIA</label>
    <input type="number" required name="txtmateria" id="txtmateria" placeholder="MATERIA">
    <input type="submit" name="enviar"/>
    <input type="reset" value="Cancelar"/>

</form>
    <h3>Materias de 1mer año</h3>
    <table border='1' class="table">
                        </tr>
                        <tr><th class=th>ID</th>
                        <th class=th>Materia</th>
                <?php
                    include "conexion.php";
   	                $query= "SELECT * FROM materia";
                    $ejecucion = mysqli_query( $conectar, $query);
                    $nro_reg = mysqli_num_rows($ejecucion);
                        foreach ($ejecucion as $materia) {
                            echo "<tr>";
                            echo "<td class=tdd>" . $materia['id_materia'] . "</td>";
                            echo "<td class=tdd>" . $materia['materia'] . "</td>";
            
                            echo "</tr>";
                        }
                    "</table>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    
                ?>


</body>
</html>