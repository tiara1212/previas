<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones admin</title>
</head>
<body>
    <h1>Opciones admin</h1>
    
    <h2>Cargar profesores</h2>
    <form action="cargar-profes.php" method="post">
            <label for="txtnombre">Nombre</label>
            <input type="text" required name="txtnombre" id="txtnombre" placeholder="NOMBRE">
            <label for="txtapellido">Apellido</label>
            <input type="text" required name="txtapellido" id="txtapellido" placeholder="APELLIDO">
            <label for="txtcorreo">Email</label>
            <input type="text" required name="txtcorreo" id="txtcorreo" placeholder="CORREO">
            <label for="txtcontraseña">Contraseña</label>
            <input type="number" required name="txtcontraseña" id="txtcontraseña" placeholder="CONTRASEÑA"/>
            <input type="submit" name="enviar"/>
            <input type="reset" value="Cancelar"/>
        </form>
        <?php
            include "conexion.php";
            $query = "SELECT * FROM profesores";
            $resultado = mysqli_query($conectar, $query);
            echo "<table border='1'>";
            echo "<th>Nombre</th>";
            echo "<th>Apellido</th>";
            echo "<th>Email</th>";
            echo "<th>Contraseña</th>";
            echo "<th>Acciones</th>";

            while ($profesores = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $profesores['nombre'] . "</td>";
                echo "<td>" . $profesores['apellido'] . "</td>";
                echo "<td>" . $profesores['correo'] . "</td>";
                echo "<td>" . $profesores['contraseña'] . "</td>";
                echo "<td><a href='editar-profes.php?id=" . $profesores["id_profes"] . "'>EDITAR</a></td>";
                echo "<td><a href='borrar-profes.php?id=" . $profesores["id_profes"] . "'>BORRAR</a></td>";
                echo "</tr>";
            }
        ?>

        <h2>Informar al nuevo usuario</h2>

        <h2>Cargar preceptores</h2>
        <form action="cargar-preces.php" method="post">
            <label for="txtnombre">Nombre</label>
            <input type="text" required name="txtnombre" id="txtnombre" placeholder="NOMBRE">
            <label for="txtapellido">Apellido</label>
            <input type="text" required name="txtapellido" id="txtapellido" placeholder="APELLIDO">
            <label for="txtcorreo">Email</label>
            <input type="text" required name="txtcorreo" id="txtcorreo" placeholder="CORREO">
            <label for="txtcontraseña">Contraseña</label>
            <input type="number" required name="txtcontraseña" id="txtcontraseña" placeholder="CONTRASEÑA"/>
            <input type="submit" name="enviar"/>
            <input type="reset" value="Cancelar"/>
        </form>        
        <?php
            include "conexion.php";
            $query = "SELECT * FROM preceptores";
            $resultado = mysqli_query($conectar, $query);
            echo "<table border='1'>";
            echo "<th>Nombre</th>";
            echo "<th>Apellido</th>";
            echo "<th>Email</th>";
            echo "<th>Contraseña</th>";
            echo "<th>Acciones</th>";

            while ($preceptores = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $preceptores['nombre'] . "</td>";
                echo "<td>" . $preceptores['apellido'] . "</td>";
                echo "<td>" . $preceptores['correo'] . "</td>";
                echo "<td>" . $preceptores['contraseña'] . "</td>";
                echo "<td><a href='editar-profes.php?id=" . $preceptores["id_preces"] . "'>EDITAR</a></td>";
                echo "<td><a href='borrar-profes.php?id=" . $preceptores["id_preces"] . "'>BORRAR</a></td>";
                echo "</tr>";
            }
        ?>

</body>
</html>