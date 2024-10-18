
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filtro cursos</title>
</head>
<body>
    <?php
        include "functions.php";
        $query = "SELECT `id_cursos`, `id_nivel` FROM `cursos` WHERE 1"; 
    ?>
    <header>

    </header>
    <main>
        <div>
            <select name="" id="curso" onchange="filtrarCursos()">
                <option disabled selected>selecciona un curso</option>
                <!-- //cursos -->
                <?php options($query);?>
            </select>
            
            <table border="1">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody id="resultado">
                    <!-- Los resultados se llenarán aquí mediante JavaScript -->
                </tbody>
            </table>
        </div>
    </main>
    <footer>

    </footer>
    <script src="function.js"></script> 
</body>
</html>