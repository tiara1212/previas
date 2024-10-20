<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar alumnos</title>
</head>
<body>
<h2>Cargar Alumnos</h2>
    <form action="crear-alumnos.php" method="post">
            <label for="txtdni">DNI</label>
            <input type="number" required name="txtdni" id="txtdni" placeholder="DNI">
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
        <h2>informar al nuevo Alumno</h2>

        <h1>Asignar cursos</h1>
        <form action="asignar-cursos.php" method="post">
        <label  id="nivel">   Año
                <select class="desplegable" id="nivel" name="nivel">
                    <option disabled selected value=""> selecione aquí</option>
                    <?php
                        include "conexion.php";
                        $query = "SELECT * from nivel";
                        $ejecucion =  mysqli_query($conectar, $query);
                        $row = mysqli_num_rows($ejecucion);
                        if ($row>0) {
                            while ($nivel = mysqli_fetch_assoc($ejecucion)) {
                                echo "<option value= ".$nivel['id_nivel']."> ".$nivel['nivel']." </option>";
                            }
                        }
                        else{
                            echo "<option value=''>Aún no hay años cargados.</option>";
                        }
                    ?>
                </select>
            <label for="txtdni">DNI alumno</label>
            <input type="number" required name="txtdni" id="txtdni" placeholder="DNI">
           
            <input type="submit" name="enviar"/>
            <input type="reset" value="Cancelar"/>
        </form>
</body>
</html>