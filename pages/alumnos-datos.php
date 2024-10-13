<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos form</title>
</head>
<body>
    <div class="div-registro">
        <h1>Registrate para poder comenzar</h1>
        <form action="registrar-alumnnos.php" method="POST">
            <label for="txtndni">DNI</label>
            <input type="number" required name="txtdni" id="txtdni" placeholder="DNI"/>
            <label for="txtnombre">Nombre</label>
            <input type="text" required name="txtnombre" id="txtnombre" placeholder="NOMBRE"/>
            <label for="txtapellido">Apellido</label>
            <input type="text" required name="txtapellido" id="txtapellido" placeholder="APELLIDO"/>
            <label for="txtcorreo">Correo</label>
            <input type="text" required name="txtcorreo" id="txtcorreo" placeholder="CORREO"/>
            <label  id="año">   Año
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
            </label>
            <label for="txtcontraseña">Contraseña</label>
            <input type="password" required name="txtcontraseña" id="txtcontraseña" placeholder="CONTRASEÑA"/>
            <input type="submit" name="enviar"/>
            <input type="reset" value="Cancelar"/>
        </form>
    </div>
    <h1>Log In</h1>
    <div class="div-iniciar">
        <form action="iniciar-alumnos.php" method="post">
            <label for="txtdni">DNI</label>
            <input type="number" required name="txtdni" id="txtdni" placeholder="DNI">
            <label for="txtcontraseña">Contraseña</label>
            <input type="password" required name="txtcontraseña" id="txtcontraseña" placeholder="CONTRASEÑA"/>
            <input type="submit" name="enviar"/>
            <input type="reset" value="Cancelar"/>
        </form>
    </div>
</body>
</html>